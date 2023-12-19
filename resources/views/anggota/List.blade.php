<!DOCTYPE html>
<html>

<head>
    <title>Tambah Anggota</title>
</head>

<body>
    <a href="{{ url('anggota/create') }}">Tambah Anggota</a><br /><br />
    <table border='1'>
        <tr>
            <th>NO</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Progdi</th>
            <th>Aksi</th>
        </tr>
        @php
        $no = 0;
        @endphp
        @foreach($query as $row)
        @php
        $no++;
        @endphp
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $row['nim'] }}</td>
            <td>{{ $row['nama']}}</td>
            <td>{{ $row['progdi'] }}</td>
            <td>
                <a href="{{ url('anggota/edit/'.$row['id_anggota']) }}">Edit</a>
                <a href="{{ url('anggota/delete/'.$row['id_anggota']) }}" onclick="return confirm('Yakin?')">Delete</a>
            </td>
        </tr>
        @endforeach
    </table>
</body>

</html>