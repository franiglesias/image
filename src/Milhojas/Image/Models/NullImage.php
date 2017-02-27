<?php

use Milhojas\Image\models\Image;
/**
* 
*/
class FiNullImage extends Image
{

	public function __construct()
	{
	}

	public function read()
	{
	}
	
	public function write()
	{
	}
	
	public function getType()
	{
		return null;
	}
}


?>