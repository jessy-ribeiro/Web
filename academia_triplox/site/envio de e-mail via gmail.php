<?php

    require_once ("vendor/PHPMailerAutoload.php");

	if(isset($_POST["nome"])){

		$assunto = "Clinica de Psicologia";
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["fone"];
        $mensagem = $_POST["mens"];
		
                    
     
        $phpmail = new PHPMailer(); // Instânciamos a classe PHPmailer para poder utiliza-la          
        $phpmail->isSMTP(); // envia por SMTP
        
        $phpmail->SMTPDebug = 0;
        $phpmail->Debugoutput = 'html';
        
        $phpmail->Host = "localhost"; // SMTP servers         
        $phpmail->Port = 587; // Porta SMTP do GMAIL
        
        //$phpmail->SMTPSecure = 'tls';
        $phpmail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação   
        
        $phpmail->Username = "jeessy.ribeiro@gmail.com"; // SMTP username         
        $phpmail->Password = "ribeirosousa"; // SMTP password          
        $phpmail->IsHTML(true);         
        
        $phpmail->setFrom($email, $nome); // E-mail do remetende enviado pelo method post  
                 
        $phpmail->addAddress("jeessy.ribeiro@gmail.com", "Clinica de Psicologia");// E-mail do destinatario/*  
        
        $phpmail->Subject = $assunto; // Assunto do remetende enviado pelo method post
                
        $phpmail->msgHTML(" Nome: $nome <br>
                            E-mail: $email <br>
                            Telefone: $telefone <br>
                            Mensagem: $mensagem ");
        
        $phpmail->AlrBody = " Nome: $nome \n
                            E-mail: $email \n
                            Telefone: $telefone\n
                            Mensagem: $mensagem ";
            
        if($phpmail->send()){              
            echo "A Mensagem foi enviada com sucesso.";
            $ok = "OK";
        }else{
            echo "Não foi possível enviar a mensagem. Erro: " .$phpmail->ErrorInfo;
        }
         
		
        // ############## RESPOSTA AUTOMATICA
        $phpmailResposta = new PHPMailer();        
        $phpmailResposta->isSMTP();
        
        $phpmailResposta->SMTPDebug = 0;
        $phpmailResposta->Debugoutput = 'html';
        
        $phpmailResposta->Host = "localhost";         
        $phpmailResposta->Port = 587;
        
        $phpmailResposta->SMTPSecure = 'tls';
        $phpmailResposta->SMTPAuth = true;   
        
        $phpmailResposta->Username = "jeessy.ribeiro@gmail.com";         
        $phpmailResposta->Password = "ribeirosousa";          
        $phpmailResposta->IsHTML(true);         
        
        $phpmailResposta->setFrom($email, $nome); // E-mail do remetende enviado pelo method post  
                 
        $phpmailResposta->addAddress($email, "Clinica de Psicologia");// E-mail do destinatario/*  
        
        $phpmailResposta->Subject = "Resposta - " .$assunto; // Assunto do remetende enviado pelo method post
                
        $phpmailResposta->msgHTML(" Nome: $nome <br>
                            Em breve daremos o retorno");
        
        $phpmailResposta->AlrBody = "Nome: $nome \n
                            Em breve daremos o retorno";
            
        $phpmailResposta->send();
        
    } // FECHAR O IF  

?>