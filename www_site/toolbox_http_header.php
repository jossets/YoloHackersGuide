<head>
<?php if ($LANG=="fr") { ?>
    <title>Hacker's Guide</title>
    <link rel="canonical" href="fr/toolbox.php">
    <link rel="alternate" href="en/toolbox.php/" hreflang="en">
<?php } else { ?>
    <title>Hacker's Guide</title>
    <link rel="canonical" href="en/toolbox.php">
    <link rel="alternate" href="fr/toolbox.php/" hreflang="fr">
<?php } ?>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php 
    //
    // Full local server, no internet cx
    //
    /*
    <link rel="stylesheet" href="js/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
*/ ?>
    <link rel="stylesheet" href="style.css">

    
    <?php 
    //
    // Google Analytics
    //
    if (isset($_ENV['YOLO_GTAG'])&&(trim($_ENV['YOLO_GTAG'])!="")) {?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $_ENV['YOLO_GTAG'] ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', '<?php echo $_ENV['YOLO_GTAG'] ?>');
    </script>
    <?php 
    } ?>

</head>