<?php

# ############################################################################# #
# File: auth.php																#
# Author: Anton Dachauer (kontakt@antondachauer.de // http://antondachauer.de)	#
# ############################################################################# #
# Copyright (c) 2013, Anton Dachauer											#
# ############################################################################# #

?><div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
			<a class="brand" href="/"><?php echo $this->eprint($this->Sitename); ?></a>
			<div class="nav-collapse collapse">
				<?php $this->TopMenu->displayMenu(); ?>
			</div>
			<!--/.nav-collapse --> 
		</div>
	</div>
</div>

