$(document).ready(function(){
    $('.msj').hide();
    $('.formulario').hide();
        var tabla = $('#tabla').DataTable({
            
            "serverSide": true,
    
            "ajax":{
                "method":"POST",
                "url":"backend/datos.php", 
            },
            "columns":[
                {"data":"id"},
                {"data":"nombre"},
                {"data":"apellido"},
                {"data":"edad"},
                {"defaultContent":"<div class='accion'><button class='ver ui-button ui-corner-all'>&#128065;</button><button class='editar ui-button ui-corner-all'><span class='ui-icon ui-icon-pencil'></span></button><button class='borrar ui-button ui-corner-all'><span class='ui-icon ui-icon-trash'></span></button></div>"}

            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/es-ES.json'
            },
            
        });

        editar("#tabla tbody",tabla);
        borrar("#tabla tbody",tabla);
        ver("#tabla tbody",tabla);
        
        $(".formulario").on("submit", function(e){
            e.preventDefault();
            var idx = $('#id').val(), nombre = $('#nombre').val(), apellido = $('#apellido').val(), edad = $('#edad').val();
            let valnomyape = /^[a-zA-ZÁ-ÿ\s]{3,30}$/;
            let valedad = /^\d{1,2}$/;
            let creando = false;

            if(!valnomyape.test($('#nombre').val())){
                $('.msj-1').show(1000);
                creando = true;
                }else{
                $('.msj-1').hide(1000);
                }
            if(!valnomyape.test($('#apellido').val())){
                $('.msj-2').show(1000);
                creando = true;
                }else{
                $('.msj-2').hide(1000);
                }
            if(!valedad.test($('#edad').val())){
                $('.msj-3').show(1000);
                creando = true;
                }else{
                $('.msj-3').hide(1000);
                }
                
            if(!creando){
            var op = $('.formulario #opcion').val();
            var enm = $(this).serialize();
            var idx = $('#id').val();
            $.ajax({
                method: 'POST',
                url: 'backend/insertar_editar_borrar.php',
                data: enm
            }).done( function(info){
                var jsonInfo = JSON.parse(info);
                msj(jsonInfo);
                limpiar();

                if(op == 'editar'){
                    for(var i = 0; i < tabla.rows().count(); i++){
                        var row = tabla.row(i);
                        var id = row.data().id;
                        if( id == idx){
                            tabla.row($(row.node())).remove().draw();
                            var editado = tabla.row.add({"id":idx,"nombre":nombre, "apellido":apellido, "edad":edad}).draw().node();
                            $(editado).css( 'color', 'yellow' ).animate( { color: 'black' },2000 );
                        }

                    }
                }else if(op == 'insertar'){
                    var nuevaFila = tabla.row.add({"id":jsonInfo.idUser,"nombre":nombre, "apellido":apellido, "edad":edad}).draw().node();
                    $(nuevaFila).css( 'color', 'green' ).animate( { color: 'black' },4000 );
                    
                }
                $('.formulario').hide("blind", 700);
                $('#tabla').fadeOut(100);
                $('#tabla').fadeIn(500);
            });
            }
                

            
        });

        $( function() {
            $('tbody').on("click","button.borrar",function(){
                var fila = $(this).closest('tr');
                console.log(fila);
                $( "#dialog-confirm" ).dialog({
                    resizable: false,
                    height: "auto",
                    show : "blind",
                    hide : "slideUp",
                    width: 400,
                    modal: true,
                    buttons: {
                      "Sí, borrar": function()  {
                          var id = $('#borrarUsuario #id').val();
                          opcion =$('#borrarUsuario #opcion').val();
                            $.ajax({
                                type: "POST",
                                url: "backend/insertar_editar_borrar.php",
                                data: {"id":id, "opcion":opcion}
                            }).done( function (info){
                                console.log(fila);
                                var jsonInfo = JSON.parse(info);
                                msj(jsonInfo);
                                limpiar();
                                fila.hide("highlight",2000, function(){
                                    tabla.row(fila).remove().draw();
                                    //tabla.ajax.reload(null,false);
                                    $('#tabla').fadeOut(100);
                                    $('#tabla').fadeIn(500);
                                });

                            });
                          
                        $( this ).dialog( "close" );
                      },
                      "Cancelar": function() {
                       
                        $( this ).dialog( "close" );
                      }
                    }
                  });
            });
            
          } );

    

        $('tbody').on("click","button.editar",function(){            
            $('.formulario').show('blind');
        });
        $('.insertar').on("click",function(){
            limpiar();
            $('.formulario').show('blind');
        });


        $('tbody').on("click","button.ver",function(){
            var fila = $(this).closest('tr');
            console.log(fila);
            $( function() {
                $( "#dialog-ver" ).dialog({
                    resizable: false,
                    height: "auto",
                    show : "blind",
                    hide : "slideUp",
                    width: 600,
                    modal: true,
                });
              } );
            
      } );



});

function editar(tbody,tabla){
    $(tbody).on("click","button.editar",function(){
        var data = tabla.row($(this).parents("tr")).data();
        var id = $('#id').val(data.id), nombre = $('#nombre').val(data.nombre),
        apellido = $('#apellido').val(data.apellido),edad = $('#edad').val(data.edad),
        opcion = $("#opcion").val('editar'), fila = $(this).closest('tr');
    });
}

function borrar(tbody,tabla){
    $(tbody).on("click","button.borrar",function(){
        var data = tabla.row($(this).parents("tr")).data();
        var id = $('#borrarUsuario #id').val(data.id);          
    });
    
}

function ver(tbody,tabla){
    $(tbody).on("click","button.ver",function(){
        var data = tabla.row($(this).parents("tr")).data();
        console.log(data);
        var id = $('#idd').text(data.id), nombre = $('#nombred').text(data.nombre),
        apellido = $('#apellidod').text(data.apellido),edad = $('#edadd').text(data.edad),
        fila = $(this).closest('tr');
    });
}



function msj(informacion){
    if( informacion.respuesta == "INSERTADO"){
        setTimeout(()=>{
            $( function() {
                $( "#dialog-insertar" ).dialog({
                    resizable: false,
                    height: "auto",
                    show : "blind",
                    hide : "slideUp",
                    width: 400,
                    modal: true,
                    buttons: {
                        "Aceptar": function()  {   
                            $( this ).dialog( "close" );
                        }
                    }
                }); 
            });
        },2000);
    }else if(informacion.respuesta == "EDITADO"){
        setTimeout(()=>{
            $( function() {
                $( "#dialog-editar" ).dialog({
                    resizable: false,
                    height: "auto",
                    show : "blind",
                    hide : "slideUp",
                    width: 400,
                    modal: true,
                    buttons: {
                        "Aceptar": function()  {   
                            $( this ).dialog( "close" );
                        }
                    }
                }); 
            });
        },2000);
    }else if(informacion.respuesta == "BORRADO"){
        setTimeout(()=>{
            $( function() {
                $( "#dialog-borrar" ).dialog({
                    resizable: false,
                    height: "auto",
                    show : "blind",
                    hide : "slideUp",
                    width: 400,
                    modal: true,
                    buttons: {
                        "Aceptar": function()  {   
                            $( this ).dialog( "close" );
                          }
                        }
                }); 
            });
        },2600)
    }else if(informacion.respuesta == "ERROR"){
        $( function() {
            $( "#dialog-error" ).dialog({
                resizable: false,
                height: "auto",
                show : "blind",
                hide : "slideUp",
                width: 400,
                modal: true,
                buttons: {
                    "Aceptar": function()  {   
                        $( this ).dialog( "close" );
                      }
                    }
            }); 
        });
    }
}

function limpiar(){
    $("#opcion").val("insertar");
    $("#id").val("");
    $("#nombre").val("").focus();
    $("#apellido").val("").focus();
    $("#edad").val("");
}

