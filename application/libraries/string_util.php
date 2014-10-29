<?php
class String_util {
	
	/*
	 * Usage: $this->lastIndexOf($filename, '.'); 
	 */
	public function lastIndexOf($f_haystack,$f_needle) {
      $rev_str = strrev($f_needle);
      $rev_hay = strrev($f_haystack);
      $hay_len = strlen($f_haystack);
      $ned_pos = strpos($rev_hay,$rev_str);
      $result  = $hay_len - $ned_pos - strlen($rev_str);
      return $result;
    }
    
	public function generateImageName($originalName)
	{
		$ext = substr($originalName,$this->lastIndexOf($originalName, '.'), strlen($originalName));
		
		$t = time();
		$r = rand(1,100);

		$name = $t.$r.$ext;
		
		return $name;
	}    
	
	
}