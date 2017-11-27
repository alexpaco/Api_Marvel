<?php 

namespace AP\PersonnagesBundle\Services;

/**
* 
*/
class Curl
{
	
	function __construct()
	{
	}

	public function url($curl)
	{
		$curl = curl_init($curl);

		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

		$series = curl_exec($curl);
		curl_close($curl);

		return $series;
	}
}
 ?>