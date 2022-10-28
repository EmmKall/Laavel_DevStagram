import Dropzone from "dropzone";
 
Dropzone.autoDiscover = false;
if(document.getElementById("dropzone"))
{

    const dropzone = new Dropzone(".dropzone", {
        dictDefaultMessage: "Sube aquí tu imagen",
        acceptedFiles: ".png,.jpg,.jpeg,.gif",
        addRemoveLinks: true,
        dictRemoveFile: "Borrar archivo",
        maxFiles: 1,
        uploadMultiple: false,
    });

    /* Enventos en dropzone */
    dropzone.on( 'sending', function( file, xhr, formData ) {
        
    });

    dropzone.on( 'success', function( file, response ){
        console.log( response );
    });

    dropzone.on( 'error', function( file, message ){
        console.log( message );
    });

    dropzone.on( 'removedfile', function(){
        console.log( 'Archivo eliminado' );
    });

    

}


