<!DOCTYPE html>
<hmtl>
    <title>creating database</title>


    <body>
        <?php
        
        $servername = "stararchive";
        $username = "root";
        $password = "";
        

        //create connection
        $conn = new mysqli($servername, $username, $password);

        if ($conn ->connect_error){
            die("connection failed: ".$conn ->connect_error);
        } 

        //create database
        $sql = "CREATE DATABASE justTestingToSeeHowDatabasesAreMade";
        if ($conn -> query($sql)===TRUE){
            echo "justTestingToSeeHowDatabasesAreMade was made";
        }else{
            echo "error creating database" .$conn->error;
        }
        $conn->close();
        ?>
    </body>
</hmtl>