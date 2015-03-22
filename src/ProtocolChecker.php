<?php

namespace CorsDemo;

class ProtocolChecker
{
	const HTTP  = 'http';
	const HTTPS = 'https';

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
		$protocol = $this->app->request->getScheme();

		switch ($route->getName()) {
			case 'index':
				if ($protocol !== self::HTTP) {
					$this->handleInvalidProtocol();
				}
				break;
			case 'login':
				if ($protocol !== self::HTTPS) {
					$this->handleInvalidProtocol();
				}
				break;
			case 'get-data':
				if ($protocol !== self::HTTPS) {
					$this->handleInvalidProtocol();
				}
				break;
		}
	}

	public static function check(\Slim\Route $route)
	{
		self::create()->_check($route);
	}

	private function handleInvalidProtocol()
	{
		$this->app->halt(426, 'Invalid protocol!');
	}
}
