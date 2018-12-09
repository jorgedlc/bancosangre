$('#form_ingresarUsuario').submit(function (e) {
    e.preventDefault();
    let pass = $('#clave').val();
    let confpass = $('#confirmar_clave').val();
    if (pass == confpass) {
        let form = $('#form_ingresarUsuario').serializeArray();
        console.log(form);
        $.ajax({
            url: './ingresarUsuario',
            dataType: 'text',
            method: 'POST',
            data: {
                "_token": $('#token').val(), form
            }
        }).done(function (data) {
            let respuesta = parseInt(data);
            if (respuesta === 1) {
                swal({
                    type: 'success',
                    title: 'Felicidades',
                    text: '¡Usuario ingresado con éxito!'
                }).then((result) => {
                    location.href = "./usuarios";
                })
            }
            else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: '¡Ocurrio un error al ingresar el usuario!'
                })
            }
        }).fail(function (jqXHR, textStatus) {
            console.log(textStatus);
        })
    }
    else {
        swal({
            type: 'error',
            title: 'Oops...',
            text: '¡Las contraseñas no coinciden!'
        })
    }
});

$('#modalEditarUsuario').on('show.bs.modal', function (event) {
    let id = $(event.relatedTarget).data().id;
    $.ajax({
        method: 'POST',
        url: './obtenerUsuario',
        method: 'POST',
        dataType: 'json',
        data: { "_token": $('#token').val(), id }
    }).done(function (data, jqXHR, text) {
        $('#ed_id_usuario').val(data[0].id_usuario)
        $('#ed_usuario').val(data[0].usuario);
        $('#ed_nombres').val(data[0].nombres);
        $('#ed_apellidos').val(data[0].apellidos);
        $('#ed_tipo_usuario').val(data[0].id_tipo_usuario);
        $('#ed_estado').val(data[0].estado);
    }).fail(function (jqXHR, textStatus) {
        console.log(textStatus);
    });
});
