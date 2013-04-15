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
<?php include("elements/header.php"); ?>

<body>
<?php include("elements/topmenu.php"); ?>
<div class="container wrap">
	<div class="_404">
		<h1>ups...</h1>
		<p class="lead">Die angeforderte Seite konnte nicht gefunden werden.</p>
		<div style="width: 600px; margin: auto;margin-top: 100px;margin-bottom: 100px;">
		<h4><span class="muted">Der von dir angeklickte Link funktioniert nicht mehr oder wurde entfernt.</span></h4>
		</div>
		<a href="/" class="btn btn-success">Zur Startseite</a>
		</div>
</div>
<?php include("elements/footer.php"); ?>
</body>
</html>
