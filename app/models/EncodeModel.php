<?php

class EncodeModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper('file');  
	}
	
	//Zamiana wprowadzonego tekstu na tabele
	public function convertStringToArray(string $text) : array
	{
		$text = strtoupper($text);
		return str_split($text);
	}
	
	//Pobranie alfabetu
	public function getAlphabet() : array
	{
		$alphabet = file_get_contents(base_url().'attachments/alphabet.txt');
		$alphabet = explode(PHP_EOL, $alphabet);
		
		$newAlphabet = [];
		for ($i = 0; $i < count($alphabet); $i++)
		{
			$letter = $alphabet[$i];
			$newAlphabet[$i] = explode(" ", $letter);	
		}
		return $newAlphabet;
	}
	
	//Zamiana litery na kod morsa
	public function convertLetterToMorseCode(string $text, array $arrayAlphabet) : string
	{
		$newText = '';
		foreach ($arrayAlphabet as $item)
		{
			if ($item[0] == $text)
			{
				$newText .= $item[1].' ';
			}
		}
		return $newText;
	}

	
}
