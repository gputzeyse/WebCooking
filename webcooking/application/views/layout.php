<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>WebCooking</title>
        <meta name="description" content="Webcooking, site culinaire et projet de fin d'étude en technique graphique infographique orientation Web.">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="<?php echo(base_url()); ?>css/normalize.css">
        <link rel="stylesheet" href="<?php echo(base_url()); ?>css/main.css">
        <script src="<?php echo(base_url()); ?>js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        
        <header>
	        <h1>
	        	WebCooking
	        </h1>
	        <nav>
		        <ul>
			        <li class='gauche'>
				        <?php echo(anchor('','home','title="Catégorie pour les recettes" ')); ?>
			        </li>
			        <li class='gauche'>
				        <?php echo(anchor('categorie/recette','Recettes','title="Catégorie pour les recettes" ')); ?>
				        <ul>
					        <?php foreach($cat as $cats){ ?>
					        	<li>
					        		<?php $title="Catégorie de recettes pour les $cats->nom";
						        	 echo(anchor("categorie/categorie_recette/$cats->id",$cats->nom,array('title'=>$title))); ?>
					        	</li>
					        	
					        <?php } ?>
				        </ul>
			        </li>
			        <li class='gauche'>
				        <?php echo(anchor('categorie/chef','Chef','title="Catégorie pour les recettes" ')); ?>
			        </li>
			        <li class='droite'>
				        <?php echo(anchor('categorie/membres','Membres','title="Catégorie pour les recettes" ')); ?>
				        <ul>
					        <li>
					        	<?php if($this->session->userdata('loged')==0){?>
						        <?php echo(anchor('login','Connexion','title="Formulaire de connexion" ')); ?>
					        </li><li>
						        <?php echo(anchor('login/inscription','Inscription','title="Formulaire d\'inscription" ')); ?>
						        <?php }else{
						         echo(anchor('membre/espace_perso/'.$this->session->userdata('id'),'Espace personel','title="acces à votre espace personel" ')); ?></li><li>
						         <?php echo(anchor('login/logout','Deconnexion','title="deconexion" ')); }?>
					        </li>
					        <?php if($this->session->userdata('acces')=='1'||$this->session->userdata('acces')=='2'){ ?>
					        <li>
						        <?php echo(anchor('admin','Administration','title="Zone d\'administration du site"' )); ?>
					        </li>
					        <?php } ?>
				        </ul>
			        </li>
			        <li class='droite'>
				        <?php echo(anchor('contact','Contact','title="Formulaire pour me contacter" ')); ?>
			        </li>
		        </ul>
	        </nav>
        </header>
        <div>
        	<div class='gauche'>
	        	<?php include($includefile); ?> 
        	</div>
        	<div class='droite'>
	        	<section class='search'>
		        	<header>
			        	<h1>Recherche</h1>
		        	</header>
            
            <?php echo (form_open('search/recette')); ?>
            	<input type="search" name='search' placeholder="Recette, Ingrédients"/>
            	<input type="submit" value="Envoyer"/>
            <?php echo(form_close());?>
	        	</section>
	        	<?php if($this->session->userdata('loged')){ ?>
	        	<section>
		        	<header>
			        	<h1>
				        	Carte Membre
			        	</h1>
		        	</header>
		        	<div class='membre_img'><img src='<?php echo(base_url().'img/membres/user.jpg'); ?>'/></div>
		        	<div>
		        		<p class='nom'>Nom: <span><?php echo($this->session->userdata('nom')); ?></span></p>
		        		<p class='prenom'>Prénom: <span><?php echo($this->session->userdata('prenom')); ?></span></p>
		        		<ul><li>
			        	<?php echo(anchor('membre/espace_perso/'.$this->session->userdata('id'),'Espace personel','title="acces à votre espace personel" ')); ?>
		        		</li>
		        		<li>
			        		<?php echo(anchor('login/logout','Deconnexion','title="deconexion" ')); ?>
		        		</li></ul>
		        	</div>
	        	</section>
	        	<?php }else{ ?>
	        	<section>
		        	<header>
			        	<h1>Connexion</h1>
		        	</header>
		        	<?php echo (form_open('login')); ?>
            	<input type="email" name='email' placeholder="Adresse mail" required/>
            	<input type="password" name='password' placeholder="Mots de passe" required//>
            	<input type="submit" value="Connexion"/>
            <?php echo(form_close());?>
	        	</section>
	        	<?php } ?>
	        	<section class='top_recette'>
		        	<header>
			        	<h1>Top Recettes</h1>
		        	</header>
		        	<?php foreach($likes as $like){ ?>
		        		<a href='<?php echo(site_url().'/recette/seul/'.$like->id_recette); ?>' title='lire <?php echo($like->titre); ?>'>
		        		<article>
			        		<header>
				        		<h1><?php echo($like->titre); ?></h1>
			        		</header>
			        		<p class='dificulte'>dificulté: <?php echo($like->dificulte); ?></p>
			        		<footer>
			        		<p class='like'><?php echo($like->nbre_like); ?> J'aime</p>
			        		</footer>
		        		</article>
		        		</a>
		        	<?php }?>
	        	</section>
	        	<?php if($likesc != null){ ?>
	        	<section class='top_chef'>
		        	<header>
			        	<h1>Top Recettes de chef</h1>
		        	</header>
		        	<?php foreach($likesc as $likec){ ?>
		        		<a href='<?php echo(site_url().'/recette/chef/'.$likec->id_recette); ?>' title='lire <?php echo($likec->titre); ?>'>
		        		<article>
			        		<header>
				        		<h1><?php echo($likec->titre); ?></h1>
			        		</header>
			        		<p class='dificulte'>dificulté: <?php echo($likec->dificulte); ?></p>
			        		<footer>
			        		<p class='like'><?php echo($likec->nbre_like); ?> J'aime</p>
			        		</footer>
		        		</article>
		        		</a>
		        	<?php }?>
	        	</section>
	        	<?php } ?>
	        	<section class='newsletter'>
		        	<header>
			        	<h1>Newsletter</h1>
		        	</header>
		        	<?php if (isset($error)){ ?>
            <span class='error'><?php echo($error); ?></span>
            <?php }?>
            
            <?php echo (form_open('newsletter/add_mail')); ?>
            	<input type="email" name='email' placeholder="Adresse Email"/>
            	<input type="submit" value="Envoyer"/>
            <?php echo(form_close());?>
		        	
	        	</section>
        	</div>
        </div>
       <footer>
	       
       </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo(base_url()); ?>js/vendor/jquery-1.9.0.min.js"><\/script>')</script>
        <script src="<?php echo(base_url()); ?>js/plugins.js"></script>
        <script src="<?php echo(base_url()); ?>js/main.js"></script>

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
