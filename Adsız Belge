<?php

class randomname{
	protected $engWords;
   	protected $engAdj;

    	protected $turWords;
    	protected $turAdj;
    	protected $colorClass;
    	protected $argv;
	public function __construct($argv){
        	$this->argv = $argv;

        	$this->turWords = array('ev', 'araba', 'elma', 'karpuz', 'iş', 'para');
       	 	$this->turAdj = array('çok', 'büyük', 'tatlı', 'sarı', 'zengin', 'zevkli');

        	$this->engWords = array('home', 'car', 'apple', 'computer', 'biycle', 'phone');
        	$this->engAdj = array('heavy', 'yellow', 'expensive', 'big', 'red');

        	$this->run();
    	}
    	function compress($name, $attribute){
        	return $name . " " . $attribute;
   	}	
	function createDirectory($language, $dirName){
        	if(!is_dir('dirs'))
            		mkdir('dirs');

        	if(!is_dir('dirs/' . $language))
            		mkdir('dirs/' . $language);

       	 	if(is_dir('dirs/' . $language . "/" . $dirName))
           		return false;
        	mkdir('dirs/' . $language . "/" . $dirName);
        	echo $this->colorClass->getColoredString('Oluşturulan Dizin : ', "cyan");
       	 	echo $this->colorClass->getColoredString( $this->decodeSlug($dirName), null, "cyan") . "\n";
        	echo $this->colorClass->getColoredString( ' Slug : ', "red", "black");
        	echo $this->colorClass->getColoredString( $dirName, null, "cyan") . "\n\n";

        	return true;
    	}



}
