$(document).ready(function(){

    var DIRPAGE="http://"+document.location.hostname+"/";
    
    $('#FormSelect').on('submit',function(event){
        event.preventDefault();
        var Dados=$(this).serialize();

        $.ajax({
            url: DIRPAGE+'cadastro/seleciona',
            method='post',
            dataType:'html',
            data: Dados,
            success:function(Dados){
                $('.Resultado').html(Dados);
            }
        });

        $(document).on('click','.ImageEdit',function(){
            var ImgRel=$(this).attr('rel');
            
            $.ajax({
                url: DIRPAGE+'cadastro/puxaDB/'+ImgRel,
                method:'post',
                dataType:'html',
                data:{'ID':ImgRel},
                success:function(data){
                    $('.ResultadoFormulario').html(data);
                }
            });
        });
    });

    $("#FormAvaliacoes").on('submit',function(event){
        event.preventDefault();
        var Dados=$(this).serialize();
    
        $.ajax({
            url: 'controller/ControllerAvaliacao.php',
            method: 'post',
            dataType: 'html',
            data: Dados,
            success: function(Dados){
                $('.Resultado').show().html(Dados);
            }
        })
    
    });

    $('.Deletar').on('click',function(envent){
        event.preventDefault();
    
        var Link=$(this).attr('href');
        if (confirm("Deseja realmente deletar esse dado?")) {
            event.preventDefault();
            var Dados=$(this).serialize();
        
            $.ajax({
                url: 'controller/ControllerDelete-adm.php',
                method: 'post',
                dataType: 'html',
                data: Dados,
                success: function(Dados){
                    $('.Resultado').show().html(Dados);
                }
            })
        }else{
            return false;
        }
        
    });

    $("#FormCadastro").on('submit',function(event){
        event.preventDefault();
        var Dados=$(this).serialize();
    
        $.ajax({
            url: 'controller/ControllerCadastro-adm.php',
            method: 'post',
            dataType: 'html',
            data: Dados,
            success: function(Dados){
                $('.Resultado').show().html(Dados);
            }
        })
    
    });

    

});

