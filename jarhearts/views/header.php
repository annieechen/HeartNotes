<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title><?= htmlspecialchars($title) ?> | Heartnotes</title>
        <?php else: ?>
            <title>Heartnotes</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">
            <div class="topline">
            <?php if (!empty($_SESSION["id"])): ?>
            <a href="account.php">Account Information</a> <span id="largetext">|</span>
            <a href="logout.php"><strong>Log Out</strong></a>
            <?php endif ?>
             </div>
            <div id="top">
                <div>
                    <a href="/"><img alt="Heartnotes Home" src="/img/logo.png"/></a>
                </div>
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav nav-pills">
                        <li><a href="/">Home</a></li>
                        <li>
                        <div class="dropdown">
                            <a class="dropdown-toggle" type="button" data-toggle="dropdown">About
                            <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="/">How to Use</a></li>
                                <li><a href="FAQ.php">FAQ</a></li>
                                <li><a href="about.php">About Us</a></li>
                            </ul>
                        </div>
                        </li>
                        <li><a href="log.php">Your Own Uploads</a></li>
                        <li><a href="notedisplay.php">Get New Note</a></li>
                        <li><a href="oldnoteslog.php">Past Notes</a></li>
                        <li><a href="newupload.php">New Upload</a></li>
                    </ul>
                <?php endif ?>
            </div>
            <div id="middle">
