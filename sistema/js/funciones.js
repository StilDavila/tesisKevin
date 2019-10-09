function CheckValidation(){
    var frmvalid = $("#frmDatos");
    console.log(frmvalid.validate());
    // if (!) {
    //     return false;
    // }else{
    //     $('#alimentacion-tab').trigger('click');
    // }
}

function registrarPregunta(idVariable){
    console.log('Dentro');
    var idVariable = idVariable;
    var pregunta = document.querySelector('input[name="txtPregunta"]').value;

    $.ajax({
        async: true,
		url: "php/registrar_pregunta.php",
		type: "post",
        data: {idVariable,pregunta},
    	success: function(data){
    		if(data=='0'){
                location.href='../sistema/listaPregunta.php?id='+idVariable;
            }
		}
      });
}

function calcularAlimentacion(){
    var respuestaAlimentacion1 = parseFloat(document.getElementById("respuestaAlimentacion1").value);
    var respuestaAlimentacion2 = parseFloat(document.getElementById("respuestaAlimentacion2").value);
    var respuestaAlimentacion3 = parseFloat(document.getElementById("respuestaAlimentacion3").value);
    var respuestaAlimentacion4 = parseFloat(document.getElementById("respuestaAlimentacion4").value);
    var respuestaAlimentacion5 = parseFloat(document.getElementById("respuestaAlimentacion5").value);

    var alimentacion = respuestaAlimentacion1 + respuestaAlimentacion2 + respuestaAlimentacion3 + respuestaAlimentacion4 + respuestaAlimentacion5;
    console.log('Alimentacion: ' + alimentacion);
    return alimentacion;
}

function calcularGenetica(){
    var respuestaGenetica1 = parseFloat(document.getElementById("respuestaGenetica1").value);
    var respuestaGenetica2 = parseFloat(document.getElementById("respuestaGenetica2").value);
    var respuestaGenetica3 = parseFloat(document.getElementById("respuestaGenetica3").value);
    var respuestaGenetica4 = parseFloat(document.getElementById("respuestaGenetica4").value);
    var respuestaGenetica5 = parseFloat(document.getElementById("respuestaGenetica5").value);

    var genetica = respuestaGenetica1 + respuestaGenetica2 + respuestaGenetica3 + respuestaGenetica4 + respuestaGenetica5;
    console.log('Genetica: ' + genetica);
    return genetica;

}

function calcularGlucosa(){
    var respuestaGlucosa1 = parseFloat(document.getElementById("txtGlucosa").value);
    console.log('Glucosa:' + respuestaGlucosa1);
    return respuestaGlucosa1;
}

function calcularActividadFisica(){
    var respuestaActividadFisica1 = parseFloat(document.getElementById("respuestaActividadFisica1").value);
    var respuestaActividadFisica3 = parseFloat(document.getElementById("respuestaActividadFisica3").value);
    var respuestaActividadFisica2 = parseFloat(document.getElementById("respuestaActividadFisica2").value);

    var actividadFisica = respuestaActividadFisica1 + respuestaActividadFisica2 + respuestaActividadFisica3;
    console.log('Actividad fisica:' +actividadFisica);
    return actividadFisica;
}

function calcularRiesgo(){
    var alimentacion = calcularAlimentacion();
    var genetica = calcularGenetica();
    var glucosa = calcularGlucosa();
    var actividadFisica = calcularActividadFisica();

    var riesgo = function() {

        var riesgo;
    
        $.ajax({
            async: false,
            url: "php/logicaDifusa/calcularRiesgo.php",
            type: "post",
            data: {alimentacion, genetica, glucosa, actividadFisica},
            success: function(data){
                riesgo = data;
            }
          });
          return riesgo;
    }();
    var idTest = document.getElementById("txtIdTest").value;
    var dni = document.getElementById("txtDni").value;
    var nombre = document.getElementById("txtNombre").value;
    var edad = document.getElementById("txtEdad").value;
    var correo = document.getElementById("txtCorreo").value;
    var sexo = document.getElementById("txtSexo").value;

    console.log(dni+','+nombre+','+edad+','+correo+','+sexo);
    console.log('Riesgo: '+riesgo);

    $.ajax({
        async: false,
        url: "php/agregar_test.php",
        type: "post",
        data: {
                idTest,
                dni,
                nombre,
                edad,
                correo,
                sexo,
                alimentacion,
                genetica,
                glucosa,
                actividadFisica,
                riesgo
        },
        success: function(data){
            console.log(data);
            if(data=='200'){
                if(riesgo>=0 && riesgo<0.1){
                    // alert("RIESGO BAJO");
                    location.href='../sistema/resultadosBajo.php';
                }

                if(riesgo>=0.1 && riesgo<0.25){
                    // alert("RIESGO NORMAL");
                    location.href='../sistema/resultadosNormal.php';
                }

                if(riesgo>=0.25 && riesgo<0.55 ){
                    // alert("RIESGO ALTO");
                    location.href='../sistema/resultadosAlto.php';
                }

                if(riesgo>=0.55 && riesgo<=1){
                    // alert("RIESGO CRITICO");
                    location.href='../sistema/resultadosCritico.php';
                }
            }else if(data=='100'){
                console.log("Usuario ya registrado en este test");
            }
        }
    });
}


