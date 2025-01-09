<?php

    session_start();

    include_once("dbConnect.php");

    $id;

    if(!empty($_GET)){
        $id = $_GET['id'];
    }

    // retorna um contato

    if(!empty($id)){
        $query = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $contacts = $stmt->fetch(PDO::FETCH_ASSOC);
    }else{
        // retorna todos os contatos
        $contacts = [];
    
        $sql = "SELECT * FROM contacts";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
