<html>
<h1>Type your username and date</h1><body>

<?php
   $host = 'turing.cs.niu.edu';
   $username = 'z1880484';
   $password = '2000Nov16';

   
   //try for login
   try
   {
	   $dsn = "mysql:host=courses;dbname=z1880484;";
	   $pdo = new PDO($dsn, $username, $password);
	   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	   
	
	 //forum POST for Userid and date
	echo '<form action="userfoodsearch.php" method="POST"> ';
	echo "<input type='text' name='Userid'/>Enter Username</br>";
	echo "<input type='text' name='eating_date'/>Enter Date</br>";
	echo "<input type='submit' />";
	echo '</form>';
	
	//set for name asc in GET, if GET is specific skip the submission requirement above and sort table accordingly these statements have the different queries ASC and DESC 
	if(isset($_GET['sort'])){
	
		echo"<p>Must</p>";
	  if ($_GET['sort'] == 'atype'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY TastyName ASC;");
		echo "<table border=1 cellspacing=1>";
		 echo "<tr><th><a href='userfoodsearch.php?sort=dtype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	  elseif ($_GET['sort'] == 'aserv'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY AmountServing ASC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=dserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	  elseif ($_GET['sort'] == 'adate'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY eating_date ASC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=ddate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	  elseif ($_GET['sort'] == 'acals'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY CalsServing ASC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=dcals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	  elseif ($_GET['sort'] == 'afat'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY GramsFat ASC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=dfat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	   elseif ($_GET['sort'] == 'aprotein'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY GramsProtein ASC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=dprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	   elseif ($_GET['sort'] == 'acarbs'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY GramsCarbs ASC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=dcarbs'>GramsCarbs</a></th></tr>";
	  }
	 elseif ($_GET['sort'] == 'dtype'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY TastyName DESC;");
		echo "<table border=1 cellspacing=1>";
		 echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	  elseif ($_GET['sort'] == 'dserv'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY AmountServing DESC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	  elseif ($_GET['sort'] == 'ddate'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY eating_date DESC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	  elseif ($_GET['sort'] == 'dcals'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY CalsServing DESC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	  elseif ($_GET['sort'] == 'dfat'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY GramsFat DESC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	   elseif ($_GET['sort'] == 'dprotein'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY GramsProtein DESC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	   elseif ($_GET['sort'] == 'dcarbs'){
		$rs = $pdo->query("SELECT * From Sorter ORDER BY GramsCarbs DESC;");
		echo "<table border=1 cellspacing=1>";
		echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  }
	  
		//calculations and vars for the different rows also setting the averages for daily values
	   $totalCalories = 0;
	   $totalFat = 0;
	   $totalProtein = 0;
	   $totalCarbs = 0;
	   $dailyCalories = 2000;
	   $dailyFat = 70;
	   $dailyProtein  = 50;
	   $dailyCarbs = 275;
	   $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	   
	   
	   //printing the sorted table from the new table (Sorter)
	    foreach($rows as $row){
		 echo  "<tr>";
		 echo "<td>" . $row["TastyName"] . "</td><td> " . $row["AmountServing"] . "</td><td> " . $row["eating_date"] . "</td><td> " . $row["CalsServing"] . "</td><td> " . $row["GramsFat"] . "</td><td> " . $row["GramsProtein"] . "</td><td> " . $row["GramsCarbs"] . "</td>"; 
	     echo "</tr>";
		 //calculations for totals by adding the rows above
		 $addcal = $row["CalsServing"];
		 $totalCalories = $addcal + $totalCalories;
		 $addfat =$row["GramsFat"];
		 $totalFat = $addfat + $totalFat;
		 $addProtein =$row["GramsProtein"];
		 $totalProtein = $addProtein + $totalProtein;
		 $addCarbs =$row["GramsCarbs"];
		 $totalCarbs = $addCarbs + $totalCarbs;
		
		}
	   
	   echo "</table>";
	  
	//calcultions for difference between total and daily
	$diffCalories =  $totalCalories - $dailyCalories;
	$diffFat	  =  $totalFat -$dailyFat;
	$diffProtein  =   $totalProtein -$dailyProtein;
	$diffCarbs    =  $totalCarbs - $dailyCarbs;
	
	  //table outputting the total, daily and differences
	  echo "<table border=1 cellspacing=1>";
	  echo  "<tr>";
	   echo"<th>Total Calories: $totalCalories</th><td> Total Grams Fat: $totalFat g</td><td> Total Grams Protein: $totalProtein g</td><td> Total Grams Carbs: $totalCarbs g</td>";
	    echo "</tr>";
		 echo  "<tr>";
	    echo"<th>Daily Calories: $dailyCalories</th><td> Daily Grams Fat: $dailyFat g</td><td> Daily Grams Protein:  $dailyProtein g</td><td> Daily Grams Carbs: $dailyCarbs g</td>";
		 echo "</tr>";
		 echo  "<tr>";
		 echo"<th>Difference in Calories: $diffCalories</th><td> Difference in Grams Fat: $diffFat g</td><td> Difference in Grams Protein: $diffProtein g</td><td> Difference in Grams Carbs: $diffCarbs g</td>";
		 echo "</tr>";
		 
		 
	   echo "</table>";
	  //  echo"<p>$totalCalories</p>";
	  
	  }
	
	
	
	//if the user submits no info go here and dont post table
	if(empty($_POST["Userid"])or empty($_POST["eating_date"])){
		
		echo"<p>Must have values for all fields</p>";
		
		

	  
		
   }
   
   
   
  //else clear sorter table then fill it with new query from both databases, using the user and date to specificy
	else {
		
		$rs = $pdo->query("DELETE FROM Sorter;");
	   
		$userstr = $_POST["Userid"];
		$userdate = $_POST["eating_date"];
		//query for both eats and tasty 
		$rs = $pdo->query("SELECT a.Userid, a.TastyName, a.AmountServing, a.eating_date, b.CalsServing, b.GramsFat, b.GramsProtein, b.GramsCarbs from Eats a, Tasty b WHERE  a.eating_date ='$userdate' and a.Userid ='$userstr' and a.TastyName = b.TastyName;");
	   
	   
	   
	   $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	   //print_r($rs->fetchall(PDO::FETCH_ASSOC));
	   echo "<table border=1 cellspacing=1>";
	   
	   foreach($rows as $row){
		$ssize = $row["AmountServing"];
		$scals = $row["CalsServing"];
		$stcals = $scals * $ssize;
		$sprot = $row["GramsProtein"];
		$stprot = $ssize * $sprot;
		$scarbs = $row["GramsCarbs"];
		$stcarbs = $ssize * $scarbs;
		$sfat = $row["GramsFat"];
		$stfat = $ssize * $sfat;
		
		
	//	echo  "<tr>";
		//echo "<td>" . $row["Userid"] . "</td><td> " . $row["TastyName"] . "</td><td> " . $row["AmountServing"] . "</td><td> " . $row["eating_date"] . "</td><td> " . $stcals . "</td><td> " . $stfat . "</td><td> " . $stprot . "</td><td> " . $stcarbs . "</td>"; 
	//    echo "</tr>";
		  
	$statement = $pdo->prepare('INSERT INTO Sorter(TastyName,AmountServing,eating_date,CalsServing,GramsFat,GramsProtein,GramsCarbs) VALUES(:tname,:aserv,:e_date,:stcals1,:stfat1,:stprot1,:stcarbs1)');
	
	$statement->execute([
    'tname' => $row['TastyName'],
	'aserv' => $row['AmountServing'],
	'e_date' => $row['eating_date'],
	'stcals1' => $stcals,
	'stfat1'  => $stfat,
	'stprot1'  => $stprot,
	'stcarbs1' => $stcarbs,
	]);
	   }
	   
		//init sort of table by amount serving desc
	   $rs = $pdo->query("SELECT * From Sorter ORDER BY AmountServing DESC;");
	   //href for links to sort each of the options of the table
	   echo "<tr><th><a href='userfoodsearch.php?sort=atype'>TastyName</a></th><th><a href='userfoodsearch.php?sort=aserv'>AmountServing</a></th><th><a href='userfoodsearch.php?sort=adate'>eating_date</a></th><th><a href='userfoodsearch.php?sort=acals'>CalsServing</a></th>
		 <th><a href='userfoodsearch.php?sort=afat'>GramsFat</a></th><th><a href='userfoodsearch.php?sort=aprotein'>GramsProtein</a></th><th><a href='userfoodsearch.php?sort=acarbs'>GramsCarbs</a></th></tr>";
	  
	   $rows = $rs->fetchAll(PDO::FETCH_ASSOC);
	   
	   $totalCalories = 0;
	   $totalFat = 0;
	   $totalProtein = 0;
	   $totalCarbs = 0;
	   $dailyCalories = 2000;
	   $dailyFat = 70;
	   $dailyProtein  = 50;
	   $dailyCarbs = 275;
	   
	   //printing out the table
	    foreach($rows as $row){
		 echo  "<tr>";
	   echo "<td>" . $row["TastyName"] . "</td><td> " . $row["AmountServing"] . "</td><td> " . $row["eating_date"] . "</td><td> " . $row["CalsServing"] . "</td><td> " . $row["GramsFat"] . "</td><td> " . $row["GramsProtein"] . "</td><td> " . $row["GramsCarbs"] . "</td>"; 
	     echo "</tr>";
		 $addcal = $row["CalsServing"];
		 $totalCalories = $addcal + $totalCalories;
		 $addfat =$row["GramsFat"];
		 $totalFat = $addfat + $totalFat;
		 $addProtein =$row["GramsProtein"];
		 $totalProtein = $addProtein + $totalProtein;
		 $addCarbs =$row["GramsCarbs"];
		 $totalCarbs = $addCarbs + $totalCarbs;
		
		}
	   
	   echo "</table>";
	
	 $diffCalories =  $totalCalories - $dailyCalories; 
	$diffFat	  =  $totalFat -$dailyFat; 
	$diffProtein  =   $totalProtein -$dailyProtein;
	$diffCarbs    =  $totalCarbs - $dailyCarbs;
	
	  //outputting the difference table 
	  echo "<table border=1 cellspacing=1>";
	  echo  "<tr>";
	   echo"<th>Total Calories: $totalCalories</th><td> Total Grams Fat: $totalFat g</td><td> Total Grams Protein: $totalProtein g</td><td> Total Grams Carbs: $totalCarbs g</td>";
	    echo "</tr>";
		 echo  "<tr>";
	    echo"<th>Daily Calories: $dailyCalories</th><td> Daily Grams Fat: $dailyFat g</td><td> Daily Grams Protein:  $dailyProtein g</td><td> Daily Grams Carbs: $dailyCarbs g</td>";
		 echo "</tr>";
		 echo  "<tr>";
		 echo"<th>Difference in Calories: $diffCalories</th><td> Difference in Grams Fat: $diffFat g</td><td> Difference in Grams Protein: $diffProtein g</td><td> Difference in Grams Carbs: $diffCarbs g</td>";
		 echo "</tr>";
		 
		 
	   echo "</table>";
	  //  echo"<p>$totalCalories</p>";
	  
	
	
   }
   
   //href to other pages for easy access 
    echo"<p><a href='userfood.php'>Add Food to User</a></p>";
	echo"<p><a href='foods.php'>Add Food/Drink to Database</a></p>";
   }
	 catch(PDOException $e)
   {
      echo 'ERROR:'.$e->getMessage();
   }
   
   
	
   
?>
</body>
</html>