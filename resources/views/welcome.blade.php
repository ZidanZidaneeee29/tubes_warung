<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Selamat Datang di Aplikasi Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #f0f4f8;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }
        .container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 100%;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: black;
        }
        p {
            margin-bottom: 30px;
            font-size: 16px;
            color: #555;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 5px;
            background-color: black; /* Ubah latar belakang tombol menjadi hitam */
            color: white; /* Ubah warna teks menjadi putih */
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #333; /* Warna latar belakang saat hover */
        }
        footer {
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mini Market</h1>
        <p>Ini adalah aplikasi yang dibangun dengan Laravel. Silakan login atau daftar untuk melanjutkan.</p>
        <a href="{{ route('login') }}" class="button">Masuk</a>
        <a href="{{ route('register') }}" class="button">Daftar</a>
        <footer>
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </footer>
    </div>
</body>
</html>