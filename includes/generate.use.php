<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);

class generate{

	function RandomString($length) {

		$this->keys = array_merge(range(0,9), range('a', 'z'));

		for($i=0; $i < $length; $i++) {
		    $this->key .= $this->keys[array_rand($this->keys)];
		}
		return $this->key;
	}
}

?>

