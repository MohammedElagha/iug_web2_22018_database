<!-- The same code can be used with UPDATE and DELETE -->

<?php

include_once('connection.php');

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
		<?php
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
			if (isset($_POST['user_name']) && isset($_POST['user_phone'])) {
				$name = $_POST['user_name'];
				$phone = $_POST['user_phone'];

				$connection = DBConnection::get_instance()->get_connection();
				$stmt = $connection->prepare("INSERT INTO users_1 (name, phone) VALUES (?, ?)");
				$stmt->bind_param("si", $name, $phone);

				$result = $stmt->execute();

				if ($result) {
		    		echo '<div class="col-12"><div class="alert alert-success">User Added Successfully</div></div>';
				} else {
		    		echo '<div class="col-12"><div class="alert alert-danger">Failed to Add User</div></div>';
				}

				$stmt->close();
				$connection->close();
			}
		}
		?>

		<form method="POST" action="">
			<div class="form-group">
				<label for="user-name">Name</label>
			    <input type="text" name="user_name" class="form-control" id="user-name" placeholder="User Name">
			</div>

			<div class="form-group">
				<label for="user-phone">Phone</label>
			    <input type="number" name="user_phone" class="form-control" id="user-phone" placeholder="User phone">
			</div>

			<button type="submit" class="btn btn-primary">Add</button>
		</form>
	</div>
</body>
</html>
