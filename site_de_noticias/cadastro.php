<?php 
if(!empty($_POST["submit"])){

    // VARIÁVEIS DE ERRO:
    $erros = array();

    if(empty($nome = $_POST["nome"])){
        $erros[] = "Algo está errado em Nome<br>";
    }
    if( empty($email = $_POST["email"])){
        $erros[] = "Algo está errado em Email<br>";
    }
    if(empty( $senha = $_POST["senha"])){
        $erros[] = "Algo está errado em Senha<br>";
    }

    // PEGANDO ARQUIVO JSON
    $usuarios_array = array();
    $usuarios = file_get_contents('usuarios.json');

    // VERIFICANDO NOME
    $nomeVerificado = filter_var($nome, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);

    $usuarios_array[] = $nomeVerificado ;

    // VERIFICANDO EMAIL
    $emailVerificado = filter_var($email, FILTER_SANITIZE_EMAIL);
    if(!filter_var($emailVerificado, FILTER_VALIDATE_EMAIL)){
        $erros[] = "Formato de email incorreto";
    }else{
        $usuarios_array[] =  $emailVerificado;
    }

    // VERIFICANDO SENHA
    $senhaVerificada = filter_var($senha, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
    $usuarios_array[] = $senhaVerificada;

    $usuarios = json_encode($usuarios_array);
    echo $usuarios;
    // foreach($usuarios_array as $usuario_dados){
    // }
    // EXIBINDO ERROS, CASO TENHA ALGUM
    foreach($erros as $erro){
        echo $erro."<br>";
    }

}else{
    $sem_info = "Temos algum problema"; 
    echo $sem_info;
}

?>