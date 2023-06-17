<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>SCP Subject Database</title>
</head>
<body>
        
        <h1>Update SCP Information</h1>
        <p><a href="index.php">Back to Index page</a></p>
        
        <?php
        
            include "connection.php";
            $id = $_GET['update'];
            $record = $connection->query("select * from monster where id = $id");
            $row = $record->fetch_assoc();
            
        ?>
        
        <form method="post" action="connection.php">
            <input type = "hidden" name = "id" value = "<?php echo $row['id']; ?>">
            <label>Update Item #: </label>
            <br>
            <input type="text" name="item" value="<?php echo $row['item']; ?>">
            <br><br>
            
            <label>Update Object Class: </label>
            <br>
            <input type="text" name="objclass" value="<?php echo $row['objclass']; ?>">
            <br><br>
            
            <label>Update Image Directory: </label>
            <br>
            <input type="text" name="image" value="<?php echo $row['image']; ?>">
            <br><br>
            
            <label>Update Description: </label>
            <br>
            <input type="text" name="description" value="<?php echo $row['description']; ?>">
            <br><br>
            
            <label>Update Containment Procedures: </label>
            <br>
            <input type="text" name="containment" value="<?php echo $row['containment']; ?>">
            <br><br>
            
            <input type="submit" name="update" value="Update SCP Subject">
            
        </form>
        
</body>
</html>