$(document).ready(function () {
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }
    const tabla_clientes = document.getElementById('tabla_clientes');
    if (tabla_clientes) {
        new simpleDatatables.DataTable(tabla_clientes);
    }
    get_datos();
});
$('#add').click(function (e) { 
    e.preventDefault();
    $('#add_cliente').removeAttr('hidden','hidden');
    $('#datos_clientes').attr('hidden','hidden');
    $('#delete_cliente').attr('hidden','hidden');
    $('#edit_cliente').attr('hidden','hidden');
});
$('#save').click(function (e) { 
    var datos= {
        nombre: $('#name_cliente').val(),
        ape_pat: $('#ape_pater').val(),
        ape_mat: $('#ape_materno').val(),
        direcc: $('#dire_cliente').val(),
        email: $('#email').val(),
        accion: 1
    }
        $.ajax({
            url:"../../controller/crud.php", //URL a la que se envían los datos del formulario
            cache:false,
            type:"POST",
            data:datos,	
            success:function(result){ 
                console.log(result);
                if (result==1) {
                    Swal.fire({
                        title: 'Cliente agregado con exito',
                        text: "Se ha agregado el cliente con exito",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'OK!'
                      }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload(true);
                        }
                      })
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al guardar!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });

   
});

$('#update').click(function (e) { 
    var datos= {
        id: $('#id_cliente').val(),
        nombre: $('#name_cliente_u').val(),
        ape_pat: $('#ape_pater_u').val(),
        ape_mat: $('#ape_materno_u').val(),
        direcc: $('#dire_cliente_u').val(),
        email: $('#email_u').val(),
        accion: 2
    }
   
    $.ajax({
        url:"../../controller/crud.php", //URL a la que se envían los datos del formulario
        cache:false,
        type:"POST",
        data:datos,	
        success:function(result){ 
            console.log(result);
            if (result==1) {
                Swal.fire({
                    title: 'Cliente actualizado con exito',
                    text: "Se ha actualizado el cliente con exito",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload(true);
                    }
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error al actualizar!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    });
});

function get_datos() {
    $.ajax({
        url:"../../controller/crud.php", //URL a la que se envían los datos del formulario
        cache:false,
        type:"POST",
        data:{accion: 4},	
        success:function(result){ 
            //console.log(result);
            var data= JSON.parse(result);
           // console.log(result);
           var body='';
            $.each(data, function (index,value) {
                body +=`<tr style="height: 15px;" id="${value.id}">
							<td>${value.id}</td>
							<td>${value.nombre}</td>
							<td>${value.ape_paterno}</td>
							<td>${value.ape_materno}</td>
							<td>${value.domicilio}</td>
							<td>${value.email}</td>
							<td>
                                <button type="button" class="btn btn-danger" onclick="borrar_cliente(${value.id})" >Eliminar</button>
                                <button type="button" class="btn btn-info" onclick="edit_cliente('${value.id}','${value.nombre}','${value.ape_paterno}','${value.ape_materno}','${value.domicilio}','${value.email}')" >Editar</button>
                            </td>
						</tr>`
            });
            $("#t_body").html(body);
        }
    });
}
function borrar_cliente(id_cliente) {
    console.log(id_cliente);
    $.ajax({
        url:"../../controller/crud.php", //URL a la que se envían los datos del formulario
        cache:false,
        type:"POST",
        data:{
            accion: 3,
            id_user:id_cliente
        },	
        success:function(result){ 
            if (result==1) {
                Swal.fire({
                    title: 'Cliente borrado con exito',
                    text: "Se ha borrado con exito",
                    icon: 'success',
                    showCancelButton: false,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload(true);
                    }
                  })
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error al borrar!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    });
}
function edit_cliente(id,name,ap_pat,ap_mat,dom,mail) {  
        $('#update_cliente').removeAttr('hidden','hidden');
        $('#add_cliente').attr('hidden','hidden');
        $('#datos_clientes').attr('hidden','hidden');
        $('#delete_cliente').attr('hidden','hidden');
        $('#edit_cliente').attr('hidden','hidden');
        $('#name_cliente_u').val(name);
        $('#ape_pater_u').val(ap_pat);
        $('#ape_materno_u').val(ap_mat);
        $('#dire_cliente_u').val(dom);
        $('#email_u').val(mail);
        $('#id_cliente').val(id);
}