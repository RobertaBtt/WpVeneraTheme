<?php
/**
 * The Sidebar for the woocommerce shop page
 *
 * @package venera
 */
?>
<?php if(is_active_sidebar('sidebar-shop')){ ?>
<aside class="shop-sidebar">
  <?php dynamic_sidebar( 'sidebar-shop' ); ?>
</aside>
<?php } ?>