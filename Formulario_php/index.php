<?php
$nameErr= $emailErr= $genderErr =  $websiteErr= "";
$name = $email = $gender = $comment = $website = ""; 
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if(empty($_POST["name"])){
        $nameErr = "Nome é obrigatório";
    }else{
        $name = config_input($_POST["name"]);
        if(!preg_match("/^[a-zA-Z- ']*$/", $name)){
            $nameErr="Somente letras e espaços";
        }
    }
    if(empty($_POST["email"])){
        $emailErr = "Email é obrigatório";
    }else{

        $email = config_input($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $emailErr = " Email incorreto       ";
        }
    }
    if(empty($_POST["website"])){
        $websiteErr = "";
    }else{
        $website = config_input($_POST["website"]);
        if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|]/i", $website)){
            $websiteErr = "Formato de link incorreto";
        }
    }
    if (empty($_POST["comment"])){
        $comment = "";
    }else{
        $comment = config_input($_POST["comment"]);
    }
    if(empty($_POST["gender"])){
        $genderErr = "Gênero é obrigatório";
    }else{
        $gender = config_input($_POST["gender"]);
    }
}
function config_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação de Formulários</title>
    <link rel="stylesheet" href="estilophp.css">
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    
        <span class="span_Err"><?php echo $nameErr;?></span>
        <br>
        <input type="text" name="name" value="<?php echo $name;?>" placeholder="Nome">
        <span class="span_Err"><?php echo $emailErr;?></span>
        <br>
        <input type="email" value="<?php echo $email;?>" name="email" placeholder="E-mail">
        <span class="span_Err"><?php echo $websiteErr;?></span>
        <br>
        <input type="text" value="<?php echo $website;?>" name="website" placeholder="Website">
        <br>
        <textarea name="comment" placeholder="Comentário" rows="5" cols="40"><?php echo $comment;?> </textarea>
        
        <span class="span_Err"><?php echo $genderErr;?></span>
        <br>
        <div class="gender">
            <input class="radio_gender" type="radio" name="gender" <?php if(isset($gender) && $gender == "male") echo "checked";?> value="male">Mesculino
        </div>
        <div class="gender">
            <input class="radio_gender" type="radio" name="gender" <?php if(isset($gender) && $gender == "female") echo "checked";?> value="female">Femenino
        </div>
        <div class="gender">
           <input class="radio_gender" type="radio" name="gender" <?php if(isset($gender) && $gender == "other") echo "checked";?> value="other"> Outro
        </div>
        <div id="container_btn">
            <input id="btn" type="submit" value="Enviar>">
        </div>
    </form>
</body>
</html>