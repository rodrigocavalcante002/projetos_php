<?php 
// class Pessoa 
// {
//     // Propiedades/atributos
//     public $nome;
//     public $idade;

//     // Métodos/funções
//     public function Falar(){
//         echo $this -> nome . ", de idade " . $this -> idade. " acabou de falar <br>";
//     }
// }

// $rodrigo = new Pessoa();
// $rodrigo -> nome = "Rodrigo Cavalcante dos Santos";
// $rodrigo -> idade = "17";
// $rodrigo -> Falar();
// // echo $rodrigo -> nome;
// // var_dump($rodrigo);

if(empty($_POST["submit"])){
    echo "Houve algum problema"; 
}else{
    include 'usuarios.php';
    // var_dump($_POST["submit"]);
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // var_dump($user);
    // echo $usuario["nome"];
    class Login
    {
        private $email;
        private $senha;
      
        public function getEmail() {
            return $this->email;
        }
    
        public function setEmail($e) {
            $email = filter_var($e, FILTER_SANITIZE_EMAIL);
            $this->email = $email;
        }
        public function getSenha() {
            return $this->senha;
        }
    
        public function setSenha($s) {
            $senha = htmlspecialchars($s);
            $this->senha = $senha;
        }
    
        public function Logar() {
            include 'usuarios.php';
            
            // var_dump($user);
            if($this->email == $usuario["email"] and $this->senha == $usuario["senha"]){
                echo "Logado com sucesso!";
            }else{
                echo "Dados inválidos";
            }
        }
        
    }
    $logar = new Login();
    $logar->setEmail($email);
    $logar->setSenha($senha);
    $logar->Logar();
    echo "<br>";
    
    echo $logar->getEmail() . "<br>";
    echo $logar->getSenha();
    
}
?>