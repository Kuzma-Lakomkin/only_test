<html>
<head>
    <title><?= $title; ?></title>
    <link rel="stylesheet" type="text/css" href='/only/public/styles/style.css'>
</head>
<body>
<?php if (!empty($_SESSION['errors'])): ?>
        <div class='errors' style='color: red;'>
            <?php echo $_SESSION['errors']; unset($_SESSION['errors']);?>
    </div>
    <?php endif;?>
    <?php if (!empty($_SESSION['success'])): ?>
        <div class='success' style='color: green;'>
            <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
    </div>
    <?php endif;?>
    <?= $content; ?>
</body>   
</html>