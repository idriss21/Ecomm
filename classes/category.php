<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category
 *
 * @author idriss
 */
class category {
   
    
    private $categoryID;
    private $name;
    private $sub_cat;
    private $description ;
    
    
    
    
    function __construct($categoryID, $name, $sub_cat, $description) {
        $this->categoryID = $categoryID;
        $this->name = $name;
        $this->sub_cat = $sub_cat;
        $this->description = $description;
    }
    
    
    function getCategoryID() {
        return $this->categoryID;
    }

    function getName() {
        return $this->name;
    }

    function getSub_cat() {
        return $this->sub_cat;
    }

    function getDescription() {
        return $this->description;
    }


    
    function setCategoryID($categoryID) {
        $this->categoryID = $categoryID;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSub_cat($sub_cat) {
        $this->sub_cat = $sub_cat;
    }

    function setDescription($description) {
        $this->description = $description;
    }



    
}
