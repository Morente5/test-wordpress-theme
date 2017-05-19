<?php
/**
 * Content breadcrumbs template.
 *
 * @package yofisio
 */
?>
<div id="phone-fixed" class=" ">
    <?php $contacto_page = get_page_by_title( 'contacto' ); ?>
    <a href="tel:<?php echo get_field('telefonos', $contacto_page->ID)[0]['telefono']; ?>" class="btn btn-warning btn-block m-t-2 btn-cool">
<i class="fa fa-phone fa-2"></i>
<div>
<small>Si sufres esta patología no dudes en llamarnos</small><?php echo get_field('telefonos', $contacto_page->ID)[0]['telefono']; ?>
</div>
</a>
</div>
