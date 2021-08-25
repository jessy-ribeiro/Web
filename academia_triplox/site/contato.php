<?php

    require_once ("vendor/PHPMailerAutoload.php");

	$ok = "";

	if(isset($_POST["nome"])){

		$assunto = "Academia";
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $telefone = $_POST["fone"];
        $mensagem = $_POST["mens"];
		
                    
     
        $phpmail = new PHPMailer(); // Instânciamos a classe PHPmailer para poder utiliza-la          
        $phpmail->isSMTP(); // envia por SMTP
        
        $phpmail->SMTPDebug = 0;
        $phpmail->Debugoutput = 'html';
        
        $phpmail->Host = "smtp.gmail.com"; // SMTP servers         
        $phpmail->Port = 587; // Porta SMTP do GMAIL
        
        //$phpmail->SMTPSecure = 'tls';
        $phpmail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação   
        
        $phpmail->Username = "jeessy.ribeiro@gmail.com"; // SMTP username         
        $phpmail->Password = "ribeirosousa"; // SMTP password          
        $phpmail->IsHTML(true);         
        
        $phpmail->setFrom($email, $nome); // E-mail do remetende enviado pelo method post  
                 
        $phpmail->addAddress("jeessy.ribeiro@gmail.com", "Academia Triplo X");// E-mail do destinatario/*  
        
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
            
            $ok = "OK";
        }else{
			$ok = "NAO";
        }
         
		
        // ############## RESPOSTA AUTOMATICA
        $phpmailResposta = new PHPMailer();        
        $phpmailResposta->isSMTP();
        
        $phpmailResposta->SMTPDebug = 0;
        $phpmailResposta->Debugoutput = 'html';
        
        $phpmailResposta->Host = "smtp.gmail.com";         
        $phpmailResposta->Port = 587;
        
        $phpmailResposta->SMTPSecure = 'tls';
        $phpmailResposta->SMTPAuth = true;   
        
        $phpmailResposta->Username = "jeessy.ribeiro@gmail.com";         
        $phpmailResposta->Password = "ribeirosousa";          
        $phpmailResposta->IsHTML(true);         
        
        $phpmailResposta->setFrom($email, $nome); // E-mail do remetende enviado pelo method post  
                 
        $phpmailResposta->addAddress($email, "Clinica de Psicologia");// E-mail do destinatario/*  
        
        $phpmailResposta->Subject = "Resposta - " .$assunto; // Assunto do remetende enviado pelo method post
                
        $phpmailResposta->msgHTML(" $nome <br>
                            Em breve daremos o retorno");
        
        $phpmailResposta->AlrBody = " $nome \n
                            Em breve daremos o retorno";
            
        $phpmailResposta->send();
        
    } // FECHAR O IF  

?>



<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width"> <!-- adaptar -->
	<title>Academia Triplo X</title>
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/slick.css">
	<link rel="stylesheet" href="css/slick-theme.css">
	<link rel="stylesheet" href="css/lity.css">
	<link rel="stylesheet" href="css/animate.css">
	<link rel="stylesheet" href="css/minhas-animacoes.css">
	
	
	<!-- MEU ESTILO -->
	<link rel="stylesheet" href="css/estilo.css">
	
		
</head>

<body>
	<header class="topo">
		<div class="site">
			<article>
				<h1 class="wow pulse">Academia Triplo X</h1>
				
				<label for="menu-mobile" class="menu-mobile">MENU</label>
				<input type="checkbox" id="menu-mobile" role="button">
				
				<nav class="menu">
					<ul>
						<li><a href="index.html">HOME</a></li>
						<li><a href="sobre.html">SOBRE</a></li>
						<li><a href="modalidade.html">MODALIDADE</a>

							<ul class="submenu">
								<li><a href="#">&#9658;Teste 01</a></li>
								<li><a href="#">&#9658;Teste 02</a></li>
								<li><a href="#">&#9658;Teste 03</a></li>
								<li><a href="#">&#9658;Teste 04</a></li>
							</ul>
						 </li>
						<li><a href="blog/index.php">BLOG</a></li>
						<li><a href="contato.php">CONTATO</a></li>
					</ul>
				</nav>
			</article>
		</div>
	</header>
	<!-- section banner -->
	<section class="mapa">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3659.0790686147034!2d-46.447058484408025!3d-23.493661364982124!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce616491b50329%3A0xbf9ea041248320ba!2sS%C3%A3o+Miguel+Paulista%2C+S%C3%A3o+Paulo+-+SP!5e0!3m2!1spt-BR!2sbr!4v1541531040857" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
	</section>
	<!-- fim section banner -->
	
	<!-- ##INICIO## Bloco do corpo site -->
	<div class="site"> 
		<section class="contato">
			<article>
				<form action="#" method="post" class="form"> <!--action forma de envio/ post envio criptografa diferente de get que vai na barra-->
					<fieldset>
						<legend>Contato</legend>
							<div>
							<input type="text" placeholder="Digite seu nome:" name="nome">
						<!-- input entrada de dados/ type modelo / placeholder dica / name info para php -->
							</div>
							<div>
							<input type="tel" placeholder="Digite seu telefone: " name="fone"> 	
							</div>
							<div>
							<input type="email" placeholder="Digite seu email: " name="email" required> <!-- required obrigatorio -->
							</div>
							<div>
							<textarea cols="30" rows="10" placeholder="Digite sua mensagem" name="mens"></textarea>
							</div>
							<div>	
								<?php
									if($ok == "OK"){
										echo "$nome, A Mensagem foi enviada com sucesso.";
										}else if($ok == "NAO"){
										echo "$nome, Não foi possível enviar a mensagem. Erro: " .$phpmail->ErrorInfo;
										
									}
								
								?>
							<input type="submit" value="ENVIAR">
							</div>
						
					</fieldset>
				</form>	
			</article>
			<article>
			
			
			
			</article>
		</section>
	
	</div>
	<!-- ##FIM## Bloco do corpo site -->
	<footer class="rodape wow fadeInUpBig">
		<div class="site">
			<div class="rodapeEnd">
			<article>
				<h2>Av. São Miguel, 1500 - SP</h2>
				<h2>(11) 986-634-896</h2>
				<h2>contato@triplox.com.br</h2>
				<h2>www.triplox.com.br</h2>
			</article>
			<article class="rodapeRede">
				<a href="https://www.facebook.com/" target="_blank">
					<img src="img/face.svg" alt="facebook">
				</a>
				<a href="https://www.instagram.com" target="_blank">
					<img src="img/insta.svg" alt="insta">
				</a>
				<a href="https://br.linkedin.com/" target="_blank">
					<img src="img/linkedin.svg" alt="linkedin">
				</a>
			</article>
			</div>
		</div>
		<div class="copyright">
		<h2>Copyright © 2018 TM01-SENAC</h2>
		</div>
	</footer>
	
	
<script src="js/jquery.js"></script>
<script src="js/slick.js"></script>
<script src="js/lity.js"></script>
<script src="js/wow.js"></script>
<script src="js/banner.js"></script>


</body>
</html>









