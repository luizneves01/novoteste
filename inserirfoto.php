<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
        <?php require_once("importacoes.php")?>
    </head>
    <body>
        <img width="150" src="img/logo.png">
        <h1>PhotoPostRocket</h1>
        <div class="panel panel-default">
          <div class="panel-heading">Formulario de inserir foto</div>
          <div class="panel-body">
        
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nome da imagem</label>
                        <input class="form-control" type="text" name="nome" placeholder="Nome da imagem" />
                    </div>    
                    <div class="form-group">
                        <label>Descrição da imagem</label>
                        <textarea class="form-control" name="descricao" rows="4"></textarea>
                    </div>    
                    <div class="form-group">
                        <label>Arquivo de upload</label>
                        <input type="file" name="arquivo" />
                    </div>      
                    <input class="btn btn-primary" type="submit" value="upload"/>
                </form>
            </div>
        </div>    
	
	<?php
        $arquivo = isset($_FILES['arquivo'])?$_FILES['arquivo']:"";
		if (isset($_FILES['arquivo'])){
				$nome = $arquivo['name'];
				$tiposPermetidos = ['png'];
				$tamanho = $arquivo['size'];

				$extensao = explode('.', $nome);
				$extensao = end($extensao);
				$novoNome = rand(). "-$nome". "."  .$extensao;
				
				if (in_array ($extensao, $tiposPermetidos)){
					if ($tamanho > 600000){
						 print "o tamanho do arquivo execede o limite permetido  600Kb";
					}else{
						$mover = move_uploaded_file($_FILES['arquivo']['tmp_name'], 'uploads/' . $novoNome);
						//print"<img src='uploads/$novoNome 'width='200'>";
                        require_once("conexao.php");
                        
                        //Inserindo no banco de dados
                        $sql = "INSERT INTO `imagens` (`id`, `nome`, `descricao`, `arquivo`) VALUES (NULL, '{$_POST['nome']}', '{$_POST['descricao']}', '{$novoNome}')";
                        mysqli_query($bancoConectado, $sql);
                        //fim inserir;
                        
                        //Redirecionar
                        header('Location: index.php');
                        exit;
                    }
					}else{
				  	 print "tipo de arquivo não permetido permitimos apenas png";
				  }
			   }

			
	?>
</body>

</html>