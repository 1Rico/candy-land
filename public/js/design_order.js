<script>
var user_id = {{$user->id}};

$('#next').click(function () {
    $('#page1').hide();
    $('#page2').fadeIn();
});
$('#previous').click(function () {
    $('#page2').hide();
    $('#page1').fadeIn();
});

$('#orderModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var design_id = button.data('design_id');// Extract info from data-* attributes
    var amount = button.data('amount');
    var discount_amount = button.data('discount_amount');
    var description = button.data('description');
    var tailor_id = button.data('tailor_id');
    var tailor_name = button.data('tailor_name');
    var delivery_address = button.data('delivery_address');
    var completion_date = button.data('completion_date');

    var order_data = {
        'design_id' : design_id,
        'user_id' : user_id,
        'tailor_id' : tailor_id,
        'amount': amount,
        'completion_date' : completion_date,
        'delivery_address' : delivery_address
    };

    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('#name').text(name);
    modal.find('#tailor_name').text('By: '+ tailor_name);
    modal.find('#description').text(description);
    modal.find('#amount').text('Price: NGN'+ amount);
    modal.find('#discount_amount').text(discount_amount);
    modal.find('#data').val(JSON.stringify(order_data));
})
</script>