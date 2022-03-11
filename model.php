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

function updatelistname($name, $id){
    $stmt = conn()->prepare("UPDATE lists SET Name=:name where Id = :id");
    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function deletelist($id){
    $stmt = conn()->prepare("DELETE FROM lists where Id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function additem($text, $list){
    $stmt = conn()->prepare("INSERT INTO tasks (Text, List, Status, Time) Values (:text, :lists,0,0)");
    $stmt->bindParam(":lists", $list);
    $stmt->bindParam(":text", $text);
    $stmt->execute();
}

function deleteitem($id){
    $stmt = conn()->prepare("DELETE FROM tasks where Id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function updateitem($id, $text, $status, $duration){
    $stmt = conn()->prepare("UPDATE tasks SET Text=:text, Status=:status, Time=:duration where Id = :id");
    $stmt->bindParam(":status", $status);
    $stmt->bindParam(":duration", $duration);
    $stmt->bindParam(":text", $text);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

function getlistitemssorted($list){
    $stmt = conn()->prepare("SELECT * FROM tasks where List = :list order by Time desc");
    $stmt->bindParam(":list", $list);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getlistitems($list){
    $stmt = conn()->prepare("SELECT * FROM tasks where List = :list");
    $stmt->bindParam(":list", $list);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}


?>