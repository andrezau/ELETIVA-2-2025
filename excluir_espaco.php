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
            $stmt = $pdo->prepare("DELETE FROM espaco WHERE id = ?");
            
            if($stmt->execute([$id])){
                header("location: espacos.php?status=deleted");
            } else {
                header("location: espacos.php?status=error");
            }

        } catch (Exception $e) {
            header("location: espacos.php?status=error_fk");
        }
    } else {
        header("location: espacos.php");
    }
?>