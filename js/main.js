$('#form_news').submit(function() {
    let form = $('#form_news'),
        dataForm = form.serialize();
    $('*', form).removeClass('error');
    $('.invalid_data').empty();
    $.ajax({
        type: "POST",
        url: 'server.php',
        dataType: 'json',
        data: dataForm,
        success: function(responce) {
            for( key in responce ){
                $('[name="'+key+'"]', form).addClass('error');
                $('[name="'+key+'"]').siblings('.invalid_data').html( responce[key].join('<br>') );
            }
        }
    })
})
