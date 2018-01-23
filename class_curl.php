<?php
class class_Curl{

	private $curl = curl_init();
	private $curl_port = "8080";
	private $curl_url;
	private $curl_return = true;
	private $curl_encoding = "";
	private $curl_maxredirs = 10;
	private $curl_timeout =30;
	private $curl_http_version = CURL_HTTP_VERSION_1_1;
	private $curl_customrequest;
	private $curl_postfields;
	private $curl_httpheader;
	private $config_curl;
	private $response;
	private $newVar
	
	public function curl_data($url,$method,$data,$headers){		
		$this->curl_url = $url;
		$this->curl_customrequest = $method;
		$this->curl_postfields = $data;
		$this->curl_httpheader = $headers;
	}
	
	public function curl_config(){		
		if($this->curl_customrequest == "POST"){
			$this->config_curl = array(CURLOPT_PORT => $this->curl_port,
				CURLOPT_URL => $this->curl_url,
				CURLOPT_RETURNTRANSFER => $this->curl_return,
				CURLOPT_ENCODING => $this->curl_encoding,
				CURLOPT_MAXREDIRS => $this->curl_maxredirs,
				CURLOPT_TIMEOUT => $this->curl_timeout,
				CURLOPT_HTTP_VERSION => $this->curl_http_version,
				CURLOPT_CUSTOMREQUEST => $this->curl_customrequest,
				CURLOPT_POSTFIELDS => $this->curl_postfields,
				CURLOPT_HTTPHEADER => $this->curl_httpheader,
				);
		}else{
			$this->config_curl = array(CURLOPT_PORT => $this->curl_port,
				CURLOPT_URL => $this->curl_url,
				CURLOPT_RETURNTRANSFER => $this->curl_return,
				CURLOPT_ENCODING => $this->curl_encoding,
				CURLOPT_MAXREDIRS => $this->curl_maxredirs,
				CURLOPT_TIMEOUT => $this->curl_timeout,
				CURLOPT_HTTP_VERSION => $this->curl_http_version,
				CURLOPT_CUSTOMREQUEST => $this->curl_customrequest,
				CURLOPT_HTTPHEADER => $this->curl_httpheader,
				);
		}			
	}
	
	public function do_curl(){
		curl_setopt_array($this->curl,$config);
		$this->response = array(curl_exec($this->curl),curl_error($this->curl));
		return $this->response;
	}
	
	public function close_curl(){
		curl_close($this->curl);
	}
	
	public function setnewVar($newVar){
		$this->newVar = $newVar;
	}
	
	public function getnewVar(){
		return $this->newVar;
	}
}
?>
