<?php

/* Let's Encrypt SSL */

class LetsEncrypt {

	public function acmeToken( $token ){
		$file = $this->getFile();
		file_put_contents($file, $token);
		echo 'done';
		exit();
	}

	public function acmeChallenge(){
		//var_dump("sslVerify");
		$file = $this->getFile();
		// get token
		$token = @file_get_contents( $file );
		// FIX: fallback to the main domain if the token is empty
		if( empty($token) ){
			$file = $this->getFile(true);
			// get token
			$token = @file_get_contents( $file );
		}
		echo $token;
		exit();
	}

	public function getFile($maindomain=false){
		$dir = sys_get_temp_dir(); // option...
		$host = ( !empty($_SERVER['HTTP_HOST']) && !$maindomain) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];
		// FIX: sometimes the $_SERVER data is not available...
		if( empty($host) ) $host = $GLOBALS['config']['main']['site_name'];
		$filename = trim( strtolower( $host ) ) .".letsencrypt";
		$file = $dir ."/". $filename;
		return $file;
	}

}

?>
