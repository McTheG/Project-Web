<?php
error_reporting( E_ALL ); 
ini_set( "display_errors", 1 );   

include("/nav.php");

$string = file_get_contents("http://datasets.antwerpen.be/v4/gis/bbq.json");
$jsonRS = json_decode ($string,true);
$locatie = "";
$link = "";
?>
	<table border="5" class ="table">
	<tr>
		<td width="40px"><strong><?php echo "ID"?></td>
		<td width="70px"><strong><?php echo "Objectid"?></td>
		<td width="150px"><strong><?php echo "Point_lat"?></td>
		<td width="150px"><strong><?php echo "point_lng"?></td>
		<td width="70px"><strong><?php echo "Obj_type"?></td>
		<td width="40px"><strong><?php echo "O_id"?></td>
		<td width="150px"><strong><?php echo "Ligging"?></td>
		<td width="70px"><strong><?php echo "Status"?></td>
		<td width="100px"><strong><?php echo "Link"?></td>
	</tr>
<?php

foreach ($jsonRS["data"] as $rs) 
{
?>	

	<table border="1" class ="table">
	<tr>
		<td width="40px"><?php echo $rs["id"]?></td>
		<td width="70px"><?php echo $rs["objectid"]?></td>
		<td width="150px"><?php echo $rs["point_lat"]?></td>
		<td width="150px"><?php echo $rs["point_lng"]?></td>
		<td width="70px"><?php echo $rs["obj_type"]?></td>
		<td width="40px"><?php echo $rs["o_id"]?></td>
		<td width="150px"><?php echo $rs["ligging"]?></td>
		<td width="70px"><?php echo $rs["status"]?></td>
	
	<?php
		$link = "https://www.google.be/maps/place//@".$rs["point_lat"].",".$rs["point_lng"].",17z/";	
	?>
	<ul class="nav nav-tabs">
    <li role="presentation">
        <td width="100px"><a href="<?php echo $link; ?>">Google Map</a></td>
    </li>
    
    </ul>
		
	</tr>
	</table>	
<?php
}

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
	$locatie = "";
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

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> <br>
   Locatie:
   <input type="radio" name="locatie" <?php if (isset($locatie) && $locatie=="PARK") echo "checked";?>  value="PARK">Park
   <input type="radio" name="locatie" <?php if (isset($locatie) && $locatie=="GROENZONE") echo "checked";?>  value="GROENZONE">Groenzone
   <input type="radio" name="locatie" <?php if (isset($locatie) && $locatie=="PLEIN") echo "checked";?>  value="PLEIN">Plein
   <br><br>
   <input type="submit" name="submit" value="Filter">
</form>

<?php
if($locatie != null)
{
	echo "<h2>Gekozen filtering: $locatie</h2>";

	foreach ($jsonRS["data"] as $rs) 
	{
		if($rs["ligging"] == $locatie)
		{
?>	
		<table border="1">
		<tr>
			<td width="40px"><?php echo $rs["id"]?></td>
			<td width="70px"><?php echo $rs["objectid"]?></td>
			<td width="150px"><?php echo $rs["point_lat"]?></td>
			<td width="150px"><?php echo $rs["point_lng"]?></td>
			<td width="70px"><?php echo $rs["obj_type"]?></td>
			<td width="40px"><?php echo $rs["o_id"]?></td>
			<td width="150px"><?php echo $rs["ligging"]?></td>
			<td width="70px"><?php echo $rs["status"]?></td>
			
		</tr>
		</table>
		
<?php

		}
		else
		{
		}	
	} 
}
?>

</body>
</html>


<link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">