@extends('layouts.app')

@section('content')
<style>
    /* CSS untuk styling tabel pengguna */
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border: 1px solid #ddd;
    }

    th {
        background-color: yellow; 
        color: #333; 
    }

    tr:hover {
        background-color: #f1f1f1; /* Warna saat hover */
    }

    /* Gaya untuk tombol */
    .action-buttons a, .action-buttons button {
        padding: 8px 12px;
        border-radius: 4px;
        text-decoration: none;
        color: white;
        font-weight: bold;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-view {
        background-color: #007bff; 
    }
    .btn-view:hover {
        background-color: #0069d9; 
    }

    .btn-edit {
        background-color: #28a745; 
    }
    .btn-edit:hover {
        background-color: #218838; 
    }

    .btn-delete {
        background-color: #dc3545; /* Merah untuk Delete */
    }
    .btn-delete:hover {
        background-color: #c82333; /* Merah lebih gelap saat hover */
    }

    /* Flexbox untuk merapikan tata letak tombol */
    td .action-buttons {
        display: flex;
        gap: 10px; /* Spasi antar tombol */
    }

    td .action-buttons form {
        margin: 0;
    }

    /* Tombol Tambah Pengguna Baru */
    .btn-add-user {
        background-color: red; 
        padding: 10px 20px;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        text-decoration: none;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-add-user:hover {
        background-color: #0056b3; /* Biru lebih gelap saat hover */
        transform: translateY(-2px); /* Efek hover naik sedikit */
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan saat hover */
    }

    /* Styling untuk judul "List Data" */
    .page-title {
        font-size: 40px; /* Ukuran font besar */
        font-weight: bold;
        color: #333; /* Warna teks */
        margin-bottom: 20px;
        text-align: center; /* Pusatkan teks */
    }
</style>

<!-- Judul Halaman -->
 <br>
<div class="page-title">List Data</div>

<!-- Tombol Tambah Pengguna Baru -->
<a href="{{ route('users.create') }}" class="btn-add-user mb-3">Tambah Pengguna Baru</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>NPM</th>
            <th>Kelas</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->npm }}</td>
                <td>{{ $user->kelas->nama_kelas ?? 'Kelas Tidak Ditemukan' }}</td>
                <td>
                    @if($user->foto)
                        <img src="{{ asset($user->foto ?? 'uploads/img/default.jpg') }}" alt="Foto Pengguna" width="100">
                    @else
                        <span>Foto tidak tersedia</span>
                    @endif
                </td>
                <td>
                    <div class="action-buttons">
                        <!-- Tombol View sesuai instruksi pada gambar -->
                        <a href="{{ route('users.show', $user->id) }}" class="btn-view">View</a>

                        <!-- Tombol Edit -->
                        <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection