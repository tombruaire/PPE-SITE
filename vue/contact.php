<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<div class="col-xxl-6">
			<div class="card border border-5 reveal-1" style="background-color: #ADD8E6; border-color: #9370DB!important;">
				<div class="card-header" style="background-color: #ADD8E6;">
					<h3 class="text-center text-dark">
						<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
  							<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
						</svg>
					</h3>
					<p class="text-center fw-bold fs-3">Nous contacter</p>
				</div>
				<div class="card-body" style="border-radius: .25rem!important; background-color: #ADD8E6;">
					<form method="post" action="">
						<div class="mb-3">
							<?= $helper->label('email', 'dark', 'Adresse email (<i>Obligatoire</i> )') ?>
							<?= $helper->input('text', 'email_contact', 'email', '') ?>
						</div>
						<div class="mb-3">
							<?= $helper->label('sujet', 'dark', 'Sujet du message') ?>
              				<?= $helper->input('text', 'sujet', 'sujet', '') ?>
						</div>
						<div class="mb-3">
							<?= $helper->label('message', 'dark', 'Message (<i>Obligatoire</i> )') ?>
							<?php textarea(); ?>
						</div>
						<div class="d-flex justify-content-center">
							<button type="submit" name="submit" class="btn btn-lg btn-success me-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
  									<path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
								</svg>
							</button>
							<button type="reset" class="btn btn-lg btn-danger">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
  									<path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
								</svg>
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
