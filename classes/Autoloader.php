<?php

class Autoloader {
	const BASE_PATH = __DIR__;
	
	public static function register() {
		$instance = new static();
		spl_autoload_register(array($instance, 'autoload'));
	}
	
	public function autoload($className) {
		$classNameParts = explode('\\', $className);
		$path = static::BASE_PATH . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $classNameParts) . '.php';
		
		require_once $path;
	}
}