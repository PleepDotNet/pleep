<?php

# ############################################################################# #
# File: auth.php																#
# Author: Anton Dachauer (kontakt@antondachauer.de // http://antondachauer.de)	#
# ############################################################################# #
# Copyright (c) 2013, Anton Dachauer											#
# ############################################################################# #

?>

<div class="container">
	<form class="form-signin" action="/login.php" method="post">
		<h2 class="form-signin-heading">Anmelden</h2>
		<input type="text" class="input-block-level" placeholder="Email">
		<input type="password" class="input-block-level" placeholder="Passwort">
		<div class="right"><a href="/register">Kostenlos registrieren</a><br />
		<a href="/reset">Passwort vergessen?</a></div>
		<button class="btn btn-large btn-primary" type="submit">Anmelden</button>
	</form>
</div>
