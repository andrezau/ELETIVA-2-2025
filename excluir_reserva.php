<?php
    session_start();
    if(!isset($_SESSION['acesso'])){
        header('location: index.php');
        exit();
    }

    require("conexao.php");
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        try {
            $stmt = $pdo->prepare("DELETE FROM reserva WHERE id = ?");
            if($stmt->execute([$id])){
                header('location: reservas.php?status=deleted');
            } else {
                header('location: reservas.php?status=error');
            }
        } catch (Exception $e) {
            header('location: reservas.php?status=error');
        }
    } else {
        header('location: reservas.php');
    }
?>