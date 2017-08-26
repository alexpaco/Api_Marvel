<?php 
	
namespace AP\PersonnagesBundle\Services;

class Personnages
{
	private $publicKey;
	private $privateKey;

	public function __construct($publicKey, $privateKey)
	{
		$this->publicKey = $publicKey;
		$this->privateKey = $privateKey;
	}

	public function all($offset, $nbParPage)
	{

		$timestamp = 'date.timestamp()';
		$md5 = hash('md5', $timestamp.$this->privateKey.$this->publicKey);
			
		return json_decode($this->fetch("http://gateway.marvel.com/v1/public/characters?offset=$offset&limit=$nbParPage&ts=$timestamp&apikey=$this->publicKey&hash=$md5"));
		

		 
	}

	public function one($id)
	{
		$timestamp = 'date.timestamp()';
		$md5 = hash('md5', $timestamp.$this->privateKey.$this->publicKey);


		return json_decode($this->fetch("http://gateway.marvel.com/v1/public/characters/$id?offset=$offset&limit=$nbParPage&ts=$timestamp&apikey=$this->publicKey&hash=$md5"));
	}

	public function fetch($curl)
	{
		$curl = curl_init($curl);

		curl_setopt($curl, CURLOPT_HEADER, 0);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);

		$personnages = curl_exec($curl);
		curl_close($curl);

		return $personnages;
	}
}
 ?>