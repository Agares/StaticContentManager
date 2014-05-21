<?php

namespace Template;

interface ITemplateRenderer {
	public function render(ITemplate $template, $parameters = array());
}