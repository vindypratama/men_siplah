<?php
namespace App\Controllers\Base;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use CodeIgniter\Controller;
use App\Models\UsersActivity as UsersActivityModel;

class BaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['asset_helper','my_constants_helper','general_helper','login_helper','form', 'url'];
	protected $session;

	/**
	 * Constructor.
	 */
	public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		$this->session = \Config\Services::session();
	}

	public function getUserActivity($aktivitas = "")
	{
		// if(!$this->session->get(ID_PENGGUNA))
		// {
		// 	echo "testing";
		// 	print_r(base_url('login/page'));
		// 	// exit;
		// 	return redirect()->to(base_url());
		// 	exit;
		// }

		$user_activity = new UsersActivityModel;

		$agent = $this->request->getUserAgent();

        if ($agent->isBrowser())
        {
            $currentAgent = $agent->getBrowser().' '.$agent->getVersion();
        }
        elseif ($agent->isRobot())
        {
            $currentAgent = $this->agent->robot();
        }
        elseif ($agent->isMobile())
        {
            $currentAgent = $agent->getMobile();
        }
        else
        {
            $currentAgent = 'Unidentified User Agent';
        }

        $data_activity = array(
            ID_PENGGUNA => $this->session->get(ID_PENGGUNA),
            ALAMAT_IP => $this->request->getIPAddress(),
            PERANGKAT_PENGGUNA => $agent->getPlatform(),
            BROWSER => $currentAgent,
            USER_AGENT_STRING => $agent->getAgentString(),
            PREVIOUS_URL => previous_url(),
            CURRENT_URL => current_url(),
            AKTIVITAS => $aktivitas
        );

        $user_activity->insert($data_activity);
	}

	public function isVpn()
	{
		$ip = $this->request->getIPAddress();
        $url = "https://proxycheck.io/v2/".$ip."?vpn=1&asn=1";
        $respondBody = $this->myCurl("GET", $url, "");
        $data = $respondBody['data'];

        if($data->status == "error")
        {
            // echo "IP Addres tidak valid.";
            if($ip=='127.0.0.1' || substr($ip, 0, 11)=='192.168.137')
            {
            	return false;
            }
        }
        else
        {
            $data_ip = $data->$ip;
            if($data_ip->proxy == "yes")
            {
                // echo "Silahkan non-aktifkan VPN atau Proxy";
                return true;
            }
            else
            {
                // echo "Koneksi internet aman.";
                return false;
            }
        }
	}

	public function isVpn2()
	{
		// $ip = $this->request->getIPAddress();
		$ip='114.4.83.42';
		$url = "https://ipqualityscore.com/api/json/ip/pziubf79vOVytNVroXfubF2wbqwRfDl3/".$ip."?strictness=0&allow_public_access_points=true&fast=true&lighter_penalties=true&mobile=true";

        $respondBody = $this->myCurl("GET", $url, "");
        print_r($respondBody);
	}


	/**
	 * Menampilkan template marketplace
	 * @param  [String] $title         [Berisi judul halaman dengan tipe data string]
	 * @param  [View] $container     [Berisi file view yang menampilkan isi konten]
	 * @param  [View] $container_js  [Berisi file view untuk memanggil file javascript]
	 * @param  [View] $container_css [Berisi file view untuk memanggil file css]
	 * @return [View]                [Mengembalikan semua view yang ditampilkan pada browser]
	 */
    public function template_admin($title, $content, $content_js = null, $content_css = null)
    {
    	$template['title'] = $title;
    	$data_js['js'] = $content_js;
    	$data_css['css'] = $content_css;
        $template['js'] = view('template/admin/js', $data_js);
        $template['css'] = view('template/admin/css', $data_css);
        $template['navbar'] = view('template/admin/navbar');
        $data_menu['menu'] = view('menu/list');
        $template['sidebar'] = view('template/admin/sidebar', $data_menu);
        $data_content['title'] = $title;
        $data_content['content'] = $content;
        $template['content'] = view('template/admin/content', $data_content);
        $template['footer'] = view('template/admin/footer');
        echo view('template/admin/template', $template);
    }

	/**
	 * Menampilkan template marketplace
	 * @param  [String] $title         [Berisi judul halaman dengan tipe data string]
	 * @param  [View] $container     [Berisi file view yang menampilkan isi konten]
	 * @param  [View] $container_js  [Berisi file view untuk memanggil file javascript]
	 * @param  [View] $container_css [Berisi file view untuk memanggil file css]
	 * @return [View]                [Mengembalikan semua view yang ditampilkan pada browser]
	 */
	public function template_marketplace($title, $container, $container_js = null, $container_css = null)
	{
		$content["title"]     = $title;
		$content["container"] = $container;
		$content_js['js']     = $container_js;
		$content_css['css']   = $container_css;
		$content["navbar"]    = view('template/marketplace/navbar');
		$content["js"]        = view("template/marketplace/js", $content_js);
		$content["css"]       = view("template/marketplace/css", $content_css);
        echo view("template/marketplace/template", $content);
	}

	public function myCurlRequest($method, $url, $form = null)
	{
		$options = [];
		try
		{
			if($form)
			{
				if($method == 'POST')
				{
					$options = [
						'headers' => [
							'Content-Type' => 'multipart/form-data',
						],
						'multipart' => $form
					];
				}
				else
				{
					$options = [
						'form_params' => $form
					];
				}
			}
			$client = \Config\Services::curlrequest();
			$response = $client->request($method, $url, $options);
		}
		catch (\Exception $e)
		{
			die($e->getMessage());
		}

		$data = json_decode($response->getBody());

		return $data;
	}

    public function myCurl($method, $url, $params)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        if($method == "PUT")
        {
			curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($params));
		}
		else
		{
			curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		}
        
        $respondBody=curl_exec($ch);

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        if($httpcode == 404)
        {
        	$errno = curl_errno($ch);
            $error_message = curl_strerror($errno);
            $messages =  "cURL error ({$errno}): {$error_message}";
            $callBack = [
                'error' => true,
                'httpcode' => $httpcode,
                'message' => $messages,
                'data' => json_decode($respondBody)
            ];
        }
        elseif($httpcode == 400)
        {
            $callBack = [
                'error' => true,
                'httpcode' => $httpcode,
                'data' => json_decode($respondBody)
            ];
        }
        else
        {
        	$callBack = [
                'error' => false,
                'httpcode' => $httpcode,
                'data' => json_decode($respondBody)
            ];
        }
        curl_close($ch);

        return $callBack;
    }

}
