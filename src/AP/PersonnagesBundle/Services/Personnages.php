<?php 
	
namespace AP\PersonnagesBundle\Services;

class Personnages
{
	public function Affiche($offset, $nbParPage, $public, $private)
	{

		$timestamp = 'date.timestamp()';
		$keys = $private.$public;	
		$string = $timestamp.$keys;
			
		$md5 = hash('md5', $string);
			
		$curl = curl_init("http://gateway.marvel.com/v1/public/characters?offset=$offset&limit=$nbParPage&ts=$timestamp&apikey=$public&hash=$md5");
			
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