<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Manifester</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
		<?php 

		//--Get DB Connection Details from Environmental Variables
			$env_array = json_decode($_ENV["VCAP_SERVICES"],true);
			$mysql_u = $env_array['p-mysql'][0]['credentials']['username'];
			$mysql_p = $env_array['p-mysql'][0]['credentials']['password'];
			$mysql_c = $env_array['p-mysql'][0]['credentials']['hostname'];

		//--Open a connection to the DB
			$mysql_conn = new mysqli($mysql_c, $mysql_u, $mysql_p);


		//--Grab and stash the manifest
			if(isset($_POST["manifest"]))
				{
					$manifest = $_POST["manifest"];
				}
			else
				{
					echo "DANGER WILL ROBINSON - MANIFEST NOT DETECTED"; 
					exit;
				}
			if(isset($_POST["name"]))
				{
					$name = $_POST["name"];
				}
			if(isset($_POST["notes"]))
				{
					$notes = $_POST["notes"];
				}
		//--Troubleshooting Code Snippets
				error_reporting(E_ALL);
				ini_set('display_errors', 'on');

			//--Confirm DB Connection
				/*if ($mysql_conn->connect_error)
				{
		    		die("Connection failed: " . $conn->connect_error);
				} 
				echo "Connected successfully";*/

			//--Confirm MySQLi Installed
				/*if (extension_loaded('mysqli')) 
				{
					echo "yes";
				} 
				else 
				{
					echo "no";
				}*/
		?>
	</body>
</html>