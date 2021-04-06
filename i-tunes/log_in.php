<?php
include ('includes/header.php');
session_start();
?>
<div>
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<form action="" method="post" accept-charset="utf-8">

					<div class="form-group">
						<label for='email'>Username</label>
						<input class="form-control" id="user_name" type="text" name="user_name" required>
					</div>

					<div class="form-group">
						<label for='password'>Password</label>
						<input class="form-control" id="password" type="text" name="password" required>
					</div>

					<button  class="btn btn-dark" type="submit">Sign in</button>
				</form>
			</div>
		</div>

<?php



	$error = 0;

	if(isset($_POST['password'])){
		$password = $_POST['password'];
		
		if(strlen($password) < 3){
			echo "<p>Password must be min 3 characters</p>";
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

		$get_query = "SELECT user_name from `users` WHERE user_name = '$username' AND password = '$password'";
		$result = mysqli_query($connection, $get_query);
		
if($result){
	$num_records = mysqli_num_rows($result);
		if ($num_records > 0 ) {
			echo "Logged";
			$_SESSION['logged_user'] = $username;
			header('Location: page_songs.php');
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
include ('includes/footer.php');
?>