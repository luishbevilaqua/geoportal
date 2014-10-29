<table width="100%" cellpadding="0" cellspacing="2">
	<tr>
		<td>
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td width="96%" height="84"><img src="img_admin/cartola_usuarios.gif" hspace="6" /></td>
				<td width="4%"><a href="<?=site_url('/intranet/usuario/create')?>"><img	src="img_admin/bt_adicionar.gif" alt="Adicionar Usuário" /></a></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td height="6"><?php echo output_msg($type = null);?></td>
	</tr>
	<tr>
		<td height="6">
		<table width="100%" border="1" align="center" cellpadding="6" cellspacing="6" bgcolor="#F8F8F8">
			<tr>
				<td class="td_lst">
				<form name="frm_filtro" action="<?=site_url('/intranet/usuario/')?>" method="post">
				<table width="100%" cellpadding="0" cellspacing="0">
					<tr>
						<td width="12%" height="24">Pesquisar por nome:</td>
						<td width="88%">
							<input name="procnome" type="text" class="formulario" size="40" value=""> 
							<input align="absmiddle" type="image" src="img_admin/lsearch.png" class="lupa" />
						</td>
					</tr>
				</table>
				</form>
				</td>
			</tr>
			<tr>
				<td height="4"></td>
			</tr>
			<tr>
				<td>
				<table width="100%" align="center" cellpadding="0" cellspacing="1">
					<tr>
						<td width="4%" bgcolor="#999999" align="center">
							<a href="<?php echo  site_url('/intranet/usuario/index/id/'.$sort.'/'.$criterio.'/'.$page); ?>"	class="lstitulo">#</a>
						</td>
						<td width="80%" height="26" bgcolor="#999999" class="lstitulo">
							<a href="<?php echo  site_url('/intranet/usuario/index/titulo/'.$sort.'/'.$criterio.'/'.$page); ?>"	class="lstitulo">Nome</a>
						</td>
						<td width="8%" bgcolor="#999999" class="lstitulo" align="center">Editar</td>
						<td width="8%" bgcolor="#999999" class="lstitulo" align="center">Excluir</td>
					</tr>

					<?php foreach($usuarios as $user): ?>
					<tr onmousedown="destacarLinha(this, 1, 'click');" onmouseover="destacarLinha(this, 1, 'over');" onmouseout="destacarLinha(this, 1, 'out');">
						<td bgcolor="#FFFFFF" align="center" class="lsdados"><?php echo $user['id']; ?></td>
						<td height="24" bgcolor="#FFFFFF" class="lsdados"><?php echo $user['nome']; ?></td>
						<td bgcolor="#FFFFFF" align="center">
							<a href="<?php echo  site_url('/intranet/usuario/edit').'/'.$user['id']; ?>" class="lseditar">Editar</a>
						</td>
						<td bgcolor="#FFFFFF" align="center">
							<a href="<?php echo  site_url('/intranet/usuario/delete').'/'.$user['id']; ?>" class="lsexcluir">Excluir</a>
						</td>
					</tr>
					<?php endforeach; ?>
				</table>
				</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
			</tr>
			<?php if (isset($pagination)): ?>
			<tr>
				<td class="td_lst">Pages: <?php echo $pagination; ?></td>
			</tr>
			<?php endif; ?>
		</table>
		</td>
	</tr>
</table>
