<?php 
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Krs_model;

class Krs extends BaseController
{
    public function index()
    {
        $model = new Krs_model;
        $data['title']     = 'Data KRS';
        $data['getKrs'] = $model->getKrs();
        echo view('header_view', $data);
        echo view('krs_view', $data);
        echo view('footer_view', $data);
    }

    public function tambah()
    {
        $data['title']     = 'Tambah Data Krs';
        echo view('header_view', $data);
        echo view('tambah_krs_view', $data);
        echo view('footer_view', $data);
    }

    public function add()
    {
        $model = new Krs_model;
        $data = array(
            'id_krs' => $this->request->getPost('id_krs'),
            'nim' => $this->request->getPost('nim'),
            'mahasiswa' => $this->request->getPost('mahasiswa'),
            'program_studi'=> $this->request->getPost('program_studi'),
            'semester'  => $this->request->getPost('semester'),
            'mata_kuliah'  => $this->request->getPost('mata_kuliah')
        );
        $model->saveKrs($data);
        echo '<script>
                alert("Sukses Tambah Data KRS");
                window.location="'.base_url('krs').'"
            </script>';

    }

    public function edit($id)
    {
        $model = new Krs_model;
        $getKrs = $model->getKrs($id)->getRow();
        if(isset($getKrs))
        {
            $data['krs'] = $getKrs;
            $data['title']  = 'Edit '.$getKrs->id_krs;

            echo view('header_view', $data);
            echo view('edit_krs_view', $data);
            echo view('footer_view', $data);

        }else{

            echo '<script>
                    alert("ID KRS '.$id.' Tidak ditemukan");
                    window.location="'.base_url('krs').'"
                </script>';
        }
    }

    public function update()
    {
        $model = new Krs_model;
        $id = $this->request->getPost('id_krs');
        $data = array(
            'id_krs' => $this->request->getPost('id_krs'),
            'nim' => $this->request->getPost('nim'),
            'mahasiswa' => $this->request->getPost('mahasiswa'),
            'program_studi'=> $this->request->getPost('program_studi'),
            'semester'  => $this->request->getPost('semester'),
            'mata_kuliah'  => $this->request->getPost('mata_kuliah')
        );
        $model->editKrs($data,$id);
        echo '<script>
                alert("Sukses Edit Data KRS");
                window.location="'.base_url('krs').'"
            </script>';
    }

    public function hapus($id)
    {
        $model = new Krs_model;
        $getKrs = $model->getKrs($id)->getRow();
        if(isset($getKrs))
        {
            $model->hapusKrs($id);
            echo '<script>
                    alert("Hapus Data KRS Sukses");
                    window.location="'.base_url('krs').'"
                </script>';

        }else{

            echo '<script>
                    alert("Hapus Gagal !, ID KRS '.$id.' Tidak ditemukan");
                    window.location="'.base_url('krs').'"
                </script>';
        }
    }

}