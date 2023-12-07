function validateForm() {
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if (username === '' || email === '' || password === '' || confirm_password === '') {
        alert("All fields must be filled.");
        return false;
    }
}

document.addEventListener('DOMContentLoaded', function () {

    // For select values in customerlistPage
    var branchSelect = document.getElementById('branch');
    var buyedcarSelect = document.getElementById('buyedcar');

    branchSelect.addEventListener('change', function () {
        var branch = this.value;
        var formData = new FormData();
        formData.append('branch', branch);

        fetch('carslist.php', {
            method: 'POST',
            body: formData,
        })
            .then(response => response.text())
            .then(data => {
                buyedcarSelect.innerHTML = data;
            });
    });
});

$(document).ready(function () {
    $('.delete_customer').on('click', function (event) {
        var confirmation = confirm('Delete this customer?');

        if (confirmation) {
            var customerID = $(this).data('customerid');

            // Make an Ajax request to delete the customer
            $.ajax({
                type: 'POST',
                url: 'deleteCustomer.php',
                data: { customerID: customerID },
                success: function (response) {
                    alert(response);
                    location.reload();
                }
            });
        } else {
            event.preventDefault();
        }
    });
});

$(document).ready(function () {
    $('.delete_car').on('click', function (event) {
        event.preventDefault();
        var confirmation = confirm('Delete this car?');

        if (confirmation) {
            var carID = $(this).data('carid');

            $.ajax({
                type: 'POST',
                url: 'deleteCar.php',
                data: { carID: carID },
                success: function (response) {
                    alert(response);
                    location.reload();
                }
            });
        }
    });
});

$(document).ready(function () {
    $('.delete_branch').on('click', function (event) {
        event.preventDefault();
        var branchID = $(this).data('branchid');
        var branchName = $(this).data('branchname');

        var confirmation = confirm('Delete this branch?');

        if (confirmation) {
            $.ajax({
                type: 'POST',
                url: 'deleteBranch.php',
                data: {
                    branchID: branchID,
                    branchName: branchName
                },
                success: function (response) {
                    alert(response);
                    location.reload();
                }
            });
        }
    });
});

document.getElementById("delete_customer").addEventListener('submit', function() {
    confirm("Do you really want to delete this?");
});

function validateForm() {
    var branchSelect = document.getElementById("branch");
    var selectedBranch = branchSelect.value;
    var carSelect = document.getElementById("buyedcar");
    var selectedCar = carSelect.value;

    if (selectedBranch === "" || selectedCar === "Choose Car") {
        alert("Please select a branch and a car before submitting the form.");
        return false; // Prevent form submission
    }
    return true; // Allow form submission
}

function limitInputLength(input, maxLength) {
    if (input.value.length > maxLength) {
        input.value = input.value.slice(0, maxLength); // Truncate the input to the desired length
    }
}

// To logout ques
function logout(){
    if(confirm("Are you sure you want to logout?")){
        window.location.href = "loginPage.php"
    }
}