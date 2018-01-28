
var total1=0;
var total2=0;
var total3=0;
var total6=0;
var total7=0;
var total8=0;
var total9=0;
var totalg=0;
var totalg2=0;
var porcen=0;
var porcen2=0;

function calcular(estaChequeado, valor) { 

  console.log(valor);

ne=eval(document.getElementById('neto').value); 

var suma_actual = 0;
var campo_resultado = document.getElementById('txtValor');


valor = parseInt(valor);

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

  if (estaChequeado == true) {
     suma_actual =  suma_actual + valor;
  } else {
     suma_actual =  suma_actual - valor;
  }



var sumando=suma_actual;

campo_resultado.value = sumando;


to=2;


total1=sumando;


totalg=total1+total2+total7+total3+total6+total9;
totalg2=totalg*total4;
document.getElementById("sub7").value=totalg2;

} 
 

 

function calculo(estaChequeado, valor2,estaChequeado2, valor3) { 

  var suma = 0;
  var resultado = document.getElementById('txtValor2');
  valor2 = parseInt(valor2);


  try {
    if (resultado != null) {

      if (isNaN(resultado.value)) {
        resultado.value = 0;
      }

      suma = parseInt(resultado.value);
    }
  } catch (ex) {
    alert('No existe el campo de la suma.');
  }

  if (estaChequeado == true) {
    suma = suma + valor2;
  } else {
    suma = suma - valor2;
  }


resultado.value = suma;

total2=suma;
totalg=total1+total2+total7+total3+total6+total9;
totalg2=totalg*total4;
document.getElementById("sub7").value=totalg2;

} 




function calculo2(estaChequeado2, valor3) { 

  var suma2 = 0;
  var resultado2 = document.getElementById('txtValor3');
  valor3 = parseInt(valor3);


  try {
    if (resultado2 != null) {

      if (isNaN(resultado2.value)) {
        resultado2.value = 0;
      }

      suma2 = parseInt(resultado2.value);
    }
  } catch (ex2) {
    alert('No existe el campo de la suma.');
  }

  if (estaChequeado2 == true) {
    suma2 = suma2 + valor3;
  } else {
    suma2 = suma2 - valor3;
  }


  resultado2.value = suma2;

total7=suma2;

totalg=total1+total2+total7+total3+total6+total9;
totalg2=totalg*total4;
document.getElementById("sub7").value=totalg2;


} 


function calcu(estaChequeado, valor) { 
  

var campo_resultado = document.getElementById('iva');
var suma_actual = 0;

valor = parseInt(valor);


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

  if (estaChequeado == true) {
    suma_actual = suma_actual + valor;
  } else {
    suma_actual = suma_actual - valor;
  }

campo_resultado.value = suma_actual;

total9=suma_actual; 

totalg=total1+total2+total7+total3+total6+total9;
totalg2=totalg*total4;
document.getElementById("sub7").value=totalg2;

var iva = document.getElementById("subiva").value=total9+total7;



} 





function calcula() { 
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
total3=pasaje+impuesto;
tiva=total3*0.12;
totaliva=tiva+total3; 

document.getElementById('total4').value=pasaje; 
document.getElementById('total5').value=impuesto; 
document.getElementById('tiva').value=tiva; 
document.getElementById('totalconiva').value=totaliva; 


var subtotal1 = document.getElementById("subtotal1").value=mul1;
var subtotal2 = document.getElementById("subtotal2").value=mul2;
var subtotal3 = document.getElementById("subtotal3").value=mul3;
var subtotal4 = document.getElementById("subtotal4").value=mul4;
var subtotal5 = document.getElementById("subtotal5").value=mul5;
var subtotal6 = document.getElementById("subtotal6").value=mul6;
var subtotal7 = document.getElementById("subtotal7").value=mul6;

totalg=total1+total2+total7+total3+total6;
totalg2=totalg*total4;
document.getElementById("sub7").value=totalg2;
} 

  
function alimento() { 
a1=eval(document.getElementById('ali1').value); 
a2=eval(document.getElementById('ali2').value); 
a3=eval(document.getElementById('ali3').value); 

d1=eval(document.getElementById('dia1').value); 
d2=eval(document.getElementById('dia2').value); 
d3=eval(document.getElementById('dia3').value); 

multi1=a1*d1;
multi2=a2*d2;
multi3=a3*d3;

alitotal = multi1+multi2+multi3; 
total6=alitotal;

document.getElementById('sub1').value=multi1; 
document.getElementById('sub2').value=multi2;
document.getElementById('sub3').value=multi3;

document.getElementById('totalali').value=alitotal; 


totalg=total1+total2+total7+total3+total6+total9;
totalg2=totalg*total4;
document.getElementById("sub7").value=totalg2;



} 


function persona() { 
u1=eval(document.getElementById('persona1').value); 
u2=eval(document.getElementById('persona2').value); 
u3=eval(document.getElementById('persona3').value); 
u4=eval(document.getElementById('persona4').value); 


 
todos = u1+u2+u3+u4; 

sumasub=total2+total1+total3+total6+total7;
total4=todos


document.getElementById('subtotal').value=todos; 
var subtotal3 = document.getElementById("sub3").value=total4;


totalg=total1+total2+total7+total3+total6;
totalg2=totalg*total4;
document.getElementById("sub7").value=totalg2;


} 


function porcentaje() { 
por=eval(document.getElementById('porcentaje').value); 




totalg=total1+total2+total7+total3+total6+total9;
totalg2=totalg*total4;
porcen=totalg2/100*por;
porcen2=porcen+totalg2;
document.getElementById("sub8").value=porcen2;


} 
 