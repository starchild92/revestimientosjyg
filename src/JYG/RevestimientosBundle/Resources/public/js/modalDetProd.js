$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget)
  var urlimagen = button.data('whatever')
  var nombre = button.data('nombre')
  var modal = $(this)
  modal.find('.bodies #img').replaceWith(urlimagen)
  $(document).find('.atlast').css('background-size','100% 100%');
  modal.find('#label').text(nombre)
});
