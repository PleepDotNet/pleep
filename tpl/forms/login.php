<?php

# ############################################################################# #
# File: auth.php																#
# Author: Anton Dachauer (kontakt@antondachauer.de // http://antondachauer.de)	#
# ############################################################################# #
# Copyright (c) 2013, Anton Dachauer											#
# Permission is hereby granted, free of charge, to any person obtaining a copy	#
# of this software and associated documentation files (the "Software"), to deal	#
# in the Software without restriction, including without limitation the			#
# rights to use, copy, modify, merge, publish, distribute, sublicense, and/or	#
# sell copies of the Software, and to permit persons to whom the Software is	#
# furnished to do so, subject to the following conditions:						#
#																				#
# The above copyright notice and this permission notice shall be included in	#
# of all copies or substantial portions of the Software.						#
# 																				#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR	#
# IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,		#
# FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE	#
# AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER		#
# LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,	#
# OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE	#
# SOFTWARE.																		#
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
