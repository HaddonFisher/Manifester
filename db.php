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
			$mysql_u = $env_array['p-mysql'][0]['credentials']['username'] . "@localhost";
			$mysql_p = $env_array['p-mysql'][0]['credentials']['password'];
			$mysql_c = $env_array['p-mysql'][0]['credentials']['hostname'];

		//--Open a connection to the DB
			$mysql_conn =mysqli_connect($mysql_c, $mysql_u, $mysql_p);
			if (mysqli_connect_errno())
				  {
				  echo "Failed to connect to MySQL: " . mysqli_connect_error();
				  }

		//--Grab and stash the manifest
			if(isset($_POST["manifest"]))
				{
					$manifest = $_POST["manifest"];
				}
			else
				{
					echo "DANGER WILL ROBINSON - MANIFEST NOT DETECTED"; 
				}
			if(isset($_POST["name"]))
				{
					$name = $_POST["name"];
				}
			if(isset($_POST["notes"]))
				{
					$notes = $_POST["notes"];
				}

		//-- Check to confirm existence of database and table, and create if non-existent
			if(!mysqli_select_db($mysql_conn, "manifester"))
				{
					//echo("Database Creation Error Description: " . mysqli_error($mysql_conn));	
					if(!mysqli_query("CREATE DATABASE manifester"))
					{
						echo("Database Creation Error Description: " . mysqli_error($mysql_conn) . "<br>");	
					}
					$grant_query = "GRANT ALL PRIVILEGES ON manifester.* TO '" . $mysql_u . "@localhost';";
					if(!mysqli_query($grant_query))
					{
						echo("Database Grant Error Description: " . mysqli_error($mysql_conn) . "<br>");
					}
					mysqli_query("FLUSH PRIVILEGES");
				}

			$table_check = mysqli_query($mysql_conn, "select 1 from `manifest` LIMIT 1");
			if($table_check == FALSE)
			{
				echo $results;
				echo "table missing";
				if(!mysqli_query($mysql_conn, "CREATE TABLE manifest (manifest_id int(2) AUTO_INCREMENT, manifest_name varchar(255), manifest_notes varchar(255), manifest_manifest varchar(MAX))"))
				{
					echo("Table Creation Error Description: " . mysqli_error($mysql_conn));	
				}
				
			}
			else
			{
				$results = mysqli_query($mysql_conn, "select * from 'manifest'");
				print_r($results);
			}


		//--Troubleshooting Code Snippets
				error_reporting(E_ALL);
				ini_set('display_errors', 'on');

			//--Confirm DB Connection
				/*if ($mysql_conn->connect_error)
				{
		    		die("Connection failed: " . $conn->connect_error);
				} 
				echo "Connected successfully<br>";*/

			//--Test Variables
				/*echo "Name: " . $name . "<br>";
				echo "Notes: " . $notes . "<br>";
				echo "Manifest: " . $manifest . "<br>";*/

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