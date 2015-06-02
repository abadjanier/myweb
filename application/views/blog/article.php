<section id="article-blog">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-xs-12">
                <div class="title-article">
                    <h1><?= $post[0]->titulo ?></h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-11 col-lg-push-0 col-xs-push-1 autor-date">
                <span><?= $post[0]->created_at ?></span>
            </div>  
        </div>


        <!-- Separación blog y etiquetas -->

        <!-- Contenido post -->
        <div class="row">
            <div class=" col-md-9 col-xs-12 content-article">
                <?= $post[0]->contenido ?>
            </div>  
            <div class=" col-md-3 col-xs-12 tags-right">
                <div class="col-xs-12">
                    <h3>Categorias</h3>
                    <ul>
                        <li><a href="#">Fpac</a></li>
                        <li><a href="#">Voluntarios</a></li>
                        <li><a href="#">Taller</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- FIN Contenido post -->          
    </div>


    <div class="row">
        <div class="container">
            <div class="col-xs-12 area-comments">
                <div class="row row-comments">
                    <p class="titles">Comentarios</p> 

                    <!-- Comentario individual -->
                    <div class="col-xs-12 content-comment">
                        <div class="row">
                            <div class="col-md-3 col-xs-12 bg-name-user">
                                <p class="name-user">
                                    Fuentansa vuelamares
                                </p>
                            </div>
                            <div class="col-md-9 col-xs-12 bg-comment">


                                <div class="row">
                                    <div class="col-xs-12">
                                        <p class="comment">Lorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsumLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimuLorem ipsum impsum tupusimu</p>    
                                    </div>
                                </div>
                                
                                <!--
                                <div class="row">
                                    <div class="col-xs-12 sub-coments-box">
                                        <div class="row">
                                            <hr>
                                            <div class="col-xs-12">
                                                <h3>Respuestas</h3>               
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12 bg-subcoment-name">
                                                        <p class="name-user">
                                                            Antonio borrás
                                                        </p>
                                                    </div>
                                                    <div class="col-md-8 col-sm-12">
                                                        <p>Subcoment</p> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                -->


                            </div>
                        </div>
                        <!--FIN Comentario individual -->   


                    </div>


                    <div class="row">
                        <div class="col-md-10 col-xs-12 form-comment">
                            <p class="titles">Escribe tu comentario:</p>
                            <form role="form">
                                <div class="form-group">
                                    <label for="nombre-form">Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre-form">
                                </div>
                                <div class="form-group">
                                    <label for="email-form">Email:</label>
                                    <input type="email" name="email" class="form-control" id="email-form">
                                </div>
                                <div class="form-group">
                                    <label for="website-form">Website:</label>
                                    <input type="text" name="website" class="form-control" id="website-form">
                                </div>
                                <div class="form-group">
                                    <label for="comentario-form">Comentario:</label>
                                    <textarea class="form-control" name="comentario" id="comentario-form"></textarea>
                                </div>
                                <button type="submit" class="btn btn-default button-form">Comentar</button>
                            </form>   
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

