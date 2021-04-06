<?php
include ('includes/header.php');



?>
<h1>Welcome to i-Tunes!</h1>

	<span>
		<p> Please, <a href="register.php" class="btn btn-secondary btn-sm btn-dark" role="button">Sign up!</a></p>
		<p>Already a member? <a href="log_in.php" class="btn btn-secondary btn-sm btn-dark" role="button">Sign in!</a></p>
	</span>




<?php
$read_query = "SELECT a.`audio_file_id`, a.`song_name`, a.  `performer`, a.`date_created`, u.`user_name`, a.`downloads`, a.`rating`, c.`category_name`  FROM `audio_files` a LEFT JOIN `users` u ON a.`user_id` = u.`user_id` LEFT JOIN `categories` c ON a. `category_id` = c.`category_id` WHERE a.`date_deleted` IS NULL";

$result_query = mysqli_query( $connection, $read_query ); 

if( mysqli_num_rows( $result_query ) > 0 ){

	?>

	<h1>Songs list</h1>
	<table  class="table table-sm table-dark">
		<tr>
			<td>№</td>
			<td>Song Name</td>
			<td>Performer</td>
			<td>Created at</td>
			<td>User</td>
			<td>Downloads</td>
			<td>Rating</td>
			<td>Category</td>

		</tr>
	<?php
		$num = 1;
		while( $row = mysqli_fetch_assoc( $result_query) ){
			?>
			<tr>
				<td><?= $num ++ ?></td>
				<td><?= $row['song_name']?></td>	
				<td><?= $row['performer']?></td>	
				<td><?= $row['date_created']?></td>	
				<td><?= $row['user_name']?></td>
				<td><?= $row['downloads']?></td>	
				<td><?= $row['rating']?></td>	
				<td><?= $row['category_name']?></td>		
			</tr>
			<?php
		}
		?>
	</table>

	<?php

} else {
	die('Query failed!' . mysqli_error($connection));
}
?>

<?php
include ('includes/footer.php');
?>