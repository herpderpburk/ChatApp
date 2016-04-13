<?php

$db = new mysqli("database server","username","password","database");

if ($db->connect_error) {
	die(":( Uh-oh, a connection to the database couldn't be established.");
}

$username = stripslashes(htmlspecialchars($_GET['username'])); //prevents tags being added to usernames that can be executed on the server
$message = stripslashes(htmlspecialchars($_GET['message']));

if ($username == "" || $message == "") {
	die();
}
//adds the username and message into the database
$result = $db->prepare("INSERT INTO messages VALUES('',?,?)");
$result->bind_param("ss", $username, $message);
$result->execute();