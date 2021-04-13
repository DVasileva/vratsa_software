<?php
include ('includes/header.php');

$result_per_page = 6;
if (isset($_GET['page'])){
	$page = $_GET['page'];
}
else{
	$page = 1;
}
$get_total_rec_query = " SELECT COUNT(audio_file_id)  FROM audio_files WHERE date_deleted IS NULL";
$result = mysqli_query($connection, $get_total_rec_query);
$total_rows = mysqli_fetch_array($result);
$total_rows = $total_rows[0];
$offset = ($page - 1)*$result_per_page;


?>
<h1 class="font-italic">Welcome to i-Tunes!</h1>

<span>
	<p class="font-weight-light"> Please, <a href="register.php" class="btn btn-secondary btn-sm btn-dark" role="button">Sign up!</a></p>
	<p class="font-weight-light">Already a member? <a href="log_in.php" class="btn btn-secondary btn-sm btn-dark" role="button">Sign in!</a></p>
</span>




<?php
$read_query = "SELECT a.`audio_file_id`, a.`song_name`, a.  `performer`, a.`date_created`, u.`user_name`, a.`downloads`, a.`rating`, c.`category_name`  FROM `audio_files` a LEFT JOIN `users` u ON a.`user_id` = u.`user_id` LEFT JOIN `categories` c ON a. `category_id` = c.`category_id` WHERE a.`date_deleted` IS NULL ORDER BY a.`song_name` ASC LIMIT $result_per_page OFFSET $offset";

$result_query = mysqli_query( $connection, $read_query ); 

$max_pages = ceil($total_rows/$result_per_page);



if( mysqli_num_rows( $result_query ) > 0 ){

	?>

	<h1 class="font-italic text-center" >Songs list</h1>
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
				<td><?php echo (($page - 1) * $result_per_page + $num); $num++  ?></td>
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
	<p class="text-center">
		<a class="btn btn-sm btn-dark   <?= ($page == 1) ? 'disabled' : '' ?>"href="index.php?page=<?= ($page > 1 ) ? $page-1 : $page ?>">Previous</a>
		<?php
		for ($i=1; $i <= $max_pages ; $i++) { 
			echo "<a href='index.php?page=$i'>$i</a>";
		}
		?>
		<a class="btn btn-sm btn-dark   <?= ($page >= $max_pages) ? 'disabled' : '' ?>"href="index.php?page=<?= ($page < $max_pages) ? $page+1 : $page ?>">Next</a>
	</p> 

	<?php

} else {
	die('Query failed!' . mysqli_error($connection));
}
?>

<?php
include ('includes/footer.php');
?>