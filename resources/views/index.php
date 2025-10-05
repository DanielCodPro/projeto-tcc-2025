<?php
// código para redirecionar o usuário para a página de login ou menu com base na autenticação
if (session()->has('usuario_id')) {
    header('Location: /index');
} else {
    header('Location: /entrar');
}
?>