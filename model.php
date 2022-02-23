<?php
function conn(){
    $db = new PDO('mysql:host=localhost;dbname=todo', "root", "mysql");
    return $db;
}

function addlist($name){
    $stmt = conn()->prepare("INSERT INTO lists (Name) Values (:name)");
    $stmt->bindParam(":name", $name);
    $stmt->execute();
}

function getlist(){
    $stmt = conn()->prepare("SELECT * FROM lists");
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}


?>