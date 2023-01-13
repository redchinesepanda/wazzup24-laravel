<?php

namespace App\Models;

class Price {
	public function __construct(string $name, array $price) {
		$this->setName($name);
		$this->setPrice($price);
	}
	private $name = 'Start';
	public function getName(): string {
		return $this->name;
	}
	public function setName(string $name): void {
		$this->name = $name;
	}
	private $price = array(
		'rur' => '1 500',
		'usd' => '30',
		'eur' => '30',
		'kzt' => '9 000',
	);
	public function getPrice():array {
		return $this->price;
	}
	public function setPrice(array $price):void {
		$this->price = $price;
	}
}

?>