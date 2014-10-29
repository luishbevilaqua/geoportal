<table width="100%" cellpadding="0" cellspacing="2">
	<tr>
		<td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="96%" height="84"><img
					src="img_admin/cartola_usuarios.gif" hspace="6" /></td>
				<td width="4%">&nbsp;</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td height="6" colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2">
		<table width="100%" align="center" cellpadding="6" cellspacing="6"
			class="table_border">
			<tr>
				<td>
				<form action="<?=site_url('/intranet/usuario/'.$form_action)?>" method="post" enctype="multipart/form-data" name="formulario">
				<table width="100%" align="center" cellpadding="0" cellspacing="2">
					<tr class="tr_color">
						<td width="19%" class="label">Nome:</td>
						<td width="81%">
							<input name="nome" type="text" class="formulario" id="nome" value="<? (isset($user)) ? print $user->nome : '';?>" size="30">
							<?php echo form_error('nome');?>
						</td>
					</tr>
					<tr class="tr_color">
						<td width="19%" class="label">Usuário:</td>
						<td width="81%">
							<input name="username" type="text" class="formulario" id="username" value="<? (isset($user)) ? print $user->username : '';?>" size="30">
							<?php echo form_error('username');?>
						</td>
					</tr>
					<tr class="tr_color">
						<td width="19%" class="label">Senha:</td>
						<td width="81%">
							<input name="password" type="password" class="formulario" id="password" size="15">
							<?php echo form_error('password');?>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="button" id="button" class="formulario" value="Enviar"></td>
					</tr>
				</table>
				</form>
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>
