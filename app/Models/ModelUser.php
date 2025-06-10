<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_user')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function DetailData($id_user)
    {
    return $this->db->table('tbl_user')
        ->where('id_user', $id_user)
        ->get()->getRowArray();
    }

    public function UpdateData($id_user, $data)
    {
    $this->db->table('tbl_user')
        ->where('id_user', $id_user)
        ->update($data);
    }

    public function DeleteData($id_user)
    {
    $this->db->table('tbl_user')
        ->where('id_user', $id_user)
        ->delete();
    }

}
