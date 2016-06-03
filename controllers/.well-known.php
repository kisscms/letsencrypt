<?php

class WellKnown extends Controller {

	function __construct($controller_path,$web_folder,$default_controller,$default_function)  {

		$this->letsencrypt = new LetsEncrypt();

		// continue to the default setup
		parent::__construct($controller_path,$web_folder,$default_controller,$default_function);

	}

	function index( $params=NULL ){
		// Let's Encrypt
		if( is_array($params) && array_key_exists('_well-known', $params) ){
			if( $params['_well-known'] == "acme-challenge" ){
				return $this->letsencrypt->acmeChallenge();
			}
			if( $params['_well-known'] == "acme-token" ){
				if( ! array_key_exists("token", $params) ) exit(); // throw error...
				return $this->letsencrypt->acmeToken( $params['token'] );
			}
		}
		// default response
		echo "ready";
		exit();
	}

}

?>
