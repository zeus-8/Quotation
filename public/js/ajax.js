
var total1=0;
var total2=0;
var total3=0;
var total4=0;
var total6=0;
var total7=0;
var total8=0;
var total9=0;
var totalg=0;
var totalg2=0;
var porcen=0;
var porcen2=0;
var ip=0;
var ig=0;
var cantidad=0;
var cantidad2=0;
var acum=0;
var acum2=0;
var acum3=0;
var acum4=0;
var sumaho=0;
var sumagu=0;
var sumafinal=0;
var sumaiv=0;
function calcular(estaChequeado, valor) { 
  

acum=0;

for (ve = 1; ve < 3; ve++) {
noche=eval(document.getElementById('n'+ve).value); 
document.getElementById("ni"+ve).value=noche;
acum+=noche;

}

document.getElementById("niii").value=acum;

acum2=0;

for (ro = 1; ro < 10; ro++) {

h=eval(document.getElementById('h'+ro).value); 
room=eval(document.getElementById('r'+ro).value);
rhotel=h*room;
  document.getElementById("hab"+ro).value=rhotel;
  acum2+=rhotel;
  var acu=document.getElementById("nii").value=acum2;
  sumaho=document.getElementById("sumaho").value=acum*acum2;
  document.getElementById("txtValor").value=sumaho;
}

  totalg=sumaho+acum4+total6+total3+sumaiv;
  totalg2=totalg*todos;
  document.getElementById("sub7").value=totalg2;



} 
 

 

function calculo(estaChequeado, valor2,estaChequeado2, valor3) { 

acum4=0;

  for (i = 1; i < 10; i++) 
    {
      valor2 = parseInt(valor2);
       ct=eval(document.getElementById('c'+i).value); 
       ch=eval(document.getElementById('chk'+i).value);
      
       ttotal=ct*ch;
       var ttran=document.getElementById("ct"+i).value=ttotal;
       acum4+=ttotal;
       document.getElementById("txtValor2").value=acum4;

ip=acum4/total4;
document.getElementById("it").value=ip;
    }

 totalg=sumaho+acum4+total6+total3+sumaiv;
       totalg2=totalg*todos;
      document.getElementById("sub7").value=totalg2;






} 




function calculo2(estaChequeado2, valor3) { 

acum3=0;

 for (iv = 1; iv < 10; iv++) 
    {
     
       igu=eval(document.getElementById('i'+iv).value); 
       chk=eval(document.getElementById('ch'+iv).value);

      tg=igu*chk;
  
       document.getElementById("iv"+iv).value=tg;
       acum3+=tg;
       sumagu=document.getElementById("txtValor3").value=acum3;
       sumaiv=document.getElementById("sumaiv").value=sumagu+total9;
    }

total7=suma2;

ig=(sumagu+total9)/total4;
cantidad2=ct2*total7;



document.getElementById("ct4").value=cantidad2;
document.getElementById("ig").value=ig;


totalg=sumaho+acum4+total6+total3+sumaiv;
totalg2=totalg*todos;
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


ig=(sumagu+total9)/total4;
document.getElementById("ig").value=ig;


totalg=sumaho+acum4+total6+total3+sumaiv;
totalg2=totalg*todos;
document.getElementById("sub7").value=totalg2;

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

totalg=sumaho+acum4+total6+total3+sumaiv;
totalg2=totalg*todos;
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




totalg=sumaho+acum4+total6+total3+sumaiv;
totalg2=totalg*todos;
document.getElementById("sub7").value=totalg2;

} 


function persona() { 
u1=eval(document.getElementById('persona1').value); 
u2=eval(document.getElementById('persona2').value); 
u3=eval(document.getElementById('persona3').value); 
u4=eval(document.getElementById('persona4').value); 


 
todos = u1+u2+u3+u4; 

sumasub=total2+total1+total3+total6+total7;

total4=todos;
ip=acum4/total4;
ig=(sumagu+total9)/total4;
document.getElementById("ig").value=ig;
document.getElementById("it").value=ip;
document.getElementById('subtotal').value=todos; 
var subtotal3 = document.getElementById("sub3").value=total4;







 totalg=sumaho+acum4+total6+total3+sumaiv;
 totalg2=totalg*todos;
document.getElementById("sub7").value=totalg2;

} 




function para() { 

por=eval(document.getElementById('si').value); 


totalg=sumaho+acum4+total6+total3+sumaiv;
totalg2=totalg*total4;
porcen=totalg2/100*por;
porcen2=porcen+totalg2;
document.getElementById("cantidad").value=porcen;
document.getElementById("sub8").value=porcen2;
document.getElementById("sub9").value=porcen;

} 
 


function descuento() { 

des=eval(document.getElementById('des').value); 

prueba=des;
totalg=sumaho+acum4+total6+total3+sumaiv;
totalg2=totalg*total4;
porcen=totalg2/100*por;
porcen2=porcen+totalg2;
descuento1=des/100*porcen2;
descuento2=porcen2-descuento1;
document.getElementById("cantidad2").value=descuento1;
document.getElementById("descuen").value=descuento2;

} 