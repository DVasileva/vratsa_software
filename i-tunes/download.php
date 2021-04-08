<?php
include ('includes/db_connection.php');

$audio_file_id = $_GET['id'];

$read_query ="SELECT `audio_file` FROM `audio_files` WHERE `audio_file_id`=" . $audio_file_id . "LIMIT 1"; 
//var_dump($read_query);

$result = mysqli_query($connection, $read_query);

if ($result) {
	$audio_file = mysqli_fetch_assoc($result);
}

header("Content-Description: File Transfer");
header("Content-Type: audio/mpeg");
header("Content-Disposition: attachment; filename=". basename( $audio_file['audio_file'] ) );
header("Expires: 0");
header("Cache-Control: must-revalidate");
header("Pragma: public");
header("Content-Length: ". filesize($audio_file['audio_file']));
ob_clean();
flush();
readFile( $audio_file['audio_file'] );

