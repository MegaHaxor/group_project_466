<html><head><title>Track your weight</title></head><body>

<?php
$password = "2000Nov16";
$username = "z1880484";

try { // if something goes wrong, an exception is thrown
$dsn = "mysql:host=courses;dbname=z1880484";
$pdo = new PDO($dsn, $username, $password);
}
catch(PDOexception $e) { // handle that exception
echo "Connection to database failed: " . $e->getMessage();
}

echo"<a href =\"http://students.cs.niu.edu/~z1874508/homePage.html\">Return home</a><br/>";

echo"<form action=\"http://students.cs.niu.edu/~z1874508/weightDisplay.php\" method=\"POST\"\>";

//enter the account info. example data given
echo"<h2> Please enter your account ID</h2> <br/>";
echo"<input type = \"text\" name = \"Userid\" value = \"\"> <br\>";


echo"<h2>Show Data on your weight?</h2>";


echo"<input type = \"radio\" name = \"data\" value= \"yes\"\> Yes <br\>";
echo"<input type = \"radio\" name = \"data\" value= \"no\"\> No <br\>";


//what day should the stats start from
echo"<h4> If yes starting at what date? Enter in the format below or leave as is </h4>";
echo"<input type = \"text\" name = \"dataDate\" value = \"" . date("Y-m-d") . "\"\> <br\>";


//in what unit
echo"<h4> in what unit would you like the results to be shown?</h4>";
echo"<input type = \"radio\" name = \"displayUnit\" value= \"lbs\"\> lbs <br\>";
echo"<input type = \"radio\" name = \"displayUnit\" value= \"kg\"\> kgs <br\>";


echo"<h5> If you don't want to enter a new weight click Go! to continue</h5>";
echo"<input type = \"submit\" value = \"Go!\"\>";

//if they want to enter a new weight
echo"<h3> Are you entering a weight? </h3>";
echo"<input type = \"radio\" name = \"update\" value= \"yes\"\> Yes <br\>";
echo"<input type = \"radio\" name = \"update\" value= \"no\"\> No <br\>";


echo"<br/> <h3> How much do you weigh? </h3> <br/>";
echo"<input type = \"text\" name = \"Weight\"\> <br\>";

//pick the measurment
echo"What unit of measurement?";
echo"<input type = \"radio\" name = \"unit\" value= \"lbs\"\> lbs <br\>";
echo"<input type = \"radio\" name = \"unit\" value= \"kg\"\> kgs <br\>";

echo"<br/> <h3> What day is it? Enter a date in the format as shown or leave as is for todays date and the current time. </h3> <br/>";
echo"<input type = \"text\" name = \"Date\" value = \"" . date("Y-m-d h:i") . "\"\> <br\>";

echo"<br/> <input type = \"submit\" value = \"Update your weight\"\>";

?>

</body></html>
