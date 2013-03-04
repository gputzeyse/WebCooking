<section>
	<header>
		<h1>Espace personel</h1>
		<p>Dans cet espace, conserver vos recettes favorites et partager vos recettes avec les autres membres.</p>
	</header>
	<section class='list_recette'>
		<header>
			<h1>Mon livre de recettes favorites</h1>
		</header>
		<?php if($fav!=0){ ?>
		<?php foreach($fav as $recette){ ?>
			
			<a href='<?php echo(site_url()); ?><?php if($recette->id_chef){ ?>/recette/chef/<?php } else{ ?>/recette/seul/<?php } echo($recette->recette_id); ?>' title='voir la recette "<?php echo($recette->titre); ?>"'>
			<article class='litle'>
			<header>
				<h1><?php echo($recette->titre); ?></h1>
				
			</header>
				<div class='img_recettes'>
				<img src='<?php echo(base_url()); ?>img/recette/<?php echo($recette->recette_id); ?>.jpg' />
					<p class='difficulté'>dificulté: <span class='<?php echo($recette->dificulte); ?>'><?php echo($recette->dificulte); ?></span></p>
				</div>
				
				
				<div class='info'>
					<ul>
						<li class='temps_preparation'>
							<?php echo($recette->temps_preparation); ?> minutes
						</li>
						<li class='temps_cuisson'><?php echo($recette->temps_cuisson); ?> minutes</li>
						<li class='nbre_personne'><?php echo($recette->nbre_personne); ?> Couverts</li>
					</ul>
				</div>
					<?php if($recette->id_chef){echo(anchor('recette/chef/'.$recette->recette_id,'Voir la recette',"title='voir la recette'"));}else{ echo(anchor('recette/seul/'.$recette->recette_id,'Voir la recette',"title='voir la recette'"));} ?>
					<footer>
					<time datetime="<?php echo ($recette->date_ajout); ?>" > 
					
					ajouter le 
					<?php $date=date_parse($recette->date_ajout);
					
					$mois =array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet",
					"Août","Septembre","Octobre","Novembre","Décembre"); 
					
					echo($date['day'].' '.$mois[$date['month']].' '.$date['year']);?>
					 
					 </time>
					  par <?php echo(anchor('search/membre/'.$recette->id_auteur,$recette->login,'')); ?>
					</footer>
				
		</article>
		</a>
		
		<?php } }else{ ?>
		<article>
		<header>
			<h1>
				Comment ajouter une recette dans mon espace.
			</h1>
		</header>
		<div>
			
					<p>rendez-vous sur la page d'une recette et cliquez sur le bouton <span>Ajouter aux favorit</span>. </p>
					
		</div>	
		</article> 
		<?php } ?>
	</section>
</section>