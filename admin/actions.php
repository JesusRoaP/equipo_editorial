<?php
if (!empty($_POST['save']) && $_POST['save'] == 'Save') {
	$myData = array();
    $myData[0] = $_POST['nombre'];
	$myData[1] = $_POST['cargo'];
	$myData[2] = $_POST['cvlac'];
	$myData[3] = $_POST['correo'];
	$myData[4] = $_POST['foto'];

	$r = $wpdb->query($wpdb->prepare("INSERT INTO {$member_table} set
        nombre = %s,
        cargo = %s,
		cvlac = %s,
		correo = %s,
		foto = %s", $myData));
		
	if ($r) {
		$type = 'updated notice is-dismissible';
		$message = 'Miembro del equipo agregado exitosamente.';
	} else {
		$type = 'error notice is-dismissible';
		$message = 'Problemas al agregar el nuevo miembro del equipo.';
	}
}

if (!empty($_POST['update']) && $_POST['update'] == 'Update') {
	$id = (int) sanitize_text_field($_POST['eid']);
	$myData = array();
    $myData[0] = $_POST['nombre'];
	$myData[1] = $_POST['cargo'];
	$myData[2] = $_POST['cvlac'];
	$myData[3] = $_POST['correo'];
	$myData[4] = $_POST['foto'];
	$myData[5] = $id;

	$r = $wpdb->query($wpdb->prepare("UPDATE {$member_table} set
        nombre = %s,
        cargo = %s,
		cvlac = %s,
		correo = %s,
		foto = %s
		where id = %d", $myData));

	if ($r) {
		$type = 'updated notice is-dismissible';
		$message = 'Miembro del equipo actualizado exitosamente.';
	} else {
		$type = 'error notice is-dismissible';
		$message = 'Problemas al actualizar los datos del miembro del equipo.';
	}
}

if (!empty($_POST['delete']) && isset($_POST['id']) && is_numeric($_POST['id'])) {
	$id = (int) $_POST['id'];
	$r = $wpdb->query($wpdb->prepare("DELETE FROM {$member_table} WHERE id = %d", $id));

	if ($r) {
		$type = 'updated notice is-dismissible';
		$message = 'Miembro del equipo borrado exitosamente.';
	} else {
		$type = 'error notice is-dismissible';
		$message = 'Problemas al borrar el miembro del equipo.';
	}
}
?>