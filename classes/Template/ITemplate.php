<?php
namespace Template;

interface ITemplate {
	public function getName();
	public function setName();
	
	public function getTitle();
	public function setTitle();
	
	public function getContent();
	public function setContent();
	
	public function getRendererName();
	public function setRendererName();
	
	public function getVersion();
	public function setVersion();
}