<?php

session_start();
require("../back/conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/caixa.css">
    <title>Sua conta</title>
</head>
<body>

    <div class="saldo">
        <div class="container">
            <p>Seu saldo é de: </p>
            <b>R$<?php
                echo $saldo;
            ?></b>
        </div>
    </div>

    <div class="operacoes">
        <div class="container">
            <h3>Saque</h3>

            <form action="../back/sacar.php" method="post">
                <input type="number" placeholder="Valor para saque..." name="valor_saque">
                <button type="submit">Sacar</button>
            </form>

            <!-- Erro de valor indevido -->
            <?php

            if (isset($_SESSION['valor_indevido'])) {
                echo "<script language='javascript'>
                        alert('Por favor insira um valor válido!');
                        </script>";
            }
            unset($_SESSION['valor_indevido']);

            ?>

            <!-- Saque efetuado com sucesso -->
            <?php

            if (isset($_SESSION['valor_sacado'])) {
                echo "<script language='javascript'>
                        alert('Saque efetuado com sucesso!');
                        </script>";
            }
            unset($_SESSION['valor_sacado']);

            ?>
        </div>

        <div class="container">
            <h3>Depósito</h3>

            <form action="../back/depositar.php" method="post">
                <input type="number" min="1" placeholder="Valor para depósito..." name="valor_deposito">
                <button type="submit">Depositar</button>
            </form>

            <?php
                if (isset($_SESSION['valor_depositado'])) {
                    echo "<script language='javascript'>
                    alert('Deposito efetuado com sucesso!');
                    </script>";
                }
                unset($_SESSION['valor_depositado']);
            ?>
        </div>

        <div class="container">
            <h3>Solicitação de Empréstimo</h3>

            <form action="../back/emprestar.php" method="post">
                <input type="number" min="1" placeholder="Valor para empréstimo..." name="valor_emprestimo">
                <button type="submit">Solicitar</button>
            </form>

            <?php
                if (isset($_SESSION['valor_emprestado'])) {
                    echo "<script language='javascript'>
                    alert('Empréstimo solicitado com sucesso!');
                    </script>";
                }
                unset($_SESSION['valor_emprestado'])
            ?>
        </div>
    </div>
    
</body>
</html>