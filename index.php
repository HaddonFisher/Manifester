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
		/*error_reporting(E_ALL & ~E_NOTICE);*/

		$appname = "empty";
		$memory = "empty";
		$instances = "empty";
		$hostname = "empty";
		$domain = "empty";

		$appname = $_POST("appname");
		$memory = $_POST("memory");
		$instances = $_POST("instances");
		$hostname = $_POST("hostname");
		$domain = $_POST("domain");

		$yaml_array = array(
			"name" => $appname,
			"memory" => $memory,
			"instances" => $instances,
			"host" => $hostname,
			"domain" => $domain
			);

		/*$yaml = yaml_emit($yaml_array);*/
		?>
		<div class="container">
		<h1>Welcome to the Manifester (Mk 0)</h1>
		<em>Use this tool to create your Cloud Foundry Manifest file</em><br><br>
		   <form target="_self" class="form-horizontal" method="post">

		    <div class="form-group">
		      <label for="appname" class="control-label col-sm-2">Application Name:</label>
		      	<div class="col-sm-10">
		      		<input type="text" class="form-control" id="appname">
		      	</div>
		    </div>

		    <div class="form-group">
			  <label for="memory" class="control-label col-sm-2">Memory:</label>
			  <div class="col-sm-10">
				  <select class="form-control" id="sel1">
				    <option>128M</option>
				    <option>256M</option>
				    <option>384M</option>
				    <option>512M</option>
				    <option>640M</option>
				    <option>768M</option>
				    <option>896M</option>
				    <option>1024M</option>
				    <option>1152M</option>
				    <option>1280M</option>
				  </select>
				 </div>
			</div>

		    <div class="form-group">
		      <label for="hostname" class="control-label col-sm-2">Host Name:</label>
		      <div class="col-sm-10">
		      	<input type="text" class="form-control" id="hostname">
		      </div>
		    </div>

		    <div class="form-group">
		      <label for="domain" class="control-label col-sm-2">Domain:</label>
		      <div class="col-sm-10">
		      	<input type="text" class="form-control" id="domain">
	      	  </div>
		    </div>

			<div class="form-group">
		      <label for="instances" class="control-label col-sm-2">Instances Needed:</label>
		      <div class="col-sm-10">
		      	<input type="number" class="form-control" id="instances">
		      </div>
		    </div>

		    <div class="form-group">
		      <label for="buildpacks" class="control-label col-sm-2">Buildpacks Needed:</label>
		      <div class="col-sm-10">
		      	<input type="text" class="form-control" id="buildpacks" placeholder="GitHub links only please. Multiple buildpack URL's should be separated by a comma.">
		      </div>
		    </div>

		    <div class="form-group">
		      <label for="path" class="control-label col-sm-2">Path:</label>
		      <div class="col-sm-10">
		      	<input type="text" class="form-control" id="path">
		      </div>
		    </div>
		    <button type="submit" class="btn btn-default">Submit</button>
		  
		  </form>
		</div>

		<br>
		<h1>Preview</h1>
		<?php print_r($yaml_array);?>
	 </body>

<!-- 
* Release Notes
* 1.0 - Let there be light
-->

</html>