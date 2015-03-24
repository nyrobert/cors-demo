<?php

namespace CorsDemo;

class SessionHandler
{
	public function start()
	{
		ini_set('session.cookie_httponly', '1');
		ini_set('session.cookie_secure', '1');

		if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
			session_start();
		}
	}

	public function get($name)
	{
		if (isset($_SESSION[$name])) {
			return $_SESSION[$name];
		}
		return null;
	}

	public function set($name, $value)
	{
		$_SESSION[$name] = $value;
	}

	public function kill()
	{
		setcookie(session_name(), '', time() - 3600, '/', null, true, true);
		session_unset();
		session_destroy();
		$_SESSION = array();
	}
}
