<!DOCTYPE html>
<html>
<body style="margin:0;padding:24px;background:#030712;font-family:Arial,sans-serif;color:#f3f4f6;">
  <div style="max-width:560px;margin:auto;background:#0f172a;border:1px solid #06b6d4;border-radius:12px;padding:24px;">
    <h2 style="color:#00f0ff;margin-top:0;">RESERVATION CONFIRMED</h2>
    <p>Halo <strong>{{ $ticket['name'] }}</strong>, reservasi kamu untuk Ado World Tour 'HIBANA' sudah kami terima.</p>

    <table style="width:100%;border-collapse:collapse;font-size:14px;">
      <tr><td style="padding:6px 0;color:#9ca3af;">Pass ID</td><td><strong>{{ $ticket['pass_id'] }}</strong></td></tr>
      <tr><td style="padding:6px 0;color:#9ca3af;">Email</td><td>{{ $ticket['email'] }}</td></tr>
      <tr><td style="padding:6px 0;color:#9ca3af;">Telepon</td><td>{{ $ticket['phone'] }}</td></tr>
      <tr><td style="padding:6px 0;color:#9ca3af;">Tanggal</td><td>{{ $ticket['date'] }}</td></tr>
      <tr><td style="padding:6px 0;color:#9ca3af;">Tier</td><td>{{ $ticket['tier'] }}</td></tr>
      <tr><td style="padding:6px 0;color:#9ca3af;">Jumlah</td><td>{{ $ticket['quantity'] }} tiket</td></tr>
      <tr><td style="padding:6px 0;color:#9ca3af;">Merchandise</td>
          <td>{{ count($ticket['addons']) ? implode(', ', $ticket['addons']) : '-' }}</td></tr>
      @if($ticket['discount'] > 0)
      <tr><td style="padding:6px 0;color:#9ca3af;">Diskon</td><td>-${{ number_format($ticket['discount'], 2) }}</td></tr>
      @endif
    </table>

    <hr style="border-color:#1e1b4b;">
    <p style="font-size:20px;color:#00f0ff;"><strong>Total: ${{ number_format($ticket['total'], 2) }}</strong></p>
    <p style="font-size:12px;color:#6b7280;">Simpan email ini sebagai bukti reservasi.</p>
  </div>
</body>
</html>