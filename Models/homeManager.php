<?php
require_once('item.php');
require_once('dbConnect.php');

class HomeManager {
    // ------------------------------------------------ private variables
    private $_backlog = [];
    private $_progress = [];
    private $_done = [];
    private $_all = [];
    // ------------------------------------------------ constructor
    public function __contruct() {

    }
    // ------------------------------------------------ gets / sets
    public function getBacklog() {
        return $_backlog;
    }
    public function getProgress() {
        return $_progress;
    }
    public function getDone() {
        return $_done;
    }
    public function getAll() {
        return $_all;
    }
    // ------------------------------------------------ private methods
    // ------------------------------------------------ public methods
    //create a new task item
    public function add($text, $category) {
        $item = new Item($text, $category);
    }
    //move the task item to the category to the right
    public function move($id) {
    }
}