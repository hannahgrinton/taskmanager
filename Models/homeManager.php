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
        return $this->_backlog;
    }
    public function getProgress() {
        return $this->_progress;
    }
    public function getDone() {
        return $this->_done;
    }
    public function getAll() {
        return $this->_all;
    }
    // ------------------------------------------------ private methods
    // ------------------------------------------------ public methods
    //returns item object based off id
    public function getItem($id) {
        foreach($this->all as $item) {
            if ($id == $item->getId()) {
                return $item;
            }
        }
    }
    //create a new task item
    public function add($text, $category) {
        $item = new Item(null, $text, $category);
        $table_name = "items";
        $connection = db_connect();
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        //prepare statement
        if (!($sql = $connection->prepare("INSERT INTO $table_name (id, category, text) VALUES (?, ?, ?)"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        $id = null;
        //bind variables
        if (!($sql->bind_param("iis", $id, $category, $text))) {
            echo "Binding parameters failed: (" . $sql->errno . ") " . $sql->error;
        }
        //run query
        if (!$sql->execute()) {
            echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
        }
        //close
        $sql->close();
    }
    //move the task item to the category to the right
    public function move($id) {
        $item = $this->getItem($id);
        $table_name = "items";
        $connection = db_connect();
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        //prepare statement
        if (!($sql = $connection->prepare("UPDATE $table_name SET category=? WHERE id=?"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        $current = $item->getCategory();
        $new = $current + 1;
        //bind variables
        if (!($sql->bind_param("ii", $new, $id))) {
            echo "Binding parameters failed: (" . $sql->errno . ") " . $sql->error;
        }
        //run query
        if (!$sql->execute()) {
            echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
        }
        //close
        $sql->close();
    }
    public function back($id) {
        $item = $this->getItem($id);
        $table_name = "items";
        $connection = db_connect();
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        //prepare statement
        if (!($sql = $connection->prepare("UPDATE $table_name SET category=? WHERE id=?"))) {
            echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        }
        $current = $item->getCategory();
        $new = $current - 1;
        //bind variables
        if (!($sql->bind_param("ii", $new, $id))) {
            echo "Binding parameters failed: (" . $sql->errno . ") " . $sql->error;
        }
        //run query
        if (!$sql->execute()) {
            echo "Execute failed: (" . $sql->errno . ") " . $sql->error;
        }
        //close
        $sql->close();
    }
    //retrieve items from the database
    public function retrieveItems() {
        $this->all = array();
        $this->_backlog = array();
        $this->_progress = array();
        $this->_done = array();
        $table_name = "items";
        $connection = db_connect();
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        $sql = "SELECT * FROM $table_name ORDER BY id";
        $result = @mysqli_query($connection, $sql) or die(mysqli_error($connection));
        while ($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
            $category = $row['category'];
            $text = $row['text'];
            $item = new Item($id, $category, $text);
            array_push($this->all, $item);
            if ($category == 1) {
                array_push($this->_backlog, $item);
            } else if ($category == 2) {
                array_push($this->_progress, $item);
            } else if ($category == 3) {
                array_push($this->_done, $item);
            }
        }
    }
}