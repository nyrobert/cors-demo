<?php

require 'vendor/autoload.php';

$session = new \CorsDemo\SessionHandler();
$session->start();

$app = new \Slim\Slim();

$protocolChecker      = [new \CorsDemo\ProtocolChecker($app), 'check'];
$requestMethodChecker = [new \CorsDemo\RequestMethodChecker($app), 'check'];

$app->get('/', $protocolChecker, function () use ($app) {
	$app->render('index.template.php');
})->name('index');

$app->post('/login', $protocolChecker, $requestMethodChecker, function () use ($app, $session) {
	(new \CorsDemo\HeaderHelper())->setHeaders($app);

	$session->set('user', 'Robi');

	$app->response->body(
		json_encode(
			array(
				'user'    => $session->get('user'),
				'success' => true
			)
		)
	);
})->name('login');

$app->post('/logout', $protocolChecker, $requestMethodChecker, function () use ($app, $session) {
	(new \CorsDemo\HeaderHelper())->setHeaders($app);

	$session->destroy();

	$app->response->body(
		json_encode(
			array('success' => true)
		)
	);
})->name('logout');

$app->get('/get-data', $protocolChecker, function () use ($app, $session) {
	(new \CorsDemo\HeaderHelper())->setHeaders($app);

	$app->response->body(
		json_encode(
			array(
				'user'    => $session->get('user'),
				'success' => true
			)
		)
	);
})->name('get-data');

$app->run();
