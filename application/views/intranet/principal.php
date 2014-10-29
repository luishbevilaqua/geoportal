<?php if(Current_user::user()): ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    
<html>
    <head>
    	<base href="<?php echo base_url() ?>application/resources/" />
        <link href="style/style_admin.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="scripts/rows.js"></script>
        <script type="text/javascript" src="scripts/jquery/jquery-ui-1.8.16/js/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" src="scripts/jquery/jquery-ui-1.8.16/js/jquery-ui-1.8.16.custom.min.js"></script>
        <script type="text/javascript" src="scripts/jquery/plugins/jquery-tmpl/jquery.tmpl.min.js"></script>
        <script type="text/javascript" src="scripts/jquery/plugins/jquery-validate/jquery.validate.min.js"></script>

        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title><?php echo EMPRESA_NOME;?> - Ferramenta Administrativa Criativittá</title>

    </head>
    <body>

        <div id="barra_top">
            <div id="logo_updater"><img src="img_admin/topo_updater.png" /></div>
            <div id="logo_criativitta"><img src="img_admin/topo_criativitta.png"/></div>
        </div> <!--Fecha div barra_top /-->
        <div id="menu"><?php echo anchor('/intranet/agenda', 'AGENDA');?><?php echo anchor('/intranet/burburinho', 'BURBURINHO');?><?php echo anchor('/intranet/espetaculo', 'ESPETÁCULOS');?><?php echo anchor('/intranet/integrante', 'INTEGRANTES');?><?php echo anchor('/intranet/newsletter', 'NEWSLETTER');?><?php echo anchor('/intranet/noticia', 'NOTICIAS');?><?php echo anchor('/intranet/usuario', 'USUARIOS');?><?php echo anchor('/intranet/logout','SAIR DO ADMIN')?></div>

        <div id="conteudo">
                <?php $this->load->view('/intranet/'.$view); ?>
        </div>
    </body>
</html>
<?php else: ?>
    <?php redirect('/intranet/login'); ?>
<?php endif; ?>
