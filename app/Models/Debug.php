<?php

namespace App\Models;

class Debug
{
	public function __construct() {}
	private $debug = false;
	protected function getDebug():bool {
		return $this->debug;
	}
	protected function setDebug(bool $debug):void {
		$this->debug = $debug;
	}
	private $messages = array();
	public function getMessages(): array {
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
	protected function setMessages(array $messages): array {
		$this->messages = $messages;
	}
	protected function pushMessage(string $message): void {
		array_push($this->messages, $message);
	}
}

?>