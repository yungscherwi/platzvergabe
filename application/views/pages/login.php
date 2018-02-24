<!DOCTYPE html>  
 <html>  
 <head>  
      <title>Platzvergabe Login</title>  
     <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>css/loginstyle.css"> -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> 
  
 </head>  
 <body>  
    <h1> Automatisierte Platzvergabe</h1>
    <br>
    <p> Loggen Sie sich zunächst ein, danach können Sie die Liste der teilnehmenden Studenten hochladen und den gewünschten Hörsaal auswählen.</p>
    <br>
      <div class="box">  
           <br /><br /><br />  
           <form method="post" action="<?php echo base_url(); ?>main/login_validation">  
                <div class="inputBox">  
                     <label>Enter Username</label>  
                     <input type="text" name="username" class="form-control" />  
                <span class="text-danger"><?php echo form_error('username');?></span>             
                </div>  
                <div class="inputBox">  
                     <label>Enter Password</label>  
                     <input type="password" name="password" class="form-control" />  
                <span class="text-danger"><?php echo form_error('password');?></span> 
                </div>  
                <div class="inputBox">  
                     <input type="submit" name="insert" value="Login" class="btn btn-info" />  
                     <?php  
                     echo '<label class="text-danger">'.$this->session->flashdata("error").'</label>';  
                     ?>  
                </div>  
           </form>  
      </div>  
 </body>  
 </html>