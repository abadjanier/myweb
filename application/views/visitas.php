<section id="visitas">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="title"><?= $this->lang->line('menu_visita') ?></h1>
            </div>
        </div>
        <div class="row">
            <h2>Formulario visita</h2>
            <hr>
        </div>
        <div class="row">
            <div class="col-md-10 col-xs-12">
                <form role="form">
                    <div class="form-group col-xs-12">
                        <label for="nombre-form">*Representante:</label>
                        <input type="text" name="nombre" class="form-control" id="nombre-form" required>
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="email-form">*Email:</label>
                        <input type="email" name="email" class="form-control" id="email-form" required>
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="website-form">*Fecha:</label>
                        <input type="date" name="website" class="form-control" id="website-form" required>
                    </div>
                    <div class="form-group col-md-6 col-xs-12">
                        <label for="website-form">*Hora:</label>
                        <input type="text" name="website" class="form-control" id="website-form" required>
                    </div>
                    <div class="form-group col-xs-12">
                        <label for="comentario-form">*Nombres y apellidos visitantes:</label>
                        <textarea class="form-control" name="comentario" id="comentario-form" required></textarea>
                    </div>
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-default button-form">Solicitar Visita</button>            
                    </div>
                </form>   
            </div>
        </div>
    </div>
</section>