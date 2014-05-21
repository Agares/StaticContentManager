<?php

namespace Template;

interface ITemplateStore {
	public function addTemplateVersion(ITemplate $template);
	public function removeTemplate($name);
}
