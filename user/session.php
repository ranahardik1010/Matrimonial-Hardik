<?php

	session_start();

	$_SESSION["name"]="hardik";
	$_SESSION["email"]="hardik@gmail.com";
	$_SESSION["pass"]="addweb123";

	echo $_SESSION["name"]."<br>";
	echo $_SESSION["email"]."<br>";
	echo $_SESSION["pass"];

?>