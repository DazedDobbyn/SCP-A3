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
        
        <h1>Enter an SCP Subject into the database</h1>
        <p><a href="index.php">Back to Index page</a></p>
        
        <form method="post" action="connection.php">
            
            <label>Enter SCP Item #: </label>
            <br>
            <input type="text" name="item" placeholder="SCP Item #">
            <br><br>
            
            <label>Enter Object Class: </label>
            <br>
            <input type="text" name="objclass" placeholder="Object Class">
            <br><br>
            
            <label>Enter Image Directory: </label>
            <br>
            <input type="text" name="image" placeholder="Image Directory">
            <br><br>
            
            <label>Enter Description: </label>
            <br>
            <input type="text" name="description" placeholder="Description">
            <br><br>
            
            <label>Enter Special Containment Procedures: </label>
            <br>
            <input type="text" name="containment" placeholder="Containment">
            <br><br>
            
            <input type="submit" name="submit" value="Submit SCP Subject">
            
        </form>
        
</body>
</html>