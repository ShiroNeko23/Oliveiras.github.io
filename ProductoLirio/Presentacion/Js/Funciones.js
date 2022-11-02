$(document).ready(function(){
    recargarlista();
    $('#cbx1').change(function(){
        recargarlista();
    });
});
function recargarlista(){
    $.ajax({
        method:"POST",
        url:"Js/Seleccionar.php",
        data:"var="+$('#cbx1').val(),
        success:function(r){
            $('#cbx2').html(r);
        }
        
    });
}
$(document).ready(function(){
  recargarlista();
  $('#Mcbx1').change(function(){
      recargarlistaM();
  });
});
function recargarlistaM(){
  $.ajax({
      method:"POST",
      url:"Js/Seleccionar.php",
      data:"var="+$('#Mcbx1').val(),
      success:function(r){
          $('#Mcbx2').html(r);
      }
      
  });
}
$("#txt1").on({
    "focus": function(event) {
      $(event.target).select();
    },
    "keyup": function(event) {
      $(event.target).val(function(index, value) {
        return value.replace(/\D/g, "")
          .replace(/(\d)(?=(\d{3})+\.)/g, ",");
      });
    }
  });
  function insertar(){
    $data="var="+$('#cbx1').val()+"&desc="+$('#floatingTextarea').val()+"&prec="+$('#txt2').val()+"&cant="+$('#txt1').val()+"&cal="+$('#cbx3').val();
    $.ajax({
      method:"POST",
      url:"Js/registrar.php",
      data:"var="+$('#cbx1').val()+"&desc="+$('#floatingTextarea').val()+"&prec="+$('#txt2').val()+"&cant="+0+"&cal="+$('#cbx3').val(),
      success:function(e){
        if(e==0){
          location.reload();
        }else{
          location.reload();
        }
        
      }
    })
  }
  $('.edit_var').click(function(e){
    var idvar=$(this).attr('vari');
    var desc=$(this).attr('DESC');
    var cant=$(this).attr('CANT');
    var prec=$(this).attr('PREC');
    var cal=$(this).attr('CAL');
    var idpr = $(this).attr('idprod');
    document.getElementById('Mcbx1').value=idvar;
    document.getElementById('MfloatingTextarea').value=desc;
    document.getElementById('Mtxt1').value=cant;
    document.getElementById('Mtxt2').value=prec;
    document.getElementById('Mcbx3').value=cal;
    document.getElementById('Mtxid').value=idpr;

  })
  function MEditar(){
    var idpr=document.getElementById('Mtxid').value;
    var idvar=document.getElementById('Mcbx1').value;
    var desc=document.getElementById('MfloatingTextarea').value;
    var cant=document.getElementById('Mtxt1').value;
    var prec=document.getElementById('Mtxt2').value;
    var cal=document.getElementById('Mcbx3').value;
    var datos="idprod="+idpr+"&idvar="+idvar+"&des="+desc+"&cantd="+cant+"&prec="+prec+"&cali="+cal;
    $.ajax({
      method:"POST",
      url:"Js/Editar.php",
      data:datos,
      success:function(e){
        if(e==0){
          location.reload();
        }else{
          location.reload();
        }
      }
    });

  }
