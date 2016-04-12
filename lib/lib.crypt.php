<?php
class PlanetEncryption{
	var $key = '';
	private $key_size = 0;
	private $iv_size = 0;
	private $iv = null;

	function PlanetEncryption($key = '')
	{
		if($key != '')
		{
			$key = str_pad($key, 32, chr(0));
			$key = substr($key, 0, 32);
			$this->key = pack('H*', bin2hex($key));
			$this->key_size = strlen($key);

			$this->iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
			$this->iv = mcrypt_create_iv($this->iv_size, MCRYPT_RAND);

		}
	}
	function Encrypt($text)
	{
		$result = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $this->key, $text, MCRYPT_MODE_CBC, $this->iv);
		$result = $this->iv . $result;
		return $result;
	}
	function Decrypt($text)
	{
		$this->iv_dec = substr($text, 0, $this->iv_size);
		
		$text = substr($text, $this->iv_size);
	
		$result = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $this->key, $text, MCRYPT_MODE_CBC, $this->iv_dec);
		return $result;
	}
}
?>