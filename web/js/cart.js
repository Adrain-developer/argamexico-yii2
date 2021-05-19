mostrarDatos();
function addProducto(id){
var nombre = $('#nombre'+id).text();
var precio = $('#precio'+id).text();
var img = $('#img'+id).attr('src');
var cantidad = $('#cantidad'+id).val();
var medidaId = $('#medida'+id).val();
var medida = $('#medida'+id).text();
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
    title: 'El producto se ha añadido al carrito exitosamente',
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

var datosDisponibles=document.getElementById('offcanvas-add-cart-wrapper');

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

  datosDisponibles.innerHTML += '<li class="offcanvas-cart-item-single">'+
      '<div class="offcanvas-cart-item-block">'+
          '<a href="" class="offcanvas-cart-item-image-link">'+
              '<img src="'+ value.img +'" alt="" class="offcanvas-cart-image">'+
          '</a>'+
          '<div class="offcanvas-cart-item-content">'+
              '<a href="" class="offcanvas-cart-item-link">'+value.nombre+'</a>'+
              '<div class="offcanvas-cart-item-details">'+
                  '<span class="offcanvas-cart-item-details-quantity">'+value.cantidad+' x </span>'+
                  '<span class="offcanvas-cart-item-details-price">$'+value.precio+'</span>'+
                  '-  <span class="offcanvas-cart-item-details-medida">'+value.medida+'</span>'+
              '</div>'+
          '</div>'+
      '</div>'+
      '<div class="offcanvas-cart-item-delete text-right">'+
          '<a href="#" class="offcanvas-cart-item-delete" onclick="deleteItem('+'\''+key+'\''+')"><i class="fa fa-trash-o"></i></a>'+
      '</div>'+
  '</li>';
}
$("#subtotal-carrito").text(subtotal);
$(".header-action-icon-item-count").html(numeroItems);
}
function enviarPedido(){
  var nombre = $("#pedido-nombre").val();
  var numero = $("#pedido-numero").val();
  var correo = $("#pedido-correo").val();
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
    type: 'get',
    data: {
      datosPedido : JSON.parse(JSON.stringify(data)),
      nombre: nombre,
      numero: numero,
      correo: correo
    },
    error: function(data){
      console.log('error');
      console.log(data);
      $("#result-pedido").html("error");
      vaciarCarrito();
      mostrarDatos();
    },
    success: function(data){
      $("#result-pedido").html(data);
      vaciarCarrito();
      mostrarDatos();
    }
  });
}
