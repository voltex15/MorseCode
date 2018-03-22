<?php

class Encode extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('EncodeModel');
	}
	
	public function encode()
	{
		$text = $this->input->post();
		$text = $text['code'];
		
		$textArray = $this->EncodeModel->convertStringToArray($text);
		
		$alphabet = $this->EncodeModel->getAlphabet();
		
		$morseCode = '';
		foreach ($textArray as $oneSymbol)
		{
			$morseCode .= $this->EncodeModel->convertLetterToMorseCode($oneSymbol, $alphabet);
		}
		
		$data['morseCode'] = $morseCode;
		$this->load->view('MorseCode', $data);
	}
}
