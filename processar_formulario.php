<?php

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos necessários foram preenchidos
    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['confirmEmail']) && isset($_POST['telefone']) && isset($_POST['mensagem'])) {
        
        // Sanitize inputs
        $nome = htmlspecialchars($_POST['nome']);
        $email = htmlspecialchars($_POST['email']);
        $confirmEmail = htmlspecialchars($_POST['confirmEmail']);
        $telefone = htmlspecialchars($_POST['telefone']);
        $mensagem = htmlspecialchars($_POST['mensagem']);

        // Verifica se os emails coincidem
        if ($email == $confirmEmail) {
            // Configuração do email
            $to = "e.takeshi.miura@gmail.com";
            $subject = "Formulário de Contato $nome";
            $message = "Nome: $nome\n";
            $message .= "Email: $email\n";
            $message .= "Telefone: $telefone\n";
            $message .= "Mensagem:\n$mensagem";

            // Envia o email
            if (mail($to, $subject, $message)) {
                // Exibe a mensagem de sucesso
                echo '<script>alert("Sua mensagem foi enviada com sucesso!"); window.location.replace("/");</script>';
                exit();
            } else {
                // Exibe uma mensagem de erro caso o email não seja enviado
                echo '<script>alert("Desculpe, ocorreu um erro ao enviar sua mensagem. Por favor, tente novamente mais tarde."); window.location.replace("/");</script>';
                exit();
            }
        } else {
            // Exibe uma mensagem de erro caso os emails não coincidam
            echo '<script>alert("Os endereços de email não coincidem. Por favor, verifique e tente novamente."); window.location.replace("/");</script>';
            exit();
        }
    } else {
        // Exibe uma mensagem de erro caso algum campo esteja faltando
        echo '<script>alert("Por favor, preencha todos os campos do formulário."); window.location.replace("/");</script>';
        exit();
    }
} else {
    // Exibe uma mensagem de erro se o formulário não foi submetido corretamente
    echo '<script>alert("Ocorreu um erro ao processar o formulário. Por favor, tente novamente mais tarde."); window.location.replace("/");</script>';
    exit();
}
?>
