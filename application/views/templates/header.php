<body>
    <!-- Menu top -->
    <header id="menu-top">
        <div class="container-fluid">
            <div class="row hidden-md hidden-sm hidden-xs">
                <div class="col-xs-5 no-paddings">
                    <div class="col-xs-4 menu-top-fundacion">
                        <a href="<?= base_url()?>fundacio"><div class=""><?= $this->lang->line('menu_fundacion')?></div></a>
                    </div>
                    <div class="col-xs-4 menu-top-benefactores">
                        <a href="<?= base_url()?>benefactores"><div class="sup-row-home"><?= $this->lang->line('menu_benefactores')?></div></a>
                        <a href="<?= base_url()?>voluntarios"><div class="sub-row-home"><?= $this->lang->line('menu_voluntarios')?></div></a>
                    </div>
                    <div class="col-xs-4 menu-top-talleres">
                        <a href="<?= base_url()?>taller"><div class="sup-row-home"><?= $this->lang->line('menu_talleres')?></div></a>
                        <a href="<?= base_url()?>escola"><div class="sub-row-home"><?= $this->lang->line('menu_escuelas')?></div></a>
                    </div>
                </div>

                <div class="col-xs-2 no-paddings">
                    <a class="navbar-brand" href="<?= base_url() ?>"> <img id="logotipo" src="<?= base_url() ?>assets/custom/img/logo.png"></a>
                </div>

                <div class="col-xs-5 no-paddings">
                    <div class="col-xs-4 menu-top-pacobert">
                       <a href="<?= base_url()?>pacobert"><div class="sup-row-home"><?= $this->lang->line('menu_pacabierto')?></div></a>
                        <a href="<?= base_url()?>jardi"><div class="sub-row-home"><?= $this->lang->line('menu_jardinmuseo')?></div></a>
                    </div>
                    <div class="col-xs-4 menu-top-cultura">
                        <a href="<?= base_url()?>aviones"><div class="sup-row-home"><?= $this->lang->line('menu_heritage')?></div></a>
                        <a href="<?= base_url()?>cultura"><div class="sub-row-home"><?= $this->lang->line('menu_cultura')?></div></a>
                    </div>
                    <div class="col-xs-4 menu-top-visita">
                        <a href="<?= base_url()?>visitas"><div class="sup-row-home"><?= $this->lang->line('menu_visita')?></div></a>
                        <a href="<?= base_url()?>contacta"><div class="sub-row-home"><?= $this->lang->line('menu_contacto')?></div></a>
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
                        <option  value="es" data-imagesrc="<?= base_url() ?>assets/custom/img/lenguage/spain.png">ES</option>
                        <option value="cat" data-imagesrc="<?= base_url() ?>assets/custom/img/lenguage/catalonia.png">CA</option>
                        <option  value="en" data-imagesrc="<?= base_url() ?>assets/custom/img/lenguage/unitedkingdom.png">EN</option>
                    </select>
                </div>
            </div>
            <!-- Fin Select idiomas -->

            <!-- Menu Responsive -->
            <div id="menu-full-responsive">
                <i class="fa fa-times"></i>
                <div class="container-fluid">
                    <div class="row">
                        <a href="<?= base_url()?>fundacio"><div class="col-xs-12 menu-responsive-fundacio"><?= $this->lang->line('menu_fundacion')?></div></a>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 menu-responsive-benefactores">
                            <a href="<?= base_url()?>benefactores"><div class="col-xs-6"><?= $this->lang->line('menu_benefactores')?></div></a>
                            <a href="<?= base_url()?>voluntarios"><div class="col-xs-6"><?= $this->lang->line('menu_voluntarios')?></div></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 menu-responsive-talleres">
                            <a href="<?= base_url()?>taller"><div class="col-xs-6"><?= $this->lang->line('menu_talleres')?></div></a>
                            <a href="<?= base_url()?>escola"><div class="col-xs-6"><?= $this->lang->line('menu_escuelas')?></div></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 menu-responsive-pacobert">
                            <a href="<?= base_url()?>pacobert"><div class="col-xs-6"><?= $this->lang->line('menu_pacabierto')?></div></a>
                            <a href="<?= base_url()?>jardi"><div class="col-xs-6"><?= $this->lang->line('menu_jardinmuseo')?></div></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 menu-responsive-cultura">
                            <a href="<?= base_url()?>aviones"><div class="col-xs-6"><?= $this->lang->line('menu_heritage')?></div></a>
                            <a href="<?= base_url()?>cultura"><div class="col-xs-6"><?= $this->lang->line('menu_cultura')?></div></a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 menu-responsive-visita">
                            <a href="<?= base_url()?>visitas"><div class="col-xs-6"><?= $this->lang->line('menu_visita')?></div></a>
                            <a href="<?= base_url()?>contacta"><div class="col-xs-6"><?= $this->lang->line('menu_contacto')?></div></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Menu Responsive -->
        </div>
    </header>
