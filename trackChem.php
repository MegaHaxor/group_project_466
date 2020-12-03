<html>
	<head><title>Track a Micronutrient</title></head>
	<body>
	<a href ="http://students.cs.niu.edu/~z1874508/homePage.html">Return home</a> <br/>
		<h1>Track A Micronutrient!</h1>
		<form action="trackChem.php" method="POST">
			<input type="text" name="id" value"Chrix"/> Enter Username<br/>
			<select name="chem">
				<option>Vitamin D</option>
				<option>Calcium</option>
				<option>Iron</option>
				<option>Potassium</option>
			</select> Select Micronutrient <br/>
			<input type=submit value="Go!"/>
		</form>
<?php
if(isset($_POST["chem"]))
{
	include("functions.php");

	if($_POST["chem"] == "Vitamin D")
	{
		$colname = "Vitamin_d";
	}
	else
	{
		$colname = "Grams" . $_POST["chem"];
	}

	$pdo = makepdo();
	try {
		//verify id
		$statement = $pdo->prepare("SELECT * FROM User WHERE Userid=:id;");
		$statement->execute(array(":id" => $_POST["id"]));
		if($statement->rowCount() == 0)
		{
			echo "<p>Sorry, ${_POST["id"]} is not a valid username. 
				<a href=http://students.cs.niu.edu/~z1874508/newUserForm.php> Create an account<a>
				for free today!</p>";
			return;
		}

		//query to show nutrient intake per day
		$statement = $pdo->prepare (
"SELECT eating_date, SUM(chemIntake) nutrient_intake,
  (SELECT daily from Chemical WHERE chemName=:chem) recommended
  FROM (
    SELECT eating_date, chemName,
      -- next column is num of servings times chem amount per serving
      Eats.AmountServing * Tasty.$colname AS chemIntake
    -- join Eats and Tasty tables together
    FROM Eats, Tasty, Chemical
    WHERE Userid = :id AND 
      Eats.TastyName = Tasty.TastyName AND
      chemName = :chem
    ) AS chemTrack
  GROUP BY eating_date;"		
);
		$statement->execute(array(":chem" => $_POST["chem"], ":id" => $_POST["id"]));
		if($statement->rowCount() == 0)
		{
			echo "<p>You haven't had any ${_POST["chem"]}.</p> <br/>";
			echo "<a href=\"http://students.cs.niu.edu/~z1880552/userfood.php\">Add meals to your account</a>";
		}
		else
		{
			$rs = $statement->fetchAll(PDO::FETCH_ASSOC);
			echo "<h2>Here is your ${_POST["chem"]} intake per day</h2>";
			draw_table($rs);
		}

	}
	catch (PDOexception $e) {
		echo "Error: " . $e->getMessage();
	}
}
?>
	</body>
</html>
