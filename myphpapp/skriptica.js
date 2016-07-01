function promijeni(){

  var datumi = document.getElementsByClassName('vrijeme');
  var klasa = document.getElementsByClassName('livo');
  var danas=new Date().getTime();

  for(var i = 0; i < datumi.length; i++) {

  var vrijeme=(danas - Date.parse(datumi[i].getAttribute('datetime')))/1000;
  var nova = new Date(datumi[i].getAttribute('datetime'));
  dani=new Date(nova.getFullYear(), nova.getMonth(), 0).getDate();
  console.log(dani);
  if(vrijeme<60){
    datumi[i].innerHTML="Novost objavljena prije par sekundi";
  }
  else if(vrijeme<3600){
    if((vrijeme/60>4 && vrijeme/60<21) || (vrijeme/60>24 && (vrijeme/600-parseInt(vrijeme/600)*10>4)) ){
    datumi[i].innerHTML="Novost je objavljena prije "+parseInt(vrijeme/60)+" minuta";
    }
    else if((vrijeme/600-parseInt(vrijeme/600)*10==1) || vrijeme/60==1){
      datumi[i].innerHTML="Novost je objavljena prije "+parseInt(vrijeme/60)+" minutu";
    }
    else {
      datumi[i].innerHTML="Novost je objavljena prije "+parseInt(vrijeme/60)+" minute";
    }
  }
  else if(vrijeme<3600*24){
    if(vrijeme/3600>4 && vrijeme/3600<21){
    datumi[i].innerHTML="Novost je objavljena prije "+parseInt(vrijeme/3600)+" sati";
    }
    else if(vrijeme/3600==1 || (vrijeme/3600==21)){
      datumi[i].innerHTML="Novost je objavljena prije "+parseInt(vrijeme/3600)+" sat";
    }
    else {
      datumi[i].innerHTML="Novost je objavljena prije "+parseInt(vrijeme/3600)+" sata";
    }
  }
  else if(vrijeme<3600*24*7 && document.getElementById("lista").value>1) {
    if(vrijeme/(3600*24)==1){
      datumi[i].innerHTML="Novost je objavljena prije 1 dana";
    }
    else{
      datumi[i].innerHTML="Novost je objavljena prije "+parseInt(vrijeme/(3600*24))+" dana";
    }
  }
  else if(vrijeme<3600*24*dani && document.getElementById("lista").value>2){
    if(vrijeme/3600*25*7==1){
      datumi[i].innerHTML="Novost je objavljena prije sedmicu";
    }
    else{
      datumi[i].innerHTML="Novost je objavljena prije "+parseInt(vrijeme/(3600*24*7))+" sedmica";
    }
  }
  else if(document.getElementById("lista").value>3) {
    datumi[i].innerHTML=nova.getDate()+"/"+(nova.getMonth()+1)+"/"+nova.getFullYear();
  }
  }

  if(document.getElementById('radi').textContent=="  "){
    document.getElementById('noviPost').style.display="none";
    document.getElementById('logout').style.display="none";
  }
  else{
    document.getElementById('noviPost').style.display="inline-block";
    document.getElementById('logout').style.display="inline-block";
  }
}

function dugmeDaLI() {
if(document.getElementById('radi').textContent=="  "){
  document.getElementById('logout').style.display="none";
}
else{
  document.getElementById('logout').style.display="inline-block";
}
}
function upDate(){
    var datumi = document.getElementsByClassName('vrijeme');
    var klasa = document.getElementsByClassName('livo');
    var danas=new Date().getTime();
    for(var i = 0; i < datumi.length; i++) {
    var vrijeme=(danas - Date.parse(datumi[i].getAttribute('datetime')))/1000;
    var nova = new Date(datumi[i].getAttribute('datetime'));
    dani=new Date(nova.getFullYear(), nova.getMonth(), 0).getDate();
    switch(document.getElementById("lista").value){
      case "1":
        if(vrijeme>3600*24){
          klasa[i].style.display="none";
        }
        break;
      case "2":
      if(vrijeme<3600*24*7){
        klasa[i].style.display="inline-block";
      }
      else {
        klasa[i].style.display="none";
      }
          break;
      case "3":
      if(vrijeme<3600*24*dani){
        klasa[i].style.display="inline-block";
      }
      else {
        klasa[i].style.display="none";
      }
          break;
      case "4":
          klasa[i].style.display="inline-block";
          break;
    }
  }
}


function validUser(){
  var user=document.getElementById('user');
  if(user.value.length<=4){
    user.style.backgroundColor="red";
    document.getElementById('regis').setAttribute("disabled","disabled");
    return false;
  }
  else{
    user.style.backgroundColor="white";
    if(document.getElementById('ponPass').style.backgroundColor!="red" &&
    document.getElementById('email').style.backgroundColor!="red" &&
    document.getElementById('pass').style.backgroundColor!="red" &&
    document.getElementById('ponPass').value!="" &&
    document.getElementById('email').value!="" &&
    document.getElementById('pass').value!="")
    document.getElementById('regis').removeAttribute("disabled");
    return true;
  }
}

function validEmail(){
  var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var email =document.getElementById('email');
  if(!reg.test(email.value)){
    email.style.backgroundColor="red";
    document.getElementById('regis').setAttribute("disabled","disabled");
    return false;
  }
  else{
    email.style.backgroundColor="white";
    if(document.getElementById('ponPass').style.backgroundColor!="red" &&
    document.getElementById('user').style.backgroundColor!="red" &&
    document.getElementById('pass').style.backgroundColor!="red" &&
    document.getElementById('ponPass').value!="" &&
    document.getElementById('user').value!="" &&
    document.getElementById('pass').value!="")
    document.getElementById('regis').removeAttribute("disabled");
    return true;
  }
}

function validPass(){
  var pass=document.getElementById('pass');
  var ponPass=document.getElementById('ponPass');
  var reg = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
  if(pass.value!=ponPass.value && ponPass.value!="")
    ponPass.style.backgroundColor="red";
  else
    ponPass.style.backgroundColor="white";
  if(!reg.test(pass.value)){
    pass.style.backgroundColor="red";
    document.getElementById('regis').setAttribute("disabled","disabled");
    return false;
    }
  else{
    if(document.getElementById('email').style.backgroundColor!="red" &&
    document.getElementById('user').style.backgroundColor!="red" &&
    ponPass.style.backgroundColor!="red" &&
    document.getElementById('email').value!="" &&
    document.getElementById('user').value!="" &&
    ponPass.value!="")
    document.getElementById('regis').removeAttribute("disabled");
    pass.style.backgroundColor="white";
    return true;
    }

}

function validpPass(){
  var pass=document.getElementById('pass');
  var ponPass=document.getElementById('ponPass');
  if(pass.value!=ponPass.value){
    ponPass.style.backgroundColor="red";
    document.getElementById('regis').setAttribute("disabled","disabled");
    return false;
    }
  else{
    if(document.getElementById('email').style.backgroundColor!="red" &&
    document.getElementById('user').style.backgroundColor!="red" &&
    pass.style.backgroundColor!="red" &&
    document.getElementById('email').value!="" &&
    document.getElementById('user').value!="" &&
    pass.value!="")
    document.getElementById('regis').removeAttribute("disabled");
    ponPass.style.backgroundColor="white";
    return true;
    }
}

function brisiButton(){
  if(document.getElementById("parag").label==""){
    console.log("proslo");
    document.getElementById('noviPost').style.display="none";
  }
  else{
    console.log(document.getElementById('parag').label);
    document.getElementById('noviPost').style.display="inline-block";
  }
}


function validBroj() {
  if(document.getElementById('kratica').value.length==2){
    document.getElementById('kratica').style.backgroundColor="white";
  var xhttp;
  if (window.XMLHttpRequest) {
    // code for modern browsers
    xhttp = new XMLHttpRequest();
    } else {
    // code for IE6, IE5
    xhttp = new ActiveXObject("Microsoft.XMLHTTP");
  }
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      var broj=xhttp.responseText;
      var niz=broj.split(",");
      for(var i=0;i<niz.length;i++)
        if(niz[i].indexOf("callingCodes")!= -1){
          var temp=niz[i].split(":");
          temp[1]=temp[1].replace("[","");
          temp[1]=temp[1].replace("]","");
          temp[1]=temp[1].replace('"','');
          temp[1]=temp[1].replace('"','');
          switch (document.getElementById('broj').value.substring(0,1)){
            case '+':
            if(document.getElementById('broj').value.substring(1,4)==temp[1])
              document.getElementById('broj').style.backgroundColor="white";
            else {
              document.getElementById('broj').style.backgroundColor="red";
            }
            break;
            case '0':
            if(document.getElementById('broj').value.substring(2,5)==temp[1])
              document.getElementById('broj').style.backgroundColor="white";
            else {
              document.getElementById('broj').style.backgroundColor="red";
            }
            break;
            default :
            if(document.getElementById('broj').value.substring(0,3)==temp[1])
              document.getElementById('broj').style.backgroundColor="white";
            else {
              document.getElementById('broj').style.backgroundColor="red";
            }
          }
        }
    }
  };
  xhttp.open("GET", "https://restcountries.eu/rest/v1/alpha?codes="+document.getElementById('kratica').value, true);
  xhttp.send();
  }
  else {
    document.getElementById('kratica').style.backgroundColor="red";
  }
}

function sortiraj(){
  if(document.getElementById('algo2').checked && document.getElementById('algo1').checked){
    document.getElementById('algo1').checked=false;
    var roditelj= document.getElementById("postovi");
    var djeca=roditelj.children;
    var nizDjece=[];

    for (var i in djeca) {
    if (djeca[i].nodeType == 1) { // get rid of the whitespace text nodes
        nizDjece.push(djeca[i]);
      }
    }
    for(var i=djeca.length-1;i>=0;i--){
      djeca[i].parentNode.removeChild(djeca[i]);
      }

    nizDjece.sort(function(a, b){
        var tekst1=a.children[2].innerHTML.toUpperCase();
        var tekst2=b.children[2].innerHTML.toUpperCase();
        var tekst1=tekst1.replace(/<BR>/g, '\n');
        var tekst2=tekst2.replace(/<BR>/g, '\n');
        if(tekst1<tekst2)
         return 1;
        else
          return -1;
      })
    for(var i=nizDjece.length-1;i>=0;i--){
      roditelj.appendChild(nizDjece[i]);
    }
  }
}

function vratiDatum(){
  document.getElementById('algo2').checked=false;
  location.reload();
}
