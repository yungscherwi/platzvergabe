<html lang="en">
<head>
    
    <?php   //Abfrage der Nutzer ID vom Login
    if(!isset($_SESSION['username'])) {                             //falls in der session kein username aktiv ist, dann...
        redirect( base_url() . 'loginsystem/login' );               //...zurück zur login seite, sonst...
    }
        $userid = $_SESSION['username'];                            //...$userid = username des eingeloggten
    ?>
    
    <meta charset="UTF-8">
    <title>Platzvergabe</title>
    <script src="<?php echo base_url(); ?>../libraries/scripts.js"></script>                    <!--eigene javascripts laden-->
    <script src="<?php echo base_url(); ?>../libraries/jquery.js"></script>                     <!--jqueryscripts laden-->
    <script src="<?php echo base_url(); ?>../libraries/dropzone.js"></script>                   <!--dropzone scripts laden-->
    <script src="<?php echo base_url(); ?>../bootstrap/js/bootstrap.min.js"></script>           <!--bootstrap scripts  laden-->
    <link rel="stylesheet" href="<?php echo base_url() ?>../css/dropzone.css">                  <!--dropzone css laden-->
    <link rel="stylesheet" href="<?php echo base_url() ?>../css/default.css">                   <!--eigene erstellte css laden-->
    <link rel="stylesheet" href="<?php echo base_url() ?>../bootstrap/css/bootstrap.min.css">   <!--bootstrap css laden-->

</head>
<body>
<header>
    <div class="container-fluid logo-container">
        <img id="logo" src="http://www.uni-goettingen.de/img/redesign/logo.svg">                <!--Uni logo laden-->
    </div>
</header>
    <div id="navigation-container">                                                             <!--Navbar laden-->
        <div class="container-fluid">	
            <div class="navigation">
                <nav>
                    <ol>
                        <li> <a href="<?php echo base_url();?>loginsystem/view">Home</a> </li> 
                        <li> <a href="<?php echo base_url();?>hoersaele">Prüfungsraum erstellen</a> </li>
                        
                        <li> <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo base_url();?>hochladen">Prüfungsraum auswählen<span class="caret"></span></a> 
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url(); ?>zhg">ZHG Hörsaal</a></li><br>
                                <li><a href="<?php echo base_url(); ?>hochladen">Erstellte Prüfungsräume</a></li>
                            </ul>
                        </li>
                        <li> <a href="<?php echo base_url();?>hoersaele/hoersaeleverwalten">Prüfungsraum verwalten</a> </li>
                    </ol>
                </nav>
                <label class="logoutbtn" ><a href="<?php echo base_url();?>loginsystem/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></label> 
            </div>
        </div>
    </div>
</body>
</html>