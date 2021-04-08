<?php
include('includes/header.php');
?>
<h1>Add new song</h1>
<div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<form action="" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label>Song name</label>
						<input class="form-control" type="text" name="song_name">
					</div>

					<div class="form-group">
						<label>Performer</label>
						<input class="form-control" type="text" name="performer">
					</div>
					<div class="form-group">
						<?php 
						$category_query = "SELECT * FROM `categories` WHERE `date_deleted` IS NULL";
						$categories =  mysqli_query( $connection, $category_query );

						?>
						<label>Category</label>
						<select name="category_id" required>
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

				<div class="form-group">
					<label for="audio_file">Upload file</label>
					<input type="file" id="audio_file" name="audio_file" value="">
				</div>

				<button class="btn btn-dark">Save</button>
				<a href="page_songs.php" class="btn btn-secondary btn-sm btn-dark" role="button">Go back!</a>
			</form>
		</div>
	</div>
	<?php 
	$current_date = date('Y-m-d H:i:s');
		if( isset( $_POST['song_name'] )  ){

			$song_name = $_POST['song_name'];
			$performer = $_POST['performer'];
		    $category_id = $_POST['category_id'];

		$insert_query = "INSERT INTO `audio_files`(`song_name`, `performer`, `date_created`, `category_id`) VALUES (
		'$song_name','$performer','$current_date', '$category_id')";

		$result = mysqli_query( $connection, $insert_query );


		if( $result ){
			echo "Record created successfuly!";
		} else {
			die('Query failed!' . mysqli_error( $connection ));
		}



	}
	?>
</div>
</div>

<?php
include('includes/footer.php');
?>
