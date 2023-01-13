<?php

namespace App;

class PriceCategory {
	public function __construct(string $name, string $discount, array $prices = array()) {
		$this->setName($name);
		$this->setDiscount($discount);
		$this->setPrices($prices);
	}
	private $name = 'Start';
	public function getName(): string {
		return $this->name;
	}
	public function setName(string $name): void {
		$this->name = $name;
	}
	private $discount = '';
	public function getDiscount(): string {
		return $this->discount;
	}
	public function setDiscount(string $discount): void {
		$this->discount = $discount;
	}
	private $prices = array();
	public function getPrices():array {
		return $this->prices;
	}
	public function getPrice(string $name = 'Start'):Price {
		$result = null;
		foreach ($this->getPrices() as $price) {
			if ($price->getName() == $name) {
				$result = $price;
			}
		}
		return $result;
	}
	public function setPrices(array $prices):void {
		$this->prices = $prices;
	}
}

?>