<?php require_once 'cabecalho.php'; ?>
<?php
require_once('../phpmailer/class.phpmailer.php');

// Inicia a classe PHPMailer
$mail = new PHPMailer();

if(isset($_POST[trocaSenha])){
    $email = $mysqli->escape_string($_POST['email']);

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $ERROR[]= "E-mail inválido.";
}
if(count($ERROR)==0){
       $novaSenha = substr(md5(time()), 0, 6);
       $novaSenhaCrip = md5(md5($novaSenha));
      if(mail($email,"Sua nova Senha ","Sua nova senha é: ".$novasenha)){
      $sql_string = "Update  tbClientes set  senha ='$novaSenhaCrip' where emailCliente = '$email'";
      $sql_query = $mysqli->query($sql_string) or die ($mysqli->error);
}


}

 ?>


<form class="form" action="">
    <label for="email">Email</label>
        <input type="email" id="email" placeholder="Digite  o e-mail cadastrado!">


    <button type="submit" name="trocaSenha"  class="button-2">Trocar Senha</button>

 <?php require_once 'rodape.php'; ?>
