function create() {
  document.getElementById("buttoncreate").style.display = "none";
  document.getElementById("formNouvelBoite").style.display = "block";
  document.getElementById("divBoite").style.display = "none";
}
$('.email').on("change keyup paste",
  function(){
    if($(this).val()){
      $('.icon-paper-plane').addClass("next");
    } else {
      $('.icon-paper-plane').removeClass("next");
    }
  }
);

$('.next-button').hover(
  function(){
    $(this).css('cursor', 'pointer');
  }
);

$('.next-button.email').click(
  function(){
    console.log("Something");
    $('.email-section').addClass("fold-up");
    $('.password-section').removeClass("folded");
  }
);

$('.password').on("change keyup paste",
  function(){
    if($(this).val()){
      $('.icon-lock').addClass("next");
    } else {
      $('.icon-lock').removeClass("next");
    }
  }
);

$('.next-button').hover(
  function(){
    $(this).css('cursor', 'pointer');
  }
);

$('.next-button.password').click(
  function(){
    console.log("Something");
    $('.password-section').addClass("fold-up");
    $('.repeat-password-section').removeClass("folded");
  }
);

$('.repeat-password').on("change keyup paste",
  function(){
    if($(this).val()){
      $('.icon-repeat-lock').addClass("next");
    } else {
      $('.icon-repeat-lock').removeClass("next");
    }
  }
);

$('.next-button.repeat-password').click(
  function(){
    console.log("Something");
    $('.repeat-password-section').addClass("fold-up");
    $('.success').css("marginTop", 0);
  }
);


function validFormFirstBox(){
  document.forms["formFirstBox"].submit();
}

function random_bg_color() {

  var test = document.getElementsByClassName("boiteDesign");

//document.body.style.background = bgColor;

  for(var i=0, len=test.length; i<len; i++)
    {
    var x = Math.floor(Math.random() * 256);
    var y = Math.floor(Math.random() * 256);
    var z = Math.floor(Math.random() * 256);
    var bgColor = "rgb(" + x + "," + y + "," + z + ")";
    test[i].style.background = bgColor;
    }
    
}
random_bg_color();



function enregistrerClickBoite(test) {

  var stockClick = test.id;
  localStorage.setItem("clickBoite",stockClick);
  var id_boite = localStorage.getItem("clickBoite");

  window.location.href = "detailsBoite.php";

}

function setCookie(name,value,days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
}
function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}
function eraseCookie(name) {   
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function addOutils() {
  document.getElementById("addOutils").style.display = "block";

}
function closeAddOutils(){
  document.getElementById("addOutils").style.display = "none";
}
function closeeditOutils(){
  document.getElementById("editOutils").style.display = "none";
}
function editOutils(){

  document.getElementById("editOutils").style.display = "block";

  //document.getElementById("nomOutils").value = "test";
}
function deleteOutilss(){

  document.deleteOutils.submit(); 

  //document.getElementById("nomOutils").value = "test";
}
function affDetailsOutils(temp){
  
  var stockClick = temp.id;
  setCookie("id_outils", stockClick,7);
  window.location.href = "detailsOutils.php";
}


function actionValidee() {
  alert("ok");
document.getElementById('popup1Click').click();
}
