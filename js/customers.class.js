

class Customers {

    addCustomer() {
        if ($('#add-customer-form')[0].checkValidity()) {

            $('#addCustomerBtn').val('Please Wait...');
    
            $.ajax({
                url: '../controllers/customersPage.class.php',
                method: 'POST',
                data: $("#add-customer-form").serialize() + '&action=add_customer',
                success: function(result) {
                    console.log(result);
                    $('#addCustomerBtn').val('Please Wait...');
                }
            })
    
        }
    }

}