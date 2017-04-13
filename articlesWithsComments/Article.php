<?php

class Article {
    
    public $title;
    public $category;
    public $text;
    public $date;
    
    function __construct($title, $category, $text, $date) {
        $this->title = $title;
        $this->category = $category;
        $this->text = $text;
        $this->date = $date;
    }
    
    function getTitle() {
        return $this->title;
    }

    function getCategory() {
        return $this->category;
    }

    function getText() {
        return $this->text;
    }

    function getDate() {
        return $this->date;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setCategory($category) {
        $this->category = $category;
    }

    function setText($text) {
        $this->text = $text;
    }

    function setDate($date) {
        $this->date = $date;
    }




    
    
}
