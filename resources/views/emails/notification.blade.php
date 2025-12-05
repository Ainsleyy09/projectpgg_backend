@component('mail::message')
# Hai, {{ $registration->name ?? 'Sahabat Palembang Good Guide' }} 👋

Terima kasih sudah melakukan registrasi.
Senang sekali kamu mau ikut walking tour dari **Palembang Good Guide**.
Ini adalah pesan konfirmasi dari kami! 🎉

---

### 🧾 Informasi Tour

| **Keterangan** | **Detail** |
|:---------------|:-----------|
| **Nomor Order** | {{ $registration->order_number }} |
| **Tour** | {{ $registration->schedule->program->name ?? '-' }} |
| **Hari/Tanggal** | {{ \Carbon\Carbon::parse($registration->schedule->date)->translatedFormat('l, d F Y') }} |
| **Waktu** | {{ \Carbon\Carbon::parse($registration->schedule->start_time)->format('H:i') }} WIB |
| **Durasi** | {{ $registration->schedule->program->duration ?? '-' }} |
| **Titik Kumpul** | {{ $start_point ?? '-' }} |
| **Titik Akhir** | {{ $end_point ?? '-' }} |
| **Status** | {{ ucfirst($registration->status) }} |

---

@if($registration->schedule->program->payment_type === 'akhir')
### 🪙 Harga - Pay As You Wish
**Walking tour ini menggunakan sistem Pay As You Wish**
Bayar sesuai kepuasan kamu setelah tour selesai.

Pembayaran dapat dilakukan via **QRIS** (Gopay, Dana, OVO, ShopeePay, M-Banking).
@endif

@if($registration->schedule->program->payment_type === 'awal')
### 💳 Pembayaran
Program ini menggunakan metode **pembayaran di awal**.

Jika kamu sudah melakukan pembayaran melalui link/QR yang disediakan,
**kamu tidak perlu membayar lagi di lokasi**.

Jika belum, mohon selesaikan pembayaran sesuai instruksi dari admin.
@endif

---

### ✨ Saran dari Kami
- Memakai pakaian yang **nyaman & sopan**
- Membawa **payung/topi/kacamata hitam**
- Membawa **air minum**
- Disarankan naik **kendaraan umum**

---

## ☎️ CONTACT PERSON
📞 **WhatsApp:** 0883833856184

---

@component('mail::button', ['url' => url('/')])
🌐 Kunjungi Website Palembang Good Guide
@endcomponent

---

Terima kasih telah menjadi bagian dari perjalanan ini 💚
Sampai jumpa di lokasi!

Salam hangat,
**Tim Palembang Good Guide**

@slot('subcopy')
Jika kamu tidak merasa melakukan pendaftaran ini, abaikan email ini.
@endslot

@endcomponent
