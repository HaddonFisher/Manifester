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
		error_reporting(E_ALL);
		ini_set('display_errors', 'on');

		$appname = "";
		$memory = "";
		$instances = "";
		$hostname = "";
		$domain = "";

		if(isset($_POST["appname"]))
			{$appname = $_POST["appname"];}

		if(isset($_POST["memory"]))
			{$memory = $_POST["memory"];}

		if(isset($_POST["instances"]))
			{$instances = $_POST["instances"];}

		if(isset($_POST["hostname"]))
			{$hostname = $_POST["hostname"];}

		if(isset($_POST["domain"]))
			{$domain = $_POST["domain"];}

		if(isset($_POST["buildpacks"]))
			{$buildpacks = $_POST["buildpacks"];}

		/*$yaml_array = array(
			"name" => $appname,
			"memory" => $memory,
			"instances" => $instances,
			"host" => $hostname,
			"domain" => $domain,
			);*/

		$manifest = "---\napplications:\n- name: " . $appname;
		
		if($memory != ""){
			$manifest = $manifest . "\n  memory: " . $memory;
		}

		if($instances != ""){
			$manifest = $manifest . "\n  instances: " . $instances;
		}

		if($hostname != ""){
			$manifest = $manifest . "\n  host: " . $hostname;
		}

		if($domain != ""){
			$manifest = $manifest . "\n  domain: " . $domain;
		}

		if($buildpacks != ""){
			$manifest = $manifest . "\n  buildpacks: " . $buildpacks;
		}
		?>
		<div class="container">
		<h1>Preview Your Manifest</h1>
		<em>You like?</em><br><br>
		<!-- <?php echo "YAML Array is: "; print_r($yaml_array);?></br> -->
		<!--<?php echo "GET Array is: "; print_r($_POST);?><br> -->

				
		<!--<?php
		$mypostdata = file("php://input");
		print "<pre>"; 
		var_dump($_POST);
		var_dump($mypostdata);
		print "</pre>"?>-->

		<pre><code><?php print_r($manifest) ?></code></pre>

	 </body>

<!-- 
* Release Notes
* 1.0 - Let there be light
-->

</html>