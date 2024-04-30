<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href = "interface_r.css">
    
    <?php include 'confi_imgs_random.php';?>
</head>
<body>

    <div class="header">
        <a href="search_img.php" class="search_body">
            <div class="search_bar">
                <div class="about_search"><p>Pesquisar Fotos</p></div>
            </div>
        </a>
    </div>

    <div class="body_container">
        
        <?php for($i = 0; $i<= 20; $i++):?>
            <div class="container_imgs">
                <img src="<?php echo $url.returnRandSize(); ?>" alt="imagens_aleatórias">

            </div>
        <?php endfor?>
    </div>
</body>
</html>