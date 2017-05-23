<!DOCTYPE html>
<html>
<head>
  <title>Test</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="/mdl/material.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="/css/test1.css">
</head>
<body>

	<!-- Uses a header that scrolls with the text, rather than staying
  locked at the top -->
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
	  <header class="mdl-layout__header">
	    <div class="mdl-layout__header-row">
	      <!-- Title -->
	      <span class="mdl-layout-title">AppName</span>
	      <!-- Add spacer, to align navigation to the right -->
	      <div class="mdl-layout-spacer"></div>

	      <!-- Navigation -->
	      <nav class="mdl-navigation">
	        <a class="mdl-navigation__link" href=""><i class="material-icons mdl-badge mdl-badge--overlap" data-badge="7"">notifications</i></a>
	        <a id="user-account" class="mdl-navigation__link mdl-button mdl-js-button mdl-button--icon">
	        	<i class="material-icons">account_circle</i>
	        </a>
	        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="user-account">
			  <li class="mdl-menu__item">Déconnexion</li>
			</ul>
	      </nav>
	    </div>
	  </header>

	  <div class="mdl-layout__drawer">
	    <span class="mdl-layout-title">AppName</span>
	    <nav class="mdl-navigation">
	      <a class="mdl-navigation__link" href="">Tous</a>
	      <a class="mdl-navigation__link" href="">Aujourd'hui</a>
	      <a class="mdl-navigation__link" href="">Dans la semaine</a>
	      <a class="mdl-navigation__link" href="">Dans le mois</a>
	      <a class="mdl-navigation__link" href="">Les 3 derniers mois</a>
	      <a class="mdl-navigation__link" href="">Plus <i class="material-icons">arrow_drop_down</i></a>
	    </nav>
	  </div>
	  <main class="mdl-layout__content">
	    <div class="page-content">
	    	<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			  <div class="mdl-tabs__tab-bar">
			      <a href="#dashboard-panel" class="mdl-tabs__tab is-active">Tableau de bord</a>
			      <a href="#groupe-panel" class="mdl-tabs__tab">Nouveau groupe</a>
			      <a href="#user-panel" class="mdl-tabs__tab">nouveau compte</a>
			  </div>

			  <div class="mdl-grid">
			  	<!-- SECTION -->
			    <section class="mdl-cell mdl-cell--8-col mdl-cell--2-offset">
			    	<div class="mdl-tabs__panel is-active" id="dashboard-panel">
			    		<div class="mdl-grid">
			    			<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col">
							  <div class="mdl-card__supporting-text">
							    <i class="material-icons">group</i>
							    <p>17 Groupes</p>
							  </div>
							</div>
							<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col">
							  <div class="mdl-card__supporting-text">
							    <i class="material-icons">vpn_key</i>
							    <p>17 Mots clés</p>
							  </div>
							</div>
							<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col">
							  <div class="mdl-card__supporting-text">
							    <i class="material-icons">account_circle</i>
							    <p>17 Comptes utilisatuers</p>
							  </div>
							</div>
			    		</div>

			    		<div class="mdl-grid">
			    			<div class="mdl-cell mdl-cell--9-col">
				    			<!-- GROUPES -->
				    			<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp mdl-cell mdl-cell--12-col">
								  <thead>
								    <tr>
								      <th class="mdl-data-table__cell--non-numeric">Nom</th>
								      <th>Mots clés</th>
								      <th>Nombre d'utilisateur</th>
								      <th>Action</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td class="mdl-data-table__cell--non-numeric">Groupe</td>
								      <td>fed, obama, sport, maroc, afrique</td>
								      <td>17</td>
								      <td>
										<!-- Colored icon button -->
										<a href="#" id="g1" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
										  <i class="material-icons">search</i>
										</a>
										<div class="mdl-tooltip" data-mdl-for="g1">Afficher</div>
										<a href="#" id="g2" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
										  <i class="material-icons">delete</i>
										</a>
										<div class="mdl-tooltip" data-mdl-for="g2">Supprimer</div>
								      </td>
								    </tr>
								  </tbody>
								</table>
								<!-- END GROUPES -->

								<!-- COMPTES -->
								<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp mdl-cell mdl-cell--12-col">
								  <thead>
								    <tr>
								      <th class="mdl-data-table__cell--non-numeric">Nom</th>
								      <th>E-mail</th>
								      <th>Groupe</th>
								      <th>Action</th>
								    </tr>
								  </thead>
								  <tbody>
								    <tr>
								      <td class="mdl-data-table__cell--non-numeric">Barry Ibrahima</td>
								      <td>ibarry@itelsys.ma</td>
								      <td>Département Informatique</td>
								      <td>
										<!-- Colored icon button -->
										<a href="#" id="u1" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
										  <i class="material-icons">search</i>
										</a>
										<div class="mdl-tooltip" data-mdl-for="u1">Afficher</div>
										<a href="#" id="u2" class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored">
										  <i class="material-icons">delete</i>
										</a>
										<div class="mdl-tooltip" data-mdl-for="u2">Supprimer</div>
								      </td>
								    </tr>
								  </tbody>
								</table>
								<!-- END COMPTES -->
							</div>

							<!-- MOTS CLES -->
							<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--3-col">
							  <div class="mdl-card__title" style="text-align: center;">
							    <h2 class="mdl-card__title-text">Mots clés</h2>
							  </div>
							  <div class="mdl-card__supporting-text">
							    <ul class="demo-list-item mdl-list">
								  <li class="mdl-list__item">
								    <span class="mdl-list__item-primary-content">
								      Bryan Cranston
								    </span>
								  </li>
								  <li class="mdl-list__item">
								    <span class="mdl-list__item-primary-content">
								      Aaron Paul
								    </span>
								  </li>
								  <li class="mdl-list__item">
								    <span class="mdl-list__item-primary-content">
								      Bob Odenkirk
								    </span>
								  </li>
								</ul>
							  </div>
							</div>
							<!-- END MOTS CLES -->
			    		</div>
			    	</div>
			    	<div class="mdl-tabs__panel" id="groupe-panel">
			    		<div class="mdl-card mdl-shadow--2dp mdl-cell mdl-cell--6-col mdl-cell--3-offset">
						  <div class="mdl-card__title">
						    <h2 class="mdl-card__title-text">Nouveau groupe</h2>
						  </div>
						  <div class="mdl-card__supporting-text">
						    <form action="#">
							  <div class="mdl-textfield mdl-js-textfield">
							    <input class="mdl-textfield__input" type="text" name="name">
							    <label class="mdl-textfield__label" for="name">Nom du groupe</label>
							  </div>
							  
							  <div></div>
							</form>
						  </div>
						  <div class="mdl-card__actions mdl-card--border">
								<button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Log in</button>
							</div>
						</div>
					</div>
					<div class="mdl-tabs__panel" id="user-panel">
						
					</div>
		    	</section>
		    	<!-- END SECTION -->
			  </div>
			</div>
	    </div>
	  </main>
	</div>

	<script src="/mdl/material.min.js"></script>
</body>
</html>