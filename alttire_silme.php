<?php


class alttire{
	protected $argv;
	
	public function __construct($argv){
        $this->argv = $argv;
        $this->calis();
    }
	function alttire_ekle($girdi){
        $ekli = str_replace(' ', '_', $girdi);
		echo $ekli . '\n';
    }
	
    function alttire_sil($girdi){
        $degis = str_replace('_', ' ', $girdi);
		echo $degis . '\n';
		
    }
	public function calis(){
		$argumanlar = $this->argv;
		$arg0 = $arguments[1];
		$arg1 = $arguments[2];


        if(in_array($arg0, array('sil', 'del', 'kaldir'), true)){
            $this->alttire_sil($arg1);
        }
        elseif(in_array($arg0, array'ekle', 'add', 'olustur'), true)){
            $this->alttire_ekle($arg1);
        }
		else{
			echo "Lütfen 'sil' , 'del', 'kaldir', 'ekle', 'add', 'olustur' kelimelerini ve bir \" \" arasýnda cümleyi argüman olarak veriniz arguman veriniz" . '\n';
		}
	
	}
}