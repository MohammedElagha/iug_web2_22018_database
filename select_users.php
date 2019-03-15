<!-- SELECT and view in table -->

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
		<div class="col-12">
			<table class="table bordered-table">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Phone</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$connection = DBConnection::get_instance()->get_connection();

					$sql = "SELECT * FROM users_1";	
					// for prepared: $mysqli->real_escape_string of the query parameter

					$result = $connection->query($sql);

					if ($result->num_rows > 0) {
						while($row = $result->fetch_assoc()) {
							echo '<tr>
								<td>' . $row["id"] . '</td>
								<td>' . $row["name"] . '</td>
								<td>' . $row["phone"] . '</td>
							</tr>';
						}
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>
