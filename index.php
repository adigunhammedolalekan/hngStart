<?php 

	
	function connect() {
		require dirname(__FILE__) . '/config.php';

		$url = "mysql:host=".$config['db_host'] . ";dbname=".$config['db_name'];
		try{
			$pdo = new PDO($url, $config['username'], $config['password']);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

			return $pdo;
		}catch(Exception $e) {
			die("Error ".$e->getMessage());
			return NULL;
		}
	}
	$db = connect();
	$query = "SELECT * FROM users ORDER BY user_id ASC";
	$statement = $db->prepare($query);
	$statement->execute();
	while ($row = $statement->fetch()) {
		echo "<b>#" .$row['user_id']. "</b>      ";
		echo "Username => <b>" .$row['username']. "</b><br>";
		echo "Email => <b>" .$row['email']. "</b><br>";
	}

	echo "<br><br>Yay!";
?>