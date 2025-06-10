<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelSekolah;
use App\Models\ModelJenjang;

class Sekolah extends BaseController
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

    public function index()
    {
        $data = [
            'judul' => 'Sekolah',
            'menu' => 'sekolah',
            'page' => 'sekolah/v_index',
            'sekolah' => $this->ModelSekolah->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function Input()
    {
        $data = [
            'judul' => 'Input Sekolah',
            'menu' => 'sekolah',
            'page' => 'sekolah/v_input',
            'web' => $this->ModelSetting->DataWeb(),
            'provinsi' => $this->ModelSekolah->allProvinsi(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'jenjang' => $this->ModelJenjang->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'nama_sekolah' => [
                'label' => 'Nama Sekolah', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'akreditasi' => [
                'label' => 'Akreditasi', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'status' => [
                'label' => 'Status', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'id_jenjang' => [
                'label' => 'Jenjang', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'coordinat' => [
                'label' => 'Coordinat', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'id_provinsi' => [
                'label' => 'Provinsi', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'id_kabupaten' => [
                'label' => 'Kabupaten', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'id_kecamatan' => [
                'label' => 'Kecamatan', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'alamat' => [
                'label' => 'Alamat', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'id_wilayah' => [
                'label' => 'Wilayah Administrasi', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'foto' => [
                'label' => 'Foto Sekolah', 
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]', 
                'errors' => [
                    'max_size' => 'ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
                ],
        ])) {
            $foto = $this->request->getFile('foto');
            $nama_file_foto = $foto->getRandomName();
            //jika validasi berhasil
            $data = [
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'akreditasi' => $this->request->getPost('akreditasi'),
                'status' => $this->request->getPost('status'),
                'coordinat' => $this->request->getPost('coordinat'),
                'id_jenjang' => $this->request->getPost('id_jenjang'),
                'id_provinsi' => $this->request->getPost('id_provinsi'),
                'id_kabupaten' => $this->request->getPost('id_kabupaten'),
                'id_kecamatan' => $this->request->getPost('id_kecamatan'),
                'alamat' => $this->request->getPost('alamat'),
                'id_wilayah' => $this->request->getPost('id_wilayah'),
                'foto' => $nama_file_foto,
            ];
            $foto->move('foto', $nama_file_foto);
            $this->ModelSekolah->InsertData($data);
            session()->setFlashdata('insert', 'Data Berhasil Di Tambahkan !!');
            return redirect()->to('Sekolah');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to('Sekolah/Input')->withInput('validations', \Config\Services::validation());
        }
    }

    public function Edit($id_sekolah)
    {
        $data = [
            'judul' => 'Edit Sekolah',
            'menu' => 'sekolah',
            'page' => 'sekolah/v_edit',
            'web' => $this->ModelSetting->DataWeb(),
            'provinsi' => $this->ModelSekolah->allProvinsi(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'jenjang' => $this->ModelJenjang->AllData(),
            'sekolah' => $this->ModelSekolah->DetailData($id_sekolah),
        ];
        return view('v_template_back_end', $data);
    }

    public function UpdateData($id_sekolah)
    {
        if ($this->validate([
            'nama_sekolah' => [
                'label' => 'Nama Sekolah', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'akreditasi' => [
                'label' => 'Akreditasi', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'status' => [
                'label' => 'Status', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'id_jenjang' => [
                'label' => 'Jenjang', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'coordinat' => [
                'label' => 'Coordinat', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'id_provinsi' => [
                'label' => 'Provinsi', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'id_kabupaten' => [
                'label' => 'Kabupaten', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'id_kecamatan' => [
                'label' => 'Kecamatan', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'alamat' => [
                'label' => 'Alamat', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'id_wilayah' => [
                'label' => 'Wilayah Administrasi', 
                'rules' => 'required', 
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
                ],
                'foto' => [
                'label' => 'Foto Sekolah', 
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]', 
                'errors' => [
                    'max_size' => 'ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
                ],
        ])) {
            $sekolah = $this->ModelSekolah->DetailData($id_sekolah);
            $foto = $this->request->getFile('foto');
            

            if ($foto->getError() == 4) {
                $nama_file_foto = $sekolah['foto'];
            }else {
                $nama_file_foto = $foto->getRandomName();
                $foto->move('foto', $nama_file_foto);
            }
            //jika validasi berhasil
            $data = [
                'id_sekolah' => $id_sekolah,
                'nama_sekolah' => $this->request->getPost('nama_sekolah'),
                'akreditasi' => $this->request->getPost('akreditasi'),
                'status' => $this->request->getPost('status'),
                'coordinat' => $this->request->getPost('coordinat'),
                'id_jenjang' => $this->request->getPost('id_jenjang'),
                'id_provinsi' => $this->request->getPost('id_provinsi'),
                'id_kabupaten' => $this->request->getPost('id_kabupaten'),
                'id_kecamatan' => $this->request->getPost('id_kecamatan'),
                'alamat' => $this->request->getPost('alamat'),
                'id_wilayah' => $this->request->getPost('id_wilayah'),
                'foto' => $nama_file_foto,
            ];

            $this->ModelSekolah->UpdateData($id_sekolah, $data);
            session()->setFlashdata('insert', 'Data Berhasil Di Update !!');
            return redirect()->to('Sekolah');
        } else {
            //jika validasi gagal
            session()->setFlashdata('errors',\Config\Services::validation()->getErrors());
            return redirect()->to('Sekolah/Edit/' . $id_sekolah)->withInput('validations', \Config\Services::validation());
        }
    }

    //delete
    public function Delete($id_sekolah)
    {
        //delete foto
        $sekolah = $this->ModelSekolah->DetailData($id_sekolah);
        if ($sekolah['foto'] <> '') {
            unlink('foto/' . $sekolah['foto']);
        }
        $data = [
            'id_sekolah' => $id_sekolah,
        ];
        $this->ModelSekolah->DeleteData($id_sekolah, $data);
            session()->setFlashdata('delete', 'Data Berhasil Di Hapus !!');
            return redirect()->to('Sekolah');
    }

    public function Detail($id_sekolah)
    {
        $data = [
            'judul' => 'Detail Sekolah',
            'menu' => 'sekolah',
            'page' => 'sekolah/v_detail',
            'sekolah' => $this->ModelSekolah->DetailData($id_sekolah),
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end', $data);
    }

    //kabupaten, kecamatan
    public function Kabupaten()
    {
        $id_provinsi = $this->request->getPost('id_provinsi');
        $kab = $this->ModelSekolah->allKabupaten($id_provinsi);
        echo '<option value=""> --Pilih Kabupaten-- </option>';
        foreach ($kab as $key => $value) {
            echo '<option value="' . $value['id_kabupaten'] . '">' . $value['nama_kabupaten'] . '</option>';
        }
    }

    public function Kecamatan()
    {
        $id_kabupaten = $this->request->getPost('id_kabupaten');
        $kec = $this->ModelSekolah->allKecamatan($id_kabupaten);
        echo '<option value=""> --Pilih Kecamatan-- </option>';
        foreach ($kec as $key => $value) {
            echo '<option value="' . $value['id_kecamatan'] . '">' . $value['nama_kecamatan'] . '</option>';
        }
    }
}
