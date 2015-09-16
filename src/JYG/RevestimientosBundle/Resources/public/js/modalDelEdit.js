$('#delEditProducto').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var urlimagen = button.data('whatever') // Extract info from data-* attributes
  var modal = $(this)

  modal.find('.bodies').val(urlimagen)
  modal.find('.modal-content').css({'max-width':'400px','background-color':'white'})
  modal.find('.modal-dialog').css({'max-width':'400px','background-color':'white','padding':'10px','border-radius':'6px'})
});

$('#ModalEliminar').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var urlimagen = button.data('id') // Extract info from data-* attributes
  var nombre_imagen = button.data('nombre')
  var modal = $(this)

  modal.find('.bodies a').attr("href", urlimagen)
  modal.find('#nombre_').text(nombre_imagen)
  modal.find('.modal-content').css({'max-width':'400px','background-color':'white'})
  modal.find('.modal-dialog').css({'max-width':'400px','background-color':'white','padding':'10px','border-radius':'6px'})
});

$('#Venta').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  //var urlimagen = button.data('whatever') // Extract info from data-* attributes
  var modal = $(this)
  //modal.find('.bodies').val(urlimagen)
  modal.find('.modal-content').css({'max-width':'500px','background-color':'white'})
  modal.find('.modal-dialog').css({'width':'500px','background-color':'white','padding':'10px','border-radius':'6px'})
});