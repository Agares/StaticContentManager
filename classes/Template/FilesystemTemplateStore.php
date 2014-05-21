<?php
namespace Template;

class FilesystemTemplateStore implements ITemplateStore {
	protected $basePath = './templates/';
	
	public function setBasePath($basePath) {
		$this->basePath = $basePath;
	}
	
	public function addTemplateVersion(ITemplate $template) {
		$templateDirectory = $this->getTemplatePath($template->getName());
		
		if(!is_dir($templateDirectory)) {
			if(!mkdir($templateDirectory, 0666, true)) {
				throw new Exception('Cannot create template directory.');
			}
		}
		
		$templateFilepath = $templateDirectory . DIRECTORY_SEPARATOR . $template->getVersion() . '.tmpl';
		while(file_exists($templateFilepath)) {
			$template->setVersion($template->getVersion() + 1);
			$templateFilepath = $templateDirectory . DIRECTORY_SEPARATOR . $template->getVersion() . '.tmpl';
		}
		
		file_put_contents($templateFilepath, json_encode(array(
			'name' => $template->getName(),
			'version' => $template->getVersion(),
			'title' => $template->getTitle(),
			'content' => $template->getContent(),
			'isMutable' => $template->isMutable()
		)));
	}
	
	public function templateExists($name) {
		return is_dir($this->getTemplatePath($name));
	}

	public function getTemplate($name, $version = ITemplateStore::VERSION_NEWEST) {
		$templatePath = $this->getTemplatePath($name);
		
		if(!is_dir($templatePath)) {
			throw new \Exception('Template ' . $name . ' not found.');
		}
				
		if($version == ITemplateStore::VERSION_NEWEST) {
			$files = glob($templatePath . DIRECTORY_SEPARATOR . '*.tmpl');
			$versions = array_map(function($x) { return (int)pathinfo($x, PATHINFO_FILENAME); }, $files);
			rsort($versions);
			$version = $versions[0];
		}
		
		$templateFilepath = $templatePath . '/' . $version . '.tmpl';
		
		if(!file_exists($templateFilepath)) {
			throw new \Exception('Version ' . $version . ' of template ' . $name . ' not found!');
		}
		
		$templateDataJson = file_get_contents($templateFilepath);
		$templateData = json_decode($templateDataJson, JSON_OBJECT_AS_ARRAY);
		
		return new Template($templateData['name'], $templateData['version'], $templateData['isMutable'], $templateData['title'], $templateData['content']);
	}

	public function removeTemplate($name) {
		
	}
	
	private function getTemplatePath($name) {
		return $this->basePath . DIRECTORY_SEPARATOR . $name;
	}

}