<?php

//require_once('../../Connections/localhost.php');
//require_once('../../function/function.php');
//require_once('../../function/log.php');
require_once('phpmail/class.phpmailer.php'); //local da pasta phpmailer
/*
$id_contrato = $_REQUEST['id_contrato'];
$token       = md5($id_contrato);

			$updateSQL = "UPDATE tb_contrato SET token='$token', termo='ENVIADO' WHERE id = '$id_contrato'";
			mysql_select_db($database_localhost, $localhost);
			$Result1 = mysql_query($updateSQL, $localhost) or die(mysql_error());
			
			$sql_vei  = "SELECT c.email as mail,v.id_cliente FROM tb_cliente as c, tb_veiculo as v , tb_contrato as co
							WHERE co.id = '$id_contrato' AND co.veiculo=v.id AND v.id_cliente=c.id";
			$qr_vei   = mysql_query($sql_vei) or die (mysql_error());
			$ln_vei   = mysql_fetch_assoc($qr_vei); 
			
		  $mail_cliente = $ln_vei['mail'];*/

 $msg = '

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta name="viewport" content="width=device-width"/>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>

    <title>Concept</title>
  </head>
  <body style="margin:0px; background: #; ">
    <div width="100%" style="background: transparent; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
      <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
          <tbody>
            <tr>
              <td style="vertical-align: top; padding-bottom:30px;" align="center">
                <a href="#" target="_blank">
                  <img src="http://conceptclubedebeneficios.com.br/images/logo.png" class="" width="180px"/>
                </a>
              </td>
            </tr>
          </tbody>
        </table>
        <div style="padding: 40px; background: #d49b56; border-radius: 3px;">
          <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
            <tbody>
              <tr>
                <td>
                  <h1 style="font-size:20px; font-family:arial; margin:0px; color:#fff; font-weight:bold;">Olá!</h1>
                  <p style="margin-top:0px; color:#fff;"></p>
                </td>
              </tr>
              <tr>
                <td>
                  <p style="margin-top: 0px; color: #fff; font-size: 16px;">
                    <strong>Seja bem vindo(a) a Concept!</strong>, esta mensagem contem o link para acesso ao contrato de serviços e o botão para que voce concorde com os termos.
                  </p>
					
                  <p style="margin-top: 0px; color: #fff; font-size: 16px;"><a href="http://unigestor.com.br/concept/_modulos/contrato/impressao_proposta.php?token='.$token.'">Clique aqui e veja o contrato</a></p>
                </td>
              </tr>
              <tr>
                <td>
				<center>
                  <p style="color: #767a80; font-size: 16px;"><a href="http://unigestor.com.br/concept/_modulos/contrato/termo_aceite.php?token='.$token.'">
                  <button class="btn btn-success" style="font-size:18px; margin: 10px" >Aceito os Termos<i class="fa fa-file"></i></button></a></p>
                  <hr style="border-top: 1px solid #edeff2;">
				 </center>
                </td>
              </tr>
              <tr>
                <td style="padding-top: 20px; color: #fff;">
                  <center>
                    Entre em contato conosco pelo e-mail: gerenteadm.concept@gmail.com<a href="mailto:gerenteadm.concept@gmail.com"></a>
                  </center>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>';

//enviar
   
					$mail = new PHPMailer();
					$mail->IsSMTP(); // Define que a mensagem será SMTP
          $mail->Host     = "h33.servidorhh.com"; // Endereço do servidor SMTP
          $mail->SMTPAuth = true; // Autenticação
          $mail->Port     = 465;

          echo $mail->Username = "naoresponda@conceptclubedebeneficios.com.br"; // Usuário do servidor SMTP
          $mail->Password = "kY!{JY7^@xW;"; // Senha da caixa postal utilizada
          $mail->From     = "naoresponda@conceptclubedebeneficios.com.br";  
          $mail->FromName = "Concept - Financeiro";
					$mail->AddAddress($mail_cliente); 
					
 
					$mail->SMTPDebug = 1; //troca para 1 ou 4 para debugar o erro
					$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
					$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
					$mail->Subject  = "Termo de Aceite e Contrato"; // Assunto da mensagem
					$mail->Body = $msg;//$msg;

					//$mail->AddAttachment("$arquivo", "$id_conta.pdf");
					$enviado = $mail->Send();
					$mail->ClearAllRecipients();
					$mail->ClearAttachments();	

          //salvalog("AUTO","EMAIL ENVIADO > ".$mail_cliente);
	
?>