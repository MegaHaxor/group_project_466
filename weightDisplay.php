<html><title>Weight Results</title><body>
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

echo"<a href =\"http://students.cs.niu.edu/~z1874508/homePage.html\">Return home</a><br/><br/>";

$LbPerKG = 2.2; //convert between lb and kg


//check if they have an account
if(empty($_POST['Userid']))
{
    echo "NO ID SUPPLIED! PLEASE TRY AGAIN";
    return;
}
else
    $Userid = $_POST['Userid'];


//find the user in the database
$prepared = $pdo->prepare("Select * FROM User where Userid = ?");
$prepared->execute(array($Userid));

//if they were found
if($prepared->rowCount() > 0)
{
    $rows = $prepared->fetch(PDO::FETCH_ASSOC);
        echo"Hello, " . $rows['name'] . " nice job tracking your progress! <br/>";
}

else
{
    echo"Invalid account ID or password please try again! <br/>";
    return;
}

//check if they are updating their weight today
if(isset($_POST['update']))
{
    $check=true;

    if($_POST['update'] == "no")
    {
        echo "Not entering a weight today";
    }
    else
    {
        echo"<h3>Updating weight</h3>";

        //check if they entered a weight
        if($_POST['Weight'] != "Weight" or !empty($_POST['Weight']))
        {
            $weight = $_POST['Weight'];

            //check if they supplied a unit
            if(isset($_POST['unit']))
            {
                if($_POST['unit'] == "kg")
                    $weight = $weight * $LbPerKG;
            }
                    
            else
            {
                echo "No unit given lbs assumed!";
            }
                    
            //check the values in the date field
            if($_POST['Date']==" " || empty($_POST['Date']))
                $check = false;
            else
                $weighDay = $_POST['Date'];
                    
                    
            //if we have valid arguments
            if($check)
            {
                //try to insert into the database 
                try{
                    
                    //since it is user entered prepare the statement
                    $prepared = $pdo->prepare("INSERT INTO Weighs (Userid, dateTime, pounds) VALUES (?, ?, ?)");
                    $prepared->execute(array($Userid, $weighDay, $weight));
                    echo"<br/>Your Weight has been updated Thanks!</br>";
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
    }
}
        
else
{
    echo "Not updating weight now!";
    $check = false;
}

//check if data was selected selected
if(isset($_POST['data']))
{      
    if($_POST['data'] == "yes")
    {
        if(!empty($_POST['dataDate']))
        {
            $startDate = $_POST['dataDate'];


            //get the data staring at the users entered date
            $prepared = $pdo->prepare("SELECT * FROM Weighs, User WHERE dateTime >= ? and User.Userid = Weighs.Userid and Weighs.Userid = ? Order by dateTime");

            $prepared->execute(array($startDate, $Userid));

            $rows = $prepared->fetchAll(PDO::FETCH_ASSOC);

            
            if($prepared->rowCount() == 0)
            {
                echo"<br/>no data to show!";
                return;
            }

            
            $changeInWeight=0; // holds change in weight
            $weightInKg=0;
            $recentWeight=0;

            $convert = false;

            //check if a display unit was specified
            if(isset($_POST["displayUnit"]))
            {
                if($_POST["displayUnit"] == "kg")
                    $convert = true;
                else
                    $convert = false;
            }
            else
            {
                echo"No display unit specified lbs will be used";
            }


            //print the data on the weight
            echo"<h3>Data on Weight</h3><br/>";
            echo"<table border=2>";
            if($convert)
                echo"<tr><th>Date</th><th>Weight in kgs</th></tr>";
            else
                echo"<tr><th>Date</th><th>Weight in lbs</th></tr>";


            $count = 0;
            foreach($rows as $row)
            {

                if($count == 0)
                {
                    //get the first weight
                    $changeInWeight = $row['pounds'];
                }

                $recentWeight = $row['pounds']; // get the most recent weight

                //convert to kilograms if necessary
                if($convert)
                {
                    $weightInKg = $row['pounds'] / $LbPerKG;
                    echo"<tr><td>" . $row['dateTime'] . "</td><td>" . round($weightInKg, 2) . "</td></tr>";
                }
                else
                {
                    echo"<tr><td>" . $row['dateTime'] . "</td><td>" . round($row['pounds'], 2) . "</td></tr>";
                }

                $count++;

            } 
            echo"</table>";


            //conver the values if the option was selected
            if($convert)
            {
                $recentWeight = $recentWeight / $LbPerKG;
                $changeInWeight = $changeInWeight / $LbPerKG;
            }

            $changeInWeight = $recentWeight - $changeInWeight;

            //display the change in wieght from the first to last day
            echo"<br\><h3>Change in weight over the period " . round($changeInWeight, 2) . "</h3>";

        }
        else
        {
            echo"<br/>No Date Given, No Data Shown <br/>";
            return;
        }
    }
    else
    {
        echo"Just updating weight today!";
    }

}
else
{
    echo"Just updating weight today!";
}


?>
</body></html>
