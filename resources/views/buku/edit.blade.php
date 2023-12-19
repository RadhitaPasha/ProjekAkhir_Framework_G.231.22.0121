<!DOCTYPE html>
<html>

<head>
    <title>Edit Anggota</title>
</head>

<body>
    <form action="{{ url('anggota/save') }}" method="post" accept-charset="utf-8">
        @csrf

        <input type="hidden" name="id" value="{{ $query->id_anggota }}" />
        <input type="hidden" name="is_update" value="{{ $is_update }}" />
        <label for="nim">NIM:</label>
        <input type="text" name="nim" value="{{ $query->nim }}" size="15" required /><br /><br />
        <label for="nama">Nama:</label>
        <input type="text" name="nama" value="{{ $query->nama }}" size="100" required /><br /><br />
        <label for="progdi">Progdi:</label>
        <input type="text" name="progdi" value="{{ $query->progdi }}" size="50" required /><br /><br />
        <label for="Kategori">Kategori:</label>
        <select name="Kategori">
            @foreach ($optkategori as $key => $value)
            <option value="{{ $key }}" {{ $query->Kategori == $key ? 'selected' : ''}}>
                {{ $value }}
            </option>
            @endforeach
        </select>
        <br /><br /><input type="submit" name="btn_simpan" value="Simpan" />
    </form>
</body>

</html>