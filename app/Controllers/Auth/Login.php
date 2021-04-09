<?php namespace App\Controllers\Auth;

use App\Controllers\Base\BaseController;

class Login extends BaseController
{
	public function index()
	{
        $content["title"]      = "Halaman Login";
        // $data['content_title'] = $content["title"];
        // $content["container"]  = view("admin/users/list", $data);
        $data['content_title'] = "Selamat datang, silahkan login";
        $content["container"]  = view('auth/menu');
        $content_js["js"]      = view("auth/js");
        $this->template_login($content, $content_js);
	}

	public function page()
	{
        $content["title"]      = "Halaman Login";
		$data['content_title'] = "Selamat datang, silahkan login";
        $content["container"]  = view('auth/page');
        $content_js["js"]      = view("auth/js");;
        $this->template_login($content, $content_js);
	}
}