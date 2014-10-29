<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <base href="<?php echo base_url() ?>application/resources/" />
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title><?php echo EMPRESA_NOME;?> - Ferramenta Administrativa Criativittá Updater</title>
        <link href="style/style_admin.css" rel="stylesheet"	type="text/css" />
        <style>
            .teste {
                border: none;
            }
        </style>
        <link href="style/style_admin.css" rel="stylesheet" type="text/css" />
    </head>

    <body>

        <div id="box_login">
            <?php echo form_open('/intranet/login/submit'); ?>
            <div class="logo"><img src="img_admin/logo_admin.jpg" width="354" height="136" alt="Grupo Ritornelo de Teatro" /></div>
            <div class="box_login_top"></div>
            <div class="box_login_center">
                <?php echo validation_errors('<p class="error">', '</p>'); ?>
                <p class="error"><?php if (isset($msg_error))echo $msg_error; ?></p>
                <p>&nbsp;</p>

                <div class="texto_login_top">Login</div>
                <input name="username" type="text" class="input_login" id="username" maxlength="55" />
                <div class="texto_login_top">Senha</div>
                <input name="password" type="password" class="input_login" id="password" maxlength="45" />
                <input type="image" name="imageField" id="imageField" src="img_admin/bt_entrar_login.gif" class="bt_login" />

            </div>
            <div class="box_login_botton"></div>
            <div class="texto_login_botton">Intranet desenvolvida por
                <a href="http://www.criativitta.com.br" target="_blank" class="texto_login_botton">www.CRIATIVITTA.com.br</a>
            </div>        

            <?php echo form_close(); ?>
        </div>

    </body>
</html>
