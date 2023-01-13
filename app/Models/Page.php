<?php

namespace App;

class Page extends Section
{
	public function __construct(string $pageName, array $tags) {
		//$this->setDebug(true);
		$this->pushMessage('Page::__construct');
		$this->setName($pageName);
		$this->setTags($tags);
		$sections = array();
		array_push($sections, new SectionSlider(__('slider.title'), __('slider.description', ['br-desktop' => '<br class="wz-desktop" />']), __('slider.button'), __('slider.bubble')));
		array_push($sections, new SectionTariff());
		$this->pushMessage('$sections: ' . print_r($sections, true));
		$this->setSections($sections);
		$this->setCritical(array('montserrat', 'roboto'));
		$this->setTemplate(array('page'));
		$this->setStyle(array(new Style('page')));
		$this->setScript(array('jquery.min'));
		foreach ($this->getSections() as $section) {
			$this->setCritical(array_merge($this->getCritical(), $section->getCritical()));
			/* $this->setTemplate(array_merge($this->getTemplate(), $section->getTemplate())); */
			$this->setStyle(array_merge($this->getStyle(), $section->getStyle()));
			$this->setScript(array_merge($this->getScript(), $section->getScript()));
		}
	}
	private $tags = array();
	public function getTags(): array {
		return $this->tags;
	}
	public function echoTags(): string {
		return implode(' ', $this->getTags());
	}
	public function setTags(array $tags): void {
		$this->tags = $tags;
	}
	private $sections = array();
	public function getSections(): array {
		return $this->sections;
	}
	public function setSections(array $sections): void {
		$this->sections = $sections;
	}
}

?>