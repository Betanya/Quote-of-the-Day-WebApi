<?php
/*
	AppSmata by Jackson Siro
	http://www.github.com/jacksiro

	File: as_functions/as_base.php
	Description: Sets up AppSmata environment, plus many globally useful functions

*/

	// SITE FUNCTIONS 
	// Begin General Functions 
	
	define('AS_BASE', dirname(empty($_SERVER['SCRIPT_FILENAME']) ? __FILE__ : $_SERVER['SCRIPT_FILENAME']).'/');
	
	require 'as_content/as_aaindex.php';?>

