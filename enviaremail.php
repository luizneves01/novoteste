<?php
 
// Inclui o arquivo class.phpmailer.php localizado na pasta class
require_once("PHPMailer_5.2.0/class.phpmailer.php");
 
// Inicia a classe PHPMailer
$mail = new PHPMailer(true);
 
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
 
try {
     $mail->Host = 'mail.injoy.com.br'; // Endereço do servidor SMTP (Autenticação, utilize o host smtp.seudomínio.com.br)
     $mail->SMTPAuth   = true;  // Usar autenticação SMTP (obrigatório para smtp.seudomínio.com.br)
     $mail->Port       = 993; //  Usar 587 porta SMTP
     $mail->Username = 'felipe.neves@injoy.com.br'; // Usuário do servidor SMTP (endereço de email)
     $mail->Password = 'padrao321'; // Senha do servidor SMTP (senha do email usado)
 
     //Define o remetente
     // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=    
     $mail->SetFrom('seu@e-mail.com.br', 'Nome'); //Seu e-mail
     $mail->AddReplyTo('seu@e-mail.com.br', 'Nome'); //Seu e-mail
     $mail->Subject = 'Assunto';//Assunto do e-mail
 
 
     //Define os destinatário(s)
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     $mail->AddAddress('luiz.felipe.neves3@gmail.com', 'Teste Locaweb');
 
     //Campos abaixo são opcionais 
     //=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
     //$mail->AddCC('destinarario@dominio.com.br', 'Destinatario'); // Copia
     //$mail->AddBCC('destinatario_oculto@dominio.com.br', 'Destinatario2`'); // Cópia Oculta
     //$mail->AddAttachment('images/phpmailer.gif');      // Adicionar um anexo
 
 
     //Define o corpo do email
     $mail->MsgHTML('corpo do email'); 
 
     ////Caso queira colocar o conteudo de um arquivo utilize o método abaixo ao invés da mensagem no corpo do e-mail.
     //$mail->MsgHTML(file_get_contents('arquivo.html'));
 
     $mail->Send();
     echo "Mensagem enviada com sucesso</p>\n";
 
    //caso apresente algum erro é apresentado abaixo com essa exceção.
    }catch (phpmailerException $e) {
      echo $e->errorMessage(); //Mensagem de erro costumizada do PHPMailer
}
?>