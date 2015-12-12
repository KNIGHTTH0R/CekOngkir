<?php
class JNE {

	private $url = "http://www.jne.co.id/getDetailFare.php";
	private $url_city_from = 'http://www.jne.co.id/server/server_city_from.php?term=';
	private $url_city_dest = 'http://www.jne.co.id/server/server_city.php?term=';
	private $fromCode, $fromLabel, $destCode, $destLabel, $weight;
	
	public function setCityFrom($code, $label){
		$this->fromCode = $code;
		$this->fromLabel = $label;
	}
	
	public function setCityDest($code, $label){
		$this->destCode = $code;
		$this->destLabel = $label;
	}
	
	public function setWeight($weight){
		$this->weight = $weight;
	}
	
	public function getListCityFrom($key){
		echo file_get_contents($this->url_city_from . $key);
	}
	
	public function getListCityDest($key){
		echo file_get_contents($this->url_city_dest . $key);
	}
	
	private function setPostReq(){
		return 'origin=' . $this->fromCode . '&dest=' . $this->destCode . '&weight=' . $this->weight . '&originlabel=' . $this->fromLabel . '&destlabel=' . $this->destLabel;
	}
	
	public function doRequest(){
		$ch = curl_init();
		curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0 );
		curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0 );
		curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 0 );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_URL, $this->url);
		curl_setopt( $ch, CURLOPT_POSTFIELDS, $this->setPostReq() );
		$site = curl_exec( $ch );
		
		return $site;
	}
}
?>