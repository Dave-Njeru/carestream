$(document).ready(function () {
  //fetch all doctors
  $("#view_all_doctors").click(function () {
    fetch("../views/partials/admin/view_all_doctors.php")
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        $("#update_content").html(data);
        $("#view_doctors_table").DataTable({
          //add more functionalities here
        });
      })
      .catch((err) => {
        console.log(err);
      });
  });

  // register doctor
  $("#register_doctor").click(function () {
    fetch("../views/partials/admin/register_doctors.php")
      .then((response) => {
        return response.text();
      })
      .then((data) => {
        $("#update_content").html(data);
      })
      .catch((err) => {
        console.log(err);
      });
  });
});
