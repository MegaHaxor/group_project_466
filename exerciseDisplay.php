<html><title>Exercise Results</title><body>
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


$light = 0.8; //values for the exercise intensity
$normal = 1.0;
$heavy = 1.2;

echo"<a href =\"http://students.cs.niu.edu/~z1874508/homePage.html\">Return home</a><br/><br/>";


//check if there is an account ID
if(empty($_POST['Userid']))
{
    echo "NO ID SUPPLIED! PLEASE TRY AGAIN";
    return;
}

//if not
else
    $Userid = $_POST['Userid'];




//find the user
$prepared = $pdo->prepare("Select * FROM User where Userid = ?");
$prepared->execute(array($Userid));

if($prepared->rowCount() > 0)
{
    $rows = $prepared->fetch(PDO::FETCH_ASSOC);
        echo"Hello, " . $rows['name'] . " nice job tracking your progress! <br/>";
}

else
{
    echo"Sorry you account was not found";
    return;
}


//check if they are adding a new workout
if(isset($_POST['newE']) and $_POST['newE'] == "yes")
{
        echo"<h3>Adding an exercise?</h3>";

        $check=true;
        
        //check if there is something in the exercise field
        if(isset($_POST['Exercise']) and !(empty($_POST['Exercise'])))
        {
            $exerciseType = $_POST['Exercise'];

            //check if something is in the intensity field
            if(isset($_POST['Intensity']))
            {
                $exerciseIntensity = $_POST['Intensity'];
            }
            
            else
            {
                $exerciseIntensity = "Normal";
                echo "No intensity selected normal intensity used";
            }
            
            //check the values in the date field
            if($_POST['Date']==" " || empty($_POST['Date']))
                $check = false;
            else
                $exerciseDate = $_POST['Date'];
            
            //check the values in the Weight field
            if($_POST['length']=="Exercise Length" || empty($_POST['length']))
                $check = false;
            else
                $exerciseLength = $_POST['length'];
            
            
            //if we have valid arguments
            if($check)
            {
                //try to insert into the database 
                try{
            
                //since it is user entered prepare the statement
                $prepared = $pdo->prepare("INSERT INTO Workout (Userid, exerciseName, intensity, length, dateTime) VALUES (?, ?, ?, ?, ?)");
                $prepared->execute(array($Userid, $exerciseType, $exerciseIntensity, $exerciseLength, $exerciseDate));
                echo"<br/>Your Workouts have been updated Thanks!</br>";
                }
            
                //failure to insert
                catch(PDOException $e)
                {
                    echo"<br/>Failed to insert into the database: " . $e->getMessage();
                }
            }
            else
                echo"<br/>Nothing inserted Incorrect argurments <br/>";
        }
        
        else
        {
            echo "No exercise selected not adding workout";
            $check = false;
        }
}
        
//check if data was selected selected
if(isset($_POST['data']))
{      
    if($_POST['data'] == "yes")
    {
        if(!empty($_POST['dataDate']))
        {
            $startDate = $_POST['dataDate'];


            //get the data staring at the users dat
            $prepared = $pdo->prepare("SELECT * FROM Workout, Exercise WHERE dateTime >= ? and Workout.exerciseName = Exercise.exerciseName and Userid = ? order by dateTime");

            $prepared->execute(array($startDate, $Userid));

            if($prepared->rowCount() == 0)
            {
                echo"<br/>no data to show!";
                return;
            }

            $rows = $prepared->fetchAll(PDO::FETCH_ASSOC);

            
            //display the data
            echo"<h3>Data on Workouts</h3><br/>";
            echo"<table border=2>";
            echo"<tr><th>Name</th><th>length</th><th>Calories Burned</th><th>date</th></tr>";
            
            $count = 0;
            $totalburned = 0;

            //loop thorugh the results
            foreach($rows as $row)
            {
                $burned = (($row['length']/60) * $row['calsHour']);


                if($row['intensity'] == 'light')
                    $burned = $burned * $light;
                else if($row['intensity'] == 'normal')
                    $burned = $burned * $normal;
                else
                    $burned = $burned * $heavy;


                $totalburned += $burned;
                $count++;
                echo"<tr><td>" . $row['exerciseName'] . "</td><td>" . $row['length'] . "</td><td>" . round($burned, 2) . "</td><td>" . $row['dateTime'] ."</td></tr>";
            } 
            echo"</table>";

            //find the average and total calories burned
            echo"<br\><h3>Total calories burned over the period " . round($totalburned, 2) . "</h3>";

            if($totalburned != 0)
                $averageBurned = $totalburned / $count;
            else
                $averageBurned = 0;


            echo"<br\><h3>Average calories burned per workout " . round($averageBurned, 2) . "</h3>";
        }
        else
        {
            echo"<br/>No Date Given, No Data Shown <br/>";
            return;
        }
    }
    else
    {
        echo"Just adding a workout today!";
    }

}
else
{
    echo"Just adding a workout today!";
}


?>
</body></html>
