<?php

namespace App;

class Section extends Debug
{
	public function __construct(string $name) {
		$this->setName($name);
	}
	private $name = 'Секция';
	public function getName(): string {
		return $this->name;
	}
	public function setName(string $name): void {
		$this->name = $name;
	}
	private $template = array();
	public function getTemplate(): array {
		return $this->template;
	}
	protected function setTemplate(array $template): void {
		$this->template = $template;
	}
	private $script = array();
	public function getScript(): array {
		return $this->script;
	}
	protected function setScript(array $script): void {
		$this->script = $script;
	}
	private $critical = array();
	public function getCritical(): array {
		return $this->critical;
	}
	protected function setCritical(array $critical): void {
		$this->critical = $critical;
	}
	private $style = array();
	public function getStyle(): array {
		return $this->style;
	}
	protected function setStyle(array $style): void {
		$this->style = $style;
	}
}

?>