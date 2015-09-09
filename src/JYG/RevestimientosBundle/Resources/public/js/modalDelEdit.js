$('#delEditProducto').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var urlimagen = button.data('whatever') // Extract info from data-* attributes
  var modal = $(this)

  modal.find('.bodies').val(urlimagen)
  modal.find('.modal-content').css({'max-width':'400px','background-color':'white'})
  modal.find('.modal-dialog').css({'max-width':'400px','background-color':'white','padding':'10px','border-radius':'6px'})
});