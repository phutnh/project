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
      "classes": "hide-spinbtns hide-dropdownbtn"
    }
  });

  webshims.polyfill('forms forms-ext');
});
// Custom choose file
function bs_input_file() {
  $(".input-file").before(
    function() {
      if ( ! $(this).prev().hasClass('input-ghost') ) {
        var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
        element.attr("name",$(this).attr("name"));
        element.attr("required",$(this).attr("required"));
        element.change(function(){
          element.next(element).find('input').val((element.val()).split('\\').pop());
        });
        $(this).find("button.btn-choose").click(function(){
          element.click();
        });
        $(this).find('input').css("cursor","pointer");
        $(this).find('input').mousedown(function() {
          $(this).parents('.input-file').prev().click();
          return false;
        });
        return element;
      }
    }
  );
}
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
$(function() {
  bs_input_file();
});