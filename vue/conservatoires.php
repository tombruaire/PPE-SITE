<div class="container mt-4">
	<div class="row d-flex justify-content-center">
		<div class="col-auto">
			<div class="card rounded border border-5 border-primary reveal-1">
				<div class="card-body bg-light">
					<h3 class="text-center">
						Liste des conservatoires de la Mairie de Villiers
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
								<td><i class="align-middle fas fa-fw fa-map-marker-alt fs-3"></i></td>
								<td><i class="align-middle fas fa-fw fa-phone-alt fs-3"></i></td>
								<td><i class="align-middle me-1 fas fa-fw fa-users fs-3"></i></td>
								<td><i class="align-middle fas fa-fw fa-calendar-plus fs-3"></i></td>
							</tr>
						</thead>
						<tbody>
							<?php
							$view = $bdd->query('SELECT idconserv, nomconserv, adresseconserv, telephone, effectifs, date_format(datecreationconserv, "%d/%m/%Y") FROM conservatoires ORDER BY nomconserv');
							while ($donnees = $view->fetch()) {
							?>
							<tr>
								<td><?= $donnees['nomconserv'] ?></td>
								<td><?= $donnees['adresseconserv'] ?></td>
								<td><?= $donnees['telephone'] ?></td>
								<td><?= $donnees['effectifs'] ?></td>
								<td><?= $donnees['date_format(datecreationconserv, "%d/%m/%Y")'] ?></td>
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
	  	S'inscrire à un conservatoire
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
                    <?= $helper->input('email', 'email', '', 'Adresse email') ?>
                    <?= $helper->input('text', 'tel', '', 'Téléphone') ?>
                    <?= $helper->input('text', 'adresse', '', 'Adresse') ?>
                    <div class="mb-3">
                        <select name="conservatoire" class="form-select form-control-lg fw-bold">
                            <?php $requete = $bdd->query("SELECT * FROM conservatoires ORDER BY nomconserv");
                            $lesEvenements = $requete->fetchAll();
                            foreach ($lesEvenements as $unEvenement) { ?>
                            <option value="<?= $unEvenement['nomconserv'] ?>"><?= $unEvenement['nomconserv'] ?></option>
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
                    <a href="connexion">Connectez-vous</a> ou <a href="inscription">inscrivez-vous</a> pour vous inscrire à un conservatoire.
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- CONFIGURATIONS DU TABLEAU -->
<script type="text/Javascript">
document.addEventListener("DOMContentLoaded", function() {
	$("#datatables-reponsive").DataTable({
		responsive: true, // Tableau responsive
		ordering: false, // Classement par ordre alphabétique
		iDisplayLength: 5, // Nombre d'affichage par défaut (au chargement de la page)
		language: {
			lengthMenu: 'Afficher <select class="form-select">'+
      		'<option value="1">1</option>'+ // Affichage de 1 conservatoire
      		'<option value="5">5</option>'+ // Affichage de 5 conservatoires, etc...
      		'<option value="10">10</option>'+
      		'<option value="25">25</option>'+
     		'<option value="50">50</option>'+
      		'<option value="-1">100</option>'+ // Affichage de toutes les conservatoires
      		'</select> conservatoires',
            emptyTable: "Aucune donnée disponible dans le tableau",
    		info: "Affichage de _START_ à _END_ conservatoires sur _TOTAL_ conservatoires",
		    infoEmpty: "Affichage de l'élément 0 à 0 sur 0 élément",
		    infoFiltered: "(filtré à partir de _MAX_ éléments au total)",
		    infoThousands: ",",
		    loadingRecords: "Chargement...",
		    processing: "Traitement...",
		    search: "Rechercher :",
		    zeroRecords: "Aucune conservatoires trouvé",
		    paginate: {
		        previous: "Précédent",
		        next: "Suivant"
		    }
        }
	});
});
</script>
