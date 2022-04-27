

class Reports {

    addCustomer() {
        if ($('#add-customer-form')[0].checkValidity()) {

            $('#addCustomerBtn').val('Please Wait...');
    
            $.ajax({
                url: '../controllers/reportsPage.class.php',
                method: 'POST',
                data: $("#add-customer-form").serialize() + '&action=add_customer',
                success: function(result) {
                    $("#addCustomerBtn").val('Add Report');
                    $("#add-customer-form")[0].reset();
                    $("#addCustomerModal").modal('hide');
                    Swal.fire({
                        title: 'Report has been submitted successfully!',
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
            url: '../controllers/reportsPage.class.php',
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