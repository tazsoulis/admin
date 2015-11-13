<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

	<title><?php echo $title ?></title>
	
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<!--Import Google Icon Font-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <link href="http://cdnjs.cloudflare.com/ajax/libs/jquery.colorbox/1.4.33/example1/colorbox.min.css" rel="stylesheet"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/materialize.css")?>" media="screen,projection">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/awesomplete.css")?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/custom.css")?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url("assets/css/sweetalert.css")?>">
	<!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



<nav>
  <div class="container">
  <a href="#" class="brand-logo">Admin Panel</a>
    <ul class="right hide-on-med-and-down ">
      <li class="center-align"><a href="<?= base_url("admin") ?>">Home</a></li>
      <li><a href="<?= base_url("insert") ?>">Insert</a></li>
      <li><a   href="<?= base_url("display")?>">View</a></li>
      <li>
        <?php if($username!=null){
          echo '<div class="chip">
          <img src="./assets/img/me.png" alt="Contact Person">
          Anastasios Mitronatsios
        </div>';
          } ?>
        
      </li>
      <?php if($username!=null){echo '<li><a href='.base_url("logout").'>logout</a></li>';} ?>
    </ul>
  </div>
  <ul id="slide-out" class="side-nav">
  <div class="row navBarMobile">
    <div class="col m12">
        <div class="card-content white-text">
          <p class="center-align">Welcome Back</p>
            <p><?php if($username!=null){
              echo '<div class="chip">
              <img src="./assets/img/me.png" alt="Contact Person">
              Anas Natsios
              </div>';
              } ?>
            </p>
          <p class="center-align">
          <ul>
            <li><a href="<?= base_url("admin") ?>">Home</a></li>
            <li><a href="<?= base_url("insert") ?>">Insert</a></li>

            <li><a href="<?= base_url("display")?>">View</a></li>
            <li> <?php if($username!=null){echo '<li><a href='.base_url("logout").'>logout</a></li>';} ?></li>
          </ul>
         </p>     
      </div>
    </div>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>
 <div class="container">       

