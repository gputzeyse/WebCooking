<article class='principal'>
	
	<header>
		<hgroup>
		<h1><?php echo($rec->titre); ?></h1>
		
				</hgroup>

	</header>
	<div class='img'>

		<img src='<?php echo(base_url()); ?>img/recette/<?php echo($rec->recette_id); ?>.jpg' />
					<p class='difficulté'>Difficulté: <span class='<?php echo($rec->dificulte); ?>'><?php echo($rec->dificulte); ?></span>
					<?php if($this->session->userdata('loged')){
					if($fav==null){ 
			echo(anchor('membre/add_fav/'.$rec->recette_id,'Ajouter à mes favorits',"class='fav' title='Ajouter à mon espace perso'"));}else{
				echo(anchor('membre/del_fav/'.$rec->recette_id,'Enlever à mes favorits',"class='fav' title='Enlever à mon espace perso'"));
			}
			
			if($like==null){
			echo(anchor('membre/add_like/'.$rec->recette_id,'J\'aime',"class='fav' title='j\'aime cette recette'"));}else{echo(anchor('membre/del_like/'.$rec->recette_id,'Je n\'aime plus',"class='fav' title='Je n'\aime plu cette recette'"));}
		 } ?>
	</div>
	
	<section class='information'>
		<header>
		<h1>information</h1>
		</header>
		
		<ul>
			<li class='preparation'><?php echo($rec->temps_preparation); ?> minutes</li>
			<li class='cuisson'><?php echo($rec->temps_cuisson); ?> minutes</li>
			<li class='nbr_personne'><?php echo($rec->nbre_personne); ?> couverts</li>
			
		</ul>
	</section>
	<section>
		<header>
			<h1>Ingredients</h1>
		</header>
		<ul>
		<li>
			<?php $ingredient= str_replace('</br>','</li><li>', $rec->ingredient ); echo ($ingredient); ?>
		</li>
		</ul>
	</section>
	<section class='étape'>
		<header>
			<h1>Étape de la recette</h1>
		</header>
		<ul>
		<li>
		<?php $etape= str_replace('</br>','</li><li>', $rec->preparation ); echo ($etape); ?>
		</li>
		</ul>
	</section>
	
	<footer>
		<time datetime="<?php echo ($rec->date_ajout); ?>" > 
					
					ajouter le 
					<?php $date=date_parse($rec->date_ajout);
					
					$mois =array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet",
					"Août","Septembre","Octobre","Novembre","Décembre"); 
					
					echo($date['day'].' '.$mois[$date['month']].' '.$date['year']);?>
					 
					 </time>
					  par <?php echo(anchor('search/membre/'.$rec->id_auteur,$rec->login,'')); ?>

	</footer>
</article>
<article>
	<header>
		<h1>Information sur le chef</h1>
	</header>
	<div class='img_chef'>
		<img src='<?php echo(base_url()); ?>img/chef/<?php echo($rec->id_chef); ?>.jpg' alt='photo du chef <?php echo($rec->chef_prenom.' '.$rec->chef_nom); ?>' />
		<div>
			<p clas='nom'>Nom: <span><?php echo($rec->chef_nom); ?></span></p>
			<p class='prenom'>Prénom: <span><?php echo($rec->chef_prenom); ?></span></p>
			<p class='pays'>Pays: <span><?php echo($rec->chef_pays); ?></span></p>
			
			<?php echo(anchor('search/chef/'.$rec->id_chef,'Voir ces recettes',"title='recette du chef' class='voir recette'")); ?>
		</div>
	</div>
</article>
<?php if($fcat!=null){ ?>
<section class='meme_cat'>
		<header>
			<h1>Recettes du même chef</h1>
		</header>
		
		<?php foreach($fcat as $c){ ?>
		<a href='<?php echo($c->id); ?>' title='aller à la recette "<?php echo($c->titre); ?>"'>
			<article>
				<header>
				
					<h1><?php echo($c->titre); ?></h1>
				</header>
				<div class='img_petit'>

		<img src='<?php echo(base_url()); ?>img/recette/<?php echo($c->id); ?>.jpg' />
					<p class='difficulté'>dificulté: <span class='<?php echo($rec->dificulte); ?>'><?php echo($rec->dificulte); ?></span>
	</div>
				<div class='info'>
					<ul>
						<li class='temps_preparation'>
							<?php echo($c->temps_preparation); ?> minutes
						</li>
						<li class='temps_cuisson'><?php echo($c->temps_cuisson); ?> minutes</li>
						<li class='nbre_personne'><?php echo($c->nbre_personne); ?> Couverts</li>
					</ul>
				</div>
					<?php echo(anchor('recette/chef/'.$c->id,'Voir la recette',"title='voir la recette'")); ?>
					<footer>
					<time datetime="<?php echo ($c->date_ajout); ?>" > 
					
					ajouter le 
					<?php $date=date_parse($c->date_ajout);
					
					$mois =array("","Janvier","Février","Mars","Avril","Mai","Juin","Juillet",
					"Août","Septembre","Octobre","Novembre","Décembre"); 
					
					echo($date['day'].' '.$mois[$date['month']].' '.$date['year']);?>
					 
					 </time>
					  par <?php echo(anchor('search/membre/'.$c->id_auteur,$c->login,'')); ?>
					</footer>

			</article>
		</a>
		<?php } ?>
	</section>
	<?php } ?>