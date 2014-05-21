<?php

namespace Template;

interface ITemplateStore {
	const VERSION_NEWEST = -1;
	
	public function templateExists($name);
	public function addTemplateVersion(ITemplate $template);
	public function removeTemplate($name);	
	/**
	 * @return ITemplate
	 */
	public function getTemplate($name, $version = VERSION_NEWEST);
}