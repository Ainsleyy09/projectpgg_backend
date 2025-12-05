<!DOCTYPE html>
<html>
<head>
    <title>Verify Email</title>
</head>
<body>
    <h2>Hi {{ $user->name }},</h2>
    <p>Terima kasih telah dibuatkan akun! Silakan klik tombol di bawah untuk verifikasi emailmu:</p>
    <a href="{{ $url }}" style="display:inline-block;padding:10px 20px;background-color:orange;color:white;text-decoration:none;border-radius:5px;">
        Verify Email
    </a>
    <p>Kalau tidak membuat akun, abaikan email ini.</p>
</body>
</html>
