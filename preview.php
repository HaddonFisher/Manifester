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


//--Prepopulate variables
		$appname = "";
		$memory = "";
		$instances = "";
		$hostname = "";
		$domain = "";

//--Attempt to fill with passed variables
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

//--Begin manifest build process
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
<!--Build Display -->
		<div class="container">
		<h1>Preview Your Manifest</h1>

		<pre><code><?php print_r($manifest) ?></code></pre>

		<form method="POST" action="db.php" class="form-horizontal">
			<div class="form-group">
		      <label for="name" class="control-label col-sm-2">Your Name:</label>
		      	<div class="col-sm-10">
		      		<input type="text" class="form-control" name="name">
		      	</div>
		    </div>

		    <div class="form-group">
		      <label for="notes" class="control-label col-sm-2">Notes:</label>
		      	<div class="col-sm-10">
		      		<input type="textarea" class="form-control" name="notes">
		      	</div>
		    </div>

			<input type='hidden' name='manifest' value='<?php echo $manifest;?>'>
			<button type="submit" class="btn btn-default">Save to DB</button>
		</form>

	 </body>

<!-- 
* Release Notes
* 1.0 - Let there be light
-->

</html>