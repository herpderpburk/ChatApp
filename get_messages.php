<?php

$db = new mysqli("database server","username","password","database");

if ($db->connect_error) {
	die(":( Uh-oh, a connection to the database couldn't be established.");
}
$username = stripslashes(htmlspecialchars($_GET['username']));
$result = $db->prepare("SELECT * FROM messages");
$result->bind_param("s", $username);
$result->execute();
$result = $result->get_result();
while ($r = $result->fetch_row()) {
	echo $r[1];
	echo "\\";
	echo $r[2];
	echo "\n";