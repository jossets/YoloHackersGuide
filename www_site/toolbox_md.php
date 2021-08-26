<!DOCTYPE html>

<?php 
    //
    // LANG
    //
    // Default: english
    $LANG="en";
    // Cookie set ?
    if (isset($_COOKIE['YOLOCTF_LANG'])) {  $LANG=$_COOKIE['YOLOCTF_LANG']; }
    // /fr/xxxx path ?
    if (isset($YSH_LANG)) {  $LANG=$YSH_LANG; }
?>
<?php if ($LANG=="fr") { ?>
<html lang="fr">
<?php } else { ?>
<html lang="en">
<?php } ?>



<?php 
    //
    // HTTP Header
    //
    include 'toolbox_http_header.php'; 
?>

<?php
    //
    // PHP Markdown lib
    //
    require_once "vendor/parsedown/Parsedown.php";
    $Parsedown = new Parsedown();
    //$Parsedown->setSafeMode(false);
    $Parsedown->setUrlsLinked(true);
    $Parsedown->setMarkupEscaped(false);


    include 'toolbox_fct_md.php';
    include 'articles/articles_all.php';

?>

<body class="flexcroll">
    <div class="container-fluid">
      <div class="jumbotron jumbotron-padding map-color-back stars">
        <div class="col-sm-12 ">
            <nav class="navbar  navbar-light bg-light fixed-top navbar-scrollable">
                <button class="navbar-toggler" type="button" data-toggle="collapse" 
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="#">&nbsp;&nbsp;Menu</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <?php print_menu_entries() ; ?>    
                    </ul>
                </div>
            </nav>
            <?php print_content();  ?>
        </div>
      </div>

	  <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
      <footer class="footer">
        <p class="text-secondary"></p>
      </footer>	
    </div> <!-- /container -->
</body>
</html>