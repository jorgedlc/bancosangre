let token=$('input[name=_token]').val();//token

$('#btnConfirmacion').on('click',function(){

    
    let documento_busqueda=$('#documento_busqueda').val();


    $.ajax({
        url:'/confirmarCitas',
        data:{_token:token,documento_busqueda},
        method:'POST',
        dataType:'text'
    }).done(function(data,jqXHR,textStatus){
        console.log(data);
    }).fail(function(textStatus,jqXHR){
        console.log(jqXHR);
    });

});