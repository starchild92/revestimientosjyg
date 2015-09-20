/*Modal del Edit Material*/
$('#delEditProducto').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var urlimagen = button.data('whatever') // Extract info from data-* attributes
  var modal = $(this)

  modal.find('.bodies').val(urlimagen)
  modal.find('.modal-content').css({'max-width':'400px','background-color':'white','border': 'dashed 1px red', 'padding': '5px'})
  modal.find('.modal-dialog').css({'max-width':'400px','background-color':'white','padding':'10px','border-radius':'4px'})
});

/*Modal de la Galeria 'AdministrarGaleria.html.twig' */
$('#ModalEliminar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var urlimagen = button.data('id') // Extract info from data-* attributes
  var nombre_imagen = button.data('nombre')
  var modal = $(this)

  modal.find('.bodies a').attr("href", urlimagen)
  modal.find('#nombre_').text(nombre_imagen)
  modal.find('.modal-content').css({'max-width':'400px','background-color':'white','border': 'dashed 1px red', 'padding': '5px'})
  modal.find('.modal-dialog').css({'max-width':'400px','background-color':'white','padding':'10px','border-radius':'4px'})
});

/*Modal*/
$('#ModalEliminarVenta').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var id_venta = button.data('nombre') // Extract info from data-* attributes
  var nombre_cliente = button.data('cliente')
  var modal = $(this)

  //modal.find('.bodies a').attr("href", id_venta)
  modal.find('#nombre_').text(id_venta)
  modal.find('#nombre_cliente').text(nombre_cliente)
  modal.find('.modal-content').css({'max-width':'400px','background-color':'white','border': 'dashed 1px red', 'padding': '5px'})
  modal.find('.modal-dialog').css({'max-width':'400px','background-color':'white','padding':'10px','border-radius':'4px'})
});

/*Modal eliminar Cliente*/
$('#delElimCliente').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var urlimagen = button.data('id') // Extract info from data-* attributes
  var nombre_imagen = button.data('nombre')
  var modal = $(this)

  modal.find('.bodies a').attr("href", urlimagen)
  modal.find('#nombre_').text(nombre_imagen)
  modal.find('.modal-content').css({'max-width':'400px','background-color':'white','border': 'dashed 1px red', 'padding': '5px'})
  modal.find('.modal-dialog').css({'max-width':'400px','background-color':'white','padding':'10px','border-radius':'6px'})
>>>>>>> 2ece51db7aa9827a078485391f90a313b4705987
});