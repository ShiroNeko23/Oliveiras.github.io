function Ingresar(){
  var nom=$("#txt1").val();
  var ap=$("#txt2").val();
  var ap2=$("#txt3").val();
  var cor=$("#txt4").val();
  var tel=$("#txt5").val();//tel
  var ident=$("#txt6").val();//ident
  var tpiden=$("#cbx1").val();//idtipoident
  var datos="nom="+nom+"&ap="+ap+"&apm="+ap2+"&cor="+cor+"&tel="+tel+"&ident="+ident+"&tipoiden="+tpiden;
  $.ajax({
      method:"POST",
      url:"../Js/insert.php",
      data:"nom="+nom+"&ap="+ap+"&apm="+ap2+"&cor="+cor+"&tel="+tel+"&ident="+ident+"&tipoiden="+tpiden,
      success:function(e){
        if(e==0){
          location.reload();
        }else{
          location.reload();
        }
      }
    });
}
