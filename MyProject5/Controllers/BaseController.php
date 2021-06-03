<?php
namespace Controllers;

use Jenssegers\Blade\Blade;
use Middleware\AuthCheck;

class BaseController
{
	use AuthCheck;
	protected $baseurl = '/MyProject5';

	public function renderBlade($blade_file, $data = [])
	{
		$blade = new Blade('views', 'cache');
		echo $blade->render($blade_file, array_merge($data, ['baseur' => $this->baseurl]));
	}
}