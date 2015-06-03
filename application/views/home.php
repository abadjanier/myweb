<body>
    <header>
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>"> <img id="logotipo" src="<?= base_url() ?>assets/custom/img/logo.png"></a>
            <div id="container-select">
                <i class="fa fa-globe"></i>
                <select id="lenguage-selector">
                    <option value="es" data-imagesrc="<?= base_url() ?>assets/custom/img/lenguage/spain.png">ES</option>
                    <option value="cat" data-imagesrc="<?= base_url() ?>assets/custom/img/lenguage/catalonia.png">CA</option>
                    <option value="en" data-imagesrc="<?= base_url() ?>assets/custom/img/lenguage/unitedkingdom.png">EN</option>
                </select> 
            </div>
        </div>
    </header>

    <section id="menu-home">
        <div class="container">
            <div class="row">
                <a href="<?= base_url()?>fundacio"><div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menu-home-fundacion menu-home-sections"><?= $this->lang->line('menu_fundacion')?></div></a>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menu-home-benefactores menu-home-sections">
                    <a href="<?= base_url()?>benefactores"><div class="sup-row-home"><?= $this->lang->line('menu_benefactores')?></div></a>
                    <a href="<?= base_url()?>voluntarios"><div class="sub-row-home"><?= $this->lang->line('menu_voluntarios')?></div></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menu-home-talleres menu-home-sections">
                    <a href="<?= base_url()?>taller"><div class="sup-row-home"><?= $this->lang->line('menu_talleres')?></div></a>
                    <a href="<?= base_url()?>escola"><div class="sub-row-home"><?= $this->lang->line('menu_escuelas')?></div></a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menu-home-pacobert menu-home-sections">
                    <a href="<?= base_url()?>pacobert"><div class="sup-row-home"><?= $this->lang->line('menu_pacabierto')?></div></a>
                    <a href="<?= base_url()?>jardi"><div class="sub-row-home"><?= $this->lang->line('menu_jardinmuseo')?></div></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menu-home-cultura menu-home-sections">
                    <a href="<?= base_url()?>aviones"><div class="sup-row-home"><?= $this->lang->line('menu_heritage')?></div></a>
                    <a href="<?= base_url()?>cultura"><div class="sub-row-home"><?= $this->lang->line('menu_cultura')?></div></a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 menu-home-visita menu-home-sections">
                    <a href="<?= base_url()?>visitas"><div class="sup-row-home"><?= $this->lang->line('menu_visita')?></div>
                    <a href="<?= base_url()?>contacta"><div class="sub-row-home"><?= $this->lang->line('menu_contacto')?></div></a>
                </div>
            </div>
        </div>    
    </section>
