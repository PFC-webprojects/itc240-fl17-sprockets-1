<?php  //  Make sure that PHP is the very first character in the file.  Otherwise just one whitespace character will get interpreted as HTML, causing the header to get sent right away.
	/*
	config.php

	Stores configuation information for our web application

	*/

	
	//  Eliminates a common error in PHP:  "Header already sent".  The file will go into a buffer; the header will not get sent right away.  Place it first thing after the PHP tag.
	ob_start();

	define('DEBUG', true); #we want to see all errors

	include 'credentials.php';  //  Stores database logon credentials
	include 'common.php';  //  Stores favorite procedures for use throughout the website
	
	//  Prevents date errors
	date_default_timezone_set('America/Los_Angeles');
	
	//  Create config object.
	$config = new stdClass; //  An object variable.  stdClass is actually a struct, rather than a true class with inheritance and all.
	
	//  Create default page identifier.
	define('THIS_PAGE', basename($_SERVER['PHP_SELF']));  //  Creates a constant (with global scope).
	
	
	//  Set website defaults.
	$config->title = THIS_PAGE;  //  By default, in case we forget it in the switch below, at least this page will be named by its file name.
	$config->banner = 'Sprockets';
	
	switch(THIS_PAGE) {
		case 'contact.php':
			$config->title = 'Contact Page';
			break;
		case 'blog.php':
			$config->title = 'Blog Page';
			break;
		case 'index.php':
			$config->title = 'Index Page';
			break;
		case 'about.php':
			$config->title = 'About Page';
			break;
	}
//	echo THIS_PAGE;
//	die;  //  The next-best thing to a break point, for troubleshooting purposes
	
	?>