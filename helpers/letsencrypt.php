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
		echo $token;
		exit();
	}

	public function getFile(){
		$dir = sys_get_temp_dir(); // option...
		$sitename = trim( strtolower( $GLOBALS['config']['main']['site_name'] ) );
		$file = $dir ."/". $sitename .".letsencrypt";
		return $file;
	}

}

?>
