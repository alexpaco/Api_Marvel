<?php 

namespace AP\PersonnagesBundle\Services;

class Personnage
{
	public function details($id)
	{
		$timestamp = 'date.timestamp()';
		$publicKey = '1577457f3589885adafd0320c0830897';
		$privateKey = '5792bfaf981b65942017f8c801d117e8ed795118';
		$keys = $privateKey.$publicKey;
		
		$string = $timestamp.$keys;
		
		$md5 = hash('md5', $string);
		
		$details = curl_init("http://gateway.marvel.com:80/v1/public/characters/$id?ts=$timestamp&apikey=$publicKey&hash=$md5");
		
		curl_setopt($details, CURLOPT_HEADER, 0);
		curl_setopt($details, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($details, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($details, CURLOPT_SSL_VERIFYPEER, FALSE); 
		
		$personnage = curl_exec($details);
		curl_close($details);

		$personnage = json_decode($personnage);

		return $personnage;
	}
}

?>
