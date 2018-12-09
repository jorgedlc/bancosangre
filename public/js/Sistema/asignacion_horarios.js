

    const actualizacionDeHoararios=(frm)=>{        
        
        let form=frm.serialize();        
        $.ajax({
            url:'/horariosed',
            method:'POST',
            data:form,
            dataType:'text'
        }).done(function(data,jqXHR,textStatus){
            if(parseInt(data)===1){
                alert('Datos actualizados con exito!!!')
            }else{
                alert('Lo sentimos ocurrio un error par favar llamar al departamento de informatica URGENTEMENTE');

            }
        }).fail(function(textStatus,jqXHR){
            console.log(textStatus);
        });
    };


    const cambiarTextoLabels=(label)=>{

        if(label.text()==='Inhabilitado'){
            label.text('Habilitado');
        }else{            
            label.text('Inhabilitado');            
        }
    }

    $('#frm_horarios_semana').submit(function(event){
        event.preventDefault();
        let frm=$('#frm_horarios_semana');
        actualizacionDeHoararios(frm);
    });

    $('#frm_horarios_fin_semana').submit(function(event){
        event.preventDefault();
        let frm=$('#frm_horarios_fin_semana');
        actualizacionDeHoararios(frm);        
    });

    $('.labels-horarios').click(function(event){
        let label=$(this);    
        cambiarTextoLabels(label);        
    });

    $('#tbodyHorariosEspecificos').on('click','.labels-horarios',function(event){
        let label=$(this);    
        cambiarTextoLabels(label);    
    });

