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
            $stmt = $pdo->prepare("DELETE FROM evento WHERE id = ?");
            
            if($stmt->execute([$id])){
                header("location: eventos.php?status=deleted");
            } else {
                header("location: eventos.php?status=error");
            }
        } catch (Exception $e) {
            header("location: eventos.php?status=error_fk");
        }
    } else {
        header("location: eventos.php");
    }
?>