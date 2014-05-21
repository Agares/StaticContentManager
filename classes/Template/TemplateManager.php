<?php

namespace Template;

class TemplateManager {
	/**
	 * @var ITemplateStore
	 */
	private $templateStore;
	
	public function __construct(ITemplateStore $templateStore) {
		$this->templateStore = $templateStore;
	}
	
	public function addTemplate(ITemplate $template) {
		if($this->templateStore->templateExists($template->getName()) && !$this->templateStore->getTemplate($template->name)->isMutable()) {
			throw new Exception('Template ' . $template->getName() . ' is immutable and cannot be modified.');
		}
		
		$this->templateStore->addTemplateVersion($template);
	}
	
	public function getTemplate($name, $version = ITemplateStore::VERSION_NEWEST) {
		return $this->templateStore->getTemplate($name, $version);
	}
	
	public function removeTemplate($name) {
		if(!$this->templateStore->templateExists($name)) {
			return;
		}
		
		if(!$this->templateStore->getTemplate($name)->isMutable()) {
			throw new Exception('Template ' . $name . ' is immutable and cannot be removed.');
		}
		
		$this->templateStore->removeTemplate($name);
	}
}
