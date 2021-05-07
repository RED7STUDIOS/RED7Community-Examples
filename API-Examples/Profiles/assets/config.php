<?php
/*
  File Name: config.php
  Original Location: /assets/config.php
  Description: The config for the project.
  Author: Mitchell (Creaous)
  Copyright (C) RED7 STUDIOS 2021
*/

// Our API URL, the default is the RED7Community one.
$API_URL = "https://community.cldm.ml/API";
// The API key for that API URL.
$API_KEY = "OpenSourceIsSuperCool";

// Use document root in references to other php files.
// Keep it off if using within some subdirectories.
// KEEP IN MIND: this file will not use document root.
$ENABLE_DOCUMENT_ROOT = false;

// Our Storage URL, the default is the one that RED7Community uses.
$STORAGE_URL = "https://cdn.jsdelivr.net/gh/RED7Studios/RED7Community-CDN@main";

//ini_set('session.save_path', 'D:\OneDrive - redsevenstudios.com\Users\Mitchell\Desktop\CommunitySite\Open-Source Examples\Sessions');


// DO SOME PROCESSING FOR THE OPTIONS



// DOCUMENT ROOT ENABLING STUFF
if ($ENABLE_DOCUMENT_ROOT == true)
{
	// Append DOCUMENT ROOT with the SLASH.
	$DOCUMENT_ROOT_VAL = $_SERVER["DOCUMENT_ROOT"]. "/";
}
else
{
	// Keep it without anything.
	$DOCUMENT_ROOT_VAL = "";
}

if (!function_exists('str_contains')) {
	function str_contains(string $haystack, string $needle): bool
	{
		return '' === $needle || false !== strpos($haystack, $needle);
	}
}
?>