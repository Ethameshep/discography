<?php include './includes/title.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <?php require './includes/head.php' ?>
    <?php header("refresh:3;url=index.php"); ?>
    <title></title>
    <style>
        section {display:table;height:100vh;width:100vw;}
        div {display:table-cell;vertical-align: middle;margin:0 auto;}
    </style>
</head>
<body>
    <section class="text-center">
        <div>
            <h1 class="text-uppercase">Thank You!</h1>
            <h2>Your infomation has been added to our mailing list</h2>
            <h3><small>If you are not directed back to the main page, <a href="index.php">click here</a></small></h3>
        </div>
    </section>
</body>
</html>
