<?php
$access = new PDO("mysql:host=localhost;dbname=monoshop;charset=utf8","root","");

if(!isset($_GET['nom'])){
    header("Location: ../dev");
}else{
    $nom = $_GET['nom'];
    $req = $access->prepare("SELECT * FROM produits WHERE nom=?");
    $req->execute(array($nom));
    $data = $req->fetch(PDO::FETCH_OBJ);
    $req->closeCursor();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<br>
<h2 align="center">Mes produits</h2>

<div class="container">
    <div class="row">

        <div class="col-md-12" style="display: flex; justify-content: center; width: 100%">
        

            <div class="card" style="width: 18rem;">
            <img src="<?= $data->image ?>" class="card-img-top" style="">
            <div class="card-body">
                <h5 class="card-title"><?= $data->nom ?></h5>
                <p class="card-text"><?= $data->description ?>...</p>


            </div>
            </div>

            


        </div>

    </div>
</div>
    
</body>
</html>