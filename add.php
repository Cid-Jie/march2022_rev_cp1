<?php

    if(
        isset($_POST['name']) &&
        isset($_POST['quantity'])
    ) {
        $data = array_map('trim', $_POST);

        $name = $data['name'];
        $quantity = $data['quantity'];
        $required = isset($data['required']) ? true : false;

        require_once 'db.php';
        $db = new PDO(DSN, USER, PASS);

        $query = 'INSERT INTO Article (name, quantity, required)
                    VALUES (:name, :quantity, :required)';
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $name, PDO::PARAM_STR);
        $statement->bindValue(':quantity', $quantity, PDO::PARAM_INT);
        $statement->bindValue(':required', $required, PDO::PARAM_BOOL);
        $statement->execute();

        header('Location: /');
        die();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout d'article</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Ajout d'article</h1>    

    <form method="post">
        <p>
            <label for="name">Nom de l'article: </label>
            <input type="text" name="name" id="name">
        </p>

        <p>
            <label for="quantity">Quantité : </label>
            <select type="number" name="quantity" id="quantity">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
        </p>

        <p>
            <label for="required">Nécessaire : </label>
            <input type="checkbox" name="required" id="required">
        </p>

        <p>
            <input type="submit" value="Enregistrer">
        </p>
    </form>
</body>
</html>