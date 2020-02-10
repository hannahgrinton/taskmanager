<?php
require_once('../Models/homeManager.php');
$homeManager = new HomeManager();
$homeManager->retrieveItems();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Cambay&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/6d0b9dc65c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../Css/styles.css" />
    <title>Task Manager</title>
</head>
<body>
    <img src="../Assets/backgroundjpg.jpg" class="background">
    <div class="content">
        <div class="content__header"><i class="fas fa-list-ul"></i>&nbsp;Task Manager</div>
        <div class="content__main">
            <div class="content__section">
                <div class="section__title">Backlog</div>
                <div class="items" id="backlog">
                    <?php 
                        foreach($homeManager->getBacklog() as $item) {
                            $id = $item->getId();
                            echo "
                                <div class='item'>
                                    <span>".$item->getText()."</span>
                                    <form method='post' action='../Controllers/homeController.php'>
                                        <input type='hidden' name='action' value='move'>
                                        <input type='hidden' value='{$id}' name='id'>
                                        <button class='item__move'><i class='fas fa-chevron-right'></i></button>
                                    </form>
                                </div>
                            ";
                        }
                        
                    ?>
                </div>
                <div class="add">
                    <form method="post" action="../Controllers/homeController.php" id="formBacklog">
                        <input type='hidden' name="action" value="backlog">
                        <i class="fas fa-plus"></i><input type="text" name="item" placeholder="Add item to backlog" class="add__input" id="txtBacklog">
                    </form>
                </div>
            </div>
            <div class="content__section">
                <div class="section__title">In Progress</div>
                <div class="items" id="in-progress">
                <?php 
                    foreach($homeManager->getProgress() as $item) {
                        $id = $item->getId();
                        echo "
                            <div class='item'>
                                <span>".$item->getText()."</span>
                                <form method='post' action='../Controllers/homeController.php'>
                                    <input type='hidden' name='action' value='move'>
                                    <input type='hidden' value='{$id}' name='id'>
                                    <button class='item__move'><i class='fas fa-chevron-right'></i></button>
                                </form>
                            </div>
                        ";
                    }
                        
                ?>
                </div>
                <div class="add">
                    <form method="post" action="../Controllers/homeController.php" id="formProgress">
                        <input type='hidden' name="action" value="progress">
                        <i class="fas fa-plus"></i><input type="text" name="item" placeholder="Add in-progress item" class="add__input" id="txtProgress">
                    </form>
                </div>
            </div>
            <div class="content__section">
                <div class="section__title">Done</div>
                <div class="items" id="done">
                <?php 
                    foreach($homeManager->getDone() as $item) {
                        $id = $item->getId();
                        echo "
                            <div class='item'>
                                <span>".$item->getText()."</span>
                                <form method='post' action='../Controllers/homeController.php'>
                                    <input type='hidden' name='action' value='back'>
                                    <input type='hidden' value='{$id}' name='id'>
                                    <button class='item__move'><i class='fas fa-undo'></i></button>
                                </form>
                            </div>
                        ";
                    }
                        
                ?>
                </div>
                <div class="add">
                    <form method="post" action="../Controllers/homeController.php" id="formDone">
                        <input type='hidden' name="action" value="done">
                        <i class="fas fa-plus"></i><input type="text" name="item" placeholder="Add completed item" class="add__input" id="txtDone">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="Build/build.js"></script>
</body>
</html>