<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * A Codeigniter library for handle Google Recaptcha
 * @author H.M.S.Nishantha <srimaln91@gmail.com>
 */
class Recaptcha
{

	protected $secret;
	public $response;
	public $remote_ip;

	public function __construct()
	{
		//Load config file
        $this->load->config('recaptcha');

       	//Set class variables
        $this->secret = $this->config->item('secret');
        $this->remote_ip = $_SERVER['REMOTE_ADDR'];

	}

/**
 * Validate google recaptcha response using json API
 * @param bool $response Validation status
 */
	public function Validate($response){

		$data = array(
			'secret' => $this->secret,
			'response' => $response,
			'remoteip' => $this->remote_ip
		);

		$resp = json_decode(file_get_contents("https://www.google.com/recaptcha/api/siteverify?".http_build_query($data)));
		return $resp->success;
	}


/**
 * Get the Codeigniter super object to use native CI function within the library.
 * @return object      [CI object]
 */
    public function __get($var)
    {
        return get_instance()->$var;
    }

}