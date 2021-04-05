<div class="container-fluid mt-4">
	<div class="row d-flex justify-content-center reveal">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="col-auto">
					<div class="card bg-success">
						<div class="card-body bg-success col-auto" style="border-radius:.25rem!important;">
							<h2 class="text-center text-dark reveal-1">
								Bienvenue sur votre profil <?= $_SESSION['prenom'] ?> <?= $_SESSION['nom'] ?> !
							</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-3">
			<div class="card reveal-2">
				<div class="card-header">
					<h5 class="card-title mb-0">
						<i class="align-middle me-1" data-feather="settings"></i>
						Paramètres du compte
					</h5>
				</div>
				<div class="list-group list-group-flush" role="tablist">
					<a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#informations" role="tab">
						<i class="align-middle me-1" data-feather="align-left"></i>
						Informations générales
					</a>
					<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#edit-pseudo" role="tab">
						<i class="align-middle me-1" data-feather="edit-2"></i>
						Modifier mon pseudo
					</a>
					<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#edit-email" role="tab">
						<i class="align-middle me-1" data-feather="edit-2"></i>
						Modifier mon adresse email
					</a>
					<a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#edit-motdepasse" role="tab">
						<i class="align-middle me-1" data-feather="edit-2"></i>
						Modifier mon mot de passe
					</a>
					<a class="list-group-item list-group-item-action bg-danger text-light" data-bs-toggle="list" href="#delete-compte" role="tab" style="border-color: #dc3545!important;">
						Supprimer mon compte
						<i class="align-middle ms-1" data-feather="delete"></i>
					</a>
				</div>
			</div>
		</div>

		<div class="col-xl-3">
			<div class="tab-content">

				<!-- Informations générales -->
				<div class="tab-pane fade show active" id="informations" role="tabpanel">
					<div class="card reveal-1" style="background-color: #4682B4;">
						<div class="card-header">
							<h5 class="card-title mb-0">
								<i class="align-middle me-1" data-feather="align-left"></i>
								Informations de mon profil
							</h5>
						</div>
						<div class="card-body">
							<p class="text-light">
								<i class="align-middle me-1 fas fa-fw fa-user-alt"></i>
								<?= $_SESSION['nom'] ?>
							</p>
							<p class="text-light">
								<i class="align-middle me-1 fas fa-fw fa-user-alt"></i>
								<?= $_SESSION['prenom'] ?></b>
							</p>
							<p class="text-light">
								<i class="align-middle me-1 fas fa-fw fa-at"></i>
								<?= $_SESSION['pseudo'] ?>
							</p>
							<p class="text-light">
								<i class="align-middle me-1 fas fa-fw fa-envelope"></i>
								<?= $_SESSION['email'] ?></b>
							</p>
							<div class="d-flex justify-content-center">
								<a class="btn btn-warning active text-dark" href="deconnexion">
									Ce ne sont pas informations
								</a>
							</div>
						</div>
					</div>
				</div>

				<!-- Modifier mon pseudo -->
				<div class="tab-pane fade" id="edit-pseudo" role="tabpanel">
					<div class="card reveal-1" style="background-color: #008080;">
						<div class="card-body">
							<h3 class="text-center text-light">Modification du pseudo</h3>
							<form method="post" action="" class="mt-4">
								<p class="fs-lg text-light">Pseudo actuel : <font color="aqua"><?= $_SESSION['pseudo'] ?></font></p>
								<div class="mb-3">
									<label for="pseudo" class="form-label text-light fs-lg">Nouveau pseudo</label>
									<input type="text" name="pseudo" id="pseudo" autocomplete="off" maxlength="15" class="form-control w-50">
								</div>
								<div class="mb-3">
									<p class="text-center text-light fs-lg">
										Vous serez déconnecté après le changement.
									</p>
								</div>
								<div class="d-flex justify-content-center">
			                        <div class="d-grid gap-2 col-12 mx-auto">
			                            <button type="submit" name="new-pseudo" class="btn btn-lg active fw-bold fs-lg mt-3" style="background-color: #00FFFF; border-color: #00FFFF; color: black;">
											Modifier mon pseudo
										</button>
			                        </div>
			                    </div>
							</form>
						</div>
					</div>
				</div>

				<!-- Modifier mon adresse email -->
				<div class="tab-pane fade" id="edit-email" role="tabpanel">
					<div class="card reveal-1" style="background-color: #008080;">
						<div class="card-body">
							<h3 class="text-center text-light">Modification de l'adresse email</h3>
							<form method="post" action="" class="mt-4">
								<p class="fs-lg text-light">Adresse email actuel : <font color="aqua"><?= $_SESSION['email'] ?></font></p>
								<div class="mb-3">
									<label for="email" class="form-label text-light fs-lg">
										Nouvelle adresse email
									</label>
									<input type="email" name="email" id="email" autocomplete="off" class="form-control w-75" required>
								</div>
								<div class="mb-3">
									<p class="text-center text-light fs-lg">
										Vous serez déconnecté après le changement.
									</p>
								</div>
								<div class="d-flex justify-content-center">
			                        <div class="d-grid gap-2 col-12 mx-auto">
			                            <button type="submit" name="new-email" class="btn btn-lg active fw-bold fs-lg mt-3" style="background-color: #00FFFF; border-color: #00FFFF; color: black;">
											Modifier mon adresse email
										</button>
			                        </div>
			                    </div>
							</form>
						</div>
					</div>
				</div>

				<!-- Modifier mon mot de passe -->
				<div class="tab-pane fade" id="edit-motdepasse" role="tabpanel">
					<div class="card reveal-1" style="background-color: #008080;">
						<div class="card-body">
							<h3 class="text-center text-light">Modification du mot de passe</h3>
							<form method="post" action="" class="mt-4">
								<div class="mb-3">
									<label for="new-password-1" class="form-label text-light fs-lg">
										Nouveau mot de passe
									</label>
									<input type="password" name="new-password-1" id="new-password-1" class="form-control w-75" required>
								</div>
								<div class="mb-3">
									<label for="new-password-2" class="form-label text-light fs-lg">
										Confirmation du nouveau mot de passe
									</label>
									<input type="password" name="new-password-2" id="new-password-2" class="form-control w-75" required>
								</div>
								<div class="mb-3">
									<p class="text-center text-light fs-lg">
										Vous serez déconnecté après le changement.
									</p>
								</div>
								<div class="d-flex justify-content-center">
			                        <div class="d-grid gap-2 col-12 mx-auto">
			                            <button type="submit" name="new-motdepasse" class="btn btn-lg active fw-bold fs-lg mt-3" style="background-color: #00FFFF; border-color: #00FFFF; color: black;">
											Modifier mon mot de passe
										</button>
			                        </div>
			                    </div>
							</form>
						</div>
					</div>
				</div>

				<!-- Supprimer mon compte -->
				<div class="tab-pane fade" id="delete-compte" role="tabpanel">
					<div class="card reveal-1" style="background-color: #008080;">
						<div class="card-body">
							<h3 class="text-center text-light">Suppression du compte</h3>
							<form method="post" action="" class="mt-4">
								<div class="mb-3">
									<label for="email" class="form-label text-light fs-lg">
										Adresse email
									</label>
									<input type="text" name="email" id="email" class="form-control" required>
								</div>
								<div class="mb-3">
									<label for="motdepasse" class="form-label text-light fs-lg">
										Mot de passe
									</label>
									<input type="password" name="motdepasse" id="motdepasse" class="form-control" required>
								</div>
								<div class="d-flex justify-content-center">
			                        <div class="d-grid gap-2 col-12 mx-auto">
			                            <button type="submit" name="delete" class="btn btn-danger btn-lg active text-light fw-bold fs-lg mt-3">
											Supprimer mon compte
										</button>
			                        </div>
			                    </div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
