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
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire("Deleted!", "Doctor has been deleted.", "success")
                                .then(() => {
                                    this.closest('tr').remove(); // Remove the row from the DOM
                                });
                        } else {
                            Swal.fire("Error!", data.error || "Something went wrong.", "error");
                        }
                    })
                    .catch(error => {
                        Swal.fire("Error!", "Request failed " + error, "error");
                    });
            }
        });
    });
});
