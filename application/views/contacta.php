<section id="contacta">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="title"><?= $this->lang->line('menu_contacto')?></h1>
            </div>
        </div>
        <!-- Formulario contacta -->
        <div class="row">
            <div class="col-md-8 col-sm-12">
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
                        <label for="asunto-form">Asunto:</label>
                        <input type="text" name="asunto" class="form-control" id="asunto-form">
                    </div>
                    <div class="form-group">
                        <label for="mensaje-form">Mensaje:</label>
                        <textarea class="form-control" name="mensaje" id="mensaje-form"></textarea>
                    </div>
                    <button type="submit" class="btn btn-default button-form">Comentar</button>
                </form>   
            </div>

            <div class="col-md-4 col-sm-12 info-fpac">
                <ul>
                    <li>Aeroport de Sabadell<hr></li>
                    <li>Ctra. de Bellaterra Sin Número</li>
                    <li>08205 Sabadell, Barcelona, España</li>
                    <li>937 12 42 73</li>
                </ul>
            </div>
        </div>
        <!-- FIN Formulario contacta -->
    </div>
    <!-- Formulario contacta -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 content-map">
                <img class="img-responsive" src="<?= base_url() ?>assets/custom/img/mapa_provisional.png">
            </div>
        </div>
    </div>
    <!-- FIN Formulario contacta -->
</section>
