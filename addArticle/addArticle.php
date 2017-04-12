<?php

require_once("database.php");
require_once('../Article.php');

    $category = $_POST['category'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $text = $_POST['text'];
    
    $article = new Article(); 
    
    $article->title = $title;
    $article->category = $category;
    $article->date = $date;
    $article->text = $text; 
    
    $query = "INSERT INTO article(title, category, text, date) VALUES(:title, :cat, :text, :date)";
    $statement = $db->prepare($query);
    $statement->bindValue(":title", $article->title);
    $statement->bindValue(":cat", $article->category);
    $statement->bindValue(":text", $article->text);
    $statement->bindValue(":date", $article->date);
    try {
        $statement->execute();
    } catch (Exception $ex) {
        header("Location: ../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $statement->closeCursor();
    
    $articleList = array();
    array_push($articleList, $article);

header('location: ../displayArticle.php');