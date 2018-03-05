<html lang="en">
<head>
    
    <?php   //Abfrage der Nutzer ID vom Login
    if(!isset($_SESSION['username'])) {                             
        redirect( base_url() . 'loginsystem/login' );
    }
        $userid = $_SESSION['username'];
    ?>
    
    <meta charset="UTF-8">
    <title>Platzvergabe</title>
    <script src="<?php echo base_url(); ?>../libraries/scripts.js"></script>
    <script src="<?php echo base_url(); ?>../libraries/jquery.js"></script>
    <script src="<?php echo base_url(); ?>../libraries/dropzone.js"></script>
    <script src="<?php echo base_url(); ?>../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>../css/dropzone.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>../css/default.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>../bootstrap/css/bootstrap.min.css">

</head>
<body>
<header>
    <div class="container-fluid logo-container">
        <img id="logo" src="http://www.uni-goettingen.de/img/redesign/logo.svg">
    </div>
</header>
    <div id="navigation-container">
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
                <label class="logoutbtn" ><a style="color: white" href="<?php echo base_url();?>loginsystem/logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Logout</a></label> 
            </div>
        </div>
    </div>
</body>
</html>