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

        init: function(){
            if( document.querySelector('[name="imagen"]').value.trim() !== '' )
            {
                const imgCargada = {};
                imgCargada.imgSize = 1234;
                imgCargada.imgName = document.querySelector('[name="imagen"]').value;

                this.options.addedfile.call( this, imgCargada );
                this.options.thumbnail.call( this, imgCargada, `/uploads/${ imgCargada.imgName }` );

                imgCargada.previewElement.classList.add( 'dz-success', 'dz-complete' );

            }
        }
    });

    /* Enventos en dropzone */
    dropzone.on( 'sending', function( file, xhr, formData ) {
        
    });

    dropzone.on( 'success', function( file, response ){
        /* console.log( response ); */
        document.querySelector('[name="imagen"]').value = response.imagen;
    });

    dropzone.on( 'error', function( file, message ){
        console.log( message );
    });

    dropzone.on( 'removedfile', function(){
        console.log( 'Archivo eliminado' );
    });

    dropzone.on('removedfile', function(){
        document.querySelector('[name="imagen"]').value = '';
    });
    

}


