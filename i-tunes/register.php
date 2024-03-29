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
						<label for='username'>Username</label>
						<input class="form-control" id="user_name" type="text" name="user_name" placeholder= "Enter username" required>
					</div>
					<div class="form-group">
						<label for='password'>Password</label>
						<input class="form-control" id="password" type="password" name="password" placeholder="Enter password" required>
					</div>
					<button  class="btn btn-dark" type="submit">Sign up</button>	
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
			if(strlen($username) < 3){
				echo "<p>Username must be min 3 characters</p>";
				$error++;
			}
		}

		else{
			$error++;
		}

		if($error > 0){
			echo "<p>Error/s found! Please check input data!</p>";
		}

		else{

			$user_check_query = "SELECT * FROM users WHERE user_name='$username'  LIMIT 1";
			$result = mysqli_query($connection, $user_check_query);
			$user = mysqli_fetch_assoc($result);

			if ($user !== null && ['user_name']!== $username) {
				echo "Username already exists!";
				$error++;
			}
			
			if($error > 0){
				echo "<p>Error/s found! Please check input data!</p>";
			}

			else{

				$hashed_password = password_hash($password, PASSWORD_DEFAULT );

				$insert_query = "INSERT INTO `users` (`user_name`, `password`) VALUES ('$username', '$hashed_password')";
				
				if ($connection->query($insert_query) === TRUE) {
					$last_id = $connection->insert_id;
					echo "You are now logged in!";
					$_SESSION = [];
					$_SESSION['reg_user'] = $username;
					$_SESSION['logged_user'] = $username;
					$_SESSION['logged_user_id'] =  $last_id;
					header('Location: page_songs.php');
				} else {
					echo "Error: " . $insert_query . "<br>" . $connection->error;
				}
			}
		}
		?>

		<?php
		include ('includes/footer.php');
		?>