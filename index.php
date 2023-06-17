<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>SCP Subject Database</title>
</head>
<body class="text-bg-dark p-3 container">
    <?php include 'connection.php'; ?>
    <h1>SCP Subject Database</h1>
    <p class="toForm"><a class="btmbtn" href="form.php">To Form page</a></p>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">

                <button id="navbtn" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

                    <span class="navbar-toggler-icon"></span>

                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <?php foreach($result as $link): ?>
                            <a class="linkdec" href="index.php?link='<?php echo $link['item']; ?>'"><?php echo $link['item']; ?></a>
                            <?php endforeach; ?>
                        </li>
                    </ul>    
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <?php
            
            if(isset($_GET['link']))
            {
                
                $item = trim($_GET['link'], "'");
            
                // Run SQL query to retrieve record based on GET value 
                $record = $connection->query("select * from monster where item='$item'");
            
                // Turn record into associative array
                $array = $record->fetch_assoc(); 
                
                // Variables to hold our id, update and delete values
                $id = $array['id'];
                $update = "update.php?update=" . $id;
                $delete = "connection.php?delete=" . $id;
                
                // Display contents of array in HTML
                echo "
                    <div class='maintext'>
                    <h2 id='titlemargin'>ITEM #: {$array['item']}</h2>
                    <p>OBJECT CLASS: {$array['objclass']}</p>
                    <p><img src='{$array['image']}'></p>
                    </div>
                    <div class='maintext'>
                    <p>SPECIAL CONTAINMENT PROCEDURES: {$array['containment']}</p>
                    </div>
                    <div class='maintext'>
                    <p class>DESCRIPTION: {$array['description']}</p>
                    </div>
                    <p class='btmbtn'>
                        <a class='btmbtn' href='{$update}'>Update Record</a>
                        <a class='btmbtn' href='{$delete}'>Delete Record</a>
                    </p>
                ";
            }
            else
            {
                echo "
                
                    <h2>Welcome to the SCP Subject Database</h2>
                    <p>Click on the links above to view an SCP from the database</p>
                    <p><img src='https://upload.wikimedia.org/wikipedia/commons/thumb/1/19/SCP_Foundation_logo.svg/1200px-SCP_Foundation_logo.svg.png'></p>

                ";
            }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>