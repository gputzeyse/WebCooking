
<section class='derniere_recette'>
	<header>
		<h1>Les dernière recettes</h1>
	</header>
	<?php if($rec!=0){ ?>
	<?php $i=1; foreach($rec as $recette) {  ?>
	<?php if($i==1){ ?>
		<a href="index.php/recette/seul/<?php echo($recette->id);  ?>" title='voir la recette "<?php echo($recette->titre); ?>"' >
		<article class='prem'>
			<header>
				<h1><?php echo($recette->titre); ?></h1>
				
			</header>
				<div class='img_recettes'>
				<img src='<?php echo(base_url()); ?>img/recette/<?php echo($recette->id); ?>.jpg'/>
					<p class='difficulté'>dificulté: <span class='<?php echo($recette->dificulte); ?>'><?php echo($recette->dificulte); ?></span></p>
				</div>
				<p class='description'><?php echo($recette->desc); ?></p>
				
				<div class='info'>
					<ul>
						<li class='temps_preparation'>
							<?php echo($recette->temps_preparation); ?> minutes
						</li>
						<li class='temps_cuisson'><?php echo($recette->temps_cuisson); ?> minutes</li>
						<li class='nbre_personne'><?php echo($recette->nbre_personne); ?> Couverts</li>
					</ul>
				</div>
				<?php echo(anchor('recette/'+$recette->id,'Voir la recette',"title='voir la recette '.$recette->titre")); ?>
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
		<?php $i++; }else{ ?>
			<a href='index.php/recette/seul/<?php echo($recette->id); ?>' title='voir la recette "<?php echo($recette->titre); ?>"'>
			<article class='litle'>
			<header>
				<h1><?php echo($recette->titre); ?></h1>
				
			</header>
				<div class='img_recettes'>
				<img src='<?php echo(base_url()); ?>img/recette/<?php echo($recette->id); ?>.jpg' />
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
					<?php echo(anchor('recette/'+$recette->id,'Voir la recette',"title='voir la recette'")); ?>
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
	<?php }}} else{ ?>
	<p class='no_recette'>pas de recettes sur le site</p>
	<?php } ?>
</section>

<section class='dernier_chef'>
	<header>
		<h1>Les dernière recettes de chef</h1>
	</header>
	<?php if($chefs!=0){ ?>
	<?php $i=1; foreach($chefs as $chef) {  ?>
	<a href="index.php/recette/chef/<?php echo($chef->id);  ?>" title='voir la recette "<?php echo($chef->titre); ?>"' >
	<?php if($i==1){ ?>
		
		<article class='prem'>
			<header>
				<h1><?php echo($chef->titre); ?></h1>
				
			</header>
				<div class='img_recettes'>
				<img src='<?php echo(base_url()); ?>img/recette/<?php echo($chef->id); ?>.jpg'/>
					<p class='difficulté'>Difficulté: <span class='<?php echo($chef->dificulte); ?>'><?php echo($chef->dificulte); ?></span></p>
				</div>
				<p class='description'><?php echo($chef->desc); ?></p>
				
				<div class='info'>
					<ul>
						<li class='temps_preparation'>
							<?php echo($chef->temps_preparation); ?> minutes
						</li>
						<li class='temps_cuisson'><?php echo($chef->temps_cuisson); ?> minutes</li>
						<li class='nbre_personne'><?php echo($chef->nbre_personne); ?> Couverts</li>
					</ul>
					<?php echo(anchor('recette/chef/'.$chef->id,'Voir la recette',"title='voir la recette'")); ?>
					<footer>
					<time datetime="<?php echo ($chef->date_ajout); ?>" > 
					
					ajouter le 
					<?php $date=date_parse($chef->date_ajout);
					
					$mois =array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet",
					"Août","Septembre","Octobre","Novembre","Décembre"); 
					
					echo($date['day'].' '.$mois[$date['month']].' '.$date['year']);?>
					 
					 </time>
					  par <?php echo(anchor('search/membre/'.$chef->id_auteur,$chef->login,'')); ?>
					</footer>
				</div>
		</article>
		<?php $i++; }else{ ?>
			<article class='litle'>
			<header>
				<h1><?php echo($chef->titre); ?></h1>
				
			</header>
				<div class='img_recettes'>
				<img src='<?php echo(base_url()); ?>img/recette/<?php echo($chef->id); ?>.jpg'/>
					<p class='difficulté'>Difficulté: <span class='<?php echo($chef->dificulte); ?>'><?php echo($chef->dificulte); ?></span></p>
				</div>
				
				
				<div class='info'>
					<ul>
						<li class='temps_preparation'>
							<?php echo($chef->temps_preparation); ?> minutes
						</li>
						<li class='temps_cuisson'><?php echo($chef->temps_cuisson); ?> minutes</li>
						<li class='nbre_personne'><?php echo($chef->nbre_personne); ?> Couverts</li>
					</ul>
				</div>
					<?php echo(anchor('recette/chef/'.$chef->id,'Voir la recette',"title='voir la recette'")); ?>
					<footer>
					<time datetime="<?php echo ($chef->date_ajout); ?>" > 
					
					ajouter le 
					<?php $date=date_parse($chef->date_ajout);
					
					$mois =array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet",
					"Août","Septembre","Octobre","Novembre","Décembre"); 
					
					echo($date['day'].' '.$mois[$date['month']].' '.$date['year']);?>
					 
					 </time>
					  par <?php echo(anchor('search/membre/'.$chef->id_auteur,$chef->login,'')); ?>
					</footer>
				
		</article>
	<?php }}echo('</a>');} else{ ?>
	<p class='no_chef'>pas de recettes de chef sur le site</p>
	<?php } ?>
 
</section>