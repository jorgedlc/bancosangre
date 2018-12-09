
//Validaciones
//1)Todos los datos del paciente son requeridos
//2)El paciente tiene que tener por lo menos un donante asigando
//3)Validaciones de campos de texto
//4)Limipiar Etiquetas <script></script>
//5)Consulta de horarios y fechas en especifico

let cont = 0; //contador para definicion de los ids temporales de los donantes en tabla
let donantes = [];//array que contendra los donantes
let token = $('input[name=_token]').val();//token

$('#tbl-donantes').hide();
$('#fecha_cita').on('change', function (e, date) {
    let fecha = $('#fecha_cita').val();

    $.ajax({
        url: '/consultarHorariosHabiles',
        data: { _token: token, fecha },
        method: 'POST',
        dataType: 'json'
    }).done(function (data, jqXHR, textStatus) {
        console.log(data);

        if (data.length !== 0) {

            $('#btnAsignarHora').attr('disabled', false);

            let template = '';
            let disabled = '';
            let classLleno = '';

            data.forEach((horario) => {

                disabled = ((horario.numero_cupos === horario.citas) ? 'disabled' : '');
                classLleno = ((horario.numero_cupos === horario.citas) ? 'horas-llenas' : '');

                template += `
                        <tr class="${classLleno}">
                            <td style="text-align:center;">
                                <input name="group4" type="radio" id="${horario.id_fecha}" class="radio-col-light-blue with-gap" value="${horario.horario}" ${disabled} />
                                <label for="${horario.id_fecha}">${horario.horario}</label>
                            </td>
                            <td style="text-align:center;">
                                ${horario.citas}
                            </td>
                            <td style="text-align:center;">
                                ${horario.numero_cupos}
                            </td>
                            <td style="text-align:center;">
                                ${horario.cupos_disponibles}
                            </td>
                        </tr>
                    `;
            });


            $('#tbhorariosMostrar').html(template);

        } else {

            alert('Lo sentimos no hay horarios establecidos para esta fecha');
        }


    }).fail(function (textStatus, jqXHR) {
        console.log(textStatus);
    });

});

const obtenerTextoRadioButtons = (ctrl) => {
    for (i = 0; i < ctrl.length; i++)
        if (ctrl[i].checked) return ctrl[i].value;
}

const llenarCamposDonantes = (data) => {
    $('#numero_dui').val(data[0].dui);

    let id_donante = '';

    if (data[0].id_paciente !== undefined) {
        id_donante = data[0].id_paciente;
    } else {
        id_donante = data[0].id_donante;
    }

    $('#iddonantes').val(id_donante);


    if (data[0].nombres === undefined) {
        $('#nombre_donante').val(data[0].nombre);
    } else {
        $('#nombre_donante').val(data[0].nombres);
    }

    if (data[0].telefono1 !== undefined) {
        $('#telefono1').val(data[0].telefono1);
        $('#telefono2').val(data[0].telefono2);
    }
    if (data[0].sexo === 'M') {
        $('#sexoDonanteM').attr('checked', true);
    } else {
        $('#sexoDonanteF').attr('checked', true);
    }

    $('#apellido_donante').val(data[0].apellidos);
}

//Funcion para limpiar los campos del formulario de donantes
const limpiarCamposDonantes = () => {
    $('#nombre_donante').val("");
    $('#numero_dui').val("");
    $('#telefono1').val("");
    $('#telefono2').val("");
    $('#fecha_cita').val("");
    $('#hora_cita').val("");
    $('#iddonantes').val("");
    $('#apellido_donante').val("");
    $('#sexoDonanteM').attr('checked', false);
    $('#sexoDonanteF').attr('checked', false);
}

const limpiarCamposPaciente = () => {
    $('#numero_afiliacion').val("");
    $('#nombres_paciente').val("");
    $('#apellidos_paciente').val("");
    $('#dui_paciente').val("");
    $('#procedencia_paciente').val("");
}

//Funcion para generar el template de donantes
const generarTemplateRow = (objDonante) => {
    let template_button = `<div class="demo-google-material-icon"  > <i class="material-icons delete-donante" data-id='${objDonante.id}' >delete_forever</i> </div>`;
    //Generación del registro en la tabla
    let template_row = `<tr id="row-${objDonante.id}">
                                <td>${objDonante.nombre_donante}</td>
                                <td>${objDonante.numero_dui}</td>
                                <td>${objDonante.fecha}</td>
                                <td>${objDonante.hora}</td>
                                <td>
                                    ${template_button}
                                </td>
                        </tr>
            `;
    return template_row;
}



//Evento click para eliminar el paciente
$('#tbody-donantes').on('click', '.delete-donante', function (event) {
    //Recupera el id temporal del donante
    let id = $(event.target).data().id;

    let index = donantes.findIndex((objDonante) => {
        return objDonante.id === id;
    });

    //Eliminando el donante del arreglo de donantes
    donantes.splice(index, 1);

    //Eliminando la fila de la tabla de donantes
    $('#row-' + index).hide();

    if (donantes.length === 0) {
        $('#tbl-donantes').hide();
    }

});

//Evento click para establecer hora de cita
$('#btn-establecer-hora').click(function () {

    //Obteneiendo el valor de la hora seleccionada
    let horario = $('input[name=group4]:checked').val();

    if (horario === undefined) {
        alert('Debes seleccionar una hora');
    } else {
        //Asignando la hora al input de hora_cita
        $('#hora_cita').val(horario);
        $('#modalAsignarHora').modal('hide');
    }

})


$('#btn-ingresar-donante').click(function () {

    let nombre_donante = $('#nombre_donante').val();
    let numero_dui = $('#numero_dui').val();
    let telefono1 = $('#telefono1').val();
    let telefono2 = $('#telefono2').val();
    let fecha = $('#fecha_cita').val();
    let hora = $('#hora_cita').val();
    let id_fecha = $("input[name='group4']:checked")[0].id;
    let id_donante = $('#iddonantes').val();

    //Validacion de campos requeridos
    if (nombre_donante === "") {
        swal(
            'Campo requerido',
            'Nombre del donante es requerido',
            'warning'
        );
        $('#nombre_donante').focus();
    } else if (numero_dui === "") {
        swal(
            'Campo requerido',
            'Numero de dui es requerido',
            'warning'
        );
        $('#numero_dui').focus();
    } else if (telefono1 === "") {
        swal(
            'Campo requerido',
            'Telefono 1 es requerido',
            'warning'
        );
        $('#telefono1').focus();
    } else if (telefono2 === "") {
        swal(
            'Campo requerido',
            'Telefono 2 es requerido',
            'warning'
        );
        $('#telefono2').focus();
    } else if (fecha === "") {
        swal(
            'Campo requerido',
            'Campo fecha es requerido',
            'warning'
        );
        $('#fecha_cita').focus();
    } else if (hora === "") {
        swal(
            'Campo requerido',
            'La Hora de la cita es requerida',
            'warning'
        );
        $('#hora_cita').focus();
    } else {

        //Busqueda del donante
        let donanteAIngresar = donantes.find((donante) => {
            return donante.numero_dui === numero_dui;
        });

        //Si el donante que se ha ingresado es distinto de indefinido
        if (donanteAIngresar !== undefined) {
            swal(
                'Campo requerido',
                'El donante que desea ingresar ya existe!!',
                'warning'
            );
        } else {

            let objDonante = {
                id: cont++,
                id_donante: (id_donante === "" ? "0" : id_donante),
                nombre_donante,
                numero_dui,
                telefono1,
                telefono2,
                id_fecha,
                fecha,
                hora
            };

            //Generando la fila de donante
            let template_row = generarTemplateRow(objDonante);

            //Ingreso del donante al array de donantes
            donantes.push(objDonante);

            //Limpìar los campos del formulario de donantes
            limpiarCamposDonantes();
            $('#tbl-donantes').show();

            //Ingreso del donante a la tabla de donantes
            $('#tbody-donantes').append(template_row);

            //lipiar campo de busqueda de donante
            $('#buscarDonante').val("");

            //Deshabilitando el boton de horas hasta que se asigne una fecha nuvamente
            $('#btnAsignarHora').attr('disabled', true);

            //Log
            console.log(donantes);
        }
    }
});

$('#btn-ingresar-citas').click(function (event) {
    $('#frmIngresarCitas').submit();
});


/**********************************INGRESO DE CITAS**********************************************/

$('#frmIngresarCitas').submit(function (event) {
    event.preventDefault();
    //Validacion de cada uno de los campos de paciente
    let numero_afiliacion = $('#numero_afiliacion').val().trim();
    let nombres_paciente = $('#nombres_paciente').val().trim();
    let apellidos_paciente = $('#apellidos_paciente').val().trim();
    let dui_paciente = $('#dui_paciente').val().trim();
    let procedencia_paciente = $('#procedencia_paciente').val().trim();
    let id_paciente = $('#idpaciente').val("0");

    if (numero_afiliacion === "" || numero_afiliacion.length < 9) {
        swal(
            'Campo requerido',
            'El numero de afiliacion es requerido',
            'warning'
        );
        $('#datos_paciente').click();
        $('#numero_afiliacion').focus();
    }
    else if (nombres_paciente === "") {
        swal(
            'Campo requerido!!',
            'El Nombre del paciente es requerido',
            'warning'
        );
        $('#datos_paciente').click();
        $('#nombres_paciente').focus()
    }
    else if (apellidos_paciente === "") {
        swal(
            'Campo requerido!!',
            'Los Apellidos del paciente son requeridos',
            'warning'
        );
        $('#datos_paciente').click();
        $('#apellidos_paciente').focus()
    }
    else if (dui_paciente === "" || dui_paciente.length < 10) {
        swal(
            'Campo requerido!!',
            'El dui del paciente es requerido',
            'warning'
        );
        $('#datos_paciente').click();
        $('#dui_paciente').focus()
    }
    else if (procedencia_paciente === "") {
        swal(
            'Campo requerido!!',
            'Procedencia del paciente es requerido',
            'warning'
        );
        $('#datos_paciente').click();
        $('#procedencia_paciente').focus()
    } else {

        if (donantes.length === 0) {
            swal(
                'Campo requerido!!',
                'Debes ingresar al menos un donante',
                'warning'
            );
        } else {

            let jsonDonantes = JSON.stringify(donantes);

            $.ajax({
                url: '/crearCitas',
                method: 'POST',
                data: {
                    _token: token,
                    numero_afiliacion,
                    nombres_paciente,
                    apellidos_paciente,
                    dui_paciente,
                    procedencia_paciente,
                    jsonDonantes,
                    id_paciente
                },
                dataType: 'text'
            }).done(function (data, jqXHR, textStatus) {
                console.log(data);
                if (parseInt(data) === 1) {
                    alert('Datos Ingresados correctamente');
                }
                else {
                    alert('Lo sentimos ocurrio un error');
                }
                limpiarCamposPaciente();
                donantes = [];
                $('#tbody-donantes').html(" ");
            }).fail(function (textStatus, jqXHR) {
                console.log(textStatus);
            });
        }
    }
});


$('#btnBuscarPacientes').on('click', function (event) {

    let documento = $('#buscarPaciente').val();
    $('#idpaciente').val("0");

    $.ajax({
        url: './buscarDocumento',
        method: 'POST',
        data: { _token: token, documento },
        dataType: 'json'
    }).done(function (data, jqXHR, textStatus) {

        console.log(data);

        if (data[0].dui !== undefined) {

            let idpaciente = '';

            if (data[0].id_paciente !== undefined) {
                idpaciente = data[0].id_paciente;
            } else {
                idpaciente = data[0].id_donante;
            }

            $('#idpaciente').val(idpaciente);

            $('#numero_afiliacion').attr('disabled', false);
            $('#nombres_paciente').attr('disabled', false);
            $('#apellidos_paciente').attr('disabled', false);
            $('#procedencia_paciente').attr('disabled', false);

            $('#dui_paciente').val(data[0].dui);
            $('#numero_afiliacion').val(data[0].afiliacion);

            if (data[0].nombres !== undefined) {
                $('#nombres_paciente').val(data[0].nombres);
            }
            else {
                $('#nombres_paciente').val(data[0].nombre);
            }

            $('#apellidos_paciente').val(data[0].apellidos);
            $('#procedencia_paciente').val(data[0].procedencia);

            if (data[0].sexo === 'M') {
                $('#radioM').attr('checked', true);
            } else {
                $('#radioF').attr('checked', true);
            }

        } else {
            $('#radioM').attr('checked', false);
            $('#radioF').attr('checked', false);
            swal({
                title: 'El paciente que busca no existe',
                text: "Desea ingresarlo?",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ingresar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {


                $('#numero_dui').val($('#buscarDonante').val());
                $('#numero_afiliacion').removeAttr("disabled");
                $('#nombres_paciente').removeAttr("disabled");
                $('#apellidos_paciente').removeAttr("disabled");
                $('#procedencia_paciente').removeAttr("disabled");
                limpiarCamposPaciente();

            });
        }

    }).fail(function (textStatus, jqXHR) {
        console.log(textStatus);
    });



});

$('#btnBuscarDonante').on('click', function (event) {

    let documento = $('#buscarDonante').val();

    $.ajax({
        url: './buscarDocumento',
        method: 'POST',
        data: { _token: token, documento },
        dataType: 'json'
    }).done(function (data, jqXHR, textStatus) {
        console.log(data);


        let numero_meses = ((data[0].numero_meses === undefined) ? 5 : data[0].numero_meses);


        let sexo = data[0].sexo;

        if (data[0].dui !== undefined) {
            if ((parseInt(numero_meses) >= 3 && sexo === 'M') || (parseInt(numero_meses) >= 4 && sexo === 'F')) {
                llenarCamposDonantes(data);
            } else {

                let requisito = (data[0].sexo === 'M') ? 3 : 4;

                swal({
                    title: 'El donante que ha buscado',
                    text: `No cumple con el requisito de ${requisito} mese \nDesea ingresarlo de todas formas?`,
                    type: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ingresar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result) {
                        llenarCamposDonantes(data);
                    }
                });

            }


        } else {
            swal({
                title: 'El donante que busca no existe',
                text: "Desea ingresarlo?",
                type: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ingresar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {

                if (result) {
                    limpiarCamposDonantes();
                    $('#numero_afiliacion').removeAttr("disabled");
                    $('#nombres_paciente').removeAttr("disabled");
                    $('#apellidos_paciente').removeAttr("disabled");
                    $('#procedencia_paciente').removeAttr("disabled");

                }

            });
        }
    }).fail(function (textStatus, jqXHR) {
        console.log(textStatus);
    });


});
