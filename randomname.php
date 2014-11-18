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
        echo "Oluşturulan Dizin : ".$dirname."\n\n";

        return true;
    }
	
	function remainingTime($start)
    {
        $sure_bitimi = microtime(true);
        return $sure_bitimi - $start;
    }

    function workProgress($language, $words, $adjectives, $sayi){
        $sizeOfDir = $sayi;
		$maxTimeSeconds = 10;
		$startTime = microtime(true);
			
        for(;;){
			/*10 saniye bekleyip kelime üretemezse 
			*program sonlandıracak
			*/
			if($this->remainingTime($startTime) >= $maxTimeSeconds){
				echo $maxTimeSeconds . " saniye süre geçti. Bu sürede oluşturulabilecek dosya ismi bulunamadı" . "\n";
				break;
			}

			if(!$sizeOfDir){
				break;
			}
	
            $randWords = rand(0, sizeof($words) - 1);
            $randAdjectives = rand(0, sizeof($adjectives) - 1);
           	$dirName = $this->compress($words[$randWords], $adjectives[$randAdjectives]);
            if($this->createDirectory($language, $dirName)){
               	$sizeOfDir -= 1;
           	}	
        }
    }
	function deldirs($dir) {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }
}
