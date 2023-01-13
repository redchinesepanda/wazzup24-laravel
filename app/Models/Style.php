<?php

namespace App;

class Style extends Debug
{
	public function __construct(string $name, string $media = '') {
		//echo '$name: ' . $name . '<br />';
		//echo '$media: ' . $media . '<br />';
		$this->setName($name);
		$this->setMedia($media);
	}
	private $name = '';
	public function getName(): string {
		return $this->name;
	}
	public function setName(string $name): void {
		$this->name = $name;
	}
	private $media = '';
	public function getMedia(): string {
		return $this->media;
	}
	protected function setMedia(string $media): void {
		$this->media = $media;
	}
	public static $mediaDesktop = 'screen and (min-width: 1200px)';
	public static $mediaMobile = 'screen and (max-width: 767px)';
}

?>