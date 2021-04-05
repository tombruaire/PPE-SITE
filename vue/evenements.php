<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<div class="col-auto">
			<div class="card rounded border border-5 border-primary reveal-1">
				<div class="card-body bg-light">
					<h3 class="text-center">
						Liste des évènements de la Mairie de Villiers
					</h3>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="d-flex justify-content-center">
		<div class="col-md-auto col-xxl-12">
			<div class="card reveal-1">
				<div class="card-body bg-light rounded border border-5 border-primary">
					<table id="datatables-reponsive" class="table text-center table-dark table-striped" style="width:100%">
						<thead>
							<tr>
								<td></td>
								<td><i class="align-middle fas fa-fw fa-calendar-alt fs-3"></i></td>
								<td><i class="align-middle fas fa-fw fa-clock fs-3"></i></td>
								<td><i class="align-middle fas fa-fw fa-map-marker-alt fs-3"></i></td>
								<td><i class="align-middle fas fa-fw fa-user-check fs-3"></i></td>
								<td><i class="align-middle me-1 fas fa-fw fa-euro-sign fs-3"></i></td>
								<td><i class="align-middle me-1 fas fa-fw fa-users fs-3"></i></td>
							</tr>
						</thead>
						<tbody>
							<?php
							$view = $bdd->query('SELECT idevent, nomevent, date_format(dateevent, "%e/%m/%Y"), date_format(heureevent, "%H:%i"), lieuevent, nbievent, prixplaceevent, placestotal FROM evenements ORDER BY idevent DESC');
							while ($donnees = $view->fetch()) {
							?>
							<tr>
								<td><?= $donnees['nomevent'] ?></td>
								<td><?= $donnees['date_format(dateevent, "%e/%m/%Y")'] ?></td>
								<td><?= $donnees['date_format(heureevent, "%H:%i")'] ?></td>
								<td><?= $donnees['lieuevent'] ?></td>
								<td><?= $donnees['nbievent'] ?></td>
								<td><?= $donnees['prixplaceevent'] ?></td>
								<td><?= $donnees['placestotal'] ?></td>
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
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-xxl-5 col-auto">
            <div class="card mt-2 reveal-2">
                <div class="card-header">
                    <p class="text-center text-dark fw-bold fs-3">Participer à un évènement</p>
                </div>
                <div class="card-body" style="border-radius: .25rem!important;">
                    <form method="post" action="">
                    	<div class="form-text">Entrez une adresse email valide. Un email vous sera envoyé.</div>
                        <?= $helper->input('email', 'emailuser', '', 'Adresse email') ?>
                        <div class="mb-3">
                            <select name="evenement" class="form-select form-control-lg fw-bold">
                                <?php $requete = $bdd->query("SELECT * FROM evenements ORDER BY nomevent");
                                $lesEvenements = $requete->fetchAll();
                                foreach ($lesEvenements as $unEvenement) { ?>
                                <option value="<?= $unEvenement['nomevent'] ?>"><?= $unEvenement['nomevent'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="d-grid gap-2 col-12 mx-auto">
                                <?= $helper->button('submit', 'participer', 'success', 'dark', 'Participer l\'évènement'); ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
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
                    <a href="connexion">Connectez-vous</a> ou <a href="inscription">inscrivez-vous</a> pour pouvoir participer à un évènement.
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
