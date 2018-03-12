<?php
    //conecta com o banco de dados e exporta a conexão na variavel
    require_once("conexao.php");
    
    //sql que busca as imagens
    $sql = "SELECT * FROM `imagens`";
    
    //executa a string sql e retornou na variavel resultado
    $resultado = mysqli_query($bancoConectado, $sql);

    //Setando variavel vazia de imagens
    $variasImagens = array();

    //Looping de tratamento de resultado do banco (parecido com um for)
    while($resultadoProcessado = mysqli_fetch_assoc($resultado)){
        //salva resultado processado na variavel vazia de imagens
        $variasImagens[] = $resultadoProcessado;
    }
?>
<!-- pegando a variavel com todas as imagens e exibindo uma a uma -->
<?php foreach($variasImagens as $umaImagen):?>
    <!-- utilizando a variavel para exibir a imagem -->
    <img width="150" src="uploads/<?php echo $umaImagen['arquivo']?>">
    <p>Nome: <?php echo $umaImagen['nome']?></p>
    <p>Descrição: <?php echo $umaImagen['descricao']?></p>
    <!-- finalizando o foreach -->
<?php endforeach?>
