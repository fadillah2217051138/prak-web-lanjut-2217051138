<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile User</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color : #aliceblue;        }
        .profile-container {
            background-color: #083d77; /* Background container biru gelap */
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); 
            width: 300px;
            text-align: center;
        }
        .profile-pic {
            margin-bottom: 20px;
            border-radius: 50%;
            border: 4px solid #ebebd3; /* Border kuning terang */
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
        .info-item {
            background-color: #ebebd3; /* Background kotak info abu muda */
            color: black;
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
            font-size: 16px;
        }
        .info-item-inline {
            background-color: #ebebd3; /* Background kotak inline abu muda */
            padding: 10px;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
            color: black;
            font-size: 16px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        h1 {
            color: #ffffff; /* Teks putih */
            margin-bottom: 20px;
        }
        span {
            font-weight: 600;
            font-size: 16px;
        }
    </style>
</head>
<body>
    
<div class="profile-container">
    <h1>Profile User</h1>
    <div class="profile-info">
        <img src="{{ asset($user->foto ?? 'assets/img/default-foto.jpg') }}" alt="Profile Image">
        <!-- Info user -->
        <div class="info-item">Nama: {{ $user->nama }}</div>
        <div class="info-item">NPM: {{ $user->npm }}</div>
        <!-- Info user dengan kelas inline -->
        <div class="info-item">
            <span>Kelas:</span>
            <span>{{ $user->kelas->nama_kelas ?? 'Kelas tidak ditemukan' }}</span>
        </div>
    </div>
</div>
</body>
</html>