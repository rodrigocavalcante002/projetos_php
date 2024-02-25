<?php 

if(isset($_POST["submit"])){
  // print_r($_FILES);
  if(!empty($_FILES['uploadImagem']['name'])){
    $nomeArquivo = $_FILES['uploadImagem']['name'];
    $tipo = $_FILES['uploadImagem']['type'];
    $tamanhoArquivo = $_FILES['uploadImagem']['size'];
    $nomeTemporario = $_FILES['uploadImagem']['tmp_name'];
    $erros = array();

    $tamanhoPermitido = 1024 * 1024 * 10; //10MB
    if($tamanhoArquivo > $tamanhoPermitido){
      $erros[] = "A imagem excede o tamanho permitido**<br>";
    }

    $extensao = pathinfo($nomeArquivo, PATHINFO_EXTENSION);
    $extensaoPermitida  = ["png", "jpg", "jpeg"];
    if(!in_array($extensao, $extensaoPermitida)){
      $erros[] = "Este Arquivo não é permitido**<br>";
    }
    $tiposPermitidos = ["image/png", "image/jpg", "image/jpeg"];
    if(!in_array($tipo, $tiposPermitidos)){
      $erros[] = "O tipo de Arquivo não é permitido**<br>";
    }
    if(!empty($erros)){
      foreach($erros as $erro){
        echo $erro;
      }
    }else{
      $continuarUpload = "Continuar Upload<br>";
      $caminho = "envios/";
      $momento = date("Y-m-d_h-i-s");
      $novoNome = $momento . "_" . $nomeArquivo;
      if(move_uploaded_file($nomeTemporario, $caminho.$novoNome)){
        echo "Arquivo Enviado com sucesso!<br>";
      }else{
         echo "Erro ao enviar o arquivo**<br>";
      }
      
    }
  }
}


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <a href="index.php"><?php echo $continuarUpload;?></a>
</body>
</html>
