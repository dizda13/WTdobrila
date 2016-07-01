function promijeni(){

  var datumi = document.getElementsByClassName('vrijeme');
  var klasa = document.getElementsByClassName('livo');
  var danas=new Date().getTime();

  var nizX=document.getElementsByClassName('brisiStil');

  if(document.getElementById('radi').textContent.split(" ")[1]=="admin")
    for(var i=0;i<nizX.length;i++)
      nizX[i].style.display="inline-block";
  else {
    for(var i=0;i<nizX.length;i++)
      nizX[i].style.display="none";
  }

  for(var i = 0; i < datumi.length; i++) {

  var vrijeme=(danas - Date.parse(datumi[i].getAttribute('datetime')))/1000;
  var nova = new Date(datumi[i].getAttribute('datetime'));
  dani=new Date(nova.getFullYear(), nova.getMonth(), 0).getDate();

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

  if(document.getElementById('radi').textContent==""){
    document.getElementById('noviPost').style.display="none";
    document.getElementById('logout').style.display="none";
    document.getElementById('login').style.display="inline-block";
    document.getElementById('notify').style.display="none";
    document.getElementById('dropdown').style.display="none";
    document.getElementById('mn').style.display="none";
    document.getElementById('phpProm').style.display="none";
  }
  else{
    document.getElementById('noviPost').style.display="inline-block";
    document.getElementById('logout').style.display="inline-block";
    document.getElementById('login').style.display="none";
    document.getElementById('notify').style.display="inline-block";
    document.getElementById('dropdown').style.display="inline-block";
    document.getElementById('mn').style.display="inline-block";
    document.getElementById('phpProm').style.display="inline-block";

  }
  if(document.getElementById('radi').textContent.split(" ")[1]=="admin")
    document.getElementById('contacts').style.display="inline-block";
  else {
    document.getElementById('contacts').style.display="none";
  }
  pokreniInterval();
}



function dugmeDaLI() {
if(document.getElementById('radi').textContent==""){
  document.getElementById('logout').style.display="none";
  document.getElementById('login').style.display="inline-block";
  document.getElementById('notify').style.display="none";
  document.getElementById('dropdown').style.display="none";
  document.getElementById('mn').style.display="none";
  document.getElementById('phpProm').style.display="none";
}
else{
  document.getElementById('logout').style.display="inline-block";
  document.getElementById('login').style.display="none";
  document.getElementById('notify').style.display="inline-block";
  document.getElementById('dropdown').style.display="inline-block";
  document.getElementById('mn').style.display="inline-block";
  document.getElementById('phpProm').style.display="inline-block";
}
  if(document.getElementById('radi').textContent.split(" ")[1]=="admin")
    document.getElementById('contacts').style.display="inline-block";
  else {
    document.getElementById('contacts').style.display="none";
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
  window.open("http://gdjenaci-provod.rhcloud.com/index.php","_self");
}

function pokaziKom(i){
  var kom=document.getElementsByClassName("nedivljivKom");
  if(kom[i].style.display=="none")
    kom[i].style.display="inline";
  else
  kom[i].style.display="none"
}

function pokreniInterval(){
  if(document.getElementById('notify').textContent!=""){
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
      var varijabla=JSON.parse(xhttp.responseText);
      var postovi=[];
        for(var i=0;i<varijabla['komentari'].length;i++){
          var tempUser=document.getElementById('radi').textContent;

          var kopacka=tempUser.split(" ");

          if(kopacka[1]==varijabla['komentari'][i].user)
            postovi.push(varijabla['komentari'][i].post);
        }
        document.getElementById('notify').textContent="Notifikacije: ";
        var glavni=document.getElementById('myDropdown');
        //var slektirano=lista.selectedIndex;
        //var duzina=0;
        //duzina=lista.options.length;
        var noti=[];
        for(var i=0;i<postovi.length;i++){
          var temp=0;
          for(var j=0;j<noti.length;j++){
            if(postovi[i]==noti[j])
              temp++;
          }
          if(temp==0)
            noti.push(postovi[i].toString());
        }
        for(var i=0;i<noti.length;i++){
          var temp=0;
          for(var j=0;j<postovi.length;j++){
            if(postovi[j]==noti[i])
              temp++;
          }
          noti[i]+=" ("+temp+")";
        }
        while (glavni.hasChildNodes()) {
          glavni.removeChild(glavni.lastChild);
        }

        var tekB = document.createTextNode("("+ postovi.length + ")");
        var batn = document.getElementById('pogledaj');
        batn.removeChild(batn.lastChild);
        batn.appendChild(tekB);
        document.getElementById('brojNot').value=noti.length;
        for(var i=1;i<noti.length+1;i++){
          var option = document.createElement("button");
          var tekB = document.createTextNode("post br. "+noti[i-1].toString());
          var val=noti[i-1].split(" ")[0];
          option.appendChild(tekB);
          option.type="submit";
          option.name="btn"+i;
          option.value=val;
          glavni.appendChild(option);
        }
      }
    }
  xhttp.open("GET", "notifikacije.php", true);
  xhttp.send();
}
}

setInterval(function(){
  pokreniInterval();
},3000);

function mojeNov(){
  var datumi = document.getElementsByClassName('vrijeme');
  var klasa = document.getElementsByClassName('livo');
  var danas=new Date().getTime();

  for(var i = 0; i < datumi.length; i++) {

  var vrijeme=(danas - Date.parse(datumi[i].getAttribute('datetime')))/1000;
  var nova = new Date(datumi[i].getAttribute('datetime'));
  dani=new Date(nova.getFullYear(), nova.getMonth(), 0).getDate();

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
  else if(vrijeme<3600*24*7) {
    if(vrijeme/(3600*24)==1){
      datumi[i].innerHTML="Novost je objavljena prije 1 dana";
    }
    else{
      datumi[i].innerHTML="Novost je objavljena prije "+parseInt(vrijeme/(3600*24))+" dana";
    }
  }
  else if(vrijeme<3600*24*dani){
    if(vrijeme/3600*25*7==1){
      datumi[i].innerHTML="Novost je objavljena prije sedmicu";
    }
    else{
      datumi[i].innerHTML="Novost je objavljena prije "+parseInt(vrijeme/(3600*24*7))+" sedmica";
    }
  }
  else{
    datumi[i].innerHTML=nova.getDate()+"/"+(nova.getMonth()+1)+"/"+nova.getFullYear();
  }
  }
  dugmeDaLI();
  pokreniInterval();
}


function pokaziListu(){
  document.getElementById("myDropdown").style.display="show";
}

function promijeniDaLi(){
  if(document.getElementById('daLiKom').value==1)
    document.getElementById('daLiKom').value=0;
  else
    document.getElementById('daLiKom').value=1;
}

function validNoviPass(){
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
    if(document.getElementById('trenPass').style.backgroundColor!="red" &&
    ponPass.style.backgroundColor!="red" &&
    document.getElementById('trenPass').value!="" &&
    ponPass.value!="")
    document.getElementById('regis').removeAttribute("disabled");
    pass.style.backgroundColor="white";
    return true;
    }

}

function validNovipPass(){
  var pass=document.getElementById('pass');
  var ponPass=document.getElementById('ponPass');
  if(pass.value!=ponPass.value){
    ponPass.style.backgroundColor="red";
    document.getElementById('regis').setAttribute("disabled","disabled");
    return false;
    }
  else{
    if(document.getElementById('trenPass').style.backgroundColor!="red" &&
    pass.style.backgroundColor!="red" &&
    document.getElementById('trenPass').value!="" &&
    pass.value!="")
    document.getElementById('regis').removeAttribute("disabled");
    ponPass.style.backgroundColor="white";
    return true;
    }
}


function trenutniPass(){
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
      var varijabla=JSON.parse(xhttp.responseText);
      var brojac=0;
        for(var i=0;i<varijabla['useri'].length;i++){
          var tempUser=document.getElementById('radi').textContent;
          var kopacka=tempUser.split(" ");
          var hashPass=calcMD5(document.getElementById('trenPass').value)
          if(kopacka[1]==varijabla['useri'][i].user && varijabla['useri'][i].pass==hashPass){
            document.getElementById('trenPass').style.backgroundColor="white";
            brojac++;
          }
        }
        if(brojac==0)
        document.getElementById('trenPass').style.backgroundColor="red";
    }
  }
  xhttp.open("GET", "provjeriPass.php", true);
  xhttp.send();
}

/*
 * A JavaScript implementation of the RSA Data Security, Inc. MD5 Message
 * Digest Algorithm, as defined in RFC 1321.
 * Copyright (C) Paul Johnston 1999 - 2000.
 * Updated by Greg Holt 2000 - 2001.
 * See http://pajhome.org.uk/site/legal.html for details.
 */

/*
 * Convert a 32-bit number to a hex string with ls-byte first
 */
var hex_chr = "0123456789abcdef";
function rhex(num)
{
  str = "";
  for(j = 0; j <= 3; j++)
    str += hex_chr.charAt((num >> (j * 8 + 4)) & 0x0F) +
           hex_chr.charAt((num >> (j * 8)) & 0x0F);
  return str;
}

/*
 * Convert a string to a sequence of 16-word blocks, stored as an array.
 * Append padding bits and the length, as described in the MD5 standard.
 */
function str2blks_MD5(str)
{
  nblk = ((str.length + 8) >> 6) + 1;
  blks = new Array(nblk * 16);
  for(i = 0; i < nblk * 16; i++) blks[i] = 0;
  for(i = 0; i < str.length; i++)
    blks[i >> 2] |= str.charCodeAt(i) << ((i % 4) * 8);
  blks[i >> 2] |= 0x80 << ((i % 4) * 8);
  blks[nblk * 16 - 2] = str.length * 8;
  return blks;
}

/*
 * Add integers, wrapping at 2^32. This uses 16-bit operations internally
 * to work around bugs in some JS interpreters.
 */
function add(x, y)
{
  var lsw = (x & 0xFFFF) + (y & 0xFFFF);
  var msw = (x >> 16) + (y >> 16) + (lsw >> 16);
  return (msw << 16) | (lsw & 0xFFFF);
}

/*
 * Bitwise rotate a 32-bit number to the left
 */
function rol(num, cnt)
{
  return (num << cnt) | (num >>> (32 - cnt));
}

/*
 * These functions implement the basic operation for each round of the
 * algorithm.
 */
function cmn(q, a, b, x, s, t)
{
  return add(rol(add(add(a, q), add(x, t)), s), b);
}
function ff(a, b, c, d, x, s, t)
{
  return cmn((b & c) | ((~b) & d), a, b, x, s, t);
}
function gg(a, b, c, d, x, s, t)
{
  return cmn((b & d) | (c & (~d)), a, b, x, s, t);
}
function hh(a, b, c, d, x, s, t)
{
  return cmn(b ^ c ^ d, a, b, x, s, t);
}
function ii(a, b, c, d, x, s, t)
{
  return cmn(c ^ (b | (~d)), a, b, x, s, t);
}

/*
 * Take a string and return the hex representation of its MD5.
 */
function calcMD5(str)
{
  x = str2blks_MD5(str);
  a =  1732584193;
  b = -271733879;
  c = -1732584194;
  d =  271733878;

  for(i = 0; i < x.length; i += 16)
  {
    olda = a;
    oldb = b;
    oldc = c;
    oldd = d;

    a = ff(a, b, c, d, x[i+ 0], 7 , -680876936);
    d = ff(d, a, b, c, x[i+ 1], 12, -389564586);
    c = ff(c, d, a, b, x[i+ 2], 17,  606105819);
    b = ff(b, c, d, a, x[i+ 3], 22, -1044525330);
    a = ff(a, b, c, d, x[i+ 4], 7 , -176418897);
    d = ff(d, a, b, c, x[i+ 5], 12,  1200080426);
    c = ff(c, d, a, b, x[i+ 6], 17, -1473231341);
    b = ff(b, c, d, a, x[i+ 7], 22, -45705983);
    a = ff(a, b, c, d, x[i+ 8], 7 ,  1770035416);
    d = ff(d, a, b, c, x[i+ 9], 12, -1958414417);
    c = ff(c, d, a, b, x[i+10], 17, -42063);
    b = ff(b, c, d, a, x[i+11], 22, -1990404162);
    a = ff(a, b, c, d, x[i+12], 7 ,  1804603682);
    d = ff(d, a, b, c, x[i+13], 12, -40341101);
    c = ff(c, d, a, b, x[i+14], 17, -1502002290);
    b = ff(b, c, d, a, x[i+15], 22,  1236535329);

    a = gg(a, b, c, d, x[i+ 1], 5 , -165796510);
    d = gg(d, a, b, c, x[i+ 6], 9 , -1069501632);
    c = gg(c, d, a, b, x[i+11], 14,  643717713);
    b = gg(b, c, d, a, x[i+ 0], 20, -373897302);
    a = gg(a, b, c, d, x[i+ 5], 5 , -701558691);
    d = gg(d, a, b, c, x[i+10], 9 ,  38016083);
    c = gg(c, d, a, b, x[i+15], 14, -660478335);
    b = gg(b, c, d, a, x[i+ 4], 20, -405537848);
    a = gg(a, b, c, d, x[i+ 9], 5 ,  568446438);
    d = gg(d, a, b, c, x[i+14], 9 , -1019803690);
    c = gg(c, d, a, b, x[i+ 3], 14, -187363961);
    b = gg(b, c, d, a, x[i+ 8], 20,  1163531501);
    a = gg(a, b, c, d, x[i+13], 5 , -1444681467);
    d = gg(d, a, b, c, x[i+ 2], 9 , -51403784);
    c = gg(c, d, a, b, x[i+ 7], 14,  1735328473);
    b = gg(b, c, d, a, x[i+12], 20, -1926607734);

    a = hh(a, b, c, d, x[i+ 5], 4 , -378558);
    d = hh(d, a, b, c, x[i+ 8], 11, -2022574463);
    c = hh(c, d, a, b, x[i+11], 16,  1839030562);
    b = hh(b, c, d, a, x[i+14], 23, -35309556);
    a = hh(a, b, c, d, x[i+ 1], 4 , -1530992060);
    d = hh(d, a, b, c, x[i+ 4], 11,  1272893353);
    c = hh(c, d, a, b, x[i+ 7], 16, -155497632);
    b = hh(b, c, d, a, x[i+10], 23, -1094730640);
    a = hh(a, b, c, d, x[i+13], 4 ,  681279174);
    d = hh(d, a, b, c, x[i+ 0], 11, -358537222);
    c = hh(c, d, a, b, x[i+ 3], 16, -722521979);
    b = hh(b, c, d, a, x[i+ 6], 23,  76029189);
    a = hh(a, b, c, d, x[i+ 9], 4 , -640364487);
    d = hh(d, a, b, c, x[i+12], 11, -421815835);
    c = hh(c, d, a, b, x[i+15], 16,  530742520);
    b = hh(b, c, d, a, x[i+ 2], 23, -995338651);

    a = ii(a, b, c, d, x[i+ 0], 6 , -198630844);
    d = ii(d, a, b, c, x[i+ 7], 10,  1126891415);
    c = ii(c, d, a, b, x[i+14], 15, -1416354905);
    b = ii(b, c, d, a, x[i+ 5], 21, -57434055);
    a = ii(a, b, c, d, x[i+12], 6 ,  1700485571);
    d = ii(d, a, b, c, x[i+ 3], 10, -1894986606);
    c = ii(c, d, a, b, x[i+10], 15, -1051523);
    b = ii(b, c, d, a, x[i+ 1], 21, -2054922799);
    a = ii(a, b, c, d, x[i+ 8], 6 ,  1873313359);
    d = ii(d, a, b, c, x[i+15], 10, -30611744);
    c = ii(c, d, a, b, x[i+ 6], 15, -1560198380);
    b = ii(b, c, d, a, x[i+13], 21,  1309151649);
    a = ii(a, b, c, d, x[i+ 4], 6 , -145523070);
    d = ii(d, a, b, c, x[i+11], 10, -1120210379);
    c = ii(c, d, a, b, x[i+ 2], 15,  718787259);
    b = ii(b, c, d, a, x[i+ 9], 21, -343485551);

    a = add(a, olda);
    b = add(b, oldb);
    c = add(c, oldc);
    d = add(d, oldd);
  }
  return rhex(a) + rhex(b) + rhex(c) + rhex(d);
}
