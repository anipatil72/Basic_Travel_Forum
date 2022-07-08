<?php

$insert = false;

if (isset($_POST['name'])) {

    //Set connection variables



    $server = "localhost";
    $username = "root";
    $password = "";

    //Create a Variable

    $con = mysqli_connect($server, $username, $password);

    //Check for connection success

    if (!$con) {
        die("Connection to database failed" . mysqli_connect_error());
    }

    // echo("Successfully connected to Database");

    //Collect Post Variables

    $name = $_POST['name'];

    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];


    //Execute the Query


    $sql = "INSERT INTO `kaziranga_trip`.`trip` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `info`, `Entry Time`) 
VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";

    // echo $sql;

    if ($con->query($sql) == true) {

        //flag for successful insertion

        $insert = true;

        // echo "Successfully inserted the query";  
    } else {
        echo "Error $sql : <br> $con->error";
    }

    //Close thr Connection

    $con->close();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Form</title>


    <!-- CSS only -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">

</head>

<body>


    <img class="bg" src="bgg.jpg" alt="Kaziranga">

    <div class="container">



        <h1>Welcome to IITG Kaziranga National Park Trip Forum</h1>

        <p>Enter your details and submit this form to cofirm your presence in trip</p>

        <?php

        if ($insert == true) {

            echo  "<p class='submitmsg'>Thanks for filling the form, we are glad to have you on board! </p>";
        }

        ?>



        <form action="index.php" method="post">




            <input type="text" name="name" id="name" placeholder="Enter your name">

            <span>

                <div>

                    <label for="age">Age:</label>
                    <input type="text" name="age" id="age" placeholder="Enter your age">

                </div>

                <div>

                    <label for="gender">Gender:</label>
                    <input type="text" name="gender" id="gender" placeholder="Enter your gender">

                </div>


            </span>

            <input type="email" name="email" id="email" placeholder="Enter your Email">

            <input type="phone" name="phone" id="phone" placeholder="Enter your phone number">

            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter your info here"></textarea>

            <br>

            <span>

                <button type="submit">Submit</button>


            </span>





        </form>


    </div>

    <script src="index.js"> </script>
</body>

</html>