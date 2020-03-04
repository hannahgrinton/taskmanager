<?
require_once('../Models/homeManager.php');

$homeManager = new HomeManager();


if($_POST['action'] == "backlog") {
    backlog($homeManager);
} else if ($_POST['action'] == "progress") {
    progress($homeManager);
} else if ($_POST['action'] == "done") {
    done($homeManager);
} else if ($_POST['action'] == "move") {
    move($homeManager);
} else if ($_POST['action'] == "back") {
    back($homeManager);
} else if ($_POST['action'] == "delete") {
    delete($homeManager);
}
// ----------------------------------------- functions for adding to categories
function backlog($myHomeManager) {
    $homeManager = $myHomeManager;
    if(isset($_POST['item'])) {
        $category = 1;
        $text = $_POST['item'];
        $homeManager->add($text, $category);
    }
    header('Location: ../Views/index.php');
}
function progress($myHomeManager) {
    $homeManager = $myHomeManager;
    if(isset($_POST['item'])) {
        $category = 2;
        $text = $_POST['item'];
        $homeManager->add($text, $category);
    }
    header('Location: ../Views/index.php');
}
function done($myHomeManager) {
    $homeManager = $myHomeManager;
    if(isset($_POST['item'])) {
        $category = 3;
        $text = $_POST['item'];
        $homeManager->add($text, $category);
    }
    header('Location: ../Views/index.php');
}
// ----------------------------------------- moving right or left to next category
function move($myHomeManager) {
    $homeManager = $myHomeManager;
    $homeManager->retrieveItems();
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $homeManager->move($id);
    }
    header('Location: ../Views/index.php');
}
function back($myHomeManager) {
    $homeManager = $myHomeManager;
    $homeManager->retrieveItems();
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $homeManager->back($id);
    }
    header('Location: ../Views/index.php');
}
function delete($myHomeManager) {
    $homeManager = $myHomeManager;
    $homeManager->retrieveItems();
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $homeManager->delete($id);
    }
    header('Location: ../Views/index.php');
}