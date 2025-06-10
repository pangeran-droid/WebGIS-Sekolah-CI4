<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelSekolah;
use App\Models\ModelJenjang;

class Home extends BaseController
{
    protected $ModelSetting;
    protected $ModelWilayah;
    protected $ModelSekolah;
    protected $ModelJenjang;

    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSekolah = new ModelSekolah();
        $this->ModelJenjang = new ModelJenjang();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'sekolah' => $this->ModelSekolah->AllData(),
            'jenjang' => $this->ModelJenjang->AllData(),
        ];
        return view('v_template_front_end', $data);
    }

    public function Wilayah($id_wilayah)
    {
        $dw = $this->ModelWilayah->DetailData($id_wilayah);
        $data = [
            'judul' => $dw['nama_wilayah'],
            'page' => 'v_detail_wilayah',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'jenjang' => $this->ModelJenjang->AllData(),
            'detailwilayah' => $this->ModelWilayah->DetailData($id_wilayah),
            'sekolah' => $this->ModelSekolah->AllDataPerWilayah($id_wilayah),
        ];
        return view('v_template_front_end', $data);
    }

    public function Jenjang($id_jenjang)
    {
        $dj = $this->ModelJenjang->DetailData($id_jenjang);
        $data = [
            'judul' => $dj['jenjang'],
            'page' => 'v_sekolah_per_jenjang',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'jenjang' => $this->ModelJenjang->AllData(),
            'sekolah' => $this->ModelSekolah->AllDataPerJenjang($id_jenjang),
        ];
        return view('v_template_front_end', $data);
    }

    public function DetailSekolah($id_sekolah)
    {
        $sekolah = $this->ModelSekolah->DetailData($id_sekolah);
        $data = [
            'judul' => $sekolah['nama_sekolah'],
            'page' => 'v_detail_sekolah',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'jenjang' => $this->ModelJenjang->AllData(),
            'sekolah' => $sekolah,
        ];
        return view('v_template_front_end', $data);
    }
}
