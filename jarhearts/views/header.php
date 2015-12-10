<!DOCTYPE html>

<html>

    <head>
        <!-- change favicon -->
        <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
        <link rel="icon" href="/favicon.ico" type="image/x-icon">
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
                    <a href="/"><img alt="Heartnotes Home" width="600px" src="/img/logo.png"/></a>
                </div>
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav nav-pills">
                        <li class="headerpadding"><a href="/">Home</a></li>
                        <li class="headerpadding">
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
                        <li class="headerpadding"><a href="log.php">Your Own Uploads</a></li>
                        <li class="headerpadding"><a href="notedisplay.php">Today's Note</a></li>
                        <li class="headerpadding"><a href="oldnoteslog.php">Past Notes</a></li>
                        <li class="headerpadding"><a href="newupload.php">New Upload</a></li>
                    </ul>
                <?php endif ?>
            </div>
            <div id="middle">
