<?php

use PHPMailer\PHPMailer\PHPMailer;

if (
	isset($_POST['nome']) and !empty($_POST['nome']) and
	isset($_POST['email']) and !empty($_POST['email']) and
	isset($_POST['mensagem']) and !empty($_POST['mensagem'])
) {
	$nome = ucfirst(strtolower(addslashes($_POST['nome'])));
	$email = ucfirst(strtolower(addslashes($_POST['email'])));
	$mensagem = ucfirst(strtolower(addslashes($_POST['mensagem'])));
	$whatsapp = ucfirst(strtolower(addslashes($_POST['whatsapp'])));

	$mensagem = "
		Nome: $nome, <br/>
		E-mail: $email, <br/>
		Whatsapp: $whatsapp, <br/>
		Mensagem: $mensagem <br/>
	";

	$assunto = "Envio de mensagem através do portifólio.";
	$destinatario = "edmoreira.sza@gmail.com";
	$nomeRemetente = $nome;
	$emailRemetente = "contato@eddumoreira.com";
	$telefoneRemetente = "31 9 9335-9455";

	date_default_timezone_set('America/Sao_Paulo');

	$dia = date('d');
	$hora = date('h:i:s');

	$remetente  = 'MIME-Version: 1.0' . "\r\n";
	$remetente .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$remetente .= 'From: ' . $emailRemetente;

	try {
		mail($destinatario, $assunto, $mensagem, $remetente);
		print "<script>alert('Mensagem enviada com sucesso!');</script>";
		print "<script>window.location.href = `../index.html`;</script>";
		return true;
	} catch (Exception $e) {
		print "<script>alert('Erro ao enviar a mensagem!');</script>";
		print "<script>window.location.href = `../index.html`;</script>";
		return false;
	}

} else {
	print "<script>alert('Preencha os campos obrigatórios!');</script>";
	print "<script>window.location.href = `../index.html`;</script>";
	return false;
}

?>