document.addEventListener("change", function(){
  var opcion = $('#jyg_revestimientosbundle_material_tipo').val();
  if(opcion == 'Laja Natural'){
    $(document).find('#jyg_revestimientosbundle_material_tamano').removeAttr('disabled')
    $(document).find('#jyg_revestimientosbundle_material_formato').attr('disabled','true')
  }
  if(opcion == 'Selecciona'){
    $(document).find('#jyg_revestimientosbundle_material_tamano').attr('disabled','true')
    $(document).find('#jyg_revestimientosbundle_material_unidad').attr('disabled','true')
    $(document).find('#jyg_revestimientosbundle_material_formato').attr('disabled','true')

  }
  if(opcion == 'Laja Formateada'){
    $(document).find('#jyg_revestimientosbundle_material_tamano').attr('disabled','true')
    $(document).find('#jyg_revestimientosbundle_material_formato').removeAttr('disabled')
    $(document).find('#jyg_revestimientosbundle_material_unidad').attr('disabled','true')
  }
  if(opcion == 'Quimicos'){
    $(document).find('#jyg_revestimientosbundle_material_formato').attr('disabled','true')
    $(document).find('#jyg_revestimientosbundle_material_tamano').attr('disabled','true')
    $(document).find('#jyg_revestimientosbundle_material_unidad').removeAttr('disabled')
  }
});