<?php
if (!empty($_POST['edit']) && $_POST['edit'] == 'Edit') {
	$id = (int) $_POST['id'];
    $selMember = $wpdb->get_row($wpdb->prepare("SELECT * FROM $member_table WHERE id = %d ", $id), ARRAY_A);
?>

<div id="equipo-editorial-modal-edit" class="equipo-editorial-modal" style="display: none">
<div class="equipo-editorial-modal-content equipo-editorial-modal-md">
<form action="" method="post">
	<input type="hidden" name="eid" value="<?php echo $id; ?>" />
	<div class="equipo-editorial-modal-header">
        Editar Miembro
		<span class="equipo-editorial-close">&times;</span>
    </div>
    <div class="equipo-editorial-modal-body-form">
    <?php wp_nonce_field("equipo-editorial-nonce-add") ?>
    	<table border="0" width="100%" cellpadding="10" cellspacing="0">
       		<tr>
          		<td style="width: 150px;"><label class="equipo-editorial-form-label" for="name">Nombre:</label></td>
              	<td><input type="text"  name="nombre" id="name" value="<?php echo $selMember['nombre'] ?>" class="equipo-editorial-form-input lg" placeholder="Nombre" size='40' required /></td>
           	</tr>
           	<tr>
              	<td><label class="equipo-editorial-form-label" for="designation">Cargo:</label></td>
              	<td><input type="text"  name="cargo" id="designation" value="<?php echo $selMember['cargo'] ?>" class="equipo-editorial-form-input lg" placeholder="Cargo" size='40' required /></td>
           	</tr>
			<tr>
              	<td><label class="equipo-editorial-form-label" for="cvlac">URL CvLAC:</label></td>
              	<td><input type="text"  name="cvlac" id="cvlac" value="<?php echo $selMember['cvlac'] ?>" class="equipo-editorial-form-input lg" placeholder="URL CvLAC" size='40'/></td>
           	</tr>
			<tr>
              	<td><label class="equipo-editorial-form-label" for="correo">Correo:</label></td>
              	<td><input type="text"  name="correo" id="correo" value="<?php echo $selMember['correo'] ?>" class="equipo-editorial-form-input lg" placeholder="Correo" size='40'/></td>
           	</tr>        
           	<tr>
              	<td style="width: 150px;"><label class="equipo-editorial-form-label"> Foto:</label></td>
              	<td>
				  	<img id="upload_image_img_edit" src="<?php echo $selMember['foto'] ?>" height='100'>
                 	<input type="hidden" name="foto" id="upload_image_src_edit" value="<?php echo $selMember['foto'] ?>" class="equipo-editorial-form-input lg" size='40'>
                 	<input type="button" id="upload_image_edit" value="Cargar Foto" class="equipo-editorial-btn-default button-secondary" >
              	</td>
           </tr>
        </table>
    </div>
	<div class="equipo-editorial-modal-form-footer">
        <button type="button" name="close" id="equipo-editorial-from-close" class="equipo-editorial-btn-danger equipo-editorial-pull-right">Cerrar</button>
        <input type="submit" name="update" class="equipo-editorial-btn-primary equipo-editorial-pull-right equipo-editorial-margin-right-10" value="Update"/>
     </div>
	 <br class="equipo-editorial-clear" />
</form>
</div>
<br class="equipo-editorial-clear" />
</div>

<script>
	jQuery(document).ready(function () {
        jQuery('#equipo-editorial-modal-edit').fadeIn(500);
        jQuery("body").css({
        	"overflow": "hidden"
		});
	});
</script>
<?php
}
?>

<div id="equipo-editorial-modal-add" class="equipo-editorial-modal" style="display: none">
   	<div class="equipo-editorial-modal-content equipo-editorial-modal-md">
      	<form action="" method="post">
         	<div class="equipo-editorial-modal-header">
            	Agregar Miembro
            	<span class="equipo-editorial-close">&times;</span>
         	</div>
         	<div class="equipo-editorial-modal-body-form">
            	<?php wp_nonce_field("equipo-editorial-nonce-add") ?>
            	<table border="0" width="100%" cellpadding="10" cellspacing="0">
               		<tr>
                  		<td style="width: 150px;"><label class="equipo-editorial-form-label" for="name">Nombre:</label></td>
                  		<td><input type="text"  name="nombre" id="nombre" value="" class="equipo-editorial-form-input lg" placeholder="Nombre" required /></td>
               		</tr>
               		<tr>
                  		<td><label class="equipo-editorial-form-label" for="designation">Cargo:</label></td>
                  		<td><input type="text"  name="cargo" id="cargo" value="" class="equipo-editorial-form-input lg" placeholder="Cargo" required /></td>
               		</tr>
					<tr>
            			<td><label class="equipo-editorial-form-label" for="cvlac">URL CvLAC:</label></td>
              			<td><input type="text"  name="cvlac" id="cvlac" value="" class="equipo-editorial-form-input lg" placeholder="URL CvLAC" size='40'/></td>
           			</tr>
					<tr>
            		  	<td><label class="equipo-editorial-form-label" for="correo">Correo:</label></td>
            		  	<td><input type="text"  name="correo" id="correo" value="" class="equipo-editorial-form-input lg" placeholder="Correo" size='40'/></td>
           			</tr>
			   		<tr>
					   <td style="width: 150px;"><label class="equipo-editorial-form-label"> Foto:</label></td>
              			<td>
				  			<img id="upload_image_img_add" src="<?php echo esc_url(plugins_url( 'admin/images/profile.jpg', __DIR__)) ?>" height='100'>
                 			<input type="hidden" name="foto" id="upload_image_src_add" value="<?php echo esc_url(plugins_url( 'admin/images/profile.jpg', __DIR__)) ?>" class="equipo-editorial-form-input lg" size='40'>
                 			<input type="button" id="upload_image_add" value="Cargar Foto" class="equipo-editorial-btn-default button-secondary" >
              			</td>
               		</tr>
			   	</table>

			</div>
			<div class="equipo-editorial-modal-form-footer">
   				<button type="button" name="close" id="equipo-editorial-from-close" class="equipo-editorial-btn-danger equipo-editorial-pull-right">Cerrar</button>
   				<input type="submit" name="save" class="equipo-editorial-btn-primary equipo-editorial-pull-right equipo-editorial-margin-right-10" value="Save"/>
			</div>
			<br class="equipo-editorial-clear" />
		</form>
	</div>
	<br class="equipo-editorial-clear" />
</div>
</div>

<script>
	jQuery("body").on("click", "#add-team-member", function () {
        jQuery("#equipo-editorial-modal-add").fadeIn(500);
        jQuery("body").css({
           "overflow": "hidden"
        });
        return false;
	});
</script>