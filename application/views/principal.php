<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <base href="<?php echo base_url() ?>application/resources/" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Geoportal</title>
        
        
        <link href="style/bootstrap.min.css" rel="stylesheet"></link>
        <link href="style/styles.css" rel="stylesheet" />

        <script src="scripts/jquery/jquery.js"></script>
        <script src="scripts/jquery/plugins/bootstrap.min.js"></script>
        <script src="http://maps.googleapis.com/maps/api/js?sensor=false&extension=.js&output=embed"></script>
        <script src="scripts/jquery/plugins/scripts.js"></script>


    </head>

    <body>
        <div class="navbar navbar-custom navbar-fixed-top">
            <div class="navbar-header"><a class="navbar-brand" href="#">?</a>
                <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Inicio</a></li>
                    <li><a href="#">3D Visual</a></li>
                    <li><a href="#">Caderno de Campo</a></li>
                    <li>&nbsp;</li>
                </ul>
            </div>
        </div>
        <div id="conteudo">
            <?php $this->load->view($view); ?>
        </div><!--/ conteudo /-->
        <div class="container-fluid" id="main">
            <div class="row">
                <div class="col-xs-8" id="left">

                    <h2>Geoportal Agricola </h2>
                    <br><br><br><br>
                    <h3>Selecione a parcela e o metodo<br> a ser utilizado. </h3><br>

                    <select>
                        <option value="Parcela 1">Parcela 1</option>
                        <option value="Parcela 2">Parcela 2</option>
                        <option value="Parcela 3">Parcela 3</option>
                        <option value="Parcela 4">Parcela 4</option>
                    </select> 
                    <select>
                        <option value="Caderno de Campo">Caderno de Campo</option>
                        <option value="Visualizar 3D">Visualizar 3D</option>
                        <option value="Tratamento Visual">Tratamento Visual</option>
                    </select> 
                    <button >Acessar!</button>

                </div>
                <div class="col-xs-4"><!--map-canvas will be postioned here--></div>

            </div>
        </div>

    </body>
</html>
