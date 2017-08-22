<?php 
	
namespace AP\PersonnagesBundle\Services;

class Personnages
{
	public function Affiche($offset, $nbParPage)
	{

		$timestamp = 'date.timestamp()';
		$publicKey = '1577457f3589885adafd0320c0830897';
		$privateKey = '5792bfaf981b65942017f8c801d117e8ed795118';
		$keys = $privateKey.$publicKey;
			
		$string = $timestamp.$keys;
			
		$md5 = hash('md5', $string);
			
		$curl = curl_init("http://gateway.marvel.com:80/v1/public/characters?offset=$offset&limit=$nbParPage&ts=$timestamp&apikey=$publicKey&hash=$md5");
			
		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); 
			
		$personnages = curl_exec($curl);
		curl_close($curl);

		$personnages = json_decode($personnages);

		return $personnages;
		return $nbParPage;
	}
}
 ?>