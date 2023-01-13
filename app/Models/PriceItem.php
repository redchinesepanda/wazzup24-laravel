<?php

namespace App\Models;

class PriceItem
{
	public function __construct(string $name, string $cssClass = 'allow') {
		$this->setName($name);
		$this->setCSSClass($cssClass);
	}
	private $name = '';
	public function getName():string {
		return $this->name;
	}
	public function setName(string $name):void {
		$this->name = $name;
	}
	private $cssClass = 'allow';
	public function getCSSClass():string {
		return $this->cssClass;
	}
	public function setCSSClass(string $cssClass):void {
		$this->cssClass = $cssClass;
	}
}

?>