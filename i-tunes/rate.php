<?php
include ('includes/header.php');

session_start();


$audio_file_id = $_GET['id'];

?>



<h2>How would you rate this song?</h2>
	<form action="" method="post">

		<input type="radio" id="1" name="rating" value="1">
 		 <label for="1">1</label><br>
 		 <input type="radio" id="2" name="rating" value="2">
 		 <label for="2">2</label><br>
  		 <input type="radio" id="3" name="rating" value="3">
  		 <label for="3">3</label><br>
  		 <input type="radio" id="4" name="rating" value="4">
 		 <label for="4">4</label><br>
 		 <input type="radio" id="5" name="rating" value="5">
  		 <label for="5">5</label><br>
  		 <button  class="btn btn-dark" type="submit" name="submit">Save Your Rate</button>
	</form>

<?php
if (isset($_POST['submit'])) {

	$rate = $_POST['rating'];
	$user_id = $_SESSION['logged_user_id'];

//select * from ratings where user _id = $user_id

	//if result
	//update ;
	//else insert 

$rate_query = "INSERT INTO `ratings`( `audio_file_id`, `user_id`, `rate`) VALUES ( $audio_file_id, $user_id, $rate)";

	$result_rate = mysqli_query($connection, $rate_query);
		if($result_rate){
		echo "Your rate was successfull!";
		header("Location: page_songs.php");
	} else {
		die('Query failed!' . mysqli_error($connection));
	}
}
?>


<?php
include ('includes/footer.php');
?>