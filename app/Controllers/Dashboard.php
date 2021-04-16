<?php namespace App\Controllers;

use App\Controllers\Base\BaseController;
use App\Models\Users as UsersModel;

class Dashboard extends BaseController
{
    public function index()
    {
        // if($this->isVpn() == true)
        // {
        //     $this->session->setFlashdata('msg', 'Silahkan non-aktifkan VPN untuk mengakses website ini.');
        //     return redirect()->to(base_url('login'));
        // }
        if(!$this->session->get(ID_PENGGUNA))
        {
            $this->session->setFlashdata('msg', 'Silahkan Log In untuk mengakses halaman ini.');
            return redirect()->to('login');
        }
        else
        {
            /**
             * 1 mitra
             * 2 seller
             * 3 customer
             * 4 pengawas
             */
            if($this->session->get(TIPE_PENGGUNA) == 1)
            {
                return redirect().to('dashboard/mitra');
            }
            else if($this->session->get(TIPE_PENGGUNA) == 2)
            {
                return redirect().to('dashboard/seller');
            }
            else if($this->session->get(TIPE_PENGGUNA) == 3)
            {
                return redirect().to('dashboard/customer');
            }
            else if($this->session->get(TIPE_PENGGUNA) == 4)
            {
                return redirect().to('dashboard/pengawas');
            }
        }
    }

    public function mitra()
    {
        $title                      = "Dashboard";
        $content_data['breadcrumb'] = view('dashboard/breadcrumb');
        $content                    = view('dashboard/mitra/content', $content_data);
        $content_js                 = view('dashboard/mitra/content_js');
        $content_css                = view('dashboard/mitra/content_css');
        $this->template_admin($title, $content, $content_js, $content_css);

    }

    public function seller()
    {
        $title                      = "Dashboard";
        $content_data['breadcrumb'] = view('dashboard/breadcrumb');
        $content                    = view('dashboard/seller/content', $content_data);
        $content_js                 = view('dashboard/seller/content_js');
        $content_css                = view('dashboard/seller/content_css');
        $this->template_admin($title, $content, $content_js, $content_css);
    }

    public function customer()
    {
        $title                      = "Dashboard";
        $content_data['breadcrumb'] = view('dashboard/breadcrumb');
        $content                    = view('dashboard/customer/content', $content_data);
        $content_js                 = view('dashboard/customer/content_js');
        $content_css                = view('dashboard/customer/content_css');
        $this->template_admin($title, $content, $content_js, $content_css);
    }

    public function pengawas()
    {
        $title                      = "Dashboard";
        $content_data['breadcrumb'] = view('dashboard/breadcrumb');
        $content                    = view('dashboard/pengawas/content', $content_data);
        $content_js                 = view('dashboard/pengawas/content_js');
        $content_css                = view('dashboard/pengawas/content_css');
        $this->template_admin($title, $content, $content_js, $content_css);
    }
}