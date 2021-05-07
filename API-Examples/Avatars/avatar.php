<?php
/*
  File Name: avatar.php
  Original Location: /avatar.php
  Description: Example Avatar.
  Author: Mitchell (Creaous)
  Copyright (C) RED7 STUDIOS 2021
*/

/*
NOTE:
We could use $_SERVER["DOCUMENT_ROOT"] here.
The only reason it isn't used is because...
The developer enviourment is using sub-directories.
I like using it because if I move files around...
I don't want to rename the things to make it work.

EXAMPLE:
include_once $_SERVER["DOCUMENT_ROOT"]. "/config.php";
*/

include_once "assets/config.php";

if(!isset($_SESSION)){
	// Initialize the session
	session_start();
}

if (isset($_GET["id"]))
{
	// Set the User ID.
	$id = $_GET["id"];
}
else
{
	// Set the User ID.
	$id = 2;
}

$data_avatar = file_get_contents($API_URL. '/avatar.php?key='. $API_KEY. '&api=getbyid&id='. $id);

// Decode the json response.
if (!str_contains($data_avatar, "Invalid Key"))
{
	$json_a_avatar = json_decode($data_avatar, true);

	// Bind the values to the correct variables.
	$hats = $json_a_avatar[0]['data'][0]['items'];
	$shirt = $json_a_avatar[0]['data'][0]['shirt'];
	$pants = $json_a_avatar[0]['data'][0]['pants'];
	$face = $json_a_avatar[0]['data'][0]['face'];
}
else
{
	// Feck your key.
	trigger_error("[API] The current API key specified is invalid or revoked. Please use a different key.");
	// Stop from attempting to load the rest of the page.
	exit;
}

?>

<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="The avatar editor.">
		<title>Avatar</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

		<style>
		#c {
			width: 50%;
			height: 50%;
		}
		</style>
	</head>
	<body class="text-center">
		<h2>Viewing <?php echo $id; ?>'s Avatar</h2>
		<p>Supply a ID get argument to view a certain persons avatar!</p>
		<canvas id="c"></canvas>
	</body>

	<?php include_once $DOCUMENT_ROOT_VAL. "assets/js/avatar-js.php"; ?>
</html>