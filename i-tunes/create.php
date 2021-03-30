<?php
include('includes/header.php');
?>
<h1>Add new song</h1>
	<form action="" method="post">
		<div class="form-grop">
			<label>Song name</label>
			<input class="form-control" type="text" name="song_name">
		</div>

		<div class="form-grop">
			<label>Performer</label>
			<input class="form-control" type="text" name="performer">
		</div>
		<div class="form-grop">
			<?php 
				$category_query = "SELECT * FROM `categories` WHERE `date_deleted` IS NULL";
				$categories =  mysqli_query( $connection, $category_query );

			?>
			<label>Category</label>
			<select name="category_id">
				<option value="">-Select Category-</option>
				<?php 
					while ( $category = mysqli_fetch_assoc( $categories ) ){
				?>
				<option value="<?= $category['category_id']?>"><?= $category['category_name'];?>		
				</option>
				<?php
					}
				
				?>
				</select>
	</div>


		<div class="form-grop">
			<label>Rating 1-5</label>
			<input class="form-control" type="text" name="rating">
		</div>

		<button class="btn btn-success">Save</button>
	</form>
<?php 

if( isset( $_POST['song_name'] ) ){

	$song_name = $_POST['song_name'];
	$performer = $_POST['performer'];
	$rating = $_POST['rating'];

	$insert_query = "INSERT INTO `audio_files`(`song_name`, `performer`, `rating`) VALUES ('$song_name',$performer,$rating)";

	$result = mysqli_query( $connection, $insert_query );


	if( $result ){
		echo "Recorded created successfuly";
	} else {
		die('Query failed!' . mysqli_error( $connection ));
	}


}
?>


<?php
include('includes/footer.php');
?>
