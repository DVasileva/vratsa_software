<?php

$connection = mysqli_connect('localhost', 'root', '', 'i-tunes');

if( !$connection ){
	die('Connection failed' . mysqli_connect_error() . ' - '. mysqli_connect_errno());
} else {
	echo "Connected successfully!";
}