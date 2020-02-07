<?


if($_POST['action'] == "backlog") {
    backlog();
}

function backlog() {
    header('Location: ../Views/index.html');
}