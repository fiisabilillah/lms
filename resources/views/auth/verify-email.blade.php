<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        h1 {
            margin-bottom: 20px;
            color: #333333;
        }

        p {
            color: #666666;
            margin-bottom: 30px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .logout-btn {
            background-color: #f44336;
        }

        .logout-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Verifikasi Email Anda</h1>
        <p>Terima kasih telah mendaftar! Untuk memulai pengalaman belajar Anda, silakan verifikasi alamat email Anda dengan mengklik tautan yang kami kirimkan ke kotak masuk Anda. Jika Anda tidak menerima email dari kami dalam beberapa menit, silakan periksa folder spam atau kirim ulang tautan verifikasi.</p>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            Kami telah mengirimkan tautan verifikasi baru ke alamat email yang Anda gunakan saat mendaftar. Mohon periksa kotak masuk Anda (juga cek folder spam jika perlu) dan klik tautan tersebut untuk menyelesaikan proses verifikasi. Terima kasih!
            </div>
        @endif

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn">{{ __('Mengirim ulang email verifikasi') }}</button>
        </form>
<!-- 
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn logout-btn">{{ __('Log Out') }}</button>
        </form> -->
    </div>
</body>
</html>
