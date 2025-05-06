// Admin - Doctor Deletion Alert
document.querySelectorAll(".delete_btn").forEach((button) => {
    button.addEventListener("click", function () {
        const ID = this.getAttribute("data-id"); //Get the dynamic id

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
        }).then((result) => {
            if (result.isConfirmed) {
                // Send delete request to PHP with the dynamic ID
                fetch("../views/partials/admin/delete_doctors.php", {
                    method: "POST",
                    headers: {
                        "Content-type": "application/x-www-form-urlencoded", //Data sent will look like this 'id=123&name=test'
                    },
                    body: "id=" + encodeURIComponent(ID),
                })
                    .then((response) => {
                        return response.json()
                    })
                    .then((data) => {
                        if (data.success) {
                            Swal.fire("Deleted!", "Doctor has been deleted.", "success").then(
                                () => {
                                    this.closest("tr").remove(); // Remove the row from the DOM
                                }
                            );
                        } else {
                            Swal.fire("Error!", data.error || "Something went wrong.", "error");
                        }
                    })
                    .catch((error) => {
                        Swal.fire("Error!", "Request failed " + error, "error");
                    });
            }
        });
    });
});

// Admin - Doctor Edit Modal
document.querySelectorAll(".edit_btn").forEach((button) => {
    button.addEventListener("click", function () {
        const modal = document.getElementById("update_modal");
        const id = this.getAttribute("data-id");

        // Fetch data
        fetch("../views/partials/admin/fetch_doctor.php", {
            method: "POST",
            headers: {
                "Content-type": "application/x-www-form-urlencoded",
            },
            body: "id=" + encodeURIComponent(id),
        })
        .then((response) => {
            return response.json();
        })
        .then((data) => {
            // Populate form fields
            document.getElementById("id").value = data.id;
            document.getElementById("first_name").value = data.first_name;
            document.getElementById("last_name").value = data.last_name;
            document.getElementById("email").value = data.email;
            document.getElementById("contact").value = data.contact;

            // Show modal
            modal.showModal();
        })
        .catch((error) => {
            console.log("An error occurred: ", error);
        });
    });
});

// Handle form submission 
document.getElementById('update_doctor_form').addEventListener('submit', function(e) {
    e.preventDefault();

    const modal = document.getElementById("update_modal");
    const form_data = new FormData(this);

    fetch('../views/partials/admin/update_doctor.php', {
        method: 'POST',
        body: form_data
    })
    .then((response) => {
        return response.json();
    })
    .then((result) => {
        // Close modal
        modal.close();

        if(result.success) {
            Swal.fire("Updated!", "Data has been updated", "success");
        } else {
            Swal.fire("Error!", result.error, "error");
        }
    })
    .catch((err) => {
        Swal.fire("Error!", "Could not fetch data" + err, "error");
    });
});