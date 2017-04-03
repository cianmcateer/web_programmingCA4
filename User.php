<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author CianMcAteer
 */
class User {
    //put your code here
   
    private $fullName;
    private $userName;
    private $dob;
    private $email;
    private $password;
               
    public function __construct($fullName, $userName, $dob, $email, $password) {
        $this->fullName = $fullName;
        $this->userName = $userName;
        $this->dob = $dob;
        $this->email = $email;
        $this->password = $password;
        
    }
    public function __destruct() {}
    
    public function getFullName() {
        return $this->fullName;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getDob() {
        return $this->dob;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getId() {
        return $this->id;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function setUserName($userName) {
        $this->userName = $userName;
    }

    public function setDob($dob) {
        $this->dob = $dob;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function __toString() {
        return "$this->fullName , $this->userName , $this->dob ,$this->email, $this->password" ;
    }

    
    

    

}
