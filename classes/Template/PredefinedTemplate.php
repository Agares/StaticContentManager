<?php

namespace Template;

class PredefinedTemplate implements \Template\ITemplate {
	private $content, $name, $title, $version;
	protected $templateRenderer;
	
	public function __construct($name, $version, $title, $content) {
		$this->name = $name;
		$this->version = $version;
		$this->title = $title;
		$this->content = $content;
		
		$this->templateRenderer = new PlaceholderTemplateRenderer();
	}

	public function render($parameters = array()) {
		return $this->templateRenderer->render($this->content, $parameters);
	}
	
	public function getContent() {
		return $this->content;
	}

	public function getName() {
		return $this->name;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getVersion() {
		return $this->version;
	}
	
	public function setTemplateRenderer(ItemplateRenderer $templateRenderer) {
		$this->templateRenderer = $templateRenderer;
	}

	public function setContent($content) {
		throw new Exception('This template is immutable.');
	}

	public function setName($name) {
		throw new Exception('This template is immutable.');		
	}

	public function setTitle($title) {
		throw new Exception('This template is immutable.');
	}

	public function setVersion($version) {
		throw new Exception('This template is immutable.');
	}

}