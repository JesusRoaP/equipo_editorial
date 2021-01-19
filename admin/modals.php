<?php
if (!empty($_POST['edit']) && $_POST['edit'] == 'Edit') {
	$id = (int) $_POST['id'];
    $selMember = $wpdb->get_row($wpdb->prepare("SELECT * FROM $member_table WHERE id = %d ", $id), ARRAY_A);
?>

<div id="wpm-6310-modal-edit" class="wpm-6310-modal" style="display: none">
<div class="wpm-6310-modal-content wpm-6310-modal-md">
<form action="" method="post">
	<input type="hidden" name="eid" value="<?php echo $id; ?>" />
	<div class="wpm-6310-modal-header">
        Editar Miembro
		<span class="wpm-6310-close">&times;</span>
    </div>
    <div class="wpm-6310-modal-body-form">
    <?php wp_nonce_field("wpm-6310-nonce-add") ?>
    	<table border="0" width="100%" cellpadding="10" cellspacing="0">
       		<tr>
          		<td style="width: 150px;"><label class="wpm-form-label" for="name">Nombre:</label></td>
              	<td><input type="text"  name="nombre" id="name" value="<?php echo $selMember['nombre'] ?>" class="wpm-form-input lg" placeholder="Nombre" size='40' required /></td>
           	</tr>
           	<tr>
              	<td><label class="wpm-form-label" for="designation">Cargo:</label></td>
              	<td><input type="text"  name="cargo" id="designation" value="<?php echo $selMember['cargo'] ?>" class="wpm-form-input lg" placeholder="Cargo" size='40' required /></td>
           	</tr>
			<tr>
              	<td><label class="wpm-form-label" for="cvlac">URL CvLAC:</label></td>
              	<td><input type="text"  name="cvlac" id="cvlac" value="<?php echo $selMember['cvlac'] ?>" class="wpm-form-input lg" placeholder="URL CvLAC" size='40'/></td>
           	</tr>
			<tr>
              	<td><label class="wpm-form-label" for="correo">Correo:</label></td>
              	<td><input type="text"  name="correo" id="correo" value="<?php echo $selMember['correo'] ?>" class="wpm-form-input lg" placeholder="Correo" size='40'/></td>
           	</tr>        
           	<tr>
              	<td style="width: 150px;"><label class="wpm-form-label"> Foto:</label></td>
              	<td>
				  	<img id="upload_image_img_edit" src="<?php echo $selMember['foto'] ?>" height='100'>
                 	<input type="hidden" name="foto" id="upload_image_src_edit" value="<?php echo $selMember['foto'] ?>" class="wpm-form-input lg" size='40'>
                 	<input type="button" id="upload_image_edit" value="Cargar Foto" class="wpm-btn-default button-secondary" >
              	</td>
           </tr>
        </table>
    </div>
	<div class="wpm-6310-modal-form-footer">
        <button type="button" name="close" id="wpm-from-close" class="wpm-btn-danger wpm-pull-right">Cerrar</button>
        <input type="submit" name="update" class="wpm-btn-primary wpm-pull-right wpm-margin-right-10" value="Update"/>
     </div>
	 <br class="wpm-6310-clear" />
</form>
</div>
<br class="wpm-6310-clear" />
</div>

<script>
	jQuery(document).ready(function () {
        jQuery('#wpm-6310-modal-edit').fadeIn(500);
        jQuery("body").css({
        	"overflow": "hidden"
		});
	});
</script>
<?php
}
?>

<div id="wpm-6310-modal-add" class="wpm-6310-modal" style="display: none">
   	<div class="wpm-6310-modal-content wpm-6310-modal-md">
      	<form action="" method="post">
         	<div class="wpm-6310-modal-header">
            	Agregar Miembro
            	<span class="wpm-6310-close">&times;</span>
         	</div>
         	<div class="wpm-6310-modal-body-form">
            	<?php wp_nonce_field("wpm-6310-nonce-add") ?>
            	<table border="0" width="100%" cellpadding="10" cellspacing="0">
               		<tr>
                  		<td style="width: 150px;"><label class="wpm-form-label" for="name">Nombre:</label></td>
                  		<td><input type="text"  name="nombre" id="nombre" value="" class="wpm-form-input lg" placeholder="Nombre" required /></td>
               		</tr>
               		<tr>
                  		<td><label class="wpm-form-label" for="designation">Cargo:</label></td>
                  		<td><input type="text"  name="cargo" id="cargo" value="" class="wpm-form-input lg" placeholder="Cargo" required /></td>
               		</tr>
					<tr>
            			<td><label class="wpm-form-label" for="cvlac">URL CvLAC:</label></td>
              			<td><input type="text"  name="cvlac" id="cvlac" value="" class="wpm-form-input lg" placeholder="URL CvLAC" size='40'/></td>
           			</tr>
					<tr>
            		  	<td><label class="wpm-form-label" for="correo">Correo:</label></td>
            		  	<td><input type="text"  name="correo" id="correo" value="" class="wpm-form-input lg" placeholder="Correo" size='40'/></td>
           			</tr>
			   		<tr>
					   <td style="width: 150px;"><label class="wpm-form-label"> Foto:</label></td>
              			<td>
				  			<img id="upload_image_img_add" src="<?php echo esc_url(plugins_url( 'admin/images/profile.jpg', __DIR__)) ?>" height='100'>
                 			<input type="hidden" name="foto" id="upload_image_src_add" value="<?php echo esc_url(plugins_url( 'admin/images/profile.jpg', __DIR__)) ?>" class="wpm-form-input lg" size='40'>
                 			<input type="button" id="upload_image_add" value="Cargar Foto" class="wpm-btn-default button-secondary" >
              			</td>
               		</tr>
			   	</table>

			</div>
			<div class="wpm-6310-modal-form-footer">
   				<button type="button" name="close" id="wpm-from-close" class="wpm-btn-danger wpm-pull-right">Cerrar</button>
   				<input type="submit" name="save" class="wpm-btn-primary wpm-pull-right wpm-margin-right-10" value="Save"/>
			</div>
			<br class="wpm-6310-clear" />
		</form>
	</div>
	<br class="wpm-6310-clear" />
</div>
</div>

<script>
	jQuery("body").on("click", "#add-team-member", function () {
        jQuery("#wpm-6310-modal-add").fadeIn(500);
        jQuery("body").css({
           "overflow": "hidden"
        });
        return false;
	});
</script>