<?php

namespace CorsDemo;

class HeaderHelper
{
	public function setHeaders(\Slim\Slim $app)
	{
		$app->response->headers->set('Access-Control-Allow-Origin', 'http://' . $app->request->getHost());
		$app->response->headers->set('Access-Control-Allow-Credentials', 'true');
		$app->response->headers->set('Content-Type', 'application/json');
	}
}
