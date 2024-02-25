<?php 
    // LENDO ARQUIVOS

    // $arquivo ='teste.txt';
    // $arquivoAberto = fopen("teste.txt", "r");
    // $tamanhoArquivo = filesize($arquivo);
    // $conteudo = "isso que irá aparecer no arquivo\r \n";

    
    // while(!feof($arquivoAberto)){
    //     $linha = fgets($arquivoAberto, $tamanhoArquivo);
    //     echo $linha ."<br>";
    // }
    // fclose($arquivoAberto);

    // GRAVANDO ARQUIVOS

    // $arquivo = fopen("teste.txt", "a") or die("Impossível abrir o arquivo");
    // $conteudo = "Hello my friend\n";
    
    // fwrite($arquivo, $conteudo);

    // $conteudo = "Minhas notas na escola podem ser blamurosas, mas será na via real? talvez sim. Tudo o que se precisa é reagir em nossos problemas\n";
    // fwrite($arquivo, $conteudo);

    // fclose($arquivo);

    // UPLOAD DE ARQUIVOS


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uploads de arquivos PHP</title>
</head>
<body>
<form action="uploads.php" method="post" enctype="multipart/form-data" >
    <label for="uploadImagem">Escolha uma imagem para Upload:</label>
    <input type="file" name="uploadImagem" id="uploadImagem">
    <input type="submit" value="Upload de imagem" name="submit">
</form>
</body>
</html>
</body>
</html>
   