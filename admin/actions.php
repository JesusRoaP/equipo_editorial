<?php
if (!empty($_POST['save']) && $_POST['save'] == 'Save') {
	$myData = array();
    $myData[0] = $_POST['nombre'];
	$myData[1] = $_POST['cargo'];
	$myData[2] = $_POST['cvlac'];
	$myData[3] = $_POST['correo'];
	$myData[4] = $_POST['foto'];

	$wpdb->query($wpdb->prepare("INSERT INTO {$member_table} set
        nombre = %s,
        cargo = %s,
		cvlac = %s,
		correo = %s,
        foto = %s", $myData));
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

	$wpdb->query($wpdb->prepare("UPDATE {$member_table} set
        nombre = %s,
        cargo = %s,
		cvlac = %s,
		correo = %s,
		foto = %s
		where id = %d", $myData));
}

if (!empty($_POST['delete']) && isset($_POST['id']) && is_numeric($_POST['id'])) {
	$id = (int) $_POST['id'];
	$wpdb->query($wpdb->prepare("DELETE FROM {$member_table} WHERE id = %d", $id));
}
?>