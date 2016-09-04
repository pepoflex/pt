<?php 
$errors = '';
$myemail = 'jrclurita@hotmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']) ||
   empty($_POST['subject']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: Todos los campos son Obligatorios";
}
 
$name = $_POST['name']; 
$email_address = $_POST['email'];
$subject = $_POST['subject']; 
$message = $_POST['message']; 
 
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Correo Inv&aacute;lido";
}



if( empty($errors))
 
{
 
$to = $myemail;
 
$email_subject = "Datos recibidos de: $name";
 
$email_body = "Nuevo Mensaje desde Portafolio Web. \n".
"Nombre: $name\n ".

"E-mail: $email_address\n ".

"Asunto: $subject\n ".

"Mensaje: $message\n ";
 
$headers = "From: $myemail\n";
 
$headers .= "Reply-To: $email_address";
 
mail($to,$email_subject,$email_body,$headers);
 
//redirect to the 'thank you' page
 
header('Location: ../enviadook.html');
 
}
?>