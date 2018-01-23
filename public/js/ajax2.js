  
var sub1=0;
var sub2=0;
var sub3=0;
var sub4=0;
var sub5=0;
var sub6=0;
var total3=0;


function actualizarValor(estaChequeado, valor) {



  var suma_actual = 0;
  var campo_resultado = document.getElementById('txtValor');
  valor = parseInt(valor);

  // Obtener la suma que pueda tener el campo 'txtValor'.
  try {
    if (campo_resultado != null) {

      if (isNaN(campo_resultado.value)) {
        campo_resultado.value = 0;
      }

      suma_actual = parseInt(campo_resultado.value);
    }
  } catch (ex) {
    alert('No existe el campo de la suma.');
  }

  // Determinar que: si el check está seleccionado "checked"
  // entonces, agregue el valor a la variable "suma_actual";
  // de lo contrario, le resta el valor del check a "suma_actual".
  if (estaChequeado == true) {
    suma_actual = suma_actual + valor;
  } else {
    suma_actual = suma_actual - valor;
  }

  // Colocar el resultado de las operaciones anteriores de vuelta
  // al campo "txtValor".
  campo_resultado.value = suma_actual;

  sub1=suma_actual;
  sub4=sub3+sub2+sub1;
sub6=sub5+sub4;
document.getElementById('txtValor4').value=sub6;
}



function actualizarValor2(estaChequeado, valor) {

  // Variables.
  var suma_actual = 0;
  var campo_resultado = document.getElementById('txtValor2');
  valor = parseInt(valor);

  // Obtener la suma que pueda tener el campo 'txtValor'.
  try {
    if (campo_resultado != null) {

      if (isNaN(campo_resultado.value)) {
        campo_resultado.value = 0;
      }

      suma_actual = parseInt(campo_resultado.value);
    }
  } catch (ex) {
    alert('No existe el campo de la suma.');
  }

  // Determinar que: si el check está seleccionado "checked"
  // entonces, agregue el valor a la variable "suma_actual";
  // de lo contrario, le resta el valor del check a "suma_actual".
  if (estaChequeado == true) {
    suma_actual = suma_actual + valor;
  } else {
    suma_actual = suma_actual - valor;
  }

  // Colocar el resultado de las operaciones anteriores de vuelta
  // al campo "txtValor".
  campo_resultado.value = suma_actual;
  sub2=suma_actual;
sub4=sub3+sub2+sub1;
sub6=sub5+sub4;
document.getElementById('txtValor4').value=sub6;
}





function actualizarValor3(estaChequeado, valor) {

  // Variables.
  var suma_actual = 0;
  var campo_resultado = document.getElementById('txtValor3');
  valor = parseInt(valor);

  // Obtener la suma que pueda tener el campo 'txtValor'.
  try {
    if (campo_resultado != null) {

      if (isNaN(campo_resultado.value)) {
        campo_resultado.value = 0;
      }

      suma_actual = parseInt(campo_resultado.value);
    }
  } catch (ex) {
    alert('No existe el campo de la suma.');
  }

  // Determinar que: si el check está seleccionado "checked"
  // entonces, agregue el valor a la variable "suma_actual";
  // de lo contrario, le resta el valor del check a "suma_actual".
  if (estaChequeado == true) {
    suma_actual = suma_actual + valor;
  } else {
    suma_actual = suma_actual - valor;
  }

  // Colocar el resultado de las operaciones anteriores de vuelta
  // al campo "txtValor".
  campo_resultado.value = suma_actual;

  sub3=suma_actual;
sub4=sub3+sub2+sub1;
sub6=sub5+sub4;
document.getElementById('txtValor4').value=sub6; 

}


function calcula2() { 
p1=eval(document.getElementById('pasaje1').value); 
p2=eval(document.getElementById('pasaje2').value); 
p3=eval(document.getElementById('pasaje3').value); 
p4=eval(document.getElementById('pasaje4').value); 
p5=eval(document.getElementById('pasaje5').value); 

im1=eval(document.getElementById('impuesto1').value); 
im2=eval(document.getElementById('impuesto2').value); 
im3=eval(document.getElementById('impuesto3').value); 
im4=eval(document.getElementById('impuesto4').value); 
im5=eval(document.getElementById('impuesto5').value); 

pasaje=p1+p2+p3+p4+p5;
impuesto=im1+im2+im3+im4+im5;

  mul1 = p1 + im1; 
  mul2 = p2 + im2; 
  mul3 = p3 + im3; 
  mul4 = p4 + im4; 
  mul5 = p5 + im5;

mul6 = mul1+mul2+mul3+mul4+mul5; 


document.getElementById('total4').value=pasaje; 
document.getElementById('total5').value=impuesto; 

total3=pasaje+impuesto;

var subtotal1 = document.getElementById("subtotal1").value=mul1;
var subtotal2 = document.getElementById("subtotal2").value=mul2;
var subtotal3 = document.getElementById("subtotal3").value=mul3;
var subtotal4 = document.getElementById("subtotal4").value=mul4;
var subtotal5 = document.getElementById("subtotal5").value=mul5;
var subtotal6 = document.getElementById("subtotal6").value=mul6;
var subtotal7 = document.getElementById("subtotal7").value=mul6;
sub5=total3;
sub6=sub5+sub4;
 var sub= document.getElementById("txtValor4").value=sub6;





} 