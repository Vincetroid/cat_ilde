$(document).ready(function(){

    var console_out = document.getElementById('console_out');

    console.log = function(message) {
        console_out.innerHTML += message + '<br />';
        console_out.scrollTop = console_out.scrollHeight;
    }

    var source_image;
    var output_format = "jpg";
    var encode_quality = 20;
    var result_image;

    //obtenido de: http://stackoverflow.com/questions/3814231/loading-an-image-to-a-img-from-input-file
    document.getElementById('port_libro').onchange = function (evt) {

        var tgt = evt.target || window.event.srcElement,
            files = tgt.files;

        // FileReader support
        if (FileReader && files && files.length) {
            var fr = new FileReader();
            fr.onload = function () {
                document.getElementById('img_hidden').src = fr.result;
                source_image = document.getElementById('img_hidden');
                alert('Hola: '+ source_image);
            }
            fr.readAsDataURL(files[0]);
        }

        // Not supported
        else {
            alert('Falla al leer el nombre del archivo');
            // fallback -- perhaps submit the input to an iframe and temporarily store
            // them on the server until the user's session ends.
        }
    }

    

    var encodeButton = document.getElementById('ok');
    //HANDLE COMPRESS BUTTON
    encodeButton.addEventListener('click', function(e) {

        if (source_image == "" || source_image == undefined) {
            alert("Primero debe seleccionar una imagen");
            return false;
        }

        // alert("Imagen fuente: " + typeof (source_image));


        // alert("Quality >>" + encode_quality);
        // alert("process start...");

        var time_start = new Date().getTime();
        
        alert("Source img: " + source_image);

        //Compresión de imagen
        result_image = jic.compress(source_image,encode_quality,output_format);
        
        alert("Imagen resultante: " + result_image);


        result_image.onload = function(){
        	var image_width=$(result_image).width(),
            image_height=$(result_image).height();
       	        
	        if(image_width > image_height){
	        	result_image.style.width="320px";
	        }else{
	        	result_image.style.height="300px";
	        }
	       result_image.style.display = "block";
        }
        var duration = new Date().getTime() - time_start;
        

        console.log("process finished...");
        console.log('Processed in: ' + duration + 'ms');

       
        //Subir la imagen comprimida
        if (result_image == "") {
            alert("You must load an image and compress it first!");
            return false;
        }
        var callback= function(response){
            console.log("image uploaded successfully! :)");
            console.log(response);          
        }
        
        jic.upload(result_image, 'registrar_libro.php', 'file', 'new.'+output_format,callback);

    }, false);

    // var uploadButton = document.getElementById("oksub");
    // uploadButton.addEventListener('click', function(e) {
    //     // var result_image = document.getElementById('result_image');
    //     if (result_image == "") {
    //         alert("You must load an image and compress it first!");
    //         return false;
    //     }
    //     var callback= function(response){
    //         console.log("image uploaded successfully! :)");
    //         console.log(response);          
    //     }
        
    //     jic.upload(result_image, 'upload.php', 'file', 'new.'+output_format,callback);
        
       
    // }, false);
    

});


