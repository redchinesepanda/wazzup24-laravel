<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App;

class AjaxController extends Controller
{
	private function getIPInfo($json_ipinfo = null) {
		$this->pushMessage('wz_get_ipinfo');
		$ipinfo_token = 'd8cd47ccef40d3';
		$client_ip = '192.168.0.1';
		$http_cf_connecting_ip = '';
		if (
			empty($http_cf_connecting_ip)
			&& array_key_exists('HTTP_CF_CONNECTING_IP', $_SERVER)
		) {
			$http_cf_connecting_ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
			$this->pushMessage('HTTP_CF_CONNECTING_IP: ' . $http_cf_connecting_ip);
		}
		if (
			empty($http_cf_connecting_ip)
			&& array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)
		) {
			$http_cf_connecting_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			$this->pushMessage('HTTP_X_FORWARDED_FOR: ' . $http_cf_connecting_ip);
		}
		if (
			empty($http_cf_connecting_ip)
			&& array_key_exists('REMOTE_ADDR', $_SERVER)
		) {
			$http_cf_connecting_ip = $_SERVER["REMOTE_ADDR"];
			$this->pushMessage('REMOTE_ADDR: ' . $http_cf_connecting_ip);
		}
		if (
			empty($http_cf_connecting_ip)
			&& array_key_exists('HTTP_CLIENT_IP', $_SERVER)
		) {
			$http_cf_connecting_ip = $_SERVER["HTTP_CLIENT_IP"];
			$this->pushMessage('HTTP_CLIENT_IP: ' . $http_cf_connecting_ip);
		}
		if(filter_var($http_cf_connecting_ip, FILTER_VALIDATE_IP) !== false) {
			$client_ip = $http_cf_connecting_ip;
		}
		$this->pushMessage('client_ip: ' . $client_ip);
		$url = 'https://ipinfo.io/' . $client_ip . '/json?token=' . $ipinfo_token;
		if (!empty($json_ipinfo)) {
			$this->pushMessage('json_ipinfo: ' . print_r($json_ipinfo, true));
			$json_ipinfo_object = json_decode($json_ipinfo);
			$this->pushMessage('json_ipinfo_object: ' . print_r($json_ipinfo_object, true));
			$url = 'https://app.wazzup24.com/api/v1/billing/currency/' . $json_ipinfo_object->{'country'};
		}
		$this->pushMessage('url: ' . $url);
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$json = 'error';
		if( ($json = curl_exec($ch) ) === false) {
			$this->pushMessage('Curl error: ' . curl_error($ch));
		} else {
			$this->pushMessage('Operation completed without any errors');
		}
		curl_close($ch);
		$json_object = json_decode($json);
		$json_object->{'client_ip'} = $client_ip;
		$json_object->{'url'} = $url;
		$json = json_encode($json_object);
		$this->pushMessage('json: ' . print_r($json, true));
		return $json;
	}
    public function show()
    {
		$this->pushMessage('wz_show_ipinfo');
		$json = $this->getIPInfo();
		$this->pushMessage('$this->getIPInfo(): ' . print_r($json, true));
		$json = $this->getIPInfo($json);
		$this->pushMessage('$this->getIPInfo($json): ' . print_r($json, true));
		return view('ajax', [
			'json' => $json,
			'messages' => $this->getLog()
		]);
    }
	protected $debug = false;
	private function getDebug(): bool {
		return $this->debug;
	}
	protected $messages = array();
	private function getMessages(): array {
		return $this->messages;
	}
	public function getLog():string {
		$result = '';
		if ($this->getDebug()) {
			$messages = $this->getMessages();
			array_unshift($messages, '<pre>');
			array_push($messages, '</pre>');
			$result = implode('<br />', $messages);
		}
		return $result;
	}
	private function setMessages(array $messages):array {
		$this->messages = $messages;
	}
	private function pushMessage(string $message):void {
		array_push($this->messages, $message);
	}
}

?>