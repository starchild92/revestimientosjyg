$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var urlimagen = button.data('whatever') // Extract info from data-* attributes
  var nombre = button.data('nombre')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.bodies img').attr("src", urlimagen)
  modal.find('#label').text(nombre)
  modal.find('.modal-content').css({'max-width':'700px'})
  modal.find('.modal-dialog').css({'max-width':'700px'})
});