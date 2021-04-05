<?php

function textarea() {
	$helper = new Helpers();
	if (isset($_SESSION['id']))
		echo $helper->textarea('message', 'content', 'Bonjour,');
	else
		echo $helper->textarea('message', '', 'Bonjour,');
}

?>