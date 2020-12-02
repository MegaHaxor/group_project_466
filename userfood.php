<html>
<h1>Type below to add to the Food/Drink index</h1><body>

<?php
   $host = 'turing.cs.niu.edu';
   $username = 'z1880484';
   $password = '2000Nov16';
 
   
   //try to login
   try
   {
	   $dsn = "mysql:host=courses;dbname=z1880484";
	   $pdo = new PDO($dsn, $username, $password);
	   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   
	  
	
	
	   
	 //POST for user and food and serving and time eaten  
	echo '<form action="userfood.php" method="POST"> ';
	echo "<input type='text' name='Userid'/>Enter Username</br>";
	//select forum to show all food in database on dropdown menu
	echo "<select name = 'TastyName'>";
	$sql="SELECT DISTINCT TastyName FROM Tasty";
	$q   = $pdo->query($sql);
	while ($row=$q->fetch(PDO::FETCH_ASSOC))
{
	echo '<option value='.$row['TastyName'].'>'.$row['TastyName'].'</option>';
}
	echo '</select>Select Food/Drink';
	echo "</br>";
	echo "<input type='text' name='AmountServing'/>Enter Serving Size</br>";	
	echo "<input type='text' name='eating_date'/>Enter Date (YYYY-MM-DD)</br>";
	echo "<input type='submit' />";
	echo '</form>';
	
	
	
	
	//if no information is given in any slot, ask for info and then output table
	if(empty($_POST["TastyName"])or empty($_POST["AmountServing"])or empty($_POST["Userid"])or empty($_POST["eating_date"])){
		$rs = $pdo->query("SELECT * FROM Eats;");
	   
	   echo"<p>Must have values for all fields</p>";
	   
	   $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	   //print_r($rs->fetchall(PDO::FETCH_ASSOC));
	   echo "<table border=1 cellspacing=1>";
	   echo "<tr>";
	   foreach($rows[0] as $key => $item){
		   echo"<th>$key</th>";
	   }
	   echo "</tr>";
	   foreach($rows as $row){
		 echo  "<tr>";
	   echo "<td>" . $row["EatsID"] . "</td><td> " . $row["Userid"] . "</td><td> " . $row["TastyName"] . "</td><td> " . $row["AmountServing"] . "</td><td> " . $row["eating_date"] . "</td>"; 
	     echo "</tr>";
      
   }
   echo "</table>";
   
  
	}else {
	
	

	//if all info is given through POST, then prepare insert into EATS of the vals and then execute 
	$statement = $pdo->prepare('INSERT INTO Eats(Userid,TastyName,AmountServing,eating_date) VALUES(:usid,:tname,:aserv,:e_date)');
	
	
	$statement->execute([
    'usid' => $_POST['Userid'],
    'tname' => $_POST['TastyName'],
	'aserv' => $_POST['AmountServing'],
	'e_date' => $_POST['eating_date'],
   
	]);
	
	
	
	//query for table 
	$rs = $pdo->query("SELECT * FROM Eats;");
	   
	   
	   
	   $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	   //printing out table, normally wouldnt do this but for visual clarity for the assignment
	   echo "<table border=1 cellspacing=1>";
	   echo "<tr>";
	   foreach($rows[0] as $key => $item){
		   echo"<th>$key</th>";
	   }
	   echo "</tr>";
	   foreach($rows as $row){
		 echo  "<tr>";
	    echo "<td>" . $row["EatsID"] . "</td><td> " . $row["Userid"] . "</td><td> " . $row["TastyName"] . "</td><td> " . $row["AmountServing"] . "</td><td> " . $row["eating_date"] . "</td>"; 
	     echo "</tr>";
   }
   echo "</table>";
	 echo "<p>Successfully added!</p>";
	}
	//href to go to other pages
	echo"<p><a href='userfoodsearch.php'>Search User Food/Drink</a></p>";
	echo"<p><a href='foods.php'>Add Food/Drink to Database</a></p>";
   }
	 catch(PDOException $e)
   {
      echo 'ERROR:'.$e->getMessage();
   }
   
   
	
   
?>
</body>
</html>