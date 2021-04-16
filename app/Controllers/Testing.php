<?php namespace App\Controllers;

use App\Controllers\Base\BaseController;
use App\Models\Users as UsersModel;

class Testing extends BaseController
{
    public function index()
    {
        $title         = "Halaman Menu Login";
        $container     = view('template/login/menu/view');
        $container_js  = view('template/login/menu/js');
        $container_css = view('template/login/menu/css');
        $this->template_marketplace($title, $container, $container_js, $container_css);
    }

    public function product()
    {
        $title         = "Katalog Produk";
        $container     = view('admin/product/catalog');
        $container_js  = view('admin/product/catalog_js');
        $container_css = view('admin/product/catalog_css');
        $this->template_marketplace($title, $container, $container_js, $container_css);
    }

    public function page()
    {
        echo view('template/login/page/view');
    }

    public function admin()
    {
        $template['css'] = view('template/admin/css');
        $template['js'] = view('template/admin/js');
        $template['navbar'] = view('template/admin/navbar');
        $template['sidebar'] = view('template/admin/sidebar');
        $template['content'] = view('template/admin/content');
        $template['footer'] = view('template/admin/footer');
        echo view('template/admin/template', $template);
    }

    public function adminTest1()
    {
        $template['css'] = view('template/admin/css');
        $template['js'] = view('template/admin/js');
        $template['navbar'] = view('template/admin/navbar');
        $template['sidebar'] = view('template/admin/sidebar_test_1');
        $template['content'] = view('template/admin/content_test_1');
        $template['footer'] = view('template/admin/footer');
        echo view('template/admin/template', $template);
    }

    public function adminTest2()
    {
        $template['css'] = view('template/admin/css');
        $template['js'] = view('template/admin/js');
        $template['navbar'] = view('template/admin/navbar');
        $template['sidebar'] = view('template/admin/sidebar_test_2');
        $template['content'] = view('template/admin/content_test_2');
        $template['footer'] = view('template/admin/footer');
        echo view('template/admin/template', $template);
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
                    ID_PENGGUNA => $data[ID_PENGGUNA],
                    NAMA        => $data[NAMA],
                    EMAIL       => $data[EMAIL],
                    LOGGED_IN   => TRUE
                ];
                $this->session->set($session_data);
                $this->getUserActivity('');
                print_r($this->session->get());
                // return redirect()->to('/dashboard');
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

    public function getHash($passwd)
    {
        print_r(get_hash($passwd));
    }

    public function getSess()
    {
        print_r(($this->session->get()));
    }

    public function getMac()
    {
        $_IP_ADDRESS = $_SERVER['REMOTE_ADDR'];
        $_PERINTAH = "arp -a $_IP_ADDRESS";
        ob_start();
        system($_PERINTAH);
        $_HASIL = ob_get_contents();
        ob_clean();

        // print_r($_HASIL);
        // print_r(strpos($_HASIL,'No ARP Entries Found.')!==false?1:2);
        // exit;

        if(strpos($_HASIL,'No ARP Entries Found.') !== false)
        {
            print_r($_HASIL);
        }
        else
        {
            $_PECAH = strstr($_HASIL, $_IP_ADDRESS);
            $_PECAH_STRING = explode($_IP_ADDRESS, str_replace(" ", "", $_PECAH));
            $_HASIL = substr($_PECAH_STRING[1], 0, 17);
            echo "IP Anda : ".$_IP_ADDRESS."
            MAC ADDRESS Anda : ".$_HASIL;
        }
    }

    public function getMac2()
    {
        ob_start(); // Turn on output buffering
        system('ipconfig /all'); //Execute external program to display output
        $mycom=ob_get_contents(); // Capture the output into a variable
        ob_clean(); // Clean (erase) the output buffer

        $findme = "Physical";
        $pmac = strpos($mycom, $findme); // Find the position of Physical text
        $mac=substr($mycom,($pmac+36),17); // Get Physical Address

        print_r($mac);
    }

    public function vpn()
    {
        // /**
        //  * Detect Proxies with a PHP Header Test
        //  */
        // $test_HTTP_proxy_headers = array(
        //     'HTTP_VIA',
        //     'VIA',
        //     'Proxy-Connection',
        //     'HTTP_X_FORWARDED_FOR',
        //     'HTTP_FORWARDED_FOR',
        //     'HTTP_X_FORWARDED',
        //     'HTTP_FORWARDED',
        //     'HTTP_CLIENT_IP',
        //     'HTTP_FORWARDED_FOR_IP',
        //     'X-PROXY-ID',
        //     'MT-PROXY-ID',
        //     'X-TINYPROXY',
        //     'X_FORWARDED_FOR',
        //     'FORWARDED_FOR',
        //     'X_FORWARDED',
        //     'FORWARDED',
        //     'CLIENT-IP',
        //     'CLIENT_IP',
        //     'PROXY-AGENT',
        //     'HTTP_X_CLUSTER_CLIENT_IP',
        //     'FORWARDED_FOR_IP',
        //     'HTTP_PROXY_CONNECTION'
        // );

        // foreach($test_HTTP_proxy_headers as $header){
        //     if (isset($_SERVER[$header]) && !empty($_SERVER[$header])) {
        //         exit("Please disable your proxy connection!");
        //     }
        // }

        // *
        //  * Detect Proxies with a PHP Port Scan Test

        // $proxy_ports = array(80,81,8080,443,1080,6588,3128);
        // foreach($proxy_ports as $test_port) {
        //     if(@fsockopen($_SERVER['REMOTE_ADDR'], $test_port, $errno, $errstr, 5)) {
        //         exit("Please disable your proxy connection!");
        //     }
        // }

        // /**
        //  * Filter Blacklsited IP Addresses With PHP
        //  */
        // $ip_blacklist = array('192.168.1.1', '1.1.1.1', '5.5.5.5');
        // if(isset($_SERVER['REMOTE_ADDR']) && is_array($ip_blacklist)) {
        //     if(in_array($_SERVER['REMOTE_ADDR'], $ip_blacklist)) {
        //         exit("Please disable your proxy connection!");
        //     }
        // }


        // $ip = "120.188.38.180";
        // $proxyDetect = file_get_contents("https://proxycheck.io/v2/$ip?vpn=1&asn=1");
        // if ($proxyDetect == "TRUE")
        // {
        //     echo "Proxy Detected";
        // }
        // else if ($proxyDetect == "FALSE")
        // {
        //     echo "Proxy Not Detected";
        // }
        // else
        // {
        //     echo "Invalid IP Address";
        // }


        // $ip = $_SERVER['REMOTE_ADDR'];
        $ip = $this->request->getIPAddress();
        $url = "https://proxycheck.io/v2/".$ip."?vpn=1&asn=1";
        print_r($url);
        echo "<br></br>";
        $respondBody = $this->myCurl("GET", $url, "");
        print_r($respondBody);
        $data = $respondBody['data'];

        if($data->status == "error")
        {
            echo "IP Addres tidak valid.";
            // print_r($data->message);
        }
        else
        {
            $data_ip = $data->$ip;
            if($data_ip->proxy == "yes")
            {
                echo "Silahkan non-aktifkan VPN atau Proxy";
            }
            else
            {
                echo "Koneksi internet aman.";
            }
        }
    }

    public function test()
    {
        $this->isVpn2();
    }

    public function check_password()
    {
        $hashed = '$2y$05$vYe/ZltTiaT.QU.A3XnMZOJWpdoni.FQ7aak.YK7CuIWl.5WCJ95i';
        if (password_verify('user123', $hashed)) {
            echo 'Password is valid!';
        } else {
            echo 'Invalid password.';
        }
    }
}