<html>
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>../css/default.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>../bootstrap/css/bootstrap.min.css">
    <body>
    <div class="container-fluid">  
        
        <!-- Login Seite -->
            <h1> Automatisierte Platzvergabe</h1>
            <br>
            <p> Loggen Sie sich zunächst ein.</p>
            <br>
        <div class="box">    
            <form method="post" action="<?php echo base_url(); ?>LoginSystem/login_validation">  
                <div class="inputBox">  
                    <label>Enter Username</label>  
                    <input type="text" name="username" id="username" class="form-control" />  
                    <span class="text-danger"><?php echo form_error('username');?></span>             
                </div>  
                <div class="inputBox">  
                    <label>Enter Password</label>  
                    <input type="password" name="password" id="password" class="form-control" />  
                    <span class="text-danger"><?php echo form_error('password');?></span> 
                </div>  
                <div class="inputBox">
                <br>  
                    <input type="submit" name="insert" value="Login" class="btn btn-primary" />  
                    <?php  
                    echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  
                    ?>  
                </div>  
           </form>  
        </div>  
    </div>
    </body>  
 </html>