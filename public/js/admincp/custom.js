
$(function() {
    "use strict";
    //Side bar
     var url = window.location + "";
        var path = url.replace(window.location.protocol + "//" + window.location.host + "/", "");
        var element = $('ul#sidebarnav a').filter(function() {
            return this.href === url || this.href === path;// || url.href.indexOf(this.href) === 0;
        });
        element.parentsUntil(".sidebar-nav").each(function (index)
        {
            if($(this).is("li") && $(this).children("a").length !== 0)
            {
                $(this).children("a").addClass("active");
                $(this).parent("ul#sidebarnav").length === 0
                    ? $(this).addClass("active")
                    : $(this).addClass("selected");
            }
            else if(!$(this).is("ul") && $(this).children("a").length === 0)
            {
                $(this).addClass("selected");
                
            }
            else if($(this).is("ul")){
                $(this).addClass('in');
            }
            
        });

    element.addClass("active"); 
    $('#sidebarnav a').on('click', function (e) {
        
            if (!$(this).hasClass("active")) {
                // hide any open menus and remove all other classes
                $("ul", $(this).parents("ul:first")).removeClass("in");
                $("a", $(this).parents("ul:first")).removeClass("active");
                
                // open our new menu and add the open class
                $(this).next("ul").addClass("in");
                $(this).addClass("active");
                
            }
            else if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $(this).parents("ul:first").removeClass("active");
                $(this).next("ul").removeClass("in");
            }
    })
    $('#sidebarnav >li >a.has-arrow').on('click', function (e) {
        e.preventDefault();
    });

    // Custom
    $(".preloader").fadeOut();
    // ============================================================== 
    // Theme options
    // ==============================================================     
    // ============================================================== 
    // sidebar-hover
    // ==============================================================

    $(".left-sidebar").hover(
        function() {
            $(".navbar-header").addClass("expand-logo");
        },
        function() {
            $(".navbar-header").removeClass("expand-logo");
        }
    );
    // this is for close icon when navigation open in mobile view
    $(".nav-toggler").on('click', function() {
        $("#main-wrapper").toggleClass("show-sidebar");
        $(".nav-toggler i").toggleClass("ti-menu");
    });
    $(".nav-lock").on('click', function() {
        $("body").toggleClass("lock-nav");
        $(".nav-lock i").toggleClass("mdi-toggle-switch-off");
        $("body, .page-wrapper").trigger("resize");
    });
    $(".search-box a, .search-box .app-search .srh-btn").on('click', function() {
        $(".app-search").toggle(200);
        $(".app-search input").focus();
    });

    // ============================================================== 
    // Right sidebar options
    // ==============================================================
    $(function() {
        $(".service-panel-toggle").on('click', function() {
            $(".customizer").toggleClass('show-service-panel');

        });
        $('.page-wrapper').on('click', function() {
            $(".customizer").removeClass('show-service-panel');
        });
    });
    // ============================================================== 
    // This is for the floating labels
    // ============================================================== 
    $('.floating-labels .form-control').on('focus blur', function(e) {
        $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');

    // ============================================================== 
    //tooltip
    // ============================================================== 
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
    // ============================================================== 
    //Popover
    // ============================================================== 
    $(function() {
        $('[data-toggle="popover"]').popover()
    })

    // ============================================================== 
    // Perfact scrollbar
    // ============================================================== 
    $('.message-center, .customizer-body, .scrollable').perfectScrollbar({
        wheelPropagation: !0
    });

    /*var ps = new PerfectScrollbar('.message-body');
    var ps = new PerfectScrollbar('.notifications');
    var ps = new PerfectScrollbar('.scroll-sidebar');
    var ps = new PerfectScrollbar('.customizer-body');*/

    // ============================================================== 
    // Resize all elements
    // ============================================================== 
    $("body, .page-wrapper").trigger("resize");
    $(".page-wrapper").show();
    // ============================================================== 
    // To do list
    // ============================================================== 
    $(".list-task li label").click(function() {
        $(this).toggleClass("task-done");
    });

    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //**************************** 
    var setsidebartype = function() {
        var width = (window.innerWidth > 0) ? window.innerWidth : this.screen.width;
        if (width < 1170) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);
    //****************************
    /* This is for sidebartoggler*/
    //****************************
    $('.sidebartoggler').on("click", function() {
        $("#main-wrapper").toggleClass("mini-sidebar");
        if ($("#main-wrapper").hasClass("mini-sidebar")) {
            $(".sidebartoggler").prop("checked", !0);
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $(".sidebartoggler").prop("checked", !1);
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    });

    $(".select2").select2();

    $('.datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true,
        format: 'dd-mm-yyyy',
    });

    $("input").attr("autocomplete", "off");

});

$(function() {
    $('#ckb-select-all').multicheck($('.listCheckbox'));
});

( function( $ ) {

    $.fn.multicheck = function( $checkboxes ) {
        $checkboxes = $checkboxes.filter( 'input[type=checkbox]' );
        if( $checkboxes.length > 0 ) {
            this.each( function() {
                var $this = $( this );
                $this.click( function() {
                    $checkboxes.prop( 'checked', this.checked );
                    $this.trigger( this.checked ? 'multicheck.allchecked' : 'multicheck.nonechecked' );
                });
                $checkboxes.on( 'click change', function() {
                    var checkedItems = $checkboxes.filter( ':checked' ).length;
                    if( checkedItems == 0 ) {
                        $this[ 0 ].indeterminate = false;
                        $this[ 0 ].checked = false;
                        $this.trigger( 'multicheck.nonechecked' );
                    } else if( checkedItems == $checkboxes.length ) {
                        $this[ 0 ].indeterminate = false;
                        $this[ 0 ].checked = true;
                        $this.trigger( 'multicheck.allchecked' );
                    } else {
                        $this[ 0 ].checked = false;
                        $this[ 0 ].indeterminate = true;
                        $this.trigger( 'multicheck.somechecked' );
                    }
                });
            });
        }
        return this;
    };

})( jQuery );

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

function addCommas(nStr)
{
   nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

function ValueCharjs(value, metadata){
    this.value= value;
    this.metadata = metadata;
}
ValueCharjs.prototype.toString = function(){
    return this.value;
}

function printContent(el){
  if (!confirm('Bạn có chắc muốn in không ?'))
    return false;
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
  return true;
}

$('#markAsRead').click(function() {
    var url = $(this).data('href');
    $.post(url, {
        '_token': $('meta[name="csrf-token"]').attr('content')
    }).done(function(data) {
        $('#div_notifications').html('');
        $('.notification_count').attr('data-count', 0);
        $('.notification_count').text('0');
    });
})