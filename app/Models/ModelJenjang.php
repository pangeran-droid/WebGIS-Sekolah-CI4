<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJenjang extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_jenjang')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_jenjang')->insert($data);
    }

    public function DetailData($id_jenjang)
    {
    return $this->db->table('tbl_jenjang')
        ->where('id_jenjang', $id_jenjang)
        ->get()->getRowArray();
    }

    public function UpdateData($id_jenjang, $data)
    {
    $this->db->table('tbl_jenjang')
        ->where('id_jenjang', $id_jenjang)
        ->update($data);
    }

    public function DeleteData($id_jenjang)
    {
    $this->db->table('tbl_jenjang')
        ->where('id_jenjang', $id_jenjang)
        ->delete();
    }
}
