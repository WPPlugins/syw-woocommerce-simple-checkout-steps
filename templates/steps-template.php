<?php 

	global $woocommerce;

	if ( WC()->cart->get_cart_contents_count() != 0  || is_wc_endpoint_url( 'order-received' )){ 
	// ESTABLECER PASO DE LA COMPRA
	if(is_cart()){$paso=2;
	}elseif(is_checkout()){
		if(is_wc_endpoint_url( 'order-received' )){
			$paso=5;
		}else{
			$paso=3;
		}
	}else{$paso=1;}
	

	?>
	<link rel="stylesheet" href="<?php echo plugins_url( 'font-awesome/css/font-awesome.min.css', dirname(__FILE__)  ) ?>">
	<link rel="stylesheet" type="text/css" href="<?php echo plugins_url( 'css/style.css', dirname(__FILE__)  ) ?>">
	<div style="position:relative;display:inline-block;width:100%;height:50px;text-align:center;">
		<div style="position:relative;display:inline-block;width:60%;height: 100%;">
		<div style="float:left;width:25%;text-align:center">
			<div class="progressbar-item done" style="display:inline-block">
				<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ) ?>"><i class="fa fa-hand-lizard-o fa-rotate-270"></i>
				<span class="progressbar-item-text"><?php _e('Elige productos', 'syw-woocommerce-simple-checkout-steps') ?></span></a>
			</div>
		</div>
		<div style="float:left;width:25%;text-align:center">
			<div class="progressbar-item <?php if($paso>1){echo 'done';} ?>" style="display:inline-block">
				<a href="<?php echo $woocommerce->cart->get_cart_url() ?>"><i class="fa fa-shopping-cart fa-lg"></i>
				<span class="progressbar-item-text"><?php _e('Carrito', 'syw-woocommerce-simple-checkout-steps') ?></span></a>
			</div>
		</div>
		<div style="float:left;width:25%;text-align:center">
			<div class="progressbar-item <?php if($paso>2){echo 'done';} ?>" style="display:inline-block">
				<a href="<?php echo $woocommerce->cart->get_checkout_url() ?>"><i class="fa fa-pencil-square-o fa-lg"></i>
				<span class="progressbar-item-text"><?php _e('Envío y pago', 'syw-woocommerce-simple-checkout-steps') ?></span></a>
			</div>
		</div>
		<div style="float:left;width:25%;text-align:center">
			<div class="progressbar-item <?php if($paso>4){echo 'done';} ?>" style="display:inline-block">
				<i class="fa fa-check fa-lg"></i>
				<span class="progressbar-item-text"><?php _e('Confirmación', 'syw-woocommerce-simple-checkout-steps') ?></span>
			</div>
		</div>
		<div style="position:absolute;width:80%;height:2px;bottom:14px;margin: 0 10%;background-color:grey;">
			<a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ) ?>"><span class="dot uno done"></span></a>
			<a href="<?php echo $woocommerce->cart->get_cart_url() ?>"><span class="dot dos <?php if($paso>1){echo 'done';} ?>"></span></a>
			<a href="<?php echo $woocommerce->cart->get_checkout_url() ?>"><span class="dot tres <?php if($paso>2){echo 'done';} ?>"></span></a>
			<span class="dot cuatro <?php if($paso>3){echo 'done';} ?>"></span>
			<div id="progress-bar" style="width:<?php echo -33.33 + $paso*33.33 ?>%;"></div>
		</div>
		</div>
	</div>
<?php } 




?>