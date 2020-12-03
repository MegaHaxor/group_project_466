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



echo"<form action=\"http://students.cs.niu.edu/~z1874508/newUserForm.php\" method=\"POST\"\>";

//get information on the user
echo"<h3>Enter your name</h3>";
echo"<input type = \"text\" name = name value = \"Enter your name\"> <br/> ";

echo"<h3>Enter a Userid for your new account</h3>";
echo"<input type = \"text\" name = Userid value = \"Enter Userid\"> <br/> ";

echo"<h3>Enter a password for you new account</h3>";
echo"<input type = \"text\" name = password value = \"Enter password\"> <br/> ";

echo"<input type = \"submit\" value = \"Make account\"\>";

//display the results
if(isset($_POST['name']))
{
    if(isset($_POST['Userid']))
    {
        if(isset($_POST['password']))
        {
            try
            {
                //find their account id
                $result = $pdo->query("SELECT * FROM User where Userid like \"" . $_POST['Userid'] . "\"");
                $ans = $result->fetch(PDO::FETCH_ASSOC);

                if($result->rowCount() > 0)
                {
                    echo"Sorry that user id is already taken!";
                    return;
                }


                $prepared = $pdo->prepare("INSERT INTO User(Userid, name, pass) values(?, ?, ?)");
                $prepared->execute(array($_POST['Userid'], $_POST['name'], $_POST['password']));
            }

            catch(PDOException $e)
            {
                echo"<br/>Failed to insert into the database: " . $e->getMessage();
                return;
            }

            //display their new account number
            $result = $pdo->query("SELECT * FROM User ORDER BY Userid DESC LIMIT 1");
            $ans = $result->fetch(PDO::FETCH_ASSOC);

            echo "<br/><h4>" . $_POST['name'] . " your Userid is " . $_POST['Userid'] . " thank you for making an account!</h4>";
        }
        else
            echo"You must enter a password!";

        
    }


}


?>

</body></html>
