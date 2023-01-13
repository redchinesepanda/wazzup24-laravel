<?php

namespace App\Http\Controllers;
use App\Models\Page;

class PageController extends Controller
{
	private function wzDetectLocale($url = ''):array {
		$locale = array(
			'locale' => 'ru',
			'tag' => 'wz-ru'
		);
		if (empty($url)) {
			$domains = array(
				'laravel-en.wazzup24.beget.tech' => 'en',
				'laravel-es.wazzup24.beget.tech' => 'es',
				'laravel-pt.wazzup24.beget.tech' => 'pt',
				'laravel-hi.wazzup24.beget.tech' => 'hi',
			);
			if (array_key_exists($_SERVER['HTTP_HOST'], $domains)) {
				$locale['locale'] = $domains[$_SERVER['HTTP_HOST']];
				$locale['tag'] = 'wz-' . $domains[$_SERVER['HTTP_HOST']];
			}
		} else {
			$tags = array(
				'-en' => array(
					'locale' => 'en',
					'tag' => 'wz-en'
				),
				'-es' => array(
					'locale' => 'es',
					'tag' => 'wz-es'
				),
				'-pt' => array(
					'locale' => 'pt',
					'tag' => 'wz-pt'
				),
				'-hi' => array(
					'locale' => 'hi',
					'tag' => 'wz-hi'
				)
			);
			foreach ($tags as $tagKey => $tag) {
				if (strpos($url, $tagKey) !== false) {
					$locale = $tag;
				}
			}
		}
		return $locale;
	}
	private function wzDetectCRM($url = ''):array {
		$message = array('<pre>');
		/*if (empty($url)) {
			$url = $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		}*/
		$crms = array(
			'techpartner' => 'wz-empty wz-techpartner',
			'business' => 'wz-business',
			'whatsapp' => 'wz-whatsapp',
			'instagram' => 'wz-instagram',
			'telegram' => 'wz-telegram',
			'vk' => 'wz-vk',
			'-crm' => 'wz-crm',
			'affiliate' => 'wz-empty wz-partner',
			'partnership' => 'wz-empty wz-partner',
			'amocrm' => 'wz-amocrm',
			'bitrix24' => 'wz-bitrix24'
		);
		$result = array();
		foreach ($crms as $crm_key => $crm_value) {
			if (strpos($url, $crm_key) !== false) {
				array_push($result, $crm_value);
			}
		}
		if (empty($result)) {
			array_push($result, 'wz-empty');
		}
		if ($url == '') {
			array_push($result, 'wz-main');
		}
		array_push($message, implode('<br />', $result));
		array_push($message, 'url: ' . $url . '^');
		array_push($message, '</pre>');
		//	echo implode('<br />', $message);
		return $result;
	}
    public function show($pageName)
    {
		$locale = $this->wzDetectLocale($pageName);
		App::setLocale($locale['locale']);
		$this->pushMessage('App::getLocale(): ' . App::getLocale());
		$crm = $this->wzDetectCRM($pageName);
		array_push($crm, $locale['tag']);
		$page = new Page($pageName, $crm);
		$this->pushMessage($page->getLog());
		return view($page->getTemplate()[0], [
			'page' => $page,
			'messages' => $this->getLog()
		]);
    }
	protected $debug = true;
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