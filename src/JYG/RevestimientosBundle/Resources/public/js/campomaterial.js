$('#jyg_revestimientosbundle_material[tipo]').on('change', function (event) {

  if ($this.find('#jyg_revestimientosbundle_material_tipo').val() == 'Laja Natural') 
  { 
      $("#jyg_revestimientosbundle_material_tamano").removeAttr("disabled");
  
  }else{
      if ($this.find('#jyg_revestimientosbundle_material_tipo').val() == 'Laja Formateada'){

        $("#jyg_revestimientosbundle_material_formato").removeAttr("disabled");
      }else{

           $("#jyg_revestimientosbundle_material_unidad").removeAttr("disabled");
      }

  }
  
});