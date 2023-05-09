$(function () {
    var order_modal = $('#order')
    var order_form = $('.order-form')
    var product_form = $('.product-form')
    product_form.submit(function (e) {
        e.preventDefault()
        var product_block = $(this).parents('.product')
        var product_id = $(this).find('[name="product_id"]').val()
        var product_name = product_block.find('.title').text()
        order_modal.find('.title').text(product_name)
        order_form.find('[name="product_count"]').val(1)
        order_form.find('[name="product_id"]').val(product_id)
        $.fancybox.open(order_modal)
    })

    order_form.submit(function (e) {
        e.preventDefault()
        $.ajax({
            url: '/form_handler.php',
            type: 'POST',
            dataType: 'json',
            data: {
                product_id: order_form.find('[name="product_id"]').val(),
                product_count: order_form.find('[name="product_count"]').val(),
                phone: order_form.find('[name="phone"]').val(),
            }
        }).done(function (data) {
            if (data) {
                if (data.error) {
                    alert(data.error)
                } else {
                    alert('Order successfully created')
                    $.fancybox.close()
                    order_form[0].reset()
                }
            } else {
                alert('Unexpected error occur... try again')
            }
        })
    })
})
