<?php

namespace CorsDemo;

class RequestMethodChecker
{
	/**
	 * @var \Slim\Slim
	 */
	private $app;

	public function __construct(\Slim\Slim $app)
	{
		$this->app = $app;
	}

	public static function create()
	{
		return new self(
			\Slim\Slim::getInstance()
		);
	}

	public function _check(\Slim\Route $route)
	{
		switch ($route->getName()) {
			case 'login':
				if (!$this->app->request->isPost()) {
					$this->handleInvalidRequestMethod();
				}
				break;
		}
	}

	public static function check(\Slim\Route $route)
	{
		self::create()->_check($route);
	}

	private function handleInvalidRequestMethod()
	{
		$this->app->halt(405, 'Invalid request method!');
	}
}
