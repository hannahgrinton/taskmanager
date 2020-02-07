<?


if($_POST['action'] == "backlog") {
    backlog();
} else if($_POST['action'] == "progress") {
    progress();
} else if ($_POST['action'] == "move") {
    move();
}

function backlog() {
    header('Location: ../Views/index.php');
}
function progress() {
    header('Location: ../Views/index.php');
}
function move() {
    header('Location: ../Views/index.php');
}