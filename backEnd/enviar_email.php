<?php

use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';

if (
	isset($_POST['nome']) and !empty($_POST['nome']) and
	isset($_POST['email']) and !empty($_POST['email']) and
	isset($_POST['mensagem']) and !empty($_POST['mensagem'])
) {
	$nome = ucfirst(strtolower(addcslashes($_POST['nome'])));
	$email = ucfirst(strtolower(addcslashes($_POST['email'])));
	$mensagem = ucfirst(strtolower(addcslashes($_POST['mensagem'])));
	$whatsapp = ucfirst(strtolower(addcslashes($_POST['whatsapp'])));

	$mensagem = "
		Nome: $nome, <br/>
		E-mail: $email, <br/>
		Whatsapp: $whatsapp, <br/>
		Mensagem: $mensagem <br/>
	";

	return enviar_email($mensagem);

} else {
	print "<script>alert('Preencha os campos obrigatórios!');</script>";
	print "<script>window.location.href = `../index.html`;</script>";
	return false;
}
function enviar_email($mensagem)
{
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	$mail = new PHPMailer;

	$mail -> isSMTP();
	$mail -> SMTPDebug = 2;
	$mail -> Host = 'smtp.hostinger.com';
	$mail -> Port = 465;
	$mail -> SMTPAuth = true;
	$mail -> Username = 'contato@eddumoreira.com';
	$mail -> Password = '';
	$mail -> setFrom('contato@eddumoreira.com', 'Eduardo Moreira');
	$mail -> addAddress('edmoreira.sza@gmail.com', 'Eduardo Moreira');
	$mail -> Subject = "E-mail enviado a partir do seu portifólio pessoal!";
	$mail -> Body = $mensagem;

	try {
		$mail -> send();
		print "<script>alert('Mensagem enviada com sucesso!');</script>";
		print "<script>window.location.href = `../index.html`;</script>";
		return true;
	} catch (Exception $e) {
		print "<script>alert('Erro ao enviar a mensagem!');</script>";
		print "<script>window.location.href = `../index.html`;</script>";
		return false;
	}
}

?>