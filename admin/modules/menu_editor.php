<?php

include (DIR. "/admin/modules/menu_editor/functions.php");

$url = "/admin/index.php?mod=menu_editor&mod_file=menu_editor.php";

?>
<div style="float: right;"><a href="<?php echo $url ?>&action=add" class="btn btn-success"><span class="icon-plus"></span> Neues Element</a></div>
<h2>Modul <span class="muted">Menü-Editor</span></h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th width="4%">#</th>
			<th width="40%">Name</th>
			<th width="10%">Elemente</th>
			<th width="12%">Letzte Änderung</th>
			<th width="18%">Aktion</th>
		</tr>
	</thead>
	<tbody>
		<?php
			
			$db = database::getInstance();
			
			$db->query("SELECT * FROM menus");
			while ($dbObj = $db->fetchRow()) {
				echo '<tr>';
				
				echo '<td>'. $dbObj['id']. '</td>';
				echo '<td>'. $dbObj['name']. '</td>';
				echo '<td>'. $dbObj['name']. '</td>';
				echo '<td>'. date("H:i, d.m.Y", $dbObj['edit_time']). '</td>';
				echo '<td>
						<a href="'. $url. '&action=edit&mod_id='. $dbObj['id']. '" class="btn btn-primary"><span class="icon-edit"></span> Bearbeiten</a>
						<a href="'. $url. '&action=delete&mod_id='. $dbObj['id']. '" class="btn btn-danger"><span class="icon-trash"></span> Löschen</a>
						';#<a href="'. $url. '&action=move_up&mod_id='. $dbObj['id']. '" class="btn"><span class="icon-arrow-up"></span></a>
						#<a href="'. $url. '&action=move_down&mod_id='. $dbObj['id']. '" class="btn"><span class="icon-arrow-down"></span></a>
				echo '</td>';
				
				echo '</tr>';
			}
		?>
	</tbody>
</table>
