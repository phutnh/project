languageDatatable = {
  "sProcessing":   "Đang xử lý...",
  "sLengthMenu":   "Đang hiển thị _MENU_ dòng",
  "sZeroRecords":  "Không tìm thấy dòng nào phù hợp",
  "sInfo":         "Đang hiển thị _START_ đến _END_ trong tổng số _TOTAL_ dòng",
  "sInfoEmpty":    "Đang hiển thị 0 đến 0 trong tổng số 0 dòng",
  "sInfoFiltered": "(tìm kiếm từ _MAX_ dòng)",
  "sInfoPostFix":  "",
  "sSearch":       "Tìm kiếm:",
  "sUrl":          "",
  "oPaginate": {
      "sFirst":    "Đầu",
      "sPrevious": "Trước",
      "sNext":     "Tiếp",
      "sLast":     "Cuối"
  }
};

$.extend(true, $.fn.dataTable.defaults, {
  language: languageDatatable,
  scrollX: true
});