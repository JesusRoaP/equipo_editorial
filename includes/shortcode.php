<?php
function equipo_editorial() {
	wp_enqueue_script('carrusel-js');
	wp_enqueue_script('velocity-js');

	global $wpdb;
	$table_name = $wpdb->prefix . EE_TABLE;

	$row = $wpdb->get_results( "SELECT * FROM $table_name" );

	echo "<div class='slider--teams'>
	<div class='slider--teams__team'>
	  <ul id='list' class='cf'>";

	foreach($row as $rows) {
	
	echo
		"<li>
		  <figure>
			<div>
			  	<div  style='display: flex; justify-content: center; align-items: center;'>";
					if ($rows->foto) {
						echo "<img src='" . $rows->foto . "' style='height: 170px; width: auto; max-width: none;'/>";
					} else {
						echo "<img src='" . esc_url(plugins_url( 'admin/images/profile.jpg', __DIR__)) . "' height='100' />";
					}
			echo
				"</div>
			</div>
			<figcaption>
			  <h2>"."$rows->nombre"."</h2>
			  <p>"."$rows->cargo"."</p>
			   <div class='info-team'>
				<i onclick=window.open('" . $rows->cvlac . "','_blank'); class='icons_team logo-cvlac'></i>
				<div onclick='jQuery(location).attr('href','mailto:"."$rows->correo"."');' class='material-icons email'>mail_outline<span class='tooltiptext'>"."$rows->correo"."</span></div>
			  </div> 
			</figcaption>
		  </figure>
		</li>";

	}

	echo		
	  "</ul>
	</div>
  </div>";
}
add_shortcode('equipo_editorial', 'equipo_editorial');
?>