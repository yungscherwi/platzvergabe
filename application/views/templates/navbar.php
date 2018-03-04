<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
<!-- Eigene CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ;?>css/table.css">

<!-- Navbar https://getbootstrap.com/docs/4.0/components/navbar/-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav navbar-center">
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url() ?>main/view">Home</a>
          </li>
        </li>
          <li class="nav-item active">
              <a class="nav-link" href="<?php echo base_url();?>hochladen">Platzvergabe</a>
            </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url();?>uebersicht">Hörsaalübersicht</a>
          </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>hoersaele">Erstellen</a>

      </ul>
    </div>
</nav>
     <label id="logoutbtn" ><a href="<?php echo base_url();?>main/logout">Logout</a></label> 
