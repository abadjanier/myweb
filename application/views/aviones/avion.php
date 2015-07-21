    <section id="info-airplanes">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="title-airplane">
                        <h1><?= $avion[0]->nombre?></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="image-airplane">
                        <img class="img-responsive" src="<?= base_url() ?>source/aviones/<?= $avion[0]->imagen?>.jpg" alt="<?= $avion[0]->imagen?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="features-airplane">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Matricula</td>
                                    <td class="align-right"><?= $avion[0]->matricula?></td>
                                </tr>
                                <tr>
                                    <td>Estado</td>
                                    <td class="align-right"><?= $avion[0]->estado?></td>
                                </tr>
                                <tr>
                                    <td>Motor</td>
                                    <td class="align-right"><?= $avion[0]->motor?></td>
                                </tr>
                                <tr>
                                    <td>Cilindrada</td>
                                    <td class="align-right"><?= $avion[0]->cilindrada?></td>
                                </tr>
                                <tr>
                                    <td>Envergadura</td>
                                    <td class="align-right"><?= $avion[0]->envergadura?></td>
                                </tr>
                                <tr>
                                    <td>Longitud</td>
                                    <td class="align-right"><?= $avion[0]->longitud?></td>
                                </tr>
                                <tr>
                                    <td>Velocidad Máx.</td>
                                    <td class="align-right"><?= $avion[0]->velocidad_max?></td>
                                </tr>
                                <tr>
                                    <td>Velocidad crucero</td>
                                    <td class="align-right">925 km/h</td>
                                </tr>
                                <tr>
                                    <td>Velocidad Min.</td>
                                    <td class="align-right">209 km/h</td>
                                </tr>
                                <tr>
                                    <td>Techo</td>
                                    <td class="align-right"><?= $avion[0]->techo?></td>
                                </tr>
                                <tr>
                                    <td>Peso</td>
                                    <td class="align-right"><?= $avion[0]->peso?></td>
                                </tr>
                                <tr>
                                    <td>Primer vuelo</td>
                                    <td class="align-right"><?= $avion[0]->primervuelo?></td>
                                </tr>
                                <tr>
                                    <td>Mtow</td>
                                    <td class="align-right"><?= $avion[0]->mtow?></td>
                                </tr>
                                <tr>
                                    <td>Armamento</td>
                                    <td class="align-right"><?= $avion[0]->armamento?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                   
                </div>
            </div>
            
                        <div class="row">
                <div class="col-xs-12">
                    <div class="history-airplane">
                        <?= $avion[0]->historia?>
                    </div>
                </div>
            </div>
        </div>     
    </section>

