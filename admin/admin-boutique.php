<?php
require_once "tools.php";
if ($_POST) {
    if (
        empty($_POST['categorie']) || empty($_POST['titre']) ||
        empty($_POST['couleur']) ||
        empty($_FILES['photo']) || empty($_POST['prix'])
    ) {
        echo "tout n'as pas ete rempli <br/>";
        var_dump($_POST);
        var_dump($_FILES);
    } else if (!empty($_POST)) {
        $check = executerequest("SELECT * FROM produit WHERE titre = :titre", array(':titre' => $_POST['titre']));
        if (!empty($check) && $check->rowCount() > 0) { //verifie si une entré existe deja
            echo 'ce nom est déja prise';
        } 
    }else {
            $request = executerequest(
                "REPLACE INTO produit VALUES (:id_produit, :categorie, :titre, :couleur, :taille, :public, :photo, :prix)",
                array(
                    ':id_produit' => 0,
                    ':categorie' => $_POST['pseudo'],
                    ':titre' => $_POST['email'],
                    ':couleur' => $_POST['couleur'],
                    ':taille' => $_POST['taille'],
                    ':public' => $_POST['public'],
                    ':photo' => $_POST['photo'],
                    ':prix' => $_POST['prix']
                )
            );
        }
    }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <h1> Formulaire Produits </h1>
    <form method="post" enctype="multipart/form-data" action="">

        <label for="categorie">categorie</label><br>
        <input type="text" id="categorie" name="categorie" placeholder="la categorie de produit"><br><br>

        <label for="titre">titre</label><br>
        <input type="text" id="titre" name="titre" placeholder="le titre du produit"> <br><br>

        <label for="description">description</label><br>
        <textarea name="description" id="description" placeholder="la description du produit"></textarea><br><br>

        <label for="couleur">couleur</label><br>
        <input type="text" id="couleur" name="couleur" placeholder="la couleur du produit"> <br><br>

        <label for="taille">Taille</label><br>
        <select name="taille">
            <option value="S">S</option>
            <option value="M">M</option>
            <option value="L">L</option>
            <option value="XL">XL</option>
        </select><br><br>

        <label for="public">public</label><br>
        <input type="radio" name="public" value="m" checked>Homme
        <input type="radio" name="public" value="f">Femme<br><br>

        <label for="photo">photo</label><br>
        <input type="file" id="photo" name="photo"><br><br>

        <label for="prix">prix</label><br>
        <input type="text" id="prix" name="prix" placeholder="le prix du produit"><br><br>

        <input type="submit" value="enregistrement du produit">
    </form>
</body>

</html>