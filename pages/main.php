
<?php
error_reporting( E_ALL ); 
ini_set( "display_errors", 1 );   

include("nav.php");

$string = file_get_contents("../bbq.json");
$jsonRS = json_decode ($string,true);
$locatie = "";
$link = "";
?>
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>


<?php	
$locatie = "GEEN";
if ($_SERVER["REQUEST_METHOD"] == "POST") {


if (empty($_POST["locatie"])) {
} else {
$locatie = test_input($_POST["locatie"]);
}
}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">




<div class="panel panel-default">
<div class="panel-heading">
Locatie:
	<input type="radio" name="locatie" <?php if (isset($locatie) && $locatie=="PARK") echo "checked";?>  value="PARK">Park
	<input type="radio" name="locatie" <?php if (isset($locatie) && $locatie=="GROENZONE") echo "checked";?>  value="GROENZONE">Groenzone
	<input type="radio" name="locatie" <?php if (isset($locatie) && $locatie=="PLEIN") echo "checked";?>  value="PLEIN">Plein
	<input type="radio" name="locatie" <?php if (isset($locatie) && $locatie=="GEEN") echo "checked";?>  value="GEEN">Geen
</div>
    
  
    
<div class="panel-body">
	<input class = "btn btn-default" type="submit" name="submit" value="Filter">
</div>
</div>


<div class="panel panel-default">
<div class="panel-heading"><?php
	echo "<h2>Gekozen filtering: $locatie</h2>";
?></div>
<div class="panel panel-default">
<div class="panel-body">
<table class="table table-bordered table-responsive">
<tr>
	<td><strong><?php echo "BBQ Nr"?></td>
	<td><strong><?php echo "Point_lat"?></td>
	<td><strong><?php echo "point_lng"?></td>
	<td><strong><?php echo "Obj_type"?></td>
	<td><strong><?php echo "Ligging"?></td>
	<td><strong><?php echo "Status"?></td>
	<td><strong><?php echo "Link"?></td>
</tr>

</div>
</div>

<?php
	echo $locatie;
foreach ($jsonRS["data"] as $rs) 
{
	if($locatie != "GEEN")
	{	
		if($rs["ligging"] == $locatie)
		{		
?>	

<tr>
	<td><?php echo $rs["objectid"]?></td>
	<td><?php echo $rs["point_lat"]?></td>
	<td><?php echo $rs["point_lng"]?></td>
	<td><?php echo $rs["obj_type"]?></td>
	<td><?php echo $rs["ligging"]?></td>
	<td><?php echo $rs["status"]?></td>
	
	<?php
		$link = "https://www.google.be/maps/place//@".$rs["point_lat"].",".$rs["point_lng"].",17z/";	
	?>
	
	<td><a class = "btn btn-default" href="<?php echo $link; ?>">Google Maps</a></td>
</tr>
<?php
		}
	}
	else
	{
?>
<tr>
		<td><?php echo $rs["objectid"]?></td>
		<td><?php echo $rs["point_lat"]?></td>
		<td><?php echo $rs["point_lng"]?></td>
		<td><?php echo $rs["obj_type"]?></td>
		<td><?php echo $rs["ligging"]?></td>
		<td><?php echo $rs["status"]?></td>

	<?php
		$link = "https://www.google.be/maps/place//@".$rs["point_lat"].",".$rs["point_lng"].",17z/";	
	?>
	
	<td><a class = "btn btn-default" href="<?php echo $link; ?>">Google Maps</a></td>
</tr>
		
	<?php
	}
}
?>
</table>
</div>
</div>

</body>
</html>
