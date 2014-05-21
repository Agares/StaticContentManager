<?php

namespace Template;

interface ITemplateRenderer {
	public function render($content, $parameters = array());
}