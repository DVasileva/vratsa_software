<?php
include ('../includes/header.php');
?>
<form method="post" action="">
	<div class="form-group">
		<label>Your new category</label>
		<input class="form-control" type="text" name="category_name">
	</div>
</form>
	<button  class="btn btn-dark" type="submit">Save</button>



	<?php 
		if( isset( $_POST['category_name'] ) ){

			$category_name = $_POST['category_name'];
		    $category_id = $_POST['category_id'];

		$insert_query = "INSERT INTO `categories`(`category_id`,`category_name`) VALUES 
		('$category_id','$category_name')";

		$result = mysqli_query( $connection, $insert_query );


		if( $result ){
			echo "Record created successfuly!";
			header('Location: create.php');
		} else {
			die('Query failed!' . mysqli_error( $connection ));
		}



	}



$read_query = "SELECT * FROM categories WHERE `date_deleted` IS NULL";
$result_query = mysqli_query( $connection, $read_query ); 

if( mysqli_num_rows( $result_query ) > 0 ){

	
	?>

	<h1>Category list</h1>
	<table  class="table table-sm table-dark">
		<tr>
			<td>№</td>
			<td>Category Name</td>
		</tr>
	<?php
		$num = 1;
		while( $row = mysqli_fetch_assoc( $result_query) ){
			?>
			<tr>
				<td><?= $num ++ ?></td>
				<td><?= $row['category_name']?></td>		
			</tr>
			<?php
		}
		?>
	</table>

	<a href="../page_songs.php" class="btn btn-secondary btn-sm btn-dark" role="button">Back!</a>

	<?php

} else {
	die('Query failed!' . mysqli_error($connection));
}
?>


<?php  
include ('../includes/footer.php');
?>