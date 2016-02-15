<?php
/*
 *	Let's Encrypt for KISSCMS
 *	Verify SSL from Let's Encrypt with no excess server configuration
 *	Homepage: http://kisscms.com/plugins
 *	Created by Makis Tracend (@tracend)
 *
*/

class Main extends Controller {

	public function index( $params ){
		// this is an example how to use the plugin methods

		// Let's Encrypt
		if( $params['_well-known'] == "acme-challenge" ){
			return $this->letsencrypt->acmeChallenge();
		}
		if( $params['_well-known'] == "acme-token" ){
			return $this->letsencrypt->acmeToken( $params[0] );
		}

		// continue...
	}

}

?>
