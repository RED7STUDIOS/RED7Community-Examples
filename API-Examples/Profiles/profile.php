<?php
/*
  File Name: profile.php
  Original Location: /profile.php
  Description: Example Profile.
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

$data_user = file_get_contents($API_URL. '/user.php?key='. $API_KEY. '&api=getbyid&id='. $id);

// Decode the json response.
if (!str_contains($data_user, "Invalid Key"))
{
	$json_a_user = json_decode($data_user, true);

	$username = $json_a_user[0]['data'][0]['username'];
	$displayname = $json_a_user[0]['data'][0]['displayname'];
	$description = $json_a_user[0]['data'][0]['description'];
	$created_at = $json_a_user[0]['data'][0]['created_at'];
	$lastLogin = $json_a_user[0]['data'][0]['lastLogin'];
	$lastLoginDate = $json_a_user[0]['data'][0]['lastLoginDate'];
	$currency = $json_a_user[0]['data'][0]['currency'];
	$badges = $json_a_user[0]['data'][0]['badges'];
	$items = $json_a_user[0]['data'][0]['items'];
	$membership = $json_a_user[0]['data'][0]['membership'];
	$isBanned = $json_a_user[0]['data'][0]['isBanned'];
	$bannedReason = $json_a_user[0]['data'][0]['bannedReason'];
	$bannedDate = $json_a_user[0]['data'][0]['bannedDate'];
	$isAdmin = $json_a_user[0]['data'][0]['isAdmin'];
	$isVerified = $json_a_user[0]['data'][0]['isVerified'];
	$followers = $json_a_user[0]['data'][0]['followers'];
	$following = $json_a_user[0]['data'][0]['following'];
	$clans = $json_a_user[0]['data'][0]['clans'];
	$icon = $json_a_user[0]['data'][0]['icon'];
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
		<meta name="description" content="The users profile.">
		<title>User</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

		<style>
		#c {
			width: 50%;
			height: 50%;
		}
		</style>
	</head>
	<body class="text-center">
		<h2>Viewing <?php echo $id; ?>'s Profile</h2>
		<p>Supply a ID get argument to view a certain persons profile!</p>

		<h2>Data</h2>
		<p><b>ID:</b> <?php echo $id; ?></p>
		<p><b>Username:</b> <?php echo $username; ?></p>
		<p><b>Display Name:</b> <?php echo $displayname; ?></p>
		<p><b>Description:</b> <?php echo $description; ?></p>
		<p><b>Created At:</b> <?php echo $created_at; ?></p>
		<p><b>Last Login:</b> <?php echo $lastLogin; ?></p>
		<p><b>Last Login Date:</b> <?php echo $lastLoginDate; ?></p>
		<p><b>Currency:</b> <?php echo $currency; ?></p>
		<p><b>Badges:</b> <?php echo $badges; ?></p>
		<p><b>Items:</b> <?php echo $items; ?></p>
		<p><b>Membership:</b> <?php echo $membership; ?></p>
		<p><b>Is Banned:</b> <?php echo $isBanned; ?></p>
		<p><b>Banned Reason:</b> <?php echo $bannedReason; ?></p>
		<p><b>Banned Date:</b> <?php echo $bannedDate; ?></p>
		<p><b>Is Admin:</b> <?php echo $isAdmin; ?></p>
		<p><b>Is Verified:</b> <?php echo $isVerified; ?></p>
		<p><b>Followers:</b> <?php echo $followers; ?></p>
		<p><b>Following:</b> <?php echo $following; ?></p>
		<p><b>Clans:</b> <?php echo $clans; ?></p>
		<p><b>Icon:</b> <?php echo $icon; ?></p>
	</body>
</html>