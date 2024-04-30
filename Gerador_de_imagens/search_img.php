<?php 

    if($_SERVER["REQUEST_METHOD"] == "GET") {
        include 'confi_imgs_random.php';
        
        if(!empty($_GET['search_img'])) {

            $search = $_GET['search_img'];
            ValidateData($search);
            $urlSearch = Search_img($url, $search);
             
        }
    }
    function ValidateData($date){
        $date = filter_var($date, FILTER_SANITIZE_STRING);
        $date = stripcslashes($date);
        $date = htmlspecialchars($date);
        return $date;
    }
    function Search_img($url, $search){
        if(!empty($search)){
        return $url = $url."?".$search."/";
        }else{
            return $url = $url;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel = "stylesheet" href = "interface_r.css">
    
</head>
</head>
<body>
    <div class="search_bar">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="get">
            <input type = "text" name="search_img" id="id_search_img" placeholder=" &#128270 Pesquisar" value="<?php echo $search??""?>">
        </form>
    </div>
   
    <div class="body_container">
        
        <?php for($i = 0; $i<= 20; $i++):?>
            <div class="container_imgs">
                <img src="<?php echo !empty($urlSearch) ? $urlSearch.returnRandSize() :  $url.returnRandSize()?>" alt="imagens_aleatórias">

            </div>
        <?php endfor?>
    </div>
   
</body>
</html>