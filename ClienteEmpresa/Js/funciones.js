/*function llenar(){
    var nom=$("#txt1").val();
    var corr=$("#txt2").val();//tel
    var tel=$("#txt3").val();//ident
    var iden=$("#txt4").val();//idtipoident
    var datos="nom="+nom+"&cor="+corr+"&tel="+tel+"&ident="+iden;
    alert(datos);
    $.ajax({
        method:"POST",
        url:"../Js/insertar.php",
        data:"nom="+nom+"&cor="+corr+"&tel="+tel+"&ident="+iden,
        success:function(e){
          if(e==0){
            location.reload();
          }else{
            location.reload();
          }
        }
      });
}*/