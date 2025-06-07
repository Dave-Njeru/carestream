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

// Handle form submission to update doctor's info
const update_doctor_form = document.getElementById('update-doctor-form');
if (update_doctor_form) {
    update_doctor_form.addEventListener('submit', function (e) {
        e.preventDefault();

        const modal = document.getElementById("update_modal");
        const form_data = new FormData(this);
        const id = form_data.get('id');

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

                if (result.success) {
                    Swal.fire("Updated!", "Data has been updated", "success");

                    // Find the row by data-id
                    const row = document.querySelector(`tr[data-id="${id}"]`); // JS Template literals
                    if (row) {
                        row.querySelector('.first-name').textContent = form_data.get('first_name');
                        row.querySelector('.last-name').textContent = form_data.get('last_name');
                        row.querySelector('.email').textContent = form_data.get('email');
                        row.querySelector('.contact').textContent = form_data.get('contact');
                    }
                } else {
                    Swal.fire("Error!", result.error, "error");
                }
            })
            .catch((err) => {
                Swal.fire("Error!", "Could not fetch data" + err, "error");
            });
    })
}

// Handle form submission to verify TOTP code
const verify_totp_code_form = document.getElementById('verify-totp-code');
if (verify_totp_code_form) {
    verify_totp_code_form.addEventListener('submit', function (e) {
        e.preventDefault();

        const code = document.getElementById('code').value;

        fetch('../public/views/verify_2fa.php', {
            method: 'POST',
            headers: {
                "Content-type": "application/x-www-form-urlencoded"
            },
            body: "code=" + encodeURIComponent(code)
        })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    window.location.href = "/projects/carestream/public/patient";
                }
                else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: result.message,
                    });
                }
            })
            .catch(error => {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong! " + error,
                });
            });
    });
}
