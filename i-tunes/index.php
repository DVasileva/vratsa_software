<?php
include ('includes/header.php');

session_start();
?>
<h1>Welcome to i-Tunes!</h1>
	<h2> Please sign in</h2>
<div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<form action="" method="post" accept-charset="utf-8">

					<div class="form-group">
						<label for='email'>Username</label>
						<input class="form-control" id="user_name" type="text" name="user_name" value="">
					</div>

					<div class="form-group">
						<label for='password'>Password</label>
						<input class="form-control" id="password" type="text" name="password" value="">
					</div>

					<button  class="btn btn-primary" type="submit">Sign in</button>
				</form>
			</div>
		</div>


<?php
	$error = 0;

	if(isset($_POST['password'])){
		$password = $_POST['password'];
		if(strlen($password) < 3){
			echo "<p>Password be min 3 characters</p>";
			$error++;
		}
	}
	else{
		$error++;
	}

	if(isset($_POST['user_name'])){
		$username = $_POST['user_name'];

	}
	else{
		$error++;
	}

if($error > 0){
		echo "<p>Error/s found! Please check input data!</p>";
	}
	else{
		$stmt = $connection->prepare("SELECT user_name FROM users WHERE user_name =? AND password =?");
		$stmt->bind_param("is",$username,$password);
		$stmt->execute();
		$result = $stmt->get_result();
		$result = $result->fetch_assoc();


if($result){

			if(isset($result['user_name'])){
				echo "Logged!";
				$_SESSION['logged_user_name'] = $username;
				//header('Location: messages.php');
			}
			else{
				echo "Please check username/password!";
			}

		}
		else {
			die('Insert qurey failed! Error: '.mysqli_error($connection));
		}
	}




?>

	</div>
</div>


<?php

$read_query = "SELECT a.`audio_file_id`, a.`song_name`, a.  `performer`, a.`date_created`, u.`user_name`, a.`downloads`, a.`rating`, c.`category_name`  FROM `audio_files` a LEFT JOIN `users` u ON a.`user_id` = u.`user_id` LEFT JOIN `categories` c ON a. `category_id` = c.`category_id` WHERE a.`date_deleted` IS NULL";

$result_query = mysqli_query( $connection, $read_query ); 

if( mysqli_num_rows( $result_query ) > 0 ){

	?>

	<h1>Songs list</h1>
	<table  class="table table-sm table-dark">
		<tr>
			<td>#</td>
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