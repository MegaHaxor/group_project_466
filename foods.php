<html>
<h1>Type below to add to the Food/Drink index</h1><body>

<?php
   $host = 'turing.cs.niu.edu';
  $username = 'z1880484';
   $password = '2000Nov16';
 
   
   
   try
   {
	   $dsn = "mysql:host=courses;dbname=z1880484";
	   $pdo = new PDO($dsn, $username, $password);
	   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   
	  
	  
	 //forum options for food name calories and each nutrient, conversion passed by value selected  
	echo '<form action="foods.php" method="POST"> ';
	echo "<input type='text' name='TastyName'/>Enter Food Name</select></br>";
	echo "<input type='text' name='CalsServing'/>Enter Calories</br>";
	echo "<input type='text' name='GramsProtein'/>Enter Protein in 
  <select name='prot' id='prot'>
  <option value='1'>Grams</option>
  <option value='0.001'>milligrams</option>
  <option value='28.3495'>ounces</option>
  <option value='14.3'>tbsp</option>
  <option value='125'>cups</option>
  <option value='453.592'>lbs</option>
  </select></br>";
	echo "<input type='text' name='GramsCarbs'/>Enter Carbohydrates in 
	 <select name='carbs' id='carbs'>
  <option value='1'>Grams</option>
  <option value='0.001'>milligrams</option>
  <option value='28.3495'>ounces</option>
  <option value='14.3'>tbsp</option>
  <option value='125'>cups</option>
  <option value='453.592'>lbs</option>
  </select></br>";
	echo "<input type='text' name='GramsFat'/>Enter Fats in 
	 <select name='fats' id='fats'>
   <option value='1'>Grams</option>
  <option value='0.001'>milligrams</option>
  <option value='28.3495'>ounces</option>
  <option value='14.3'>tbsp</option>
  <option value='125'>cups</option>
  <option value='453.592'>lbs</option>
  </select></br>";
	echo "<input type='text' name='Vitamin_d'/>Enter Vitamin D in 
	 <select name='vitd' id='vitd'>
  <option value='1'>Grams</option>
 <option value='0.001'>milligrams</option>
  <option value='28.3495'>ounces</option>
  <option value='14.3'>tbsp</option>
  <option value='125'>cups</option>
  <option value='453.592'>lbs</option>
  </select></br>";
	echo "<input type='text' name='GramsCalcium'/>Enter Calcium in 
	 <select name='calci' id='calci'>
  <option value='1'>Grams</option>
 <option value='0.001'>milligrams</option>
  <option value='28.3495'>ounces</option>
  <option value='14.3'>tbsp</option>
  <option value='125'>cups</option>
  <option value='453.592'>lbs</option>
  </select></br>";
	echo "<input type='text' name='GramsIron'/>Enter Iron in 
	 <select name='iron' id='iron'>
  <option value='1'>Grams</option>
  <option value='0.001'>milligrams</option>
  <option value='28.3495'>ounces</option>
  <option value='14.3'>tbsp</option>
  <option value='125'>cups</option>
  <option value='453.592'>lbs</option>
  </select></br>";
	echo "<input type='text' name='GramsPotassium'/>Enter Potassium in 
	 <select name='pota' id='pota'>
  <option value='1'>Grams</option>
  <option value='0.001'>milligrams</option>
  <option value='28.3495'>ounces</option>
  <option value='14.3'>tbsp</option>
  <option value='125'>cups</option>
  <option value='453.592'>lbs</option>
  </select></br>";
	echo "<input type='submit' />";
	echo '</form>';
	
	
	
	
	//if no calories or name, just output table and ask for names/cals
	if(empty($_POST["TastyName"])or empty($_POST["CalsServing"])){
		$rs = $pdo->query("SELECT * FROM Tasty;");
	   
	   echo"<p>Must have values for Name and Calories</p>";
	   
	   $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	   //print_r($rs->fetchall(PDO::FETCH_ASSOC));
	   echo "<table border=1 cellspacing=1>";
	   echo "<tr><th>Name</th><th>Calories</th><th>Grams Protein</th><th>Grams Carbs</th><th>Grams Fat</th><th>Vitamin_d</th><th>Grams Calcium</th><th>Grams Iron</th><th>Grams Potassium</th></tr>";
	   foreach($rows as $row){
		 echo  "<tr>";
	   echo "<td>" . $row["TastyName"] . "</td><td> " . $row["CalsServing"] . "</td><td> " . $row["GramsProtein"] . "</td><td> " . $row["GramsCarbs"] . "</td><td> " . $row["GramsFat"] . "</td><td> " . $row["Vitamin_d"] . "</td><td> " . $row["GramsCalcium"] . "</td><td> " . $row["GramsIron"] . "</td><td>". $row["GramsPotassium"]. "</td>"; 
	     echo "</tr>";
      
   }
   echo "</table>";
	}else {
	
	
	
	//prepare statement to insert all values into Tasty table
	$statement = $pdo->prepare('INSERT INTO Tasty(TastyName,CalsServing,GramsProtein,GramsCarbs,GramsFat,Vitamin_d,GramsCalcium,GramsIron,GramsPotassium) VALUES(:tname,:tcal,:tprotein,:tcarbs,:tfat,:tvitd,:tcalc,:tiron,:tpota)');
	
	//conversions in post for grams all nutrients based on value passed in forum
	$tprotein = $_POST['GramsProtein'] * $_POST['prot'];
	$tfats = $_POST['GramsFat'] * $_POST['fats'];
	$tcarbs = $_POST['GramsCarbs'] * $_POST['carbs'];
	$tvitd = $_POST['Vitamin_d'] * $_POST['vitd'];
	$tiron = $_POST['GramsIron'] * $_POST['iron'];
	$tpotassium = $_POST['GramsPotassium'] * $_POST['pota'];
	$tcalcium = $_POST['GramsCalcium'] * $_POST['calci'];
	
	
//execute prepared statement 
	$statement->execute([
   'tname' => $_POST['TastyName'],
   'tcal' => $_POST['CalsServing'],
   'tprotein' => $tprotein,
   'tcarbs' => $tcarbs,
   'tfat' => $tfats,
   'tvitd' => $tvitd,
   'tcalc' => $tcalcium,
   'tiron' => $tiron,
   'tpota' => $tpotassium,
	]);
	
	
	
	//query selecting all from Tasty to output
	$rs = $pdo->query("SELECT * FROM Tasty;");
	   
	   
	   //fill the rows
	   $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	   //printing table headers
	   echo "<table border=1 cellspacing=1>";
	   echo "<tr><th>Name</th><th>Calories</th><th>Grams Protein</th><th>Grams Carbs</th><th>Grams Fat</th><th>Vitamin_d</th><th>Grams Calcium</th><th>Grams Iron</th><th>Grams Potassium</th></tr>"; 
	   //for each row output database values
	   foreach($rows as $row){
		 echo  "<tr>";
	   echo "<td>" . $row["TastyName"] . "</td><td> " . $row["CalsServing"] . "</td><td> " . $row["GramsProtein"] . "</td><td> " . $row["GramsCarbs"] . "</td><td> " . $row["GramsFat"] . "</td><td> " . $row["Vitamin_d"] . "</td><td> " . $row["GramsCalcium"] . "</td><td> " . $row["GramsIron"] . "</td><td>". $row["GramsPotassium"]. "</td>"; 
	     echo "</tr>";
   }
   echo "</table>";
	 echo "<p>Successfully added!</p>";
	}
	//href to go to other pages
	echo"<p><a href='userfoodsearch.php'>Search User Food/Drink</a></p>";
	echo"<p><a href='userfood.php'>Add Food to User</a></p>";
	 
   }
	 catch(PDOException $e)
   {
      echo 'ERROR:'.$e->getMessage();
   }
   
   
	
   
?>
</body>
</html>