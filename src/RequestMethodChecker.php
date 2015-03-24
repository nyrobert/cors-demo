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

	public function check(\Slim\Route $route)
	{
		switch ($route->getName()) {
			case 'login':
				if (!$this->app->request->isPost()) {
					$this->handleInvalidRequestMethod();
				}
				break;
		}
	}

	private function handleInvalidRequestMethod()
	{
		$this->app->halt(405, 'Invalid request method!');
	}
}
