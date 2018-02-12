<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Platzvergabe</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>application/views/css/faq.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	<script src="<?php echo base_url(); ?>application/libraries/jquery.js"></script>
	<script src="<?php echo base_url(); ?>application/libraries/scripts.js"></script>
	<script src="<?php echo base_url(); ?>application/libraries/dropzone.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>application/views/css/dropzone.css">

</head>
<body>
	<header>
		<div class="container-fluid logo-container">
			<img id="logo" src="http://www.uni-goettingen.de/img/redesign/logo.svg">
		</div>
	</header>
	<div class="dienavbar">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="<?php echo base_url() ?>">Automatisierte Platzvergabe</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
		    	<ul class="navbar-nav navbar-center">
		      		<li class="nav-item active">
		        		<a class="nav-link" href="<?php echo base_url() ?>">Home</a>
		      		</li>
					<li class="nav-item active">
						<a class="nav-link" href="<?php echo base_url() ?>index.php/controller/viewHoersaele">Hörsäle</a>
					</li>
	    	  		<li class="nav-item active">
	    	    		<a class="nav-link" href="<?php echo base_url() ?>index.php/controller/viewFAQ">FAQ</a>
	   		  		</li>
	    		</ul>
  			</div>
		</nav>
	</div>
