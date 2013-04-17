<?php

if (empty($_GET['item_id'])) { 
	echo '<div class="alert alert-error">Es wurde kein Element ausgewählt.</div><p><a href="'. $url. '">Zurück</a>';
} else {
	$db = database::getInstance();
	
	$db->query("SELECT * FROM menus WHERE id = '". mysql_real_escape_string($_GET['item_id']). "'");
	if ($dbObj = $db->fetchRow()) {
		$menu = new menu($dbObj['name'], '');
		?>

		<form class="form-horizontal" method="post">
			<input type="hidden" name="action" id="action" value="edit" />
			<div class="span7">
				<div class="control-group">
					<label class="control-label" for="name"><strong>Name</strong></label>
					<div class="controls">
						<input type="text" id="name" class="input-xlarge" value="<?php echo $dbObj['name'] ?>" />
					</div>
				</div>
			</div>
			<div class="span3 last">
				<table class="table table-bordered table-hover table-condensed">
					<tr>
						<td><strong>ID #:</strong></td>
						<td><?php echo $dbObj['id'] ?></td>
					</tr>
					<tr>
						<td><strong>Elemente:</strong></td>
						<td><?php echo $menu->countMenuItems(). ' <span class="muted">('. $menu->countMenuItems(false) . ')</span>' ?></td>
					</tr>
					<tr>
						<td><strong>Letzte Änderung:</strong></td>
						<td><?php echo date("H:i, d.m.Y", $dbObj['edit_time']) ?></td>
					</tr>
				</table>
			</div>
			<div class="clear"></div>
			<div class="control-group">
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Änderungen speichern</button>
					<a href="<?php echo $url ?>" class="btn">Abbrechen</a>
				</div>
			</div>
		</form>
		<?php
	}
}

?>
