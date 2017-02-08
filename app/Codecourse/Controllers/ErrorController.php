<?php
namespace Codecourse\Controllers;

use Codecourse\Library\Controller;

class ErrorController extends Controller
{
	
	public function errorNotFound()
	{
		echo '
			<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
			<html><head>
			<title>404 Not Found</title>
			</head><body>
			<h1>Not Found</h1>
			<p>The requested URL /m.akber/ddd was not found on this server.</p>
			<hr>
			<address>Apache/2.4.23 (Win64) PHP/5.6.25 Server at localhost Port 80</address>
			</body></html>
			';
	}
}