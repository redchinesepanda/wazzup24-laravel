<?php

namespace App\Models;

class SectionTariff extends Section
{
	public function __construct() {
		$this->setName(__('tariff.title'));
		$this->setTemplate(array('tariff'));
		$this->setStyle(
			array(
				new Style('tariff'),
				new Style('tariff-desktop', Style::$mediaDesktop),
				new Style('tariff-mobile', Style::$mediaMobile),
				new Style('tariff-price'),
				new Style('tariff-price-desktop', Style::$mediaDesktop),
				new Style('tariff-price-mobile', Style::$mediaMobile),
				new Style('tariff-tooltip'),
				new Style('tariff-tooltip-desktop', Style::$mediaDesktop),
				new Style('tariff-tooltip-mobile', Style::$mediaMobile),
			)
		);
		$this->setScript(
			array(
				'currency',
				'tooltip',
				'tab',
			)
		);
		$prices12mon = array(
			new Price(
				'Start',
				array(
					'rur' => '1 200',
					'usd' => '24',
					'eur' => '24',
					'kzt' => '7 200',
				)
			),
			new Price(
				'Pro',
				array(
					'rur' => '2 400',
					'usd' => '48',
					'eur' => '48',
					'kzt' => '14 400',
				)
			),
			new Price(
				'Max',
				array(
					'rur' => '4 800',
					'usd' => '96',
					'eur' => '96',
					'kzt' => '28 800',
				)
			)
		);
		
		$prices6mon = array(
			new Price(
				'Start',
				array(
					'rur' => '1 350',
					'usd' => '27',
					'eur' => '27',
					'kzt' => '8 100',
				)
			),
			new Price(
				'Pro',
				array(
					'rur' => '2 700',
					'usd' => '54',
					'eur' => '54',
					'kzt' => '16 200',
				)
			),
			new Price(
				'Max',
				array(
					'rur' => '5 400',
					'usd' => '108',
					'eur' => '108',
					'kzt' => '32 400',
				)
			)
		);
		$prices1mon = array(
			new Price(
				'Start',
				array(
					'rur' => '1 500',
					'usd' => '30',
					'eur' => '30',
					'kzt' => '9000',
				)
			),
			new Price(
				'Pro',
				array(
					'rur' => '3 000',
					'usd' => '60',
					'eur' => '60',
					'kzt' => '18 000',
				)
			),
			new Price(
				'Max',
				array(
					'rur' => '6 000',
					'usd' => '120',
					'eur' => '120',
					'kzt' => '36 000',
				)
			)
		);
		$categories = array();
		array_push($categories, new PriceCategory(__('tariff.tabs.month'), '', $prices1mon));
		array_push($categories, new PriceCategory(__('tariff.tabs.half-year'), '-10%', $prices6mon));
		array_push($categories, new PriceCategory(__('tariff.tabs.year'), '-20%', $prices12mon));
		$items = array(
			array(
				new PriceItem(__('tariff-price.item.write.deny'), 'deny'),
				new PriceItem(__('tariff-price.item.dialogs.limit100'), 'allow'),
			),
			array(
				new PriceItem(__('tariff-price.item.write.allow'), 'allow'),
				new PriceItem(__('tariff-price.item.dialogs.limit500'), 'allow'),
			),
			array(
				new PriceItem(__('tariff-price.item.write.allow'), 'allow'),
				new PriceItem(__('tariff-price.item.dialogs.limitno'), 'limitno'),
			)
		);
		$this->setItems($items);
		$this->setCategories($categories);
	}
	private $items = array();
	public function getItems():array {
		return $this->items;
	}
	public function getItem(int $key = 0):array {
		return $this->items[$key];
	}
	public function setItems(array $items):void {
		$this->items = $items;
	}
	private $categories = array();
	public function getCategories():array {
		return $this->categories;
	}
	public function getCategory(int $index = 0):PriceCategory {
		return $this->getCategories()[$index];
	}
	public function setCategories(array $categories):void {
		$this->categories = $categories;
	}
	private $currencies = array(
		'rur' => '₽',
		'usd' => '$',
		'eur' => '€',
		'kzt' => '₸',
	);
	public function getCurrencies():array {
		return $this->currencies;
	}
	public function getCurrency(string $key = 'rur'):string {
		return $this->currencies[$key];
	}
	public function setCurrencies(array $currencies):void {
		$this->currencies = $currencies;
	}
	private $currencyPosition = array('usd', 'eur');
	
	public function getCurrencyPosition():array {
		return $this->currencyPosition;
	}
	public function setCurrencyPosition(array $currencyPosition):void {
		$this->currencyPosition = $currencyPosition;
	}
}

?>