$(function(){

    // Lista de docente
    $.post( '../../frontend/funciones/plans.php' ).done( function(respuesta)
    {
        $( '#plan' ).html( respuesta );
    });
    
    
    // Lista de Ciudades
    $( '#plan' ).change( function()
    {
        var el_continente = $(this).val();

    });


    
    
    

})
