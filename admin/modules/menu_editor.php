<?php

$url = "/admin/index.php?mod=menu_editor&mod_file=menu_editor.php";

?>

<div style="float: right;"><a href="<?php echo $url ?>&action=add" class="btn btn-success"><span class="icon-plus"></span> Neues Element</a></div>
<h3><img src="/admin/icons/menu.png" /> Menüs</h3>

<?php

switch($_GET['action']) {
	case '': {
		include(dirname(__FILE__). "/menu_editor/view.php");
		break;
	}
	
	case 'edit': {
		include(dirname(__FILE__). "/menu_editor/edit.php");
		break;
	}
	
	case 'delete': {
		include(dirname(__FILE__). "/menu_editor/delete.php");
		break;
	}
}

?>
