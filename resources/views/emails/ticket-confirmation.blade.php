@php
    $dateLabel = \Carbon\Carbon::parse($ticket['date'])->format('l, d F Y');
    $timeLabel = $ticket['date'] === '2026-11-14' ? '18:00 JST' : '17:00 JST';
    $subtotal  = $ticket['total'] + $ticket['discount'];
    $bars      = str_split(substr(md5($ticket['pass_id']), 0, 28));
@endphp
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Confirmed</title>
</head>
<body style="margin:0;padding:0;background-color:#030712;">

  {{-- Teks preview di inbox --}}
  <div style="display:none;max-height:0;overflow:hidden;opacity:0;">
    Reservasi kamu untuk Ado World Tour 'HIBANA' berhasil. Pass ID: {{ $ticket['pass_id'] }}
  </div>

  <table role="presentation" width="100%" cellpadding="0" cellspacing="0" bgcolor="#030712" style="background-color:#030712;">
    <tr>
      <td align="center" style="padding:32px 12px;">

        <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="width:100%;max-width:600px;font-family:Arial,Helvetica,sans-serif;">

          {{-- Aksen atas --}}
          <tr>
            <td height="4" bgcolor="#06b6d4" style="background:linear-gradient(90deg,#e11d48,#00f0ff,#1d4ed8);font-size:0;line-height:0;border-radius:12px 12px 0 0;">&nbsp;</td>
          </tr>

          {{-- Header --}}
          <tr>
            <td align="center" bgcolor="#080d1e" style="background-color:#080d1e;padding:36px 24px 24px;border-left:1px solid #164e63;border-right:1px solid #164e63;">
              <p style="margin:0;font-size:12px;letter-spacing:4px;color:#06b6d4;text-transform:uppercase;">Ado World Tour</p>
              <h1 style="margin:10px 0 6px;font-size:32px;letter-spacing:3px;color:#ffffff;font-family:Georgia,'Times New Roman',serif;">HIBANA</h1>
              <p style="margin:0;font-size:13px;color:#9ca3af;">Official Digital Reservation</p>

              <table role="presentation" cellpadding="0" cellspacing="0" style="margin:24px auto 0;">
                <tr>
                  <td align="center" bgcolor="#0e3a44" style="background-color:#0e3a44;border:1px solid #00f0ff;border-radius:999px;padding:8px 20px;color:#00f0ff;font-size:12px;font-weight:bold;letter-spacing:2px;">
                    &#10003;&nbsp; RESERVATION CONFIRMED
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          {{-- Sapaan --}}
          <tr>
            <td bgcolor="#080d1e" style="background-color:#080d1e;padding:0 32px 24px;border-left:1px solid #164e63;border-right:1px solid #164e63;color:#d1d5db;font-size:14px;line-height:22px;">
              Halo <strong style="color:#ffffff;">{{ $ticket['name'] }}</strong>,<br>
              Terima kasih! Reservasi kamu sudah kami terima. Simpan email ini dan tunjukkan Pass ID saat memasuki venue.
            </td>
          </tr>

          {{-- Kartu tiket --}}
          <tr>
            <td bgcolor="#080d1e" style="background-color:#080d1e;padding:0 24px 24px;border-left:1px solid #164e63;border-right:1px solid #164e63;">
              <table role="presentation" width="100%" cellpadding="0" cellspacing="0" bgcolor="#0f172a" style="background-color:#0f172a;border:1px solid #1e3a5f;border-radius:12px;">

                <tr>
                  <td style="padding:20px 24px 12px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td style="font-size:11px;color:#9ca3af;letter-spacing:2px;text-transform:uppercase;">Attendee</td>
                        <td align="right" style="font-size:11px;color:#9ca3af;letter-spacing:2px;text-transform:uppercase;">Pass ID</td>
                      </tr>
                      <tr>
                        <td style="padding-top:4px;font-size:18px;font-weight:bold;color:#ffffff;">{{ $ticket['name'] }}</td>
                        <td align="right" style="padding-top:4px;font-size:16px;font-weight:bold;color:#00f0ff;font-family:'Courier New',monospace;">{{ $ticket['pass_id'] }}</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr><td style="padding:0 24px;"><div style="border-top:1px dashed #334155;font-size:0;line-height:0;">&nbsp;</div></td></tr>

                <tr>
                  <td style="padding:16px 24px 4px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0">
                      <tr>
                        <td width="50%" valign="top" style="padding-bottom:16px;">
                          <div style="font-size:11px;color:#9ca3af;letter-spacing:2px;text-transform:uppercase;">Tanggal</div>
                          <div style="margin-top:4px;font-size:14px;font-weight:bold;color:#ffffff;">{{ $dateLabel }}</div>
                          <div style="font-size:12px;color:#06b6d4;">{{ $timeLabel }}</div>
                        </td>
                        <td width="50%" valign="top" style="padding-bottom:16px;">
                          <div style="font-size:11px;color:#9ca3af;letter-spacing:2px;text-transform:uppercase;">Tier</div>
                          <div style="margin-top:4px;font-size:14px;font-weight:bold;color:#fb7185;">{{ $ticket['tier'] }}</div>
                        </td>
                      </tr>
                      <tr>
                        <td width="50%" valign="top" style="padding-bottom:16px;">
                          <div style="font-size:11px;color:#9ca3af;letter-spacing:2px;text-transform:uppercase;">Jumlah</div>
                          <div style="margin-top:4px;font-size:14px;font-weight:bold;color:#ffffff;">{{ $ticket['quantity'] }} tiket</div>
                        </td>
                        <td width="50%" valign="top" style="padding-bottom:16px;">
                          <div style="font-size:11px;color:#9ca3af;letter-spacing:2px;text-transform:uppercase;">Kontak</div>
                          <div style="margin-top:4px;font-size:13px;color:#ffffff;">{{ $ticket['phone'] }}</div>
                          <div style="font-size:12px;color:#9ca3af;">{{ $ticket['email'] }}</div>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2" style="padding-bottom:16px;">
                          <div style="font-size:11px;color:#9ca3af;letter-spacing:2px;text-transform:uppercase;">Merchandise</div>
                          <div style="margin-top:4px;font-size:13px;color:#e5e7eb;">
                            {{ count($ticket['addons']) ? implode(', ', $ticket['addons']) : 'Tidak ada pre-order merchandise' }}
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>

                <tr><td style="padding:0 24px;"><div style="border-top:1px dashed #334155;font-size:0;line-height:0;">&nbsp;</div></td></tr>

                {{-- Rincian harga --}}
                <tr>
                  <td style="padding:16px 24px;">
                    <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="font-size:13px;">
                      <tr>
                        <td style="padding:3px 0;color:#9ca3af;">Subtotal</td>
                        <td align="right" style="padding:3px 0;color:#e5e7eb;">${{ number_format($subtotal, 2) }}</td>
                      </tr>
                      @if($ticket['discount'] > 0)
                      <tr>
                        <td style="padding:3px 0;color:#fb7185;">Diskon Fanclub (15%)</td>
                        <td align="right" style="padding:3px 0;color:#fb7185;">-${{ number_format($ticket['discount'], 2) }}</td>
                      </tr>
                      @endif
                      <tr>
                        <td style="padding:10px 0 0;color:#ffffff;font-weight:bold;font-size:14px;">Total</td>
                        <td align="right" style="padding:10px 0 0;color:#00f0ff;font-weight:bold;font-size:24px;">${{ number_format($ticket['total'], 2) }}</td>
                      </tr>
                    </table>
                  </td>
                </tr>

                {{-- Barcode --}}
                <tr>
                  <td align="center" style="padding:4px 24px 22px;">
                    <table role="presentation" cellpadding="0" cellspacing="0" bgcolor="#ffffff" style="background-color:#ffffff;border-radius:8px;">
                      <tr>
                        <td style="padding:10px 14px;">
                          <table role="presentation" cellpadding="0" cellspacing="0" height="40">
                            <tr>
                              @foreach($bars as $c)
                                <td width="{{ (hexdec($c) % 3) + 1 }}" bgcolor="#000000" style="background-color:#000000;font-size:0;line-height:0;">&nbsp;</td>
                                <td width="2" bgcolor="#ffffff" style="background-color:#ffffff;font-size:0;line-height:0;">&nbsp;</td>
                              @endforeach
                            </tr>
                          </table>
                        </td>
                      </tr>
                    </table>
                    <div style="margin-top:6px;font-size:10px;color:#6b7280;letter-spacing:2px;font-family:'Courier New',monospace;">{{ $ticket['pass_id'] }}</div>
                  </td>
                </tr>

              </table>
            </td>
          </tr>

          {{-- Catatan --}}
          <tr>
            <td bgcolor="#080d1e" style="background-color:#080d1e;padding:0 32px 28px;border-left:1px solid #164e63;border-right:1px solid #164e63;color:#9ca3af;font-size:12px;line-height:20px;">
              <strong style="color:#d1d5db;">Catatan:</strong><br>
              &bull; Bawa identitas diri yang sesuai dengan nama pemesan.<br>
              &bull; Pass ID hanya berlaku untuk tanggal dan tier di atas.
            </td>
          </tr>

          {{-- Footer --}}
          <tr>
            <td align="center" bgcolor="#050914" style="background-color:#050914;padding:20px 24px;border:1px solid #164e63;border-top:1px solid #1e3a5f;border-radius:0 0 12px 12px;font-size:11px;line-height:18px;color:#6b7280;">
              &copy; 2026 Ado World Tour 'HIBANA' &mdash; Fan Concept Ticket Site<br>
              Email ini dikirim otomatis, mohon tidak membalas langsung.
            </td>
          </tr>

        </table>
      </td>
    </tr>
  </table>
</body>
</html>