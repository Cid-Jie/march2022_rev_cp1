<?php

    require_once 'db.php';
    $db = new PDO(DSN, USER, PASS);

    $query = "SELECT * FROM Article;";
    $statement = $db->query($query);
    $articles = $statement->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des courses</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Liste des courses</h1>

    <div class="articleContainer">
        <?php
            foreach($articles as $article) {
                $classname = 'article';
                if($article['required'] == 0)
                    $classname = 'article unrequired';

                echo '<p class="' . $classname . '">' . $article['name'] . ' <span>' . $article['quantity'] .'</span></p>';
            }
        ?>

    </div>
    
</body>
</html>