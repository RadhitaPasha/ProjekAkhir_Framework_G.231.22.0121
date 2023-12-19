<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    protected $opt_kategori;
    public function __construct()
    {
        $this->opt_kategori = [
            '' => '-Pilih salah satu -',
            'teknik informatika' => 'Teknik Informatika',
            'sistem informasi' => 'Sistem Informasi',
            'ilmu komunikasi' => 'Ilmu Komunikasi'
        ];
    }

    public function index(Anggota $anggota)
    {
        $data = [
            'query' => $anggota->get_records(),
            'optkategori' => $this->opt_kategori
        ];
        return view('anggota.list', $data);
    }

    public function create()
    {
        $data = [
            'is_update' => 0,
            'optkategori' => $this->opt_kategori
        ];

        return view('anggota.add', $data);
    }

    public function store(Anggota $anggota, Request $request)
    {
        $data = [
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'progdi' => $request->input('progdi'),
        ];

        $is_update = $request->input('is_update');

        if ($is_update == 0) {
            // Add new Anggota
            if ($anggota->insert_record($data)) {
                return redirect('anggota');
            }
        } else {
            // update an existing book
            $id = $request->input('id');
            if ($anggota->update_by_id($data, $id)) {
                return redirect('anggota');
            }
        }

        return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save the Anggota.']);
    }

    public function edit($id, Anggota $anggota)
    {
        $data = [
            'query' => $anggota->get_records($id)->first(),
            'is_update' => 1,
            'optkategori' => $this->opt_kategori
        ];

        return view('anggota.add', $data);
    }

    public function delete($id, Anggota $anggota)
    {
        if ($anggota->delete_by_id($id)) {
            return redirect('anggota');
        }
        return redirect()->back()->withErrors(['error' => 'Failed to delete the anggota.']);
    }
}
