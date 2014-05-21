<?php
namespace Template;

interface ITemplate {
	public function getName();
	public function setName($name);
	
	public function getTitle();
	public function setTitle($title);
	
	public function getContent();
	public function setContent($content);
	
	public function getVersion();
	public function setVersion($version);
}