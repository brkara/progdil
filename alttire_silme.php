<?php


class alttire{
	protected $arguman;
	protected $argv;
	public function __construct($argv){
        $this->argv = $argv;
        $this->calis();
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
	
	}
}