<table class="table table-striped table-hover table-condensed">
	<thead>
		<tr>
			<th width="4%">#</th>
			<th width="40%">Name</th>
			<th width="10%">Elemente</th>
			<th width="12%">Letzte Änderung</th>
			<th width="8%">Aktion</th>
		</tr>
	</thead>
	<tbody>
		<?php
			
			// MUSS eine neue Verbindung sein, da sonst nur 1 Menüelement gezeigt wird.
			$db = new database(DB_HOST, DB_USER, DB_PW, DB_DB);
			
			$db->query("SELECT * FROM menus");
			while ($dbObj = $db->fetchRow()) {
				$menu = new menu($dbObj['name'], '');
				echo '<tr>';
				
				echo '<td>'. $dbObj['id']. '</td>';
				echo '<td>'. $dbObj['name']. '</td>';
				echo '<td>'. $menu->countMenuItems(). ' <span class="muted">('. $menu->countMenuItems(false) . ')</span></td>';
				echo '<td>'. date("H:i, d.m.Y", $dbObj['edit_time']). '</td>';
				echo '<td>
							<div class="btn-group">
								<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">Aktion <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="'. $url. '&action=edit&item_id='. $dbObj['id']. '"><span class="icon-edit"></span> Bearbeiten</a></li>
									<li><a href="'. $url. '&action=delete&item_id='. $dbObj['id']. '"><span class="icon-trash"></span> Löschen</a></li>
								</ul>
							</div>
						';#<a href="'. $url. '&action=move_up&item_id='. $dbObj['id']. '" class="btn"><span class="icon-arrow-up"></span></a>
						#<a href="'. $url. '&action=move_down&item_id='. $dbObj['id']. '" class="btn"><span class="icon-arrow-down"></span></a>
				echo '</td>';
				
				echo '</tr>';
				$menu = NULL;
			}
		?>
	</tbody>
</table>
