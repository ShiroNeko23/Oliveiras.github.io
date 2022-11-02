let idvar;
let variedad;
let idtip;
$('.edit_var').click(function(e){
    variedad=$(this).attr('nomvar');
    idvar = $(this).attr('vari');
     idtip = $(this).attr('tipo');
    document.getElementById('txt1').value=variedad;
    document.getElementById('cbx1').value=idtip;
    document.getElementById('idvar').value=idvar;
    e.preventDefault();
});
$('#btnEditarModal').click(function(e){
  var datos=$("#modal1").serialize()+ '&idvar='+idvar;
  $.ajax(
        {
          method:'GET',
          url:'Js/edit.php',
          data:datos,
          beforeSend:function(){
            console.log(datos);
          },
          success:function(e){
            if(e==0){
              alert ("Error al Actualizar")
              location.reload();
            }else{
              location.reload();
            }
          }
        }
    )
 });

 
