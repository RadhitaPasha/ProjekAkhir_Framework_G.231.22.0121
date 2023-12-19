<!DOCTYPE html>
<html>

<head>
    <title>Tambah Anggota</title>
</head>

<body>
    <form action="{{ url('anggota/save') }}" method="post" accept-charset="utf-8">
        @csrf

        <input type="hidden" name="id" value="" />
        <input type="hidden" name="is_update" value="{{ $is_update }}" />
        Nim: <input type="text" name="nim" value="" size='15' maxlength='15' />
        <br /><br />
        Nama: <input type="text" name="nama" value="" size='50' maxlength='100' />
        <br /><br />
        Progdi: <input type="text" name="progdi" value="" size='30' maxlength='50' />
        <br /><br />
        Kategori : <select name="Kategori">
            @foreach ($optkategori as $key => $value)
            <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <br /><br /><input type="submit" name="btn_simpan" value="Simpan" />
    </form>
    <br /><a href="{{ url('anggota') }}">Kembali</a>
</body>

</html>