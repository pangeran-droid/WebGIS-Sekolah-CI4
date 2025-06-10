<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelAdmin;
use App\Models\ModelJenjang;


class Admin extends BaseController
{
    protected $ModelSetting;
    protected $ModelAdmin;
    protected $ModelJenjang;

    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelJenjang = new ModelJenjang();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Dashboard',
            'menu' => 'dashboard',
            'page' => 'v_dashboard',
            'jmlsekolah' => $this->ModelAdmin->JmlSekolah(),
            'jmlwilayah' => $this->ModelAdmin->JmlWilayah(),
            'jenjang' => $this->ModelJenjang->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Setting(): string
    {
        $data = [
            'judul' => 'Setting',
            'menu' => 'setting',
            'page' => 'v_setting',
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateSetting()
    {
        $data = [
            'id' => 1,
            'nama_web' => $this->request->getPost('nama_web'),
            'coordinat_wilayah' => $this->request->getPost('coordinat_wilayah'),
            'zoom_view' => $this->request->getPost('zoom_view'),
        ];
        $this->ModelSetting->UpdateData($data);
        session()->setFlashdata('pesan','Settingan Web Telah Di Update !!!');
        return redirect()->to('Admin/Setting');
    }
}
