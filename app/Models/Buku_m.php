<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku_m extends Model
{

    use HasFactory;

    protected $table = 'mst_buku';
    protected $primaryKey = 'ID_Buku';
    public $timestamps = false;

    public function get_records($criteria = "")
    {
        $result = $this->select('*')
            ->when($criteria, function ($query, $criteria) {
                return $query->where('ID_Buku', $criteria);
            })
            ->get();

        return $result;
    }

    public function insert_record($data)
    {
        $result = $this->insert($data);
        return $result;
    }

    public function update_by_id($data, $id)
    {
        $result = $this->where('ID_Buku', $id)
            ->update($data);
        return $result;
    }

    function delete_by_id($id)
    {
        $result = self::where('ID_Buku', $id)
            ->delete();
        return $result;
    }
}
