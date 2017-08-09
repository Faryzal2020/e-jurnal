<?php
function getParam($name) {
	if (isset($_POST[$name]) ) {
		return $_POST[$name];
	} elseif (isset($_GET[$name]) ) {
		return $_GET[$name];
	}
}
?>