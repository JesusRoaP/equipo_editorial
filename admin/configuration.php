<?php
if (! current_user_can ('manage_options')) wp_die (__ ('No tienes suficientes permisos para acceder a esta página.'));

global $wpdb;
$member_table = $wpdb->prefix . EE_TABLE;

include_once('actions.php');
?>

<br><br>
<div class="wrap">
	<h2><?php _e( 'Equipo Editorial', 'equipo editorial' ) ?>
	<button class="equipo-editorial-btn-success" id="add-team-member">Agregar Nuevo</button>
	</h2>
	<div id="response" class="<?php echo $type ?>"><p><?php echo $message ?></p></div>
	Bienvenido a la configuración del plugin Equipo Editorial.
</div>
<br>

<div class="ee-info">
	<p>Utiliza el siguiente shortcode para mostrar el slider (esta será la página principal del plugin): <input id="shortcode" type="text" value="[equipo_editorial]"><button class="button" onclick="copyToClipboard('#shortcode')">Copiar Shortcode</button><span class="copy" style="display: none">Copiado!</span></p>
</div>

<div class="equipo-editorial">
	<table class="equipo-editorial-table">
	   	<tr>
	      	<td style="width: 100px;">Nombre</td>
	      	<td style="width: 100px;">Cargo</td>
	      	<td style="width: 100px">Foto</td>
	      	<td style="width: 80px">Editar | Eliminar</td>
	   	</tr>

   		<?php
   		$data = $wpdb->get_results('SELECT * FROM ' . $member_table . ' ORDER BY id ASC', ARRAY_A);
   		foreach ($data as $value) {
      		echo '<tr>';
      		echo '<td>' . $value['nombre'] . '</td>';
      		echo '<td>' . $value['cargo'] . '</td>';

      		if ($value['foto']) {
				echo
				"<td>
					<div style='height:100px; width: 100px; overflow: hidden; display: flex; justify-content: center; align-items: center;'>
						<img src='" . $value['foto'] . "' style='height: 100px; width: auto; max-width: none;'/>
					</div>
				</td>";
      		} else {
				echo 
				"<td>No Disponible</td>";
      		}

			echo
			  	'<td>
                 	<form method="post">
                        <input type="hidden" name="id" value="' . $value['id'] . '">
						<button class="equipo-editorial-btn-success equipo-editorial-margin-right-10" style="float:left"  title="Edit"  type="submit" value="Edit" name="edit">
							<i class="fas fa-edit" aria-hidden="true"></i>
						</button>
                  	</form>
                  	<form method="post">
                        <input type="hidden" name="id" value="' . $value['id'] . '">
						<button class="equipo-editorial-btn-danger" style="float:left"  title="Delete"  type="submit" value="delete" name="delete" onclick="return confirm(\'¿Quieres borrar este miembro?\');">
							<i class="far fa-times-circle" aria-hidden="true"></i>
						</button>
                  	</form>
				</td>
			</tr>';
   		}
   		?>
	</table>

<script>
	function copyToClipboard(elemento) {
		var $temp = jQuery("<input>")
		jQuery("body").append($temp);
		$temp.val(jQuery(elemento).val()).select();
		document.execCommand("copy");
		$temp.remove();
    	setInterval(function(){
        	jQuery(".copy").fadeOut(500);
    	}, 3000);
	}

	jQuery('.ee-info .button').click(function(){
		jQuery(this).next('.copy').fadeIn(500);
	})
</script>

<?php
include_once('modals.php');
?>