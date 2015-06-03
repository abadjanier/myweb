<section id="voluntarios">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="title">Voluntarios</h1>
            </div>
        </div>

        <!-- Contenido voluntarios-->
        <div class="row">
            <div class="col-xs-12">
                <h3>Solicitud de Inscripción como Socio Voluntario</h3>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <form role="form" method="post">
                            <div class="row">
                                <div class="form-group col-sm-6">
                                    <label for="nombre">*Nombre:</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" required>
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="apellido">*Apellido:</label>
                                    <input type="email" name="apellido" class="form-control" id="apellido" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-5">
                                    <label for="domicilio">*Domicilio</label>
                                    <input type="text" name="domicilio" class="form-control" id="domicilio" required>
                                </div>
                                <div class="form-group col-sm-5">
                                    <label for="poblacion">*Población</label>
                                    <input type="text" name="poblacion" class="form-control" id="poblacion" required>
                                </div>      
                                <div class="form-group col-sm-2">
                                    <label for="codigo-postal">*C.P.</label>
                                    <input type="text" name="codigo_postal" class="form-control" id="codigo-postal" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-5">
                                    <label for="provincia">*Provincia</label>
                                    <input type="text" name="provincia" class="form-control" id="provincia" required>
                                </div>
                                <div class="form-group col-sm-3">
                                    <label for="fecha-nacimiento">*Fecha de nacimiento</label>
                                    <input type="date" name="fecha_nacimiento" class="form-control" id="fecha-nacimiento" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="telefono">*Teléfono</label>
                                    <input type="text" name="telefono" class="form-control" id="telefono" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label for="dni">*DNI/NIF</label>
                                    <input type="text" name="dni" class="form-control" id="dni" required>
                                </div> 
                                <div class="form-group col-sm-4">
                                    <label for="nacionalidad">Nacionalidad</label>
                                    <input type="text" name="nacionalidad" class="form-control" id="nacionalidad">
                                </div> 
                                <div class="form-group col-sm-4">
                                    <label for="email">*E-mail</label>
                                    <input type="email" name="asunto" class="form-control" id="email" required>
                                </div> 
                            </div>
                            <div class="row margin-top-elements">
                                <div class="form-group">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="colabora_activamente" id="check-colabora-activamente">
                                        Deseo colaborar activamente con la FPAC como Socio Benefactor Voluntario en:
                                    </label>
                                </div>
                            </div>
                            <div class="box-activamente">
                                <div class="row">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="visitas_y_exhibiciones" value="true"> Visitas y Exhibiciones
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="servicios_organizativos" value="true"> Servicios Organizativos
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="check_actividades_operativas" value="true"> Actividades Operativas
                                    </label>     
                                </div>

                                <div class="row margin-top-elements">
                                    <div class="form-group col-sm-4">
                                        <label for="aficiones-aeronauticas">Aficiones Aeronáuticas: </label>
                                        <textarea name="aficiones_aeronauticas" class="form-control" id="aficiones-aeronauticas"></textarea>
                                    </div> 
                                    <div class="form-group col-sm-4">
                                        <label for="idiomas-nativos">Idiomas Nativos / Adquirits: </label>
                                        <textarea name="idiomas_nativos" class="form-control" id="idiomas-nativos"></textarea>
                                    </div>  
                                    <div class="form-group col-sm-4">
                                        <label for="formacion">Formacion – Cualificación Profesional: </label>
                                        <textarea name="formacion" class="form-control" id="formacion"></textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <label for="licencia">*Nº Licencia / Colegialo</label>
                                        <input type="text" name="licencia" class="form-control" id="licencia" required>
                                    </div> 
                                </div>
                            </div>

                            <!-- Actividades remotas -->
                            <div class="row margin-top-elements">
                                <div class="form-group">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="check-disponibilidad-remotas" name="disponibilidad_remotas"> Disponibilidad para actividades remotas
                                    </label>
                                    <p class="text-informative">Disponibilidad para colaborar con cierta regularidad en actividades que se pueden realizar desde el domicilio personal o profesional, o realizar gestiones con terceros y que no requieren de un compromiso de presencia del voluntario/a en instalaciones de la FPAC.</p>
                                </div>

                                <div class="box-actividades-remotas">
                                    <p>Disponibilidad en horas: </p>
                                    <div class="row">
                                        <div class="form-group col-sm-2 col-xs-6">
                                            <label for="h-diarias">Diária:</label>
                                            <input type="number" name="horas_diarias" class="form-control" id="h-diarias">
                                        </div> 
                                        <div class="form-group col-sm-2 col-xs-6">
                                            <label for="h-semanales">*Semanal:</label>
                                            <input type="number" name="horas_semanales" class="form-control" id="h-semanales" required>
                                        </div> 
                                        <div class="form-group col-sm-2 col-xs-6">
                                            <label for="h-mensuales">Mensual:</label>
                                            <input type="number" name="horas_mensuales" class="form-control" id="h-mensuales">
                                        </div> 
                                        <div class="form-group col-sm-2 col-xs-6">
                                            <label for="h-semanales">Anual:</label>
                                            <input type="number" name="horas_anual" class="form-control" id="h-anuales">
                                        </div> 
                                        <div class="form-group col-sm-2 col-xs-6">
                                            <label for="h-ocasionalmente">Ocasionalmente:</label>
                                            <input type="number" name="horas_ocasionalmente" class="form-control" id="h-ocasionalmente">
                                        </div> 
                                    </div>
                                </div>
                            </div>
                    
                    <!--FIN Actividades remotas -->

                    <!-- Actividades presenciales -->
                    <div class="row margin-top-elements">
                        <div class="form-group">
                            <label class="checkbox-inline">
                                <input type="checkbox" id="check-disponibilidad-presenciales" name="disponibilidad_presenciales" > Disponibilidad para actividades presenciales
                            </label>
                        </div>
                        <div class="box-actividades-presenciales">
         <div class="form-group col-sm-6">
                                        <label for="actividades-presenciales">Horarios disponibles durante la semana: </label>
                                        <textarea name="actividades_presenciales" class="form-control" id="actividades-presenciales"></textarea>
                                    </div> 
                        </div>
                    </div>
                    <!--FIN Actividades presenciales -->

                    <div class="row">
                        <div class="form-group">
                            <label class="checkbox-inline margin-checkbox">
                                <input type="checkbox" name="acepta_terminos" value="true"> He leído, entiendo y acepto las “Normas y Código de Conducta de la FPAC”
                            </label>
                        </div> 
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-default button-form">Enviar Solicitud</button>
                    </div>
                    </form>   
                </div>
                <p class="text-informative">(*) Datos imprescindibles</p>
            </div>
        </div>
        <!-- Contenido voluntarios -->

    </div>
</section>