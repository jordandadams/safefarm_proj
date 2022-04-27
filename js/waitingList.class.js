

class WaitingList {

    addCustomer() {
        if ($('#add-customer-form')[0].checkValidity()) {

            $('#addCustomerBtn').val('Please Wait...');
    
            $.ajax({
                url: '../controllers/waitingListPage.class.php',
                method: 'POST',
                data: $("#add-customer-form").serialize() + '&action=add_customer',
                success: function(result) {
                    $("#addCustomerBtn").val('Add Customer');
                    $("#add-customer-form")[0].reset();
                    $("#addCustomerModal").modal('hide');
                    Swal.fire({
                        title: 'Customer has been added successfully!',
                        icon: 'success'
                    }).then(function() {
                        location.reload();
                    });
                }
            });
    
        }
    }

    displayAllCustomers() {
        $.ajax({
            url: '../controllers/waitingListPage.class.php',
            method: 'POST',
            data: {
                action: 'display_customers'
            },
            success: function(result) {
                $("#showCustomers").html(result);
            }
        })
    }
    
    

}