<?php 

/**
* 
*/
class Bootstrap
{
	
	function __construct()
	{
		$url = explode('/', rtrim($_GET['url'], '/'));
		// print_r($url);

		$file = 'controllers/' . $url[0] . '.php';
		if (file_exists($file)) {
			require $file;
		} else {
			require 'controllers/error.php';
			$controller = new Error();
			return false;
		}
		$contoller = new $url[0];

		if (isset($url[2])) {
			$contoller->{$url[1]}($url[2]);
		} else {
			if (isset($url[1])) {
				$contoller->{$url[1]}();
			}
		}
	}
}

 ?>