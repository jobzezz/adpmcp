<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletando os dados do formulário
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $telefone = $_POST['phone'];
    $assunto = $_POST['subject'];
    $mensagem = $_POST['message'];

    // Definir o e-mail de destino
    $destinatario = "contacto@adpmcp.org";
    $assunto_email = "Mensagem de Contato - $assunto";
    $corpo_email = "Você recebeu uma nova mensagem:\n\n";
    $corpo_email .= "Nome: $nome\n";
    $corpo_email .= "E-mail: $email\n";
    $corpo_email .= "Telefone: $telefone\n";
    $corpo_email .= "Assunto: $assunto\n";
    $corpo_email .= "Mensagem:\n$mensagem\n";

    // Cabeçalhos do e-mail
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Enviar o e-mail
    if (mail($destinatario, $assunto_email, $corpo_email, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Houve um erro ao enviar a mensagem. Tente novamente.";
    }
}
?>