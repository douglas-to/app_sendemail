<?php

	require "./Bibliotecas/phpmailer/Exception.php";
	require "./Bibliotecas/phpmailer/OAuth.php";
	require "./Bibliotecas/phpmailer/PHPMailer.php";
	require "./Bibliotecas/phpmailer/POP3.php";
	require "./Bibliotecas/phpmailer/SMTP.php";

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	class Mensagem{
		private $para = null;
		private $assunto = null;
		private $mensagem = null;
		public $status = array('codigo-status' => null, 'descricao-status' => '');

		public function __get($attr){
			return $this->$attr;
		}

		public function __set($attr, $value){
			$this->$attr = $value;
		}

		public function mensagemValida(){
			if(empty($this->para) || empty($this->assunto) || empty($this->mensagem)){
				return false;
			}
				return true;
		}
	}

	$mensagem1 = new Mensagem();
	$mensagem1->__set("para", $_POST["para"]);
	$mensagem1->__set("assunto", $_POST["assunto"]);
	$mensagem1->__set("mensagem", $_POST["mensagem"]);

	// print_r($mensagem1);


	if(!$mensagem1->mensagemValida()){
		echo "Mensagem não é valida";
		header('Location: index.php');
	}

	$mail = new PHPMailer(true);

	try {
    	//Server settings
    	$mail->SMTPDebug = false;                      //Enable verbose debug output
    	$mail->isSMTP();                                            //Send using SMTP
    	$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    	$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    	$mail->Username   = 'userEmail';                     //SMTP username
    	$mail->Password   = 'userPassword';                               //SMTP password
    	$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    	$mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    	//Recipients
    	$mail->setFrom('userEmail', 'email remetente');
    	$mail->addAddress($mensagem1->__get('para'));     //Add a recipient
    	// $mail->addAddress('ellen@example.com');               //Name is optional
    	// $mail->addReplyTo('info@example.com', 'Information');
    	// $mail->addCC('cc@example.com');
    	// $mail->addBCC('bcc@example.com');

    	//Attachments
    	// $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    	// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    	//Content
    	$mail->isHTML(true);                                  //Set email format to HTML
    	$mail->Subject = $mensagem1->__get('assunto');
    	$mail->Body    = $mensagem1->__get('mensagem');
    	$mail->AltBody = 'É necessario usar um client HTML, para ter acesso total ao conteúdo dessa mensagem.';

    	$mail->send();

    	$mensagem1->status['codigo-status'] = 1;
    	$mensagem1->status['descricao_status'] = 'E-mail enviado com sucesso!';

	}catch (Exception $e){
		$mensagem1->status['codigo-status'] = 2;
    	$mensagem1->status['descricao_status'] = "Não foi possivel enviar este email, por favor tente mais tarde.: erro: {$mail->ErrorInfo}"; 
    
	}

	header('Location: index.php');
?>