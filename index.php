<?php
session_start();
if(!isset($_SESSION['panier'])){
	$_SESSION['panier'] = [];
}
?>

<!doctype html>
<html lang="fr">
<head>
	<meta charset = "UTF-8">
	<title>Home</title>
</head>
<body>
<table>
<tr>
	<th>Designation</th>
	<th>Prix</th>
	<th>Qté</th>
	<th></th>
</tr>
<tr>
	<td>Produit A</td>
	<td align="right">300.00</td>
	<td><input type="text" id="prd_1" value="1"></td>
	<td><button onclick="add(1)">ADD</button></td>
</tr>

<tr>
	<td>Produit B</td>
	<td align="right">400.00</td>
	<td><input type="text" id="prd_2" value="1"></td>
	<td><button onclick="add(2)">ADD</button></td>
</tr>

<tr>
	<td>Produit C</td>
	<td align="right">500.00</td>
	<td><input type="text" id="prd_3" value="1"></td>
	<td><button onclick="add(3)">ADD</button></td>
</tr>

<tr>
	<td>Produit D</td>
	<td align="right">2300.00</td>
	<td><input type="text" id="prd_4" value="1"></td>
	<td><button onclick="add(4)">ADD</button></td>
</tr>

</table>
<div>
	<a href="panier.php">Voir le panier</a>
</div>
<div>
	<a href="vider.php">Vider le panier</a>
</div>
<div>
	<button onclick="afficher()">Afficher panier</button>
	<div id="panier"></div>
</div>

<hr>
<pre>
<?php
	print_r($_SESSION);
?>

<script>
	var panier = {};
	function add(id){
		var qte = document.getElementById('prd_'+id).value;
		url = "addajax.php?id="+id+"&qte="+qte;
		var xhr = new XMLHttpRequest();
		xhr.open('GET',url,true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status==200){
				panier = JSON.parse(xhr.responseText);
				
			}
		};
		xhr.send();
	}

	function afficher(){
		var p = document.querySelector("#panier");
		var out = "";
		for(k in panier){
			out += k + ' : ' + panier[k] + '<br>'; 
		}	
		p.innerHTML = out;	
	}
</script>

</body>
</html>
