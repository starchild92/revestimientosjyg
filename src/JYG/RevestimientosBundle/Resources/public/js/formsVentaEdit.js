jQuery(document).ready(function (){
    //Usado en la vista de la venta para deshabilitar varios campos
    /*$(document).find('#jyg_revestimientosbundle_venta_fecha_date_day').after("<br><label class='label-control'>Hora</label><br>");
    $('*[id^="jyg_revestimientosbundle_venta_fecha_"]').attr('readonly','true')*/

    //Usado en la vista de item para poner el item en el atributo del articulo
    /*$(document).find("#jyg_revestimientosbundle_item_numeroVenta").attr('readonly','true')
    $(document).find("#jyg_revestimientosbundle_item_numeroVenta").val(
        $(document).find("#id_venta").val()
    );*/

    $(document).find('#jyg_revestimientosbundle_venta_comprador_rif').attr('readonly','true');
    $(document).find('#jyg_revestimientosbundle_venta_comprador_nombre').attr('readonly','true');
    $(document).find('#jyg_revestimientosbundle_venta_comprador_direccion').attr('readonly','true');
    $(document).find('#jyg_revestimientosbundle_venta_comprador_telefono').attr('readonly','true');
    document.getElementById('jyg_revestimientosbundle_venta_fecha_date_year').disabled = true;
    document.getElementById('jyg_revestimientosbundle_venta_fecha_date_month').disabled = true;
    document.getElementById('jyg_revestimientosbundle_venta_fecha_date_day').disabled = true;
    document.getElementById('jyg_revestimientosbundle_venta_fecha_time_hour').disabled = true;
    document.getElementById('jyg_revestimientosbundle_venta_fecha_time_minute').disabled = true;
});

var $collectionHolder;
var $cantHijos;
// setup an "add a tag" link
var $addTagLink = $('<button style="margin-top: 10px;" class="btn btn-success btn-sm btn-block" type="button" href="#" class="add_tag_link">Añadir Nuevo Producto</button>');
var $newLinkLi = $('<div></div>').append($addTagLink);

jQuery(document).ready(function() {
    // Get the ul that holds the collection of tags
    $collectionHolder = $('div.tags');

    //Para en el editar quitar un almacen
    $collectionHolder.children().append(
        '<a href="#" class="remove-tag btn btn-danger btn-sm btn-block">Quitar Producto</a>');

    $remover = $collectionHolder.find('.remove-tag');
    $cantHijos = $remover.length;

    //Para quitar el primer label 0 ese ladilloso y el label 1 cuando hay dos almacenes agregados
    $collectionHolder.find('.control-label').first().remove();
    if ($cantHijos > 1) {
        $hijos = $collectionHolder.find('.control-label');
        $hijos.get(2).remove();
    };

    $remover.click(function(e) {
        e.preventDefault();
        $(this).parent().remove();
        if($cantHijos > 0){ $cantHijos--; }

        return false;
    });
    // add the "add a tag" anchor and li to the tags ul
    $collectionHolder.append($newLinkLi);

    // count the current form inputs we have (e.g. 2), use that as the new
    // index when inserting a new item (e.g. 2)
    $collectionHolder.data('index', $collectionHolder.find(':input').length);

    $addTagLink.on('click', function(e) {
        // prevent the link from creating a "#" on the URL
        e.preventDefault();
        // add a new tag form (see next code block)
        //Es la cantidad maxima de items que podrá agregar a la venta
        if($cantHijos < 100){ addTagForm($collectionHolder, $newLinkLi); $cantHijos++; }
    });
});
function addTagForm($collectionHolder, $newLinkLi) {
    // Get the data-prototype explained earlier
    var prototype = $collectionHolder.data('prototype');

    // get the new index
    var index = $collectionHolder.data('index');

    // Replace '__name__' in the prototype's HTML to
    // instead be a number based on how many items we have
    var newForm = prototype.replace(/__name__/g, index);

    // increase the index with one for the next item
    $collectionHolder.data('index', index + 1);

    // Display the form in the page in an li, before the "Add a tag" link li
    var $newFormLi = $('<div></div>').append(newForm);
    //Quita los #label_ de los nuevos almacenes
    $newFormLi.find('.control-label').first().remove();
    //$newLinkLi.before($newFormLi);

    // also add a remove button, just for this example
    $newFormLi.append('<a href="#" class="remove-tag btn btn-danger btn-sm btn-block">Quitar Producto</a><hr class="featurette-divider">');
    
    $newLinkLi.before($newFormLi);
    
    // handle the removal, just for this example
    $('.remove-tag').click(function(e) {
        e.preventDefault();
        if($cantHijos > 0){ $cantHijos--; }
        $(this).parent().remove();
        return false;
    });
}