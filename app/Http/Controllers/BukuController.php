<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku_m;

class BukuController extends Controller
{
    protected $opt_kategori;
    public function __construct()
    {
        $this->opt_kategori = [
            '' => '-Pilih salah satu -',
            'novel' => 'Novel',
            'komik' => 'Komik',
            'kamus' => 'Kamus',
            'program' => 'Pemrograman'
        ];
    }

    public function index(Buku_m $buku)
    {
        $data = [
            'query' => $buku->get_records(),
            'optkategori' => $this->opt_kategori
        ];
        return view('buku.list', $data);
    }

    public function add_new()
    {
        $data = [
            'is_update' => 0,
            'optkategori' => $this->opt_kategori
        ];

        return view('buku.add', $data);
    }

    public function save(Buku_m $buku, Request $request)
    {
        $data = [
            'Judul' => $request->input('Judul'),
            'Pengarang' => $request->input('Pengarang'),
            'Kategori' => $request->input('Kategori'),
        ];

        $is_update = $request->input('is_update');

        if ($is_update == 0) {
            // Add new book
            if ($buku->insert_record($data)) {
                return redirect('buku');
            }
        } else {
            // update an existing book
            $id = $request->input('id');
            if ($buku->update_by_id($data, $id)) {
                return redirect('buku');
            }
        }

        return redirect()->back()->withInput()->withErrors(['error' => 'Failed to save the book.']);
    }

    public function edit($id, Buku_m $buku)
    {
        $data = [
            'query' => $buku->get_records($id)->first(),
            'is_update' => 1,
            'optkategori' => $this->opt_kategori
        ];

        return view('buku.add', $data);
    }

    public function delete($id, Buku_m $buku)
    {
        if ($buku->delete_by_id($id)) {
            return redirect('buku');
        }
        return redirect()->back()->withErrors(['error' => 'Failed to delete to book.']);
    }
}
