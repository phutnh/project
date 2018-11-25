// Replace UI form
$(function() {
  webshim.activeLang('vi');

  webshim.setOptions("forms", {
    "lazyCustomMessages": true,
    "replaceValidationUI": true,
    "addValidators": true,
    iVal: {
      sel: '.ws-validate',
      handleBubble: 'hide', // hide error bubble
      fx: "slide",
      //add bootstrap specific classes
      errorMessageClass: 'help-block',
      successWrapperClass: 'has-success',
      errorWrapperClass: 'has-error',

      //add config to find right wrapper
      fieldWrapper: '.form-group'
    }
  });

  webshim.setOptions("forms-ext", {
    "replaceUI": true,
    "widgets": {
      "openOnFocus": true,
      "classes": "hide-spinbtns"
    }
  });

  webshims.polyfill('forms forms-ext');
});

// Fast click
window.addEventListener('load', function() {
  new FastClick(document.body);
}, false);
// Ajax function
function loadAjaxLink(link, className = 'ajax-content') {
  $.ajax({
    url: link,
    success: function (result) {
      $('.'+className).html(result);
      $('.'+className).htmlPolyfill(result);
      $('.select2').select2({});
    },
    error: function() {
      alert('Lỗi thực hiện vui lòng truy cập lại sau');
    }
  });
}
// Select 2
$('.select2').select2({});
// Ajax load page
$(document).ajaxStart(function () {
  Pace.restart();
});
// Ajax click event
$('.load-page').click(function (e) {
  e.preventDefault();
  var link = $(this).data('link');
  loadAjaxLink(link);
});

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

// Load home page
loadAjaxLink('table');