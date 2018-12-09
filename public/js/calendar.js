$(document).ready(function () {

    let events = [];
    let token = $('input[name=_token]').val();
    let days;
    let newData = [];
    let startDate = '';
    let endDate = '';


    const convertirFormatoFecha = (fecha) => {

        return fecha.substring(8) + "/" + fecha.substring(5, 7) + "/" + fecha.substring(0, 4);
    }


    //Hace la consulta a la base de datos y muestra los horarios de la fecha que se le pasa como parametro
    const mostrarHorariosDias = (daySelected) => {

        $.ajax({
            url: '/consultarHorarioEspecifico',
            data: {
                _token: token,
                daySelected
            },
            method: 'POST',
            dataType: 'json'
        }).done(function (data, jqXHR, textStatus) {
            let template = ``;
            let check = '';
            let text = '';

            data.forEach((horario) => {
                check = (horario.estado === 1 ? 'checked' : '');
                text = (horario.estado === 1 ? 'Habilitado' : 'Inhabilitado');
                template += `
                    <tr>
                        <td>${horario.horario}</td>
                        <td>
                            <input type="number" value="${horario.numero_cupos}" name="c${horario.id_fecha}" class="form-control" style="max-width:75px;" maxlength="3" />
                        </td>
                            <td>
                                <input type="checkbox" id="h${horario.id_fecha}" name="h${horario.id_fecha}" class="filled-out" ${check} />
                                <label for="h${horario.id_fecha}" class="labels-horarios">${text}</label>
                            </td>
                    </tr>
                `;
            });
            $('#tbodyHorariosEspecificos').html(template);
            $('#modalAsignacionCupos').modal('show');
        }).fail(function (textStatus, jqXHR) {
            console.log(textStatus);
        });

    }

    //Devuelve el dia  (Letras) de la semana de la fecha que se le pasa como parametro
    const diaSemana = (fecha) => {

        fecha = fecha.split('/');
        if (fecha.length != 3) {
            return null;
        }
        //Vector para calcular día de la semana de un año regular.
        var regular = [0, 3, 3, 6, 1, 4, 6, 2, 5, 0, 3, 5];
        //Vector para calcular día de la semana de un año bisiesto.
        var bisiesto = [0, 3, 4, 0, 2, 5, 0, 3, 6, 1, 4, 6];
        //Vector para hacer la traducción de resultado en día de la semana.
        var semana = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
        //Día especificado en la fecha recibida por parametro.
        var dia = fecha[0];
        //Módulo acumulado del mes especificado en la fecha recibida por parametro.
        var mes = fecha[1] - 1;
        //Año especificado por la fecha recibida por parametros.
        var anno = fecha[2];
        //Comparación para saber si el año recibido es bisiesto.
        if ((anno % 4 == 0) && !(anno % 100 == 0 && anno % 400 != 0))
            mes = bisiesto[mes];
        else
            mes = regular[mes];
        //Se retorna el resultado del calculo del día de la semana.
        return semana[Math.ceil(Math.ceil(Math.ceil((anno - 1) % 7) + Math.ceil((Math.floor((anno - 1) / 4) - Math.floor((3 * (Math.floor((anno - 1) / 100) + 1)) / 4)) % 7) + mes + dia % 7) % 7)];
    }

    //Consulta y muestra cada dia de cada mes tomando como parametro la fecha de inicio y fecha final del mes
    const consultarFechasCalendario = (fecha_inicio, fecha_fin) => {

        startDate = fecha_inicio;
        endDate = fecha_fin;

        $.ajax({
            url: '/consultarFechasCalendario',
            data: {
                _token: token,
                fecha_inicio,
                fecha_fin
            },
            method: 'POST',
            dataType: 'json'
        }).done(function (data, jqXHR, textStatus) {


            if (days === undefined) {

                data.forEach((event) => {
                    event.editable = false;
                    events.push(event);
                });

                days = events;

                $('#calendar').fullCalendar('addEventSource', events);
            } else {
                data.forEach((event) => {
                    event.editable = false;

                    let f = days.find((day) => {
                        return day.start === event.start;
                    });

                    if (f === undefined) {
                        newData.push(event);
                        days.push(event);
                    }
                });
                $('#calendar').fullCalendar('addEventSource', newData);
                newData = [];
            }

        }).fail(function (textStatus, jqXHR) {
            console.log(textStatus);
        });
    }

    //Inicializa el calendario
    $('#calendar').fullCalendar({
        disableDragging: false,
        editable: false,
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month'
        },
        droppable: false,
        events: events,
        eventRender: function (event, element) {

            element.html(event.numeroCitas + '/' + event.numeroCupos);

            if (parseInt(event.numeroCupos) === parseInt(event.numeroCitas)) {
                element.append("<i class='material-icons col-red' style='color:#ff4040;'>format_color_reset</i>");
            }
            else {
                element.append("<i class='material-icons col-white'>invert_colors</i>");
            }


            if (event.nombreFestivo === null) {
                element.css({ 'color': '#fff', 'font-size': '120%', 'text-align': 'center', 'background': 'green' });
            } else {
                element.css({ 'color': '#fff', 'font-size': '120%', 'text-align': 'center', 'background': 'red' });
            }

            if (diaSemana(convertirFormatoFecha(event.start._i)) === 'Domingo') {
                element.css({ 'color': '#fff', 'font-size': '120%', 'text-align': 'center', 'background': '#757575' });
            }


            element.append((event.nombreFestivo !== null ? `<p class="day-title">${event.nombreFestivo}</p>` : ''));

        },
        viewRender: function (view, element) {
            //let fecha_inicio = view.intervalStart.format();
            //let fecha_fin = view.intervalEnd.format();
            let fecha_inicio = view.start.format();
            let fecha_fin = view.end.format();

            let dataSource = consultarFechasCalendario(fecha_inicio, fecha_fin);
        },
        navLinks: true,
        editable: true,
        eventLimit: true,
        dayClick: function (date, jsEvent, view) {

            let daySelected = date.format();

            let dateSelected = convertirFormatoFecha(daySelected);

            let day = diaSemana(dateSelected);

            switch (day) {

                case 'Domingo':

                    let fSunday = days.find((d) => {
                        return d.start === daySelected;
                    });


                    if (fSunday === undefined) {

                        swal({
                            title: 'Esta seguro?',
                            text: "Desea habilitar y establecer horarios para este dia?",
                            type: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Establecer',
                            cancelButtonText: 'Cancelar'
                        }).then((result) => {
                            if (result.value) {

                                $.ajax({
                                    url: '/ingresarDomingo',
                                    method: 'POST',
                                    data: { _token: token, daySelected },
                                    dataType: 'text',
                                }).done(function (data, jqXHR, textStatus) {
                                    console.log(data);

                                }).fail(function (textStatus, jqXH) {
                                    console.log(textStatus);
                                });

                            }
                        });

                    } else {
                        mostrarHorariosDias(daySelected);
                    }

                    break;
                default:

                    let eventSelected = days.find((event) => {
                        return event.start === daySelected;
                    })

                    if (eventSelected.nombreFestivo === null) {
                        mostrarHorariosDias(daySelected);
                    } else {

                    }
                    console.log(eventSelected);
                    break;

            }
            //#00BCD4 BLUE
            //#CDDC39 LIMA
            //#757575 TEXT
            //#BDBDBD DIVIDER
            //#F0F4C3 PRIMARY COLOR
            /*
            $(this).css("background-color","#CDDC39");
            $(this).html("<p style='font-size:2em; color:white; text-align:center; margin-top:30px;'><i class='material-icons col-white'>invert_colors</i>51/100</p>");
            $('#modalAsignacionCupos').modal('show');
            */

            //alert(date.format());
        }
    });


    $('#btnEstablecerHorarios').on('click', function () {

        let fStartdate = days.find((day) => {
            return day.start === startDate
        });

        let fEndDate = days.find((day) => {
            return day.start === endDate
        })


        if (fEndDate === undefined && fStartdate === undefined) {

            $.ajax({
                url: '/asignarHorariosDefault',
                method: 'POST',
                data: { startDate, endDate, _token: token },
                dataType: 'text'
            }).done(function (data, textStatus, jqXHR) {
                console.log(data);
            }).fail(function (jqXHR, textStatus) {
                console.log(textStatus);
            })

        } else {
            alert(2);

        }




    });



});
