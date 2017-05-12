<!DOCTYPE html>
<html>
<head>
  <title>Test</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">

  <!-- Material design -->
  <link rel="stylesheet" type="text/css" href="/mdl/material.min.css">

  <link rel="stylesheet" type="text/css" href="/css/test.css">
</head>
<body>

    <div id="row">
    	<!-- Sidebar Wrapper -->
    	<div class="sidebar-wrapper col-md-2">
    		<ul class="sidebar-nav list-unstyled toggle">
    			<li class="sidebar-brand">
    				<a href="#">AppName</a>
    			</li>
    			<li>
    				<a href="#">Tableau de bord <i class="fa fa-angle-right fa-fw fa-lg pull-right" aria-hidden="true"></i></a>
    			</li>
    			<li class="active">
    				<a href="#">Tous <i class="fa fa-angle-right fa-fw fa-lg pull-right" aria-hidden="true"></i></a>
    			</li>
    			<li>
    				<a href="#">Aujourd'hui <i class="fa fa-angle-right fa-fw fa-lg pull-right" aria-hidden="true"></i></a>
    			</li>
    			<li>
    				<a href="#">Dans la semaine <i class="fa fa-angle-right fa-fw fa-lg pull-right" aria-hidden="true"></i></a>
    			</li>
    			<li>
    				<a href="#">Dans le mois <i class="fa fa-angle-right fa-fw fa-lg pull-right" aria-hidden="true"></i></a>
    			</li>
    			<li>
    				<a href="#">Les 3 derniers mois <i class="fa fa-angle-right fa-fw fa-lg pull-right" aria-hidden="true"></i></a>
    			</li>
    			<li>
    				<a href="#">Plus <i class="fa fa-plus fa-fw pull-right" aria-hidden="true"></i></a>
    			</li>
    			<li>
    				<a href="#">Aide <i class="fa fa-question fa-fw pull-right" aria-hidden="true"></i></a>
    			</li>
    		</ul>	
    			
    	</div>
    	<!-- /Sidebar Wrapper -->

    	<!-- Navbar -->
    	<nav class="navbar navbar-default col-md-10 col-md-offset-2" style="background: white;">
    		<div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="toggle" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		    </div>

    		<form class="navbar-form navbar-left" action="" method="">
    			<div class="form-group">
    				<i class="fa fa-search fa-fw fa-lg" aria-hidden="true"></i>
    				<input  id="search" type="text" name="data" class="form-control input-lg" placeholder="Recherche">
    			</div>
    		</form>

    		<ul class="nav navbar-nav navbar-right">
    			<li><a href=""><i class="fa fa-bell fa-fw fa-lg"></i><span class="badge">7</span></a></li>
    			<li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">username <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <!--<li role="separator" class="divider"></li>-->
		            <li><a href="#">Déconnexion</a></li>
		          </ul>
		        </li>
    		</ul>
    	</nav>
    	<!-- /Navbar -->

    	<div class="page-content">
	    	<!-- Section -->
	    	<section class="col-md-7 col-md-offset-2">

	    	<div class="tabs">
	    		<ul class="list-inline">
	    			<li><a href="#papier" role="tab" data-toggle="tab">Papiers</a></li>
	    			<li><a href="#electronique" role="tab" data-toggle="tab">Electroniques</a></li>
	    		</ul>
	    	</div>

	    		<div class="media well">
				  <div class="media-body">
				    <h4 class="media-heading"><a href="#">John Doe</a><br>
				    <small><i> publié le Novembre 17, 1993</i></small></h4>
				    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua...<a href="#"><i>Lire la suite</i></a></p>
				    <p>Source: <a href="#"><small>Dalaba</small></a> / Auteur: <a href="#"><small>Ibrahima</small></a></p>
				  </div>
				</div>
				<div class="media well">
				  <div class="media-body">
				    <h4 class="media-heading"><a href="#">John Doe</a><br>
				    <small><i> publié le Novembre 17, 1993</i></small></h4>
				    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua...<a href="#"><i>Lire la suite</i></a></p>
				    <p>Source: <a href="#"><small>Dalaba</small></a> / Auteur: <a href="#"><small>Ibrahima</small></a></p>
				  </div>
				</div>
				<div class="media well">
				  <div class="media-body">
				    <h4 class="media-heading"><a href="#">John Doe</a><br>
				    <small><i> publié le Novembre 17, 1993</i></small></h4>
				    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua...<a href="#"><i>Lire la suite</i></a></p>
				    <p>Source: <a href="#"><small>Dalaba</small></a> / Auteur: <a href="#"><small>Ibrahima</small></a></p>
				  </div>
				</div>
				<div class="media well">
				  <div class="media-body">
				    <h4 class="media-heading"><a href="#">John Doe</a><br>
				    <small><i> publié le Novembre 17, 1993</i></small></h4>
				    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua...<a href="#"><i>Lire la suite</i></a></p>
				    <p>Source: <a href="#"><small>Dalaba</small></a> / Auteur: <a href="#"><small>Ibrahima</small></a></p>
				  </div>
				</div>
				<div class="media well">
				  <div class="media-body">
				    <h4 class="media-heading"><a href="#">John Doe</a><br>
				    <small><i> publié le Novembre 17, 1993</i></small></h4>
				    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua...<a href="#"><i>Lire la suite</i></a></p>
				    <p>Source: <a href="#"><small>Dalaba</small></a> / Auteur: <a href="#"><small>Ibrahima</small></a></p>
				  </div>
				</div>
				<div class="media well">
				  <div class="media-body">
				    <h4 class="media-heading"><a href="#">John Doe</a><br>
				    <small><i> publié le Novembre 17, 1993</i></small></h4>
				    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua...<a href="#"><i>Lire la suite</i></a></p>
				    <p>Source: <a href="#"><small>Dalaba</small></a> / Auteur: <a href="#"><small>Ibrahima</small></a></p>
				  </div>
				</div>
				<div class="media well">
				  <div class="media-body">
				    <h4 class="media-heading"><a href="#">John Doe</a><br>
				    <small><i> publié le Novembre 17, 1993</i></small></h4>
				    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua...<a href="#"><i>Lire la suite</i></a></p>
				    <p>Source: <a href="#"><small>Dalaba</small></a> / Auteur: <a href="#"><small>Ibrahima</small></a></p>
				  </div>
				</div>
				<div class="media well">
				  <div class="media-body">
				    <h4 class="media-heading"><a href="#">John Doe</a><br>
				    <small><i> publié le Novembre 17, 1993</i></small></h4>
				    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				    tempor incididunt ut labore et dolore magna aliqua...<a href="#"><i>Lire la suite</i></a></p>
				    <p>Source: <a href="#"><small>Dalaba</small></a> / Auteur: <a href="#"><small>Ibrahima</small></a></p>
				  </div>
				</div>
				
	    	</section>
	    	<!-- /Section -->

	    	<!-- Aside -->
	    	<aside class="col-md-3">
	    		<div class="well">
	    			<h4>Flux RSS</h4>
	    		</div>

	    		<div class="well">
	    			<h4>Mots clés</h4>
	    			<ul id="keyword" class="list-unstyled list-inline">
	    				<li><a class="label label-default">Fed</a></li>
	    				<li><a class="label label-default">Obama</a></li>
	    				<li><a class="label label-default">Banque</a></li>
	    				<li><a class="label label-default">Politique</a></li>
	    			</ul>
	    			
	    		</div>
	    	</aside>
	    	<!-- /Aside -->

	    </div>
    </div>
    <!-- /Row -->

    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<script src="/mdl/material.min.js"></script>

</body>
</html>