<body>
    <!-- Menu top -->
    <header id="menu-top">
        <div class="container-fluid">
            <div class="row hidden-md hidden-sm hidden-xs">
                <div class="col-xs-5 no-paddings">
                    <div class="col-xs-4 menu-top-fundacion">
                        <div class="">Fundacio</div>
                    </div>
                    <div class="col-xs-4 menu-top-benefactores">
                        <div class="sup-row-home">Benefactors</div>
                        <div class="sub-row-home">Voluntaris</div>
                    </div>
                    <div class="col-xs-4 menu-top-talleres">
                        <div class="sup-row-home">Tallers</div>
                        <div class="sub-row-home">Escola</div>
                    </div>
                </div>

                <div class="col-xs-2 no-paddings">
                    <a class="navbar-brand" href="<?= base_url() ?>"> <img id="logotipo" src="<?= base_url() ?>assets/custom/img/logo.png"></a>
                </div>

                <div class="col-xs-5 no-paddings">
                    <div class="col-xs-4 menu-top-pacobert">
                        <div class="sup-row-home">Pac·Obert</div>
                        <div class="sub-row-home">Jardí-Museu</div>
                    </div>
                    <div class="col-xs-4 menu-top-cultura">
                        <div class="sup-row-home">Heritatge</div>
                        <div class="sub-row-home">Cultura</div>
                    </div>
                    <div class="col-xs-4 menu-top-visita">
                        <div class="sup-row-home">Visita</div>
                        <div class="sub-row-home">Contacte</div>
                    </div>
                </div>
            </div>

            <div class="row visible-md visible-sm visible-xs">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <a class="navbar-brand" href="<?= base_url() ?>"> <img id="logotipo" src="<?= base_url() ?>assets/custom/img/logo.png"></a>
                    </div>
                    <div class="col-md-6 menu-responsive">
                        <i class="fa fa-bars icon-menu-top"></i>
                    </div>
                </div>
            </div>
            <!-- Fin Top Menu -->

            <!-- Select idiomas -->
            <div class="row">
                <div class="col-xs-12 align-right">
                    <select id="lenguage-selector">
                        <option value="ES" data-imagesrc="<?= base_url() ?>assets/custom/img/lenguage/spain.png">ES</option>
                        <option value="CA" data-imagesrc="<?= base_url() ?>assets/custom/img/lenguage/catalonia.png">CA</option>
                        <option value="EN" data-imagesrc="<?= base_url() ?>assets/custom/img/lenguage/unitedkingdom.png">EN</option>
                    </select>
                </div>
            </div>
            <!-- Fin Select idiomas -->

            <!-- Menu Responsive -->
            <div id="menu-full-responsive">
                <i class="fa fa-times"></i>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-12 menu-responsive-fundacio">Fundació</div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 menu-responsive-benefactores">
                            <div class="col-xs-6">Benefactors</div>
                            <div class="col-xs-6">Voluntaris</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 menu-responsive-talleres">
                            <div class="col-xs-6">Tallers</div>
                            <div class="col-xs-6">Escola</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 menu-responsive-pacobert">
                            <div class="col-xs-6">Pac·Obert</div>
                            <div class="col-xs-6">Jardí-Museu</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 menu-responsive-cultura">
                            <div class="col-xs-6">Heritatge</div>
                            <div class="col-xs-6">Cultura</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 menu-responsive-visita">
                            <div class="col-xs-6">Visita</div>
                            <div class="col-xs-6">Contacte</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Menu Responsive -->
        </div>
    </header>