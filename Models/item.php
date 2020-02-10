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
    public function __construct($id = null, $myCategory, $myText) {
        $this->_id = $id;
        $this->_text = $myText;
        $this->_category = $myCategory;
    }
    // ------------------------------------------------ gets / sets
    public function getText() {
        return $this->_text;
    }
    public function setText($myText) {
        $this->_text = $myText;
    }
    public function getCategory() {
        return $this->_category;
    }
    public function setCategory($myCategory) {
        $this->_category = $myCategory;
    }
    public function getId() {
        return $this->_id;
    }
    // ------------------------------------------------ private methods
    // ------------------------------------------------ public methods
}