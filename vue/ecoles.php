<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<div class="col-auto">
			<div class="card rounded border border-5 border-info reveal-1">
				<div class="card-body bg-light">
					<h3 class="text-center">
						Liste des écoles de la Mairie de Villiers
					</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="d-flex justify-content-center">
		<div class="col-md-auto col-xxl-10">
			<div class="card reveal-2">
				<div class="card-body bg-light rounded border border-5 border-info">
					<table id="datatables-reponsive" class="table text-center table-dark table-striped" style="width:100%">
						<thead>
							<tr>
								<td><i class="align-middle fas fa-fw fa-school fs-3"></i></td>
								<td><i class="align-middle fas fa-fw fa-map-marker-alt fs-3"></i></td>
								<td><i class="align-middle me-1 fas fa-fw fa-users fs-3"></i></td>
							</tr>
						</thead>
						<tbody>
							<?php
							$view = $bdd->query("SELECT * FROM ecoles");
							while ($donnees = $view->fetch()) {
							?>
							<tr>
								<td><?= $donnees['nomec'] ?></td>
								<td><?= $donnees['adresseec'] ?></td>
								<td><?= $donnees['eleves'] ?></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if (isset($_SESSION['id'])) { ?>
<div class="d-flex justify-content-center mb-5">
	<button type="button" class="btn btn-lg fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: #32CD32; color: #191970;">
	  	S'inscrire à une école
	</button>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	<div class="modal-dialog modal-dialog-centered">
    	<div class="modal-content">
	      	<div class="modal-header">
	        	<h3 class="modal-title">Formulaire d'inscription</h3>
	        	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      	</div>
	      	<form method="post" action="">
	      		<div class="modal-body">
                    <?= $helper->input('text', 'nom', '', 'NOM') ?>
                    <?= $helper->input('text', 'prenom', '', 'Prénom') ?>
                    <div class="form-text">Entrez une adresse email valide. Un email vous sera envoyé.</div>
                    <?= $helper->input('email', 'email', '', 'Adresse email') ?>
                    <div class="mb-3">
                        <select name="ecole" class="form-select form-control-lg fw-bold">
                            <?php $requete = $bdd->query("SELECT * FROM ecoles ORDER BY nomec");
                            $lesEvenements = $requete->fetchAll();
                            foreach ($lesEvenements as $unEvenement) { ?>
                            <option value="<?= $unEvenement['nomec'] ?>"><?= $unEvenement['nomec'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="d-grid gap-2 col-12 mx-auto">
                            <?= $helper->button('submit', 'inscription', 'success', 'dark', 'S\'inscrire'); ?>
                        </div>
                    </div>
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
                    <a href="connexion">Connectez-vous</a> ou <a href="inscription">inscrivez-vous</a> pour vous inscrire à une école.
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>