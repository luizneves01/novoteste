<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sistema de upload</title>
        <?php require_once("importacoes.php")?>
    </head>
    <body>
        <div class="container">
            <img width="150" src="img/logo.png">
            <h1>PhotoPostRocket</h1>
            <p>
                <a class="btn btn-primary" href="inserirfoto.php">Incluir foto</a>
            </p>
            <?php require_once("mosaico.php")?>
        </div>    
    </body>
</html>