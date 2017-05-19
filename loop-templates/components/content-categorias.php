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
      <h2 class="text-center"><?php the_field('titulo_introduccion_categorias'); ?></h2>
    </div>
    <?php if (get_field('texto_introduccion_categorias')) { 
      if (get_field('imagen_introduccion_categorias')) { ?>
        <div class="container-fluid">
          <div class="row img-half-row align-items-center">

            <div class="col-md-6 img-half-col push-md-6">
              <div class="container half ml-md-0">
                  <div class="half-text">
                    <?php the_field('texto_introduccion_categorias'); ?>
                  </div>
              </div>
            </div>
        
            <div class="col-md-6 img-half-col pull-md-6">
              <img
                src="<?php echo get_field('imagen_introduccion_categorias')['url']; ?>"
                alt="<?php echo get_field('imagen_introduccion_categorias')['alt']; ?>"
              >
            </div>
        
          </div>
        </div>
      <?php } else { ?>
        <div class="container">
          <?php the_field('texto_introduccion_categorias'); ?>
        </div>
  <?php }
      }
  ?>
  </section>
<?php } ?>

<?php if (get_field('categorias')) { ?>
  <section>
    <?php foreach (get_field('categorias') as $i => $categoria) { ?>
      <div class="mini-section">
        <div class="container">
          <h2 class="text-center"><?php echo $categoria['titulo']; ?></h2>
        </div>
        <?php if ($categoria['imagen']) { ?>
          <div class="container-fluid">
            <div class="row img-half-row align-items-center">
          
              <div class="col-md-6 img-half-col<?php echo $i % 2 ? ' push-md-6' : ''; ?>">
                <div class="container half<?php echo $i % 2 ? ' ml-md-0' : ' mr-md-0'; ?>">
                    <div class="half-text">
                      <?php echo $categoria['texto']; ?>
                    </div>
                </div>
              </div>
          
              <div class="col-md-6 img-half-col<?php echo $i % 2 ? ' pull-md-6' : ''; ?>">
                <img
                  src="<?php echo $categoria['imagen']['url']; ?>"
                  alt="<?php echo $categoria['imagen']['alt']; ?>"
                >
              </div>
          
            </div>
          </div>
        <?php } else { ?>
          <div class="container">
            <?php echo $categoria['texto']; ?>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </section>
<?php } ?>