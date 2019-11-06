<?php if ($r->__GET('estado_cotizacion')=='Registrado'){echo '<img src="./images/sem_blanco.png" alt="chek" width="32" height="32" border="0" />';}elseif ($r->__GET('estado_cotizacion')=='Pendiente'){echo '<img src="./images/sem_ambar.png" alt="chek" width="32" height="32" border="0" />';}elseif ($r->__GET('estado_cotizacion')=='Aprobado'){echo '<img src="./images/sem_verde.png" alt="chek" width="32" height="32" border="0" />';}else {echo '<img src="./images/sem_rojo.png" alt="chek" width="32" height="32" border="0" />';};
?>




<td><?php echo $r->__GET('estado_cotizacion')=='Registrado'?'<img src="./images/sem_blanco.png" alt="chek" width="32" height="32" border="0" />':'<img src="./images/sem_rojo.png" alt="chek" width="32" height="32" border="0" />'; ?></td>

formulario

<form action="?action=<?php echo $man->id_manual > 0 ? 'actualizar_manual' : 'registrar_manual'?>" enctype='multipart/form-data' method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
					<input type="hidden" name="id_manual" value="<?php echo $man->__GET('id_manual'); ?>" />
                    
                    <table style="width:500px;" align="center">
                        <tr>
                            <th width="141" style="text-align:left;">Autor</th>
                            <td width="339"><input type="text" name="autor" value="<?php echo $man->__GET('autor'); ?>" style="width:100%;" /></td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">Título</th>
                           <td><input type="text" name="titulo" value="<?php echo $man->__GET('titulo'); ?>" style="width:100%;" /></td>
                        </tr>
						<tr>
							<!--th width="141" style="text-align:left;">Ruta</th-->
							<td><input name="ruta" type="hidden" value="<?php echo $ruta;?>" style="width:100%;" /></td>
						<!--tr>
                            <th style="text-align:left;">Fecha Creación</th>
                           <td><input type="text" name="fecha_creacion" value="<?php echo $man->__GET('fecha_creacion'); ?>" style="width:100%;" /></td>
                        </tr-->
						<!--tr>
                            <th style="text-align:left;">Automatizado</th>
                            <td>
                                <select name="automatizado" style="width:100%;">
                                    <option value="1" <?php echo $man->__GET('automatizado') == 1 ? 'selected' : ''; ?>>Automatizado</option>
                                    <option value="0" <?php echo $man->__GET('automatizado') == 0 ? 'selected' : ''; ?>>Manual</option>
                                </select>                            
							</td>
                        </tr-->
                        <!--tr>
                            <th style="text-align:left;">Estado</th>
                            <td>
                                <select name="estado" style="width:100%;">
                                    <option value="1" <?php echo $man->__GET('estado') == 1 ? 'selected' : ''; ?>>Activo</option>
                                    <option value="0" <?php echo $man->__GET('estado') == 0 ? 'selected' : ''; ?>>Inactivo</option>
                                </select>
							</td>
                        </tr-->
						    
                        <tr>
						    <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
							</td>
						</tr>
                    </table>
                </form>