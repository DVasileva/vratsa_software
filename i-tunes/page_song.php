<?php
include ('includes/header.php');

session_start();
if (!isset($_SESSION['reg_user'])) {
	header('Location: index.php');
}

$reg_user = $_SESSION['reg_user'];

$read_query = "SELECT a.`audio_file_id`, a.`song_name`, a.  `performer`, a.`date_created`, u.`user_name`, a.`downloads`, a.`rating`, c.`category_name`  FROM `audio_files` a LEFT JOIN `users` u ON a.`user_id` = u.`user_id` LEFT JOIN `categories` c ON a. `category_id` = c.`category_id` WHERE a.`date_deleted` IS NULL";

$result_query = mysqli_query( $connection, $read_query ); 

if( mysqli_num_rows( $result_query ) > 0 ){

	?>
	<h2>Hello, <?= $reg_user ?> !</h2>
	<p>you are now logged in</p>
	 <p><a href="create.php" class="btn btn-secondary btn-sm btn-dark" role="button">Add new song!</a></p>
	  <p><a href="categories/create.php" class="btn btn-secondary btn-sm btn-dark" role="button">Add new category!</a></p>
	  <h3>Songs list</h3>
	<table  class="table table-sm table-dark">
		<tr>
			<td>№</td>
			<td>Song Name</td>
			<td>Performer</td>
			<td>Created at</td>
			<td>User</td>
			<td>Downloads</td>
			<td>Dowload song</td>
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
				<td><a href="download.php?id=<?= $row['audio_file_id']?>"class= "btn btn-outline-success ">Dowload</td>	
				<td><?= $row['rating']?></td>	
				<td><?= $row['category_name']?></td>		
			</tr>
			<?php
		}
		?>
	</table>

	<a href="index.php" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Log out!</a>

	<?php

} else {
	die('Query failed!' . mysqli_error($connection));
}

include ('includes/footer.php');
?>