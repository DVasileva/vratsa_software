<?php
include ('includes/db_connection.php');

$audio_file_id = $_GET['audio_file_id'];

$read_query ="SELECT `song_name`,`performer`, `audio_file` FROM `audio_files` WHERE `audio_file_id`=" . $audio_file_id . "LIMIT 1"; 
var_dump($read_query);

