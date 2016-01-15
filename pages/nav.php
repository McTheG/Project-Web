
<?php
error_reporting( E_ALL ); 
ini_set( "display_errors", 1 );   
?>

<html>
<header>
<title>Barbecue Map</title>
<link rel="stylesheet" href="../reset.css" type="text/css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    
</header>
<body>

<nav class="navbar nav-pills">


<ul class="nav navbar-nav">
<li><a href="index.php" role="button">Home</a></li>
<li><a href="locations.php" role="button">Locations</a></li>
</ul>

<script language="JavaScript" type="text/javascript">
function search_google(){ 
window.open("http://www.google.com/search?q="+document.search.query.value); 
}
</script>
<form name="search" class="navbar-form navbar-left">
<div class="form-group">
	<input type="text" name="query" value="" class="form-control">
</div>
	<input type="submit" value="Search Google" class="btn btn-warning" onClick="search_google()">
</form>

</nav>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="http://code.angularjs.org/1.2.6/angular.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>



</body>
</html>




