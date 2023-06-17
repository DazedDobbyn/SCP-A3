<?php
    // Database credentials remember to fill in your own details
    $user = "a30067184_jacks";
    $pw = "Toiohomai1234";
    $db = "a30067184_monsters";
    
    // Database connection
    $connection = new mysqli('localhost', $user, $pw, $db);
    
    // variable that returns all records in database input name of your DB Table
    $result = $connection->query("select * from monster");

    // check if form data has been send via post
    if(isset($_POST['submit']))
    {
        // create variables from our form post data
        $item = $_POST['item'];
        $objclass = $_POST['objclass'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        $containment = $_POST['containment'];
        
        // create a sql insert command
        $insert = "insert into monster(item, objclass, image, description, containment) 
        values('$item', '$objclass', '$image', '$description', '$containment')";
        
        if($connection->query($insert) === TRUE)
        {
            echo "
                <h1>Record added succesfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo "
                <h1>Error submitting data</h1>
                <p>{$connection->error}</p>
                <p><a href='form.php'>Return to form</a></p>
            ";
        }
    } // end isset post
    
    // Delete record function
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        
        // Delete SQL command
        $delete = "delete from monster where id = $id";
        
        if($connection->query($delete) === TRUE)
        {
            echo " 
            <style>
                body {font-family: sans-serif;}
                a {background-color: black;
                    border: none;
                    color: white;
                    padding: 10px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                }
                
            </style>
            <h1>Record Deleted</h1>
            <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo " 
            <style>
                body {font-family: sans-serif;}
                a {background-color: black;
                    border: none;
                    color: white;
                    padding: 10px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                }
            </style>
            <h1>Record NOT Deleted</h1>
            <p><a href='index.php'>Return to index page</a></p>
            ";
        }
    }

    // Update functionality
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $item = $_POST['item'];
        $objclass = $_POST['objclass'];
        $image = $_POST['image'];
        $description = $_POST['description'];
        $containment = $_POST['containment'];
        
        // Create SQL query
        $update = "update monster set item='$item', objclass='$objclass', image='$image', description='$description', containment='$containment' where id='$id'";
        
        if($connection->query($update) === TRUE)
        {
            echo "
                <style>
                body {font-family: sans-serif;}
                a {
                    background-color: black;
                    border: none;
                    color: white;
                    padding: 10px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                }
                </style>
                <h1>Record updated successfully</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
        else
        {
            echo "
                <style>
                body {font-family: sans-serif;}
                a {
                    background-color: red;
                    border: none;
                    color: white;
                    padding: 10px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block;
                    font-size: 16px;
                }
                </style>
                <h1>Record not updated</h1>
                <p><a href='index.php'>Return to index page</a></p>
            ";
        }
    }
?>