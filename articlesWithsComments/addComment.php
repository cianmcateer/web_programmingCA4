<?php

require_once("database.php");
require_once('../Comment.php');

    $userid = $_POST['userid'];
    $username = $_POST['username'];
    $articleid = $_POST['articleid'];
    $date = $_POST['date'];
    $commentText = $_POST['comment'];
    
    $comment = new Comment(); 
    
    $comment->comment = $commentText;
    $comment->date = $date;
    $comment->userid = $userid;
    $comment->username = $username;
   
    $query = "INSERT INTO comments(userid, articleid, username, comment, date) VALUES(:userid, :articleid, :username, :comment, :date)";
    $statement = $db->prepare($query);
    $statement->bindValue(":userid", $comment->userid);
    $statement->bindValue(":articleid", $articleid);
    $statement->bindValue(":username", $comment->username);
    $statement->bindValue(":comment", $comment->comment);
    $statement->bindValue(":date", $comment->date);
    try {
        $statement->execute();
    } catch (Exception $ex) {
        header("Location: ../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $statement->closeCursor();
    
    $commentList = array();
    array_push($commentList, $comment);


