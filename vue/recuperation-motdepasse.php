<?= Alerts::getFlash(); ?>
<main class="content d-flex p-0">
	<div class="container d-flex flex-column">
		<div class="row h-100">
			<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
				<?php if ($section == 'code') { ?>
				<div class="d-table-cell align-middle reveal">
					<div class="mt-5"></div>
					<div class="card bg-dark mt-1 reveal-1">
						<div class="card-header bg-dark">
							<h1 class="text-light text-center h2">Rénitialisation du mot de passe pour <?= $_SESSION['recupemail'] ?></h1>
							<p class="text-light text-center lead">Veuillez saisir votre code de vérification ci-dessous :</p>
						</div>
						<div class="card bg-dark mb-0 rounded">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post">
										<div class="mb-3">
											<input type="text" name="verif_code" placeholder="Code de vérification" class="form-control form-control-lg bg-info text-light">
										</div>
										<div class="text-center mt-1">
											<button type="submit" name="verif_submit" class="btn btn-lg btn-success text-dark fw-bold active">
												Valider
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } elseif ($section == 'changemdp') { ?>
				<div class="d-table-cell align-middle reveal">
					<div class="mt-5"></div>
					<div class="card bg-dark mt-1 reveal-1">
						<div class="card-header bg-dark">
							<h1 class="text-light text-center h2">Nouveau mot de passe pour <?= $_SESSION['recupemail'] ?></h1>
							<p class="text-light text-center lead">Veuillez saisir votre nouveau mot de passe ci-dessous :</p>
						</div>
						<div class="card bg-dark mb-0 rounded">
							<div class="card-body">
								<div class="m-sm-4">
									<form method="post">
										<div class="mb-3">
											<input type="password" name="newmdp" placeholder="Nouveau mot de passe" class="form-control form-control-lg bg-info text-light">
										</div>
										<div class="mb-3">
											<input type="password" name="newmdp1" placeholder="Confirmation du mot de passe" class="form-control form-control-lg bg-info text-light">
										</div>
										<div class="text-center mt-1">
											<button type="submit" name="newmotdepasse" class="btn btn-lg btn-success text-dark fw-bold active">
												Rénitialiser mon mot de passe
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } else { ?>
				<div class="d-table-cell align-middle reveal">
					<div class="mt-5"></div>
					<div class="card bg-dark mt-1 reveal-1">
						<div class="card-header bg-dark">
							<h1 class="text-light text-center h2">Mot de passe oublié ?</h1>
							<p class="text-light text-center lead">Inscrivez l'adresse email de votre compte ci-dessous :</p>
							<p class="text-center text-light fw-bold">Un code de vérification vous sera envoyé.</p>
						</div>
						<div class="card-body bg-dark rounded">
							<div class="m-sm-4">
								<form method="post">
									<div class="mb-3">
										<input type="email" name="recupemail" placeholder="votre.nom@domaine.com" class="form-control form-control-lg bg-info text-light">
									</div>
									<style type="text/css">
			                            [type=email].form-control:focus {box-shadow: inset 0 0 0;}
			                        </style>
									<div class="text-center mt-1">
										<button type="submit" name="recupmdp" class="btn btn-lg btn-success text-dark fw-bold active">
											Recevoir un code de vérification
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</main>
