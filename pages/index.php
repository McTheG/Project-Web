<?php
error_reporting( E_ALL ); 
ini_set( "display_errors", 1 );   

include("nav.php");
?>

<!doctype html>
<html ng-app>
<head>
</head>
<body>
<div class="container">
<div class="jumbotron" >

<h1>Barbecue Map</h1>

<div class="row">
<div class="col-xs-6 col-md-4">
<a href="#" class="thumbnail">
<img src="../images/meat1.jpg" alt="meat1">
</a>
</div>
<h2>Welcome to Barbecue Map</h2>
<p>This website can help you find public places in Antwerp,<br>where you can have your own Barbecue party.</p>
<p><a class="btn btn-info btn-lg" href="locations.php" role="button">Find one</a></p>

</div>
</div>

</body>
</html>