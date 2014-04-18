<?php

class Page {

	# Lookups can be static, from DB, memcached, etc...
	public function render ($view,$lookups=null) {
		if ($lookups !== null) { extract($lookups); }	# Import lookups into symbol table
		require ($view);				# Render the view
		}
	}

?>
