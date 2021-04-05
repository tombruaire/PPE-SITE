<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<div class="col-auto reveal">
			<div class="card-body rounded bg-info reveal-1">
				<?php if (isset($_SESSION['id'])) { ?>
				<h2 class="text-center text-dark">
				<?php } else { ?>
				<h2 class="text-center text-light">
				<?php } ?>
					<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chat-left me-1" viewBox="0 0 16 16">
	  					<path d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
					</svg>
					Commentaires publiés
				</h2>
			</div>
			<?php if (isset($_SESSION['id'])) { ?>
			<hr class="bg-dark">
			<?php } else { ?>
			<hr class="bg-light">
			<?php } ?>
			<?php $requete = $bdd->query('SELECT idcom, contenu, date_format(posted_date, "%e/%m/%Y"), date_format(posted_time, "%H:%i"), user_id FROM commentaires ORDER BY idcom DESC');
			$posts = $requete->fetchAll();
			foreach($posts as $post) {
			?>
			<div class="card text-white mb-3 border border-4 border-success reveal-2">
				<?php if (isset($_SESSION['id'])) { ?>
  				<div class="card-body bg-light">
    				<p class="card-text text-lg text-dark">
    					<?= $post['contenu'] ?>
    				</p>
  				</div>
  				<div class="card-footer bg-light">
  					<p class="card-text text-dark">
  						Posté le <?= $post['date_format(posted_date, "%e/%m/%Y")'] ?> à <?= $post['date_format(posted_time, "%H:%i")'] ?>
  					</p>
  				</div>
  				<?php } else { ?>
  				<div class="card-body bg-dark">
    				<p class="card-text text-lg text-light">
    					<?= $post['contenu'] ?>
    				</p>
  				</div>
  				<div class="card-footer bg-dark">
  					<p class="card-text text-light">
  						Posté le <?= $post['date_format(posted_date, "%e/%m/%Y")'] ?> à <?= $post['date_format(posted_time, "%H:%i")'] ?>
  					</p>
  				</div>
  				<?php } ?>
			</div>
			<?php if (isset($_SESSION['id']) && $_SESSION['id'] == $post['user_id']) { ?>
			<div class="d-flex justify-content-center mb-5">
			     <a class="btn btn-lg btn-primary me-4" href="commentaires&edit=<?= $post['idcom'] ?>">Modifier</a>
			     <a class="btn btn-lg btn-danger" href="commentaires&delete=<?= $post['idcom'] ?>" onclick="return(confirm('Êtes-vous sûr de vouloir supprimer ce commentaire'));">Supprimer</a>
			</div>
			 <?php } ?>
			<?php } ?>
		</div>
	</div>
</div>

<?php if (isset($_SESSION['id'])) { ?>
<?= Alerts::getFlash(); ?>
<div class="container mt-4 mb-4">
	<div class="row d-flex justify-content-center">
		<div class="col-xxl-4">
			<form method="post" action="" class="reveal-4">
				<div class="mb-3">
					<textarea name="contenu" rows="5" cols="30" class="form-control"><?= $contenuTextarea ?></textarea>
				</div>
				<div class="mb-3">
					<input type="hidden" name="edit" value="<?= $icom ?>">
				</div>
				<div class="d-flex justify-content-center">
					<button type="submit" name="submit" class="btn btn-primary btn-lg">
						Envoyer
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } else { ?>
<div class="container mt-4 mb-4">
	<div class="row d-flex justify-content-center">
		<div class="col-auto">
			<div class="alert alert-primary alert-dismissible reveal-3" role="alert">
				<div class="alert-message">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle me-1" viewBox="0 0 16 16">
						<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
						<path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
					</svg>
					<a href="connexion">Connectez-vous</a> ou <a href="inscription">inscrivez-vous</a> pour pouvoir poster un commentaire.
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
