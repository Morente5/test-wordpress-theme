<?php
/**
 * Content categorias template.
 *
 * @package yofisio
 */
?>
<?php if (get_field('titulo_introduccion_categorias') || get_field('texto_introduccion_categorias')) { ?>
  <section>
    <div class="container">
      <h2><?php the_field('titulo_introduccion_categorias'); ?></h2>
      <?php if (get_field('texto_introduccion_categorias')) { 
        if (get_field('imagen_introduccion_categorias')) { ?>
          <div class="row">

            <div class="col-md-6 push-md-6">
              <div class="half-text">
                <?php the_field('texto_introduccion_categorias'); ?>
              </div>
            </div>
        
            <div class="wow fadeInLeft col-md-6 pull-md-6">
              <?php
                $attr = array(
                  'alt' => get_field('imagen_introduccion_categorias')['alt'],
                );
                echo wp_get_attachment_image( get_field('imagen_introduccion_categorias')['id'], 'medium_large', $attr);
              ?>
            </div>
        
          </div>
        <?php } else { ?>
            <?php the_field('texto_introduccion_categorias'); ?>
      <?php }
          }
      ?>
    </div>
  </section>
<?php } ?>

<?php if (get_field('categorias')) { ?>
  <section>
    <div class="container">
    <?php foreach (get_field('categorias') as $i => $categoria) { ?>
      <div class="mini-section">
        <h2><?php echo $categoria['titulo']; ?></h2>
        <?php if ($categoria['imagen']) { ?>
          <div class="row">

            <div class="col-md-6<?php echo $i % 2 ? ' push-md-6' : ''; ?>">
              <?php echo $categoria['texto']; ?>
            </div>

            <div class="wow col-md-6<?php echo $i % 2 ? ' pull-md-6 fadeInLeft' : ' fadeInRight'; ?>">
              <?php
                  $attr = array(
                    'alt' => $categoria['imagen']['alt'],
                  );
                  echo wp_get_attachment_image( $categoria['imagen']['id'], 'medium_large', $attr);
              ?>
            </div>

          </div>
        <?php } else { ?>
          <?php echo $categoria['texto']; ?>
        <?php } ?>
      </div>
    <?php } ?>
    </div>
  </section>
<?php } ?>