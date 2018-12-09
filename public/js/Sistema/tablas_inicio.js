
// Funciones para cambiar textbox en tipo de identificacion
function mostrarAusentes()
{
    $('#tabla-ausentes').show();
    $('#tabla-confirmados').hide();
    $('#tabla-asignados').hide();
    $('#tabla-disponibles').hide();
}

function mostrarConfirmados()
{

    $('#tabla-confirmados').show();
    $('#tabla-ausentes').hide();
    $('#tabla-asignados').hide();
    $('#tabla-disponibles').hide();
}

function mostrarAsignados()
{
    
    $('#tabla-asignados').show();
    $('#tabla-ausentes').hide();
    $('#tabla-confirmados').hide();
    $('#tabla-disponibles').hide();
}

function mostrarDisponibles()
{
    $('#tabla-disponibles').show();
    $('#tabla-ausentes').hide();
    $('#tabla-confirmados').hide();
    $('#tabla-asignados').hide();
}