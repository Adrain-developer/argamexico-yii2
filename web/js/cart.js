mostrarDatos();
function addProducto(id){
var nombre = $('#producto-nombre-'+id).text();
console.table(jQuery('#producto-nombre-'+id).text());
var precio = $('#producto-precio-'+id).text();
var img = $('#producto-img-'+id).attr('src');
var cantidad = "1";
var medidaId = "0";
var medida = "X";
var producto = {
  'id' : id,
  'nombre' : nombre,
  'precio' : precio,
  'img' : img,
  'cantidad' : cantidad,
  'medida' : medida,
  'medidaId' : medidaId
  };
sessionStorage.setItem('item'+id, JSON.stringify(producto));
  Swal.fire({
    icon: 'success',
    title: 'El producto se ha añadido a la cotización',
    showConfirmButton: false,
    timer: 2500
  })

mostrarDatos();

}

function vaciarCarrito(){
  sessionStorage.clear();
  mostrarDatos();
}

function deleteItem(key){
  sessionStorage.removeItem(key);
  mostrarDatos();
}

function mostrarDatos(){

var datosDisponibles=document.getElementById('carrito-lista');

datosDisponibles.innerHTML='';
var subtotal = 0;
var numeroItems = 0;
for(let i = 0; i < sessionStorage.length; i++){
  var key = sessionStorage.key(i);
  const value = JSON.parse(sessionStorage.getItem(key));
  console.log(key, value);
  console.log(value.id);
  subtotal = parseFloat(subtotal) + (parseFloat(value.precio) * parseFloat(value.cantidad));
  numeroItems = parseInt(numeroItems) + parseInt(value.cantidad);

  datosDisponibles.innerHTML += '<div class="offcanvas-cart-item-single margintop-25">'+
      '<div class="offcanvas-cart-item-block row">'+
          '<div class="offcanvas-cart-item-image-link col-sm-4">'+
              '<img src="'+ value.img +'" alt="" class="offcanvas-cart-image">'+
          '</div>'+
          '<div class="offcanvas-cart-item-content col-sm-5">'+
              '<span class="offcanvas-cart-item-link">'+value.nombre+'</span>'+
          '</div>'+
          '<div class="offcanvas-cart-item-delete col-sm-2">'+
          '<button class="btn btn-danger" onclick="deleteItem('+'\''+key+'\''+')"><i class="fa fa-minus-circle"></i></button>'+
      '</div>'+
      '</div>'+      
  '</div>';
}
$("#carrito-numero-elementos").html(numeroItems);

if(numeroItems > 0){
  $("#form-enviar-cotizacion").show();
}else{
  $("#form-enviar-cotizacion").hide();
}
}
function enviarPedido(){
  var nombre = $("#cotizacion-nombre").val();
  var numero = $("#cotizacion-telefono").val();
  var correo = $("#cotizacion-email").val();
  console.log(nombre);
  console.log(numero);
  console.log(correo);
  var data = {};
  for(var len = sessionStorage.length, i = 0; i < len; i++) {
      var key =  sessionStorage.key(i);
      data[key] = sessionStorage.getItem(key);
  }

  $.ajax({
    url: urlPedido,
    type: 'post',
    data: {
      datosPedido : JSON.parse(JSON.stringify(data)),
      nombre: nombre,
      numero: numero,
      correo: correo
    },
    error: function(data, msg, msg2){
      console.log('error');
      console.log(data);
      console.log(msg);
      console.log(msg2);
      $("#result-pedido").html("error");
      vaciarCarrito();
      mostrarDatos();
    },
    success: function(data){
      $("#result-pedido").html(data);
      console.log(data);
      vaciarCarrito();
      mostrarDatos();
    }
  });
}


