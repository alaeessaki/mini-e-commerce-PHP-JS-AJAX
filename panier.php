<?php
session_start();

$panier = $_SESSION['panier'];

?>
<!doctype html>
<html>
<head><title>panie</title></head>
<body>
<table>
	<tr>
		<th>id</th>
		<th>QTE</th>
	</tr>
	<?php foreach($panier as $id=>$qte):   ?>
	<tr>
		<td><?= $id?></td>
		<td><?= $qte?></td>	
	</tr>	
	<?php endforeach;?>
</table>
</body>
</html>




