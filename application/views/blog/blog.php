<section id="blog">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="title"><?= $categoria ?></h1>
                <hr>
            </div>
        </div>
        <!-- Container posts -->
        <div class="row">
            <div class="col-md-9 col-xs-12">
                <!-- Individual post -->
                
                <?php foreach ($posts as $post): ?>
                <div class="col-xs-12 single-post">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <img class="img-responsive" src="<?= base_url() ?>assets/custom/img/posts/avion_post.jpg">
                        </div>
                        <div class="col-md-8 col-sm-12 info-single-post">
                            <h3><?= $post->titulo?></h3>
                            <p><?php if(strlen ( $post->contenido ) > 1000){ echo substr($post->contenido, 0, 400).'...';}else{ echo $post->contenido; }  ?></p>
                            <a type="button" href="<?= base_url()?>pacobert/article/<?= $post->posts_id ?>" class="btn btn-default">Leer más</a>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
                

            </div>
            
                        <div class=" col-md-3 col-xs-12 tags-right">
                <div class="col-xs-12">
                    <h3>Categorias</h3>
                    <ul>
                        <li><a href="<?= base_url()?>pacobert">Fpac</a></li>
                        <li><a href="#">Voluntarios</a></li>
                        <li><a href="#">Taller</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- FIN Container posts -->

        <!-- Paginación -->
        
        <div class="row">
            <div class="col-xs-12 pagination-bottom">
                <?php echo $this->pagination->create_links();?>
            </div>
        </div>
        <!-- FIN Paginación -->
    </div>
</section>