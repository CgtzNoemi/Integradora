
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3.3. Aplicación web con base de datos</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="jquery-ui/jquery-ui.theme.css">
    <link rel="stylesheet" href="jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="estilo.css">
    
</head>
<body>
<div class="msj">
	<p class="mensaje"></p>
</div>
    <div class="contenedor">
        <form class="formulario fg-toolbar ui-toolbar ui-widget-header ui-helper-clearfix ui-corner-tl ui-corner-tr" action="" method="post">
        <h2 class="form_h2">Registro de usuarios</h2>
        <input type="hidden" id="id" name="id" value="0">
        <input type="hidden" id="opcion" name="opcion" value="insertar">

            <div class="form_container">
                <div class="form_group">
                    <input type="text" class="form_input" name="nombre" id="nombre" placeholder="Nombre:" required>
                    <p class="msj-1">El nombre no es válido</p>
                </div>
            </div>

            <div class="form_container">
                <div class="form_group">
                    <input type="text" class="form_input" name="apellido"  id="apellido" placeholder="Apellido:" required>
                    <p class="msj-2">El apellido no es válido</p>
                </div>
            </div>

            <div class="form_container">
                <div class="form_group">
                    <input type="number" class="form_input" name="edad"  id="edad" placeholder="Edad:" required>
                    <p class="msj-3">La edad no es válida</p>
                </div>
            </div>

            <div class="form_container">
                <div class="form_group">
                    <button type="submit" class="guardar ui-button ui-widget ui-corner-all" id="boton">Guardar</button>
                </div>
            </div>

        </form>

    <div><button class="insertar ui-button ui-corner-all"><div class="btn_insertar"><div class="icon">&#128100;</div><span class="ui-icon ui-icon-plusthick"></span></div></button></div>
            <div>
            <table id="tabla">
                <thead>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th class="accion">Acciones</th>
                </thead>
                <tbody>
        
                </tbody>
            </table>
            </div>
 
    </div>
    
    <div id="dialog" title="Dialogo básico">
    <form id="borrarUsuario" action="" method="POST">
			<input type="hidden" id="id" name="id" value="">
			<input type="hidden" id="opcion" name="opcion" value="borrar">
            <div id="dialog-confirm" style="display:none" title="¿Deseas borrar este registro?">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>El registro se borrará de forma permanente y no podrás recuperarlo. ¿Estás seguro?</p>
            </div>
	</form>
    </div>

    <div id="dialog-ver" style="display:none">
    <table id="registro">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>        
        </thead>
        <tbody>
            <td id="idd"></td>
            <td id="nombred"></td>
            <td id="apellidod"></td>
            <td id="edadd"></td>
        </tbody>
    </table>
    </div>

    <div id="dialog-insertar" style="display:none" title="">
        <p><span class="ui-icon ui-icon-check" style="float:left; margin:12px 12px 20px 0;"></span>El registro se ha insertado correctamente</p>
    </div>
    <div id="dialog-editar" style="display:none" title="">
        <p><span class="ui-icon ui-icon-check" style="float:left; margin:12px 12px 20px 0;"></span>Los cambios se han guardado correctamente</p>
    </div>
    <div id="dialog-borrar" style="display:none" title="">
        <p><span class="ui-icon ui-icon-check" style="float:left; margin:12px 12px 20px 0;"></span>El registro se ha borrado correctamente</p>
    </div>
    <div id="dialog-error" style="display:none" title="Error">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Opps, ocurrió un problema</p>
    </div>


    
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js" integrity="sha256-xLD7nhI62fcsEZK2/v8LsBcb4lG7dgULkuXoXB/j91c=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="jquery-ui/jquery-ui.js"></script>
    <script type="text/javascript" src="tabla.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.jqueryui.min.js"></script>   
    
    

</body>
</html>

