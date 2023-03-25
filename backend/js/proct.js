$(function(){

    // Lista de docente
    $.post( '../../frontend/funciones/prodct.php' ).done( function(respuesta)
    {
        $( '#prodc' ).html( respuesta );
    });
    
    
    // Lista de Ciudades
    $( '#prodc' ).change( function()
    {
        var el_continente = $(this).val();

    });


    
    
    

})
