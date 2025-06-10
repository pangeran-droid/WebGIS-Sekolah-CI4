<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelJenjang;

class Jenjang extends BaseController
{
    protected $ModelJenjang;

    public function __construct()
    {
        $this->ModelJenjang = new ModelJenjang();
    }

    public function index()
    {
        $data = [
            'judul' => 'Jenjang',
            'menu' => 'jenjang', 
            'page' => 'v_jenjang',
            'jenjang' => $this->ModelJenjang->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id_jenjang)
    {
        $marker = $this->request->getFile('marker');
        $name_file = $marker->getRandomName();
        $data = [
            'id_jenjang'=> $id_jenjang,
            'marker' => $name_file,
        ];

        $marker->move('marker' . $name_file);
        $this->ModelJenjang->UpdateData($id_jenjang, $data);
        session()->setFlashdata('update', 'Marker Berhasil Ditambahkan !!');
            return redirect()->to('Jenjang');
    }
}
