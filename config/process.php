<?php

    session_start();

    include_once("dbConnect.php");

    $sql = "SELECT * FROM contacts";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $contacts = $stmt->fetchAll(PDO::FETCH_ASSOC);