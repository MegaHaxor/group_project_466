<html><head><title>Add a workout</title></head><body>

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

echo"<form action=\"http://students.cs.niu.edu/~z1874508/exerciseDisplay.php\" method=\"POST\"\>";


//find the account
echo"<h2> Please enter your Userid</h2> <br/>";
echo"<input type = \"text\" name = \"Userid\" value = \"\"> <br\>";


echo"<h2>Show Data on your exercise?</h2>";

//ask if they want to show data on the exercise
echo"<input type = \"radio\" name = \"data\" value= \"yes\"\> Yes <br\>";
echo"<input type = \"radio\" name = \"data\" value= \"no\"\> No <br\>";

echo"<h4> If yes starting at what date? Enter in the format below or leave as is </h4>";
echo"<input type = \"text\" name = \"dataDate\" value = \"" . date("Y-m-d") . "\"\> <br\>";


//allow them to skip the rest of the form
echo"<h5> If you don't want to enter an exercise click Go! to continue</h5>";
echo"<input type = \"submit\" value = \"Go!\"\>";


echo"<h3>Would you like to enter an exercise?</h3>";
echo"<input type = \"radio\" name = \"newE\" value= \"yes\"\> Yes <br\>";
echo"<input type = \"radio\" name = \"newE\" value= \"no\"\> No <br\>";


echo"<h3>Select your Exercise</h3>";
    

//display the exercise types
$result = $pdo->query("SELECT DISTINCT type FROM Exercise order by type");
$ans = $result->fetchAll(PDO::FETCH_ASSOC);

foreach($ans as $row)
{
    echo"<h4>". $row['type'] . "</h4>";

    $result1 = $pdo->query("SELECT * FROM Exercise WHERE type = \"" . $row['type'] . "\"");
    $ans1 = $result1->fetchAll(PDO::FETCH_ASSOC);
    foreach($ans1 as $row1)
    {
        echo"<input type = \"radio\" name = \"Exercise\" value = \"" . $row1['exerciseName'] . "\"\>" . $row1['exerciseName'];
    }

}

echo"</table>";


//get the rest of the information on the users exercise
echo"<br/> <h3> What day did you exercise? Enter a date and time in the format as shown or leave as is for todays date and current time. </h3> <br/>";
echo"<input type = \"text\" name = \"Date\" value = \"" . date("Y-m-d h:i") . "\"\> <br\>";

echo"<br/> <h3> How long did you exercise? </h3> <br/>";
echo"<input type = \"text\" value = \"Exercise Length\" name = \"length\"\> <br\>";

echo"<br/> <h3> How intense was your exercise? </h3> <br/>";
echo"<input type = \"radio\" name = \"Intensity\" value = \"light\"\> Light";
echo"<input type = \"radio\" name = \"Intensity\" value = \"normal\"\> Normal";
echo"<input type = \"radio\" name = \"Intensity\" value = \"heavry\"\> Heavy <br/>";


echo"<br/> <input type = \"submit\" value = \"Add exercise\"\>";

echo"</form>";

?>

</body></html>
