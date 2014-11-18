<?php

class rastgele_ad{
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

        $this->calis();
    }
    function birlestir($name, $attribute){
        return $name . " " . $attribute;
   	}	
	function dizin_olustur($language, $dirName){
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
	
	function kalan_zaman($start)
    {
        $sure_bitimi = microtime(true);
        return $sure_bitimi - $start;
    }

    function uretici($language, $words, $adjectives, $sayi){
        $sizeOfDir = $sayi;
		$maxTimeSeconds = 10;
		$startTime = microtime(true);
			
        for(;;){
			/*10 saniye bekleyip kelime üretemezse 
			*program sonlandıracak
			*/
			if($this->kalan_zaman($startTime) >= $maxTimeSeconds){
				echo $maxTimeSeconds . " saniye süre geçti. Bu sürede oluşturulabilecek dosya ismi bulunamadı" . "\n";
				break;
			}

			if(!$sizeOfDir){
				break;
			}
	
            $randWords = rand(0, sizeof($words) - 1);
            $randAdjectives = rand(0, sizeof($adjectives) - 1);
           	$dirName = $this->birlestir($words[$randWords], $adjectives[$randAdjectives]);
            if($this->dizin_olustur($language, $dirName)){
               	$sizeOfDir -= 1;
           	}	
        }
    }
	function dizin_sil($dir) {
        $files = array_diff(scandir($dir), array('.','..'));
        foreach ($files as $file) {
            (is_dir("$dir/$file")) ? $this->delTree("$dir/$file") : unlink("$dir/$file");
        }
        return rmdir($dir);
    }
	public function calis(){
        $arguments = $this->argv;

        $arg0 = $arguments[1];
		$arg1 = $arguments[2];


        if(in_array($arg0, array('en', 'english', 'ingilizce'), true)){
            $this->uretici('en', $this->engWords, $this->engAdj, $arg1);
        }
        elseif(in_array($arg0, array('tr', 'turkish', 'turkce'), true)){
            $this->uretici('tr', $this->turWords, $this->turAdj, $arg1);
        }
	}
}
