<?php namespace App\Controllers;

use App\Controllers\Base\BaseController;
use App\Models\Users as UsersModel;

class Login extends BaseController
{
    public function index()
    {
        // if($this->isVpn() == true)
        // {
        //     $this->session->setFlashdata('msg', 'Silahkan non-aktifkan VPN untuk mengakses website ini.');
        //     return redirect()->to(base_url('login'));
        // }

        $title         = "Halaman Menu Login";
        $container     = view('template/login/menu/view');
        $container_js  = view('template/login/menu/js');
        $container_css = view('template/login/menu/css');
        $this->template_marketplace($title, $container, $container_js, $container_css);
    }

    public function page()
    {
        if($this->isVpn() == true)
        {
            $this->session->setFlashdata('msg', 'Silahkan non-aktifkan VPN untuk mengakses website ini.');
            return redirect()->to(base_url('login/page'));
        }

        echo view('template/login/page/view');
    }

    public function auth()
    {
        $users = new UsersModel();
        $email = $this->request->getVar(EMAIL);
        $passwd = $this->request->getVar(PASSWD);
        $data = $users->where('email', $email)->first();
        if($data){
            $password = $data[PASSWD];
            $verify_passwd = hash_verified($passwd, $password);
            if($verify_passwd){
                $session_data = [
                    ID_PENGGUNA   => $data[ID_PENGGUNA],
                    TIPE_PENGGUNA => $data[TIPE_PENGGUNA],
                    NAMA          => $data[NAMA],
                    EMAIL         => $data[EMAIL],
                    LOGGED_IN     => TRUE
                ];
                $this->session->set($session_data);
                // $this->getUserActivity('');
                // print_r($this->session->get());
                // return redirect()->to('/dashboard');
                // // 
                // print_r($this->session->get(TIPE_PENGGUNA));
                // exit;
                if($this->session->get(TIPE_PENGGUNA) == 1)
                {
                    return redirect()->to('/dashboard/mitra');
                }
                else if($this->session->get(TIPE_PENGGUNA) == 2)
                {
                    return redirect()->to('/dashboard/seller');
                }
                else if($this->session->get(TIPE_PENGGUNA) == 3)
                {
                    return redirect()->to('/dashboard/customer');
                }
                else if($this->session->get(TIPE_PENGGUNA) == 4)
                {
                    return redirect()->to('/dashboard/pengawas');
                }
            }else{
                $this->session->setFlashdata('msg', 'Password Salah');
                return redirect()->to('/login/page');
            }
        }else{
            $this->session->setFlashdata('msg', 'Email tidak ditemukan.');
            return redirect()->to('/login/page');
        }
    }

    public function deauth()
    {
        $this->session->destroy();
        return redirect()->to('/login');
    }
}