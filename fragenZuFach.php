<?php
function fragenZuFach(){
	$db = new Database();
	
// 	$stdID;
// 	if(isset($_SESSION['stdID'])){
// 		$stdID = $_SESSION['stdID'];
// 	}
	$fragen = array();
	
	echo '<script src=js/cache.js></script>';
	
	$fachID = 0;
	if (isset($_GET['fach'])) {
		$fachID = $_GET["fach"];
	}
	$fragen = $db->getFragenVonFach($fachID);
	
// 	$fragen = $db->getFragenVonStdID($stdID);
?>
	<script>cache(<?php $fragen ?>);</script>
<?php 
// 	$fragen = "";
	 //Hier wird aus der url, die Fach ID ausgelesen
	
	
	?>
<!-- Hier folgt die output Tabelle -->
<table id="fragen" align="center" style="border: 1px solid red; width: 60%;">
	<tr>
		<th>#</th>
		<th>Fragen - Titel</th>
		<th>Autor</th>
	</tr>
<?php
	//Schleife über alle Fragen, die zu dem Fach gefunden wurden
	/*for($i=0; $i<count($fragen)-1; $i++){
		echo 	"<tr><td>".		//Anzahl fragen
					($i+1).
				"</td>";
		
		echo	"<td id='fragenDropDown".$i."'onclick=slide(this.id);>".		//Titel -> später für jquery der link um die "slideshow" zu triggern
				"<span style=color:blue>".	$fragen[$i]->titel."</span>".
				"</td>";			//Hier kommt noch der Autor rein

		echo "</tr>";
		echo "<tr>";
		echo "<td colspan=\"4\">";
			echo "<div id=frage".$i." style=display:none;>";
			echo $fragen[$i]->frage;
			echo "\n";
			echo "<input type=\"button\" value=\"Pr&uuml;fen\" onclick=checkFrage(\"frage\"+".$i.")>";
			echo "</div>";
		echo "</td>";
		echo "</tr>";	
	}*/
?>
</table>	
<script src="js/neueFrage.js"></script>

<?php }?>




