<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSekolah extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_sekolah')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang', 'left')
            ->get()->getResultArray();
    }

    public function AllDataPerWilayah($id_wilayah)
    {
        return $this->db->table('tbl_sekolah')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang', 'left')
        ->where('id_wilayah', $id_wilayah)
            ->get()->getResultArray();
    }

    public function AllDataPerJenjang($id_jenjang)
    {
        return $this->db->table('tbl_sekolah')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang', 'left')
        ->where('tbl_sekolah.id_jenjang', $id_jenjang)
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_sekolah')->insert($data);
    }

    public function DetailData($id_sekolah)
    {
    return $this->db->table('tbl_sekolah')
        ->join('tbl_jenjang', 'tbl_jenjang.id_jenjang = tbl_sekolah.id_jenjang', 'left')
        ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_sekolah.id_provinsi', 'left')
        ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_sekolah.id_kabupaten', 'left')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_sekolah.id_kecamatan', 'left')
        ->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_sekolah.id_wilayah', 'left')
        ->where('id_sekolah', $id_sekolah)
        ->get()->getRowArray();
    }

    public function UpdateData($id_sekolah, $data)
    {
    $this->db->table('tbl_sekolah')
        ->where('id_sekolah', $id_sekolah)
        ->update($data);
    }

    public function DeleteData($id_sekolah)
    {
    $this->db->table('tbl_sekolah')
        ->where('id_sekolah', $id_sekolah)
        ->delete();
    }

    //provinsi
    public function allProvinsi()
    {
        return $this->db->table('tbl_provinsi')
            ->orderBy('id_provinsi', 'ASC')
            ->get()->getResultArray();
    }

    public function allKabupaten($id_provinsi)
    {
        return $this->db->table('tbl_kabupaten')
            ->where('id_provinsi', $id_provinsi)
            ->get()->getResultArray();
    }

    public function allKecamatan($id_kabupaten)
    {
        return $this->db->table('tbl_kecamatan')
            ->where('id_kabupaten', $id_kabupaten)
            ->get()->getResultArray();
    }
}
