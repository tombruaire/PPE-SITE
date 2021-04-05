<!DOCTYPE html>
<html>
<head>
	<title>mairievilliers</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" type="image/png" href="assets/img/logo.png">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/fonts.googleapis.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/css/scroll.animate.css">
	<link rel="stylesheet" type="text/css" href="assets/css/fixed.css">
	<link rel="stylesheet" type="text/css" href="zoombox/zoombox.css">
	<script src="https://cdn.wpcc.io/lib/1.0.2/cookieconsent.min.js" defer></script>
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>
	<style type="text/css">
	body {background-image: url(assets/img/fond.jpg); background-position: center center; background-repeat: no-repeat; background-attachment: fixed; background-size: cover;}
	@media only screen and (max-width: 767px) {
    	body {background-image: url(assets/img/fond-mobile.png);}
	}
	</style>
</head>
<body>

<?php include 'cookie.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light landing-navbar" style="border-bottom: 5px solid black;">
	<div class="container">
		<a class="navbar-brand landing-brand" href="http://localhost/PPE-SITE/">
	      	<img src="assets/img/logo.png" class="img-fluid me-1" width="40">
	      	mairievilliers
    	</a>
    	<?php userIconNavBar(); ?>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0" id="navbarLink">
                <?= $helper->lien('accueil', 'Accueil') ?>
                <?= $helper->lien('evenements', 'Évènements') ?>
                <?= $helper->lien('conservatoires', 'Conservatoires') ?>
                <?= $helper->lien('associations', 'Associations') ?>
                <?= $helper->lien('ecoles', 'Écoles') ?>
                <?= $helper->lien('contact', 'Contact') ?>
                <?php logoutButton(); ?>
            </ul>
            <?php user(); ?>
        </div>
	</div>
</nav>
<div class="nav"></div>


<?= Alerts::getFlash(); ?>
<?= $content; ?>

<?php footer(); ?>

<script src="assets/js/app.js"></script>
<script src="assets/js/ckeditor.js"></script>
<script src="assets/js/scroll.animate.js"></script>
<script src="assets/js/fixed.js"></script>
<script src="assets/js/active.js"></script>
<script src="assets/js/mdp.js"></script>
<script type="text/javascript" src="zoombox/zoombox.js"></script>
<script type="text/javascript"> 
$(function(){$('a.zoombox').zoombox();});
</script>

</body>
</html>