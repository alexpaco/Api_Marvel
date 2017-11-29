<?php 
	
namespace AP\PersonnagesBundle\Services;

class Personnages
{
	private $publicKey;
	private $privateKey;
	private $curl;

	public function __construct($publicKey, $privateKey, $curl)
	{
		$this->publicKey = $publicKey;
		$this->privateKey = $privateKey;
		$this->curl = $curl;
	}

	public function all($offset, $nbParPage)
	{

		$timestamp = 'date.timestamp()';
		$md5 = hash('md5', $timestamp.$this->privateKey.$this->publicKey);
			
		return json_decode($this->curl->url("http://gateway.marvel.com/v1/public/characters?offset=$offset&limit=$nbParPage&ts=$timestamp&apikey=$this->publicKey&hash=$md5")); 
	}

	public function one($id)
	{
		$timestamp = 'date.timestamp()';
		$md5 = hash('md5', $timestamp.$this->privateKey.$this->publicKey);


		return json_decode($this->curl->url("http://gateway.marvel.com/v1/public/characters/$id?ts=$timestamp&apikey=$this->publicKey&hash=$md5"));
	}
}
?>
