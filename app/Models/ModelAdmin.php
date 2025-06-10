<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function JmlSekolah()
    {
        return $this->db->table('tbl_sekolah')
        ->countAll();
    }

    public function JmlWilayah()
    {
        return $this->db->table('tbl_wilayah')
        ->countAll();
    }
}
