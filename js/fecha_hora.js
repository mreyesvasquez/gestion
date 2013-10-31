
var patron = new Array(2,2,4)
var patron2 = new Array(1,3,3,3,3)
function mascara(d,sep,pat,nums){
if(d.valant != d.value){
	val = d.value
	largo = val.length
	val = val.split(sep)
	val2 = ''
	for(r=0;r<val.length;r++){
		val2 += val[r]	
	}
	if(nums){
		for(z=0;z<val2.length;z++){
			if(isNaN(val2.charAt(z))){
				letra = new RegExp(val2.charAt(z),"g")
				val2 = val2.replace(letra,"")
			}
		}
	}
	val = ''
	val3 = new Array()
	for(s=0; s<pat.length; s++){
		val3[s] = val2.substring(0,pat[s])
		val2 = val2.substr(pat[s])
	}
	for(q=0;q<val3.length; q++){
		if(q ==0){
			val = val3[q]
		}
		else{
			if(val3[q] != ""){
				val += sep + val3[q]
				}
		}
	}
	d.value = val
	d.valant = val
	}
}

function fecha()
{
var mydate=new Date()
var year=mydate.getYear()
if (year < 1000)
	year+=1900
var day=mydate.getDay()
var month=mydate.getMonth()
var daym=mydate.getDate()
if (daym<10)
	daym="0"+daym
	var dayarray=new Array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sabado")
	var montharray=new Array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre",
							 "Noviembre","Diciembre")
	document.write("Trujillo, "+daym+" de "+montharray[month]+" del "+year+"")
}

function mueveReloj(){
    var fechahora = new Date();
    var horas=fechahora.getHours();
    var minutos=fechahora.getMinutes();
    var segundos=fechahora.getSeconds();

    if (horas<10) { horas='0'+horas;}
    if (minutos<10)  {minutos='0'+minutos;}
    if (segundos<10)   {segundos='0'+segundos;}
   
    horaImprimible = horas + " : " + minutos + " : " + segundos;
    document.getElementById("hora").innerHTML = horaImprimible;

}

window.onload=function()
{  setInterval("mueveReloj()",1000);}


