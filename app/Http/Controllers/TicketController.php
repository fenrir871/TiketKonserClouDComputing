<?php

namespace App\Http\Controllers;

use App\Mail\TicketConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller

{
    private const TIERS = [
        'VIP'      => ['name' => 'VIP Blue Rose Pass', 'price' => 220],
        'STANDING' => ['name' => 'Standing Rose Arena', 'price' => 145],
        'GENERAL'  => ['name' => 'General Reserved Seating', 'price' => 85],
    ];

    private const ADDONS = [
        'lightstick' => ['name' => 'Blue Rose Penlight', 'price' => 35],
        'hoodie'     => ['name' => "'HIBANA' Tour Hoodie", 'price' => 75],
        'book'       => ['name' => 'Art Photobook', 'price' => 25],
    ];

    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name' => 'required|string|max:100',
            'email'     => 'required|email',
            'phone'     => 'required|string|max:30',
            'quantity'  => 'required|integer|min:1|max:4',
            'show_date' => 'required|in:2026-11-14,2026-11-15',
            'tier'      => 'required|in:VIP,STANDING,GENERAL',
            'addons'    => 'array',
            'addons.*'  => 'in:lightstick,hoodie,book',
            'promo'     => 'nullable|string|max:30',
        ]);

        // Hitung ulang di server supaya harga tidak bisa dimanipulasi dari browser
        $tier   = self::TIERS[$data['tier']];
        $qty    = (int) $data['quantity'];
        $addons = collect($data['addons'] ?? [])->map(fn ($k) => self::ADDONS[$k]);

        $gross    = ($tier['price'] + $addons->sum('price')) * $qty;
        $discount = in_array(strtoupper($data['promo'] ?? ''), ['ADO2026', 'AISHITE']) ? $gross * 0.15 : 0;
        $total    = $gross - $discount;

        $ticket = [
            'pass_id'   => 'ADO-' . random_int(1000, 9999) . '-2026',
            'name'      => $data['full_name'],
            'email'     => $data['email'],
            'phone'     => $data['phone'],
            'date'      => $data['show_date'],
            'tier'      => $tier['name'],
            'quantity'  => $qty,
            'addons'    => $addons->pluck('name')->all(),
            'discount'  => $discount,
            'total'     => $total,
        ];

        Mail::to($ticket['email'])->send(new TicketConfirmation($ticket));

        return response()->json(['ok' => true, 'ticket' => $ticket]);
    }
}