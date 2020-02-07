<?php

class Item {
    // ------------------------------------------------ private variables
    private $_text; //task user entered
    private $_category; //int representing category
                        //1 = backlog
                        //2 = in-progress
                        //3 = done
    private $_id; //unique identifier
    // ------------------------------------------------ contructor
    public function __construct($myText, $myCategory) {
        $_id = null;
        $_text = $myText;
        $_category = $myCategory;
    }
    // ------------------------------------------------ gets / sets
    public function getText() {
        return $_text;
    }
    public function setText($myText) {
        $_text = $myText;
    }
    public function getCategory() {
        return $_category;
    }
    public function setCategory($myCategory) {
        $_category = $myCategory;
    }
    public function getId() {
        return $_id;
    }
    // ------------------------------------------------ private methods
    // ------------------------------------------------ public methods
}