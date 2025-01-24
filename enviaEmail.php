<?php
$nome = htmlspecialchars($_POST['nome']);
$email = htmlspecialchars($_POST['email']);
$empresa = htmlspecialchars($_POST['empresa']);
$telefone = htmlspecialchars($_POST['telefone']);
$mensagem = htmlspecialchars($_POST['mensagem']);

$numLink = preg_replace("/[^0-9.]+/", '', $telefone);

$arquivo = "<p>Ol&aacute;, tudo bom?&nbsp;</p>

            <p>Sou <strong>$nome</strong>, da empresa $empresa.</p>

            <p>$mensagem</p>

            <p>
            Meu email para contato é: $email.
            E meu n&uacute;mero para contato é: <a href='https://whatsa.me/55$numLink' target=”_blank”><u>$numLink</u></a>.
            </p>

            <p>Att,<br />
            $nome.</p>
            ";
            
// emails para quem será enviado o formulário
$destino = "contato@iotnest.com.br";
$assunto = "Contato pelo Site - $nome - $empresa";

// É necessário indicar que o formato do e-mail é html
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
$headers .= 'From: Cadastro Site';

$enviaremail = mail($destino, $assunto, $arquivo, $headers);
if($enviaremail){
$mgm = "E-MAIL ENVIADO COM SUCESSO! <br> O link será enviado para o e-mail fornecido no formulário";
echo " <meta http-equiv='refresh' content='10;'>";
} else {
$mgm = "ERRO AO ENVIAR E-MAIL!";
echo "";
}

header("location: index.html#contato");
?>