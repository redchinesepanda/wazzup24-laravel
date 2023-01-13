<?php

namespace App;

class SectionSlider extends Section
{
	public function __construct(string $name, string $description, string $button, string $bubble) {
		$this->setName($name);
		$this->setTemplate(array('slider'));
		$this->setCritical(
			array(
				'slider-style',
				'slider-style-desktop',
				'slider-style-mobile',
			)
		);
		/*$this->setStyle(
			array(
				new Style('slider'),
				new Style('slider-desktop', Style::$mediaDesktop),
				new Style('slider-mobile', Style::$mediaMobile)
			)
		);*/
		$this->setDescription($description);
		$this->setButton($button);
		$this->setBubble($bubble);
	}
	private $description = 'Описание';
	public function getDescription(): string {
		return $this->description;
	}
	public function setDescription(string $description): void {
		$this->description = $description;
	}
	private $button = 'Кнопка';
	public function getButton(): string {
		return $this->button;
	}
	public function setButton(string $button): void {
		$this->button = $button;
	}
	private $bubble = 'Бабл';
	public function getBubble(): string {
		return $this->bubble;
	}
	public function setBubble(string $bubble): void {
		$this->bubble = $bubble;
	}
}

?>