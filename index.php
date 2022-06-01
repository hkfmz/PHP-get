<?php
$access = new PDO("mysql:host=localhost;dbname=monoshop;charset=utf8","root","");

$req = $access->prepare("SELECT * FROM produits");
$req->execute();
$data = $req->fetchAll(PDO::FETCH_OBJ);
$req->closeCursor();

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
        <div class="col-md-2"></div>
        <div class="col-md-8" style="display: flex; justify-content: flex-end; margin: 6px; width: 100%">
<?php foreach ($data as $d): ?>

            <div class="card" style="width: 18rem;">
            <img src="<?= $d->image ?>" class="card-img-top" style="">
            <div class="card-body">
                <h5 class="card-title"><?= $d->nom ?></h5>
                <p class="card-text"><?= substr($d->description, 0, 100) ?>...</p>

                <a href="produit.php?nom=<?= $d->nom ?>" class="btn btn-primary">Voir le produit</a>

            </div>
            </div>

<?php endforeach; ?>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
    
</body>
</html>