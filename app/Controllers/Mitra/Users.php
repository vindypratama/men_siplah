<?php namespace App\Controllers\Mitra;

use App\Controllers\Base\BaseController;
use App\Models\Users as UsersModel;

class Users extends BaseController
{
    public $id_pengguna;
    public $otp;
    public $verify_code;
    public $reset_code;
    public $nama;
    public $telfon;
    public $foto_profil;
    public $instansi_pengguna;
    public $id_instansi_pengguna;
    public $nama_instansi;
    public $jabatan;
    public $nitk;
    public $nuptk;
    public $nip;
    public $dibuat_tanggal;
    public $dibuat_oleh;
    public $diubah_tanggal;
    public $diubah_oleh;

    public function index()
    {
        $content["title"]      = "Daftar User";
        $data['content_title'] = $content["title"];
        $content["container"]  = view("mitra/users/list", $data);
        $content_js["js"]      = view("mitra/users/js");
        $this->template($content, $content_js);
    }

    public function list()
    {
        $users = model('App\Models\Users', false);
        $users = array('data' => $users->findAll());
        echo json_encode($users);
    }

    public function add()
    {
        $content["title"] = "Input User";
        $data['content_title'] = $content["title"];
        $content["container"] = view('mitra/users/add', $data);
        $content_js["js"] = view("mitra/users/js");
        $this->template($content, $content_js);
    }

    public function add_post()
    {
        $id_pengguna          = $this->request->getPost(ID_PENGGUNA);
        $email                = $this->request->getPost(EMAIL);
        $passwd               = $this->request->getPost(PASSWD);
        $peran_pengguna       = $this->request->getPost(PERAN_PENGGUNA);
        $otp                  = $this->request->getPost(OTP);
        $verify_code          = $this->request->getPost(VERIFY_CODE);
        $reset_code           = $this->request->getPost(RESET_CODE);
        $nama                 = $this->request->getPost(NAMA);
        $telfon               = $this->request->getPost(TELPON);
        $foto_profil          = $this->request->getPost(FOTO_PROFIL);
        $instansi_pengguna    = $this->request->getPost(INSTANSI_PENGGUNA);
        $id_instansi_pengguna = $this->request->getPost(ID_INSTANSI_PENGGUNA);
        $nama_instansi        = $this->request->getPost(NAMA_INSTANSI);
        $jabatan              = $this->request->getPost(JABATAN);
        $nitk                 = $this->request->getPost(NITK);
        $nuptk                = $this->request->getPost(NUPTK);
        $nip                  = $this->request->getPost(NIP);

        $data = [
            ID_PENGGUNA          => $id_pengguna,
            EMAIL                => $email,
            PASSWD               => get_hash($passwd),
            PERAN_PENGGUNA       => $peran_pengguna,
            OTP                  => $otp,
            VERIFY_CODE          => $verify_code,
            RESET_CODE           => $reset_code,
            NAMA                 => $nama,
            TELPON               => $telfon,
            FOTO_PROFIL          => $foto_profil,
            INSTANSI_PENGGUNA    => $instansi_pengguna,
            ID_INSTANSI_PENGGUNA => $id_instansi_pengguna,
            NAMA_INSTANSI        => $nama_instansi,
            JABATAN              => $jabatan,
            NITK                 => $nitk,
            NUPTK                => $nuptk,
            NIP                  => $nip,
            DIBUAT_TANGGAL       => date("Y-m-d H:i:s"),
            DIBUAT_OLEH          => 1,
            DIUBAH_TANGGAL       => date("Y-m-d H:i:s"), 
            DIBUAT_OLEH          => 1

        ];

        $users = new UsersModel;

        $id = $users->insert($data);

        if($users->errors())
        {
            session()->setFlashdata("error", "Gagal menambah data User. terjadi kesalahan pada data User.");
            return redirect()->to(base_url('mitra/users'));
            exit;
        }

        if($id === false)
        {
            session()->setFlashdata("error", "Gagal menambah data User. terjadi kesalahan pada server.");
            return redirect()->to(base_url('mitra/users'));
            exit;
        }

        session()->setFlashdata("success", "Berhasil menambah data User <b>".$nama."</b>.");
        return redirect()->to(base_url('mitra/users'));
    }

    public function update($id_pengguna)
    {
        $users = new UsersModel;
        $data['data'] = $users->find($id_pengguna);

        $content["title"] = "Update User";
        $data['content_title'] = $content["title"];
        $content["container"] = view('mitra/users/update', $data);
        $content_js["js"] = view("mitra/users/js");
        $this->template($content, $content_js);
    }

    public function update_post()
    {
        $id_pengguna          = $this->request->getPost(ID_PENGGUNA);
        $email                = $this->request->getPost(EMAIL);
        $passwd               = $this->request->getPost(PASSWD);
        $peran_pengguna       = $this->request->getPost(PERAN_PENGGUNA);
        $otp                  = $this->request->getPost(OTP);
        $verify_code          = $this->request->getPost(VERIFY_CODE);
        $reset_code           = $this->request->getPost(RESET_CODE);
        $nama                 = $this->request->getPost(NAMA);
        $telfon               = $this->request->getPost(TELPON);
        $foto_profil          = $this->request->getPost(FOTO_PROFIL);
        $instansi_pengguna    = $this->request->getPost(INSTANSI_PENGGUNA);
        $id_instansi_pengguna = $this->request->getPost(ID_INSTANSI_PENGGUNA);
        $nama_instansi        = $this->request->getPost(NAMA_INSTANSI);
        $jabatan              = $this->request->getPost(JABATAN);
        $nitk                 = $this->request->getPost(NITK);
        $nuptk                = $this->request->getPost(NUPTK);
        $nip                  = $this->request->getPost(NIP);

        $data = [
            EMAIL                => $email,
            PASSWD               => get_hash($passwd),
            PERAN_PENGGUNA       => $peran_pengguna,
            OTP                  => $otp,
            VERIFY_CODE          => $verify_code,
            RESET_CODE           => $reset_code,
            NAMA                 => $nama,
            TELPON               => $telfon,
            FOTO_PROFIL          => $foto_profil,
            INSTANSI_PENGGUNA    => $instansi_pengguna,
            ID_INSTANSI_PENGGUNA => $id_instansi_pengguna,
            NAMA_INSTANSI        => $nama_instansi,
            JABATAN              => $jabatan,
            NITK                 => $nitk,
            NUPTK                => $nuptk,
            NIP                  => $nip,
            DIBUAT_TANGGAL       => date("Y-m-d H:i:s"),
            DIBUAT_OLEH          => 1,
            DIUBAH_TANGGAL       => date("Y-m-d H:i:s"), 
            DIBUAT_OLEH          => 1

        ];

        $users = new UsersModel;
        $updated = $users->update($id_pengguna, $data);

        if($users->errors())
        {
            session()->setFlashdata("error", "Gagal mengubah data User. terjadi kesalahan pada data User.");
            return redirect()->to(base_url('mitra/users'));
            exit;
        }

        if($updated === false)
        {
            session()->setFlashdata("error", "Gagal mengubah data User. terjadi kesalahan pada server.");
            return redirect()->to(base_url('mitra/users'));
            exit;
        }

        session()->setFlashdata("success", "Berhasil mengubah data User.");
        return redirect()->to(base_url('mitra/users'));
    }

    public function delete($id_pengguna)
    {
        $users = new UsersModel;

        $user = $users->select('id_pengguna')->find($id_pengguna);

        if(!$user)
        {
            print_r('Data User tidak ditemukan');
        }

        $deleted = $users->delete($id_pengguna);

        if($deleted)
        {
            session()->setFlashdata("success", "Berhasil menghapus data User");
        }
        else
        {
            session()->setFlashdata("error", "Gagal menghapus data User");
        }

        return redirect()->to(base_url('mitra/users'));
    }

}
