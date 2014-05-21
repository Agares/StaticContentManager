<?php

namespace Template;

interface ITemplateStore {
	const VERSION_NEWEST = -1;
	
	public function addTemplateVersion(ITemplate $template);
	public function removeTemplate($name);	
	public function getTemplate($name, $version = VERSION_NEWEST);
}