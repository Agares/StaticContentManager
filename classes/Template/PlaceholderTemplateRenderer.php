<?php

namespace Template;
class PlaceholderTemplateRenderer implements ITemplateRenderer {
	public function render($content, $parameters = array()) {
		$content = $this->replacePlaceholders($content, $parameters);
		
		return $content;
	}
	
	private function replacePlaceholders($content, $parameters) {
		preg_match_all('#{{{[a-z0-9_-]*}}}#im',  $content, $matches);
		foreach($matches[0] as $matchedTag) {
			$matchedTagName = substr($matchedTag, 3, -3);
			
			if(!isset($parameters[$matchedTagName])) {
				throw new \Exception('No replacement found for tag ' . $matchedTagName);
			}
			
			$content = str_replace($matchedTag, $parameters[$matchedTagName], $content);
		}
		
		return $content;
	}
}
