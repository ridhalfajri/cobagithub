$(document).on("click", "#btn-edit", function () {
  $(".modal-body #id_komoditi").val($(this).data("id"));
  $(".modal-body #nama_komoditi").val($(this).data("nama"));
  $(".modal-body #jumlah_komoditi").val($(this).data("jumlah"));
});
