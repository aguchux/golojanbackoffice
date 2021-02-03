
///////////////////////////////////////////////////////////////////////////
// Loader
$(document).ready(function () {
    setTimeout(() => {
        $("#loader").fadeToggle(250);
    }, 800); // hide delay when page load
});
///////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////
// Go Back
$(".goBack").click(function (e) {
    e.preventDefault ? e.preventDefault() : e.returnValue = false;
    window.history.go(-1);
});
///////////////////////////////////////////////////////////////////////////
/*
$(function () {

    $('button.ajax').on("click", function (e) {
        if ( $(this).hasClass('ajax') ) {
            e.preventDefault();
            var _fom = $(this).closest("form");
            var _url =_fom.attr('action');
            $.ajax(_url, {
                type: 'post',
                data: _fom.serialize(),
                contentType: false,
                processData: false,
                async: true,
                success: function (data, status, xhr) {
                    var jData = JSON.parse(data);
                    alert(jData.status);
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    alert(jData.errorMessage);
                }
            });
        }
    });

});
*/


$(function () {

    /*
        $('#xSearchTransactions').on("input", function (e) {
    
            var val_in = this.value;
            var key_in = e.which;
    
            if (val_in == '') {
                e.preventDefault();
                return false;
            }
            if (key_in == 13) {
                e.preventDefault();
                return false;
            }
    
            // Declare variables
            var input, filter, transactions, item, detail, i, txtValue;
            input = val_in;
            filter = input.toUpperCase();
    
            transactions = document.getElementById("transactions");
            item = transactions.getElementsByClassName('item');
    
            // Loop through all list items, and hide those who don't match the search query
            for (i = 0; i < item.length; i++) {
                detail = item[i].getElementsByClassName("detail")[0];
                txtValue = detail.textContent || detail.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    item[i].style.display = "";
                } else {
                    item[i].style.display = "none";
                }
            }
    
        });
    
        */

    $('#accountnumber').on("input", function (e) {
        var txt = $(this).val();
        if (txt == "") {
            $("#ShowAccountNumber").html("enter account number above");
            return false;
        }
        $("#ShowAccountNumber").html(txt);
    });

    $('.xAjaxCheckBank').on("change", function (e) {
        e.preventDefault();

        var accountnumber = $("#accountnumber").val();
        var bankcode = $(this).val();

        var fd = new FormData;

        fd.append('accountnumber', accountnumber);
        fd.append('bankcode', bankcode);

        var _fom = $(this).closest("form");
        var _url = _fom.attr('action');
        $.ajax("/bakers/getinfo", {
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            async: true,
            success: function (data, status, xhr) {
                var jData = JSON.parse(data);
                //alert (jData.data.account_number);
                if (parseInt(jData.status)) {
                    $("#ShowAccountNumber").html(jData.data.account_number);
                    $("#ShowAccountName").html(jData.data.account_name);
                } else {
                    $("#ShowAccountNumber").html("enter account number above");
                    $("#ShowAccountName").html("no matching account");
                }
            },
            error: function (jqXhr, textStatus, errorMessage) {
                //alert(errorMessage);
            }
        });

    });

});

$(function () {
    $('#FormAddUser111').submit(function (e) {
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
        var ResultBox = $("#ModalResult");
        var _url = $(this).attr('action');

        var fullname = $(this).find("#fullname").val();
        var email = $(this).find("#email").val();
        var mobile = $(this).find("#mobile").val();
        var level = $(this).find("#level").val();

        var fd = new FormData;

        fd.append('fullname', fullname);
        fd.append('email', email);
        fd.append('mobile', mobile);
        fd.append('level', level);

        // var _data = $(this).serialize();
        $.ajax(_url, {
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            async: true,
            success: function (data, status, xhr) {
                var jData = JSON.parse(data);
                alert(jData.status);
            },
            error: function (jqXhr, textStatus, errorMessage) {
                alert(jData.errorMessage);
            }

        });

    });

});


$(function () {
    $('table').DataTable();
});


$(function () {
    $('.DoSettings').each(function (i, el) {
        var el = $(this);
        $(this).attr("tabindex", i);
        el.on('change', function (e) {
            var elVal = el.val();
        })
    });
});

$(function () {
    $('#MagicUploaderBtn').click(function (e) {
        $('#MagicUploader').trigger("click");
    });
});

$(function () {
    $('#MagicUploader').on("change", function (e) {
        alert('uploaded');
    });
});

$(function () {
    $('#LoadCategories').on("change", function (e) {
        var el = $(this);
        var elVal = el.val();
        if(elVal==0){
            window.location.href = "/dashboard/marketplace";   
        }
        if(elVal>=1){
            window.location.href = "/dashboard/category/" + elVal + "/marketplace";
        }
    });
});



$(function () {
    $('.xNotix').each(function (i, el) {
        var el = $(this);
        $(this).attr("tabindex", i);
        el.on('click', function (e) {
            var elVal = el.val();
            var _id = el.attr("id");
            $.ajax("/ajax/settings/" + _id, {
                type: 'post',
                data: { _id: elVal },
                contentType: false,
                processData: false,
                async: true,
                success: function (data, status, xhr) {
                    Toast('errorToast');
                },
                error: function (jqXhr, textStatus, errorMessage) {
                }
            });
        })
    });
});


$(function () {
    $('.AddToWarehouseBtn').each(function (i, el) {
        var el = $(this);
        $(this).attr("tabindex", i);
        el.on('click', function (e) {
            var elVal = el.val();
            var _id = el.attr("id");
            $.ajax("/ajax/stores/" + _id + "/addproduct", {
                type: 'post',
                data: { _id: elVal },
                contentType: false,
                processData: false,
                async: true,
                success: function (data, status, xhr) {
                    let fData = JSON.parse(data);
                    if( parseInt(fData.done) ){
                        $("#xStoreTotal").html(fData.capacity);
                        $("#xStoreCount").html(fData.count);
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                }
            });
        })
    });
});


$(function () {
    $('.xMonitoredInput').each(function (i, el) {
        var el = $(this);
        $(this).attr("tabindex", i);
        el.on('blur', function (e) {
            var elVal = el.val();
            var _id = el.attr("id");
            $.ajax("https://litimus.com/ajax/exists/" + _id + "/", {
                type: 'post',
                data: "?value=" + elVal,
                contentType: false,
                processData: false,
                async: true,
                success: function (data, status, xhr) {
                },
                error: function (jqXhr, textStatus, errorMessage) {
                }

            });
        })
    });
});




$(function () {
    $('a[href="#"]').click(function (e) {
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
    });
    $('.stoper').click(function (e) {
        e.preventDefault ? e.preventDefault() : e.returnValue = false;
    });
});

$(function () {

    $.extend({
        uiLock: function (content) {
            if (content == 'undefined') content = '';
            $('&lt;div&gt;&lt;/div&gt;').attr('id', 'uiLockId').css({
                'position': 'absolute',
                'top': 0,
                'left': 0,
                'z-index': 1000,
                'opacity': 0.6,
                'width': '100%',
                'height': '100%',
                'color': 'white',
                'background-color': 'black'
            }).html(content).appendTo('body');
        },
        uiUnlock: function () {
            $('#uiLockId').remove();
        }
    });

    var check_connectivity = {
        is_internet_connected: function () {
            return $.get({
                url: "/device/connection",
                dataType: 'text',
                cache: false
            });
        },
    };

    var myVar = setInterval(() => {
        check_connectivity.is_internet_connected().done(function () {
            if ($(".GOLOJAN_device_status").hasClass('text-muted')) {
                $(".GOLOJAN_device_status").removeClass('text-muted');
            }
            if ($(".GOLOJAN_device_status").hasClass('text-danger')) {
                $(".GOLOJAN_device_status").removeClass('text-danger');
            }
            $(".GOLOJAN_device_status").addClass('text-success');
            $(".GOLOJAN_device_status").find('img').attr("src", "/templates/assets/img/online.png");
            $(".GOLOJAN_device_status").find('span').html("Device is Connected!")
            $.uiUnlock('');
        }).fail(function (jqXHR, textStatus, textStatus) {
            if ($(".GOLOJAN_device_status").hasClass('text-muted')) {
                $(".GOLOJAN_device_status").removeClass('text-muted');
            }
            if ($(".GOLOJAN_device_status").hasClass('text-success')) {
                $(".GOLOJAN_device_status").removeClass('text-success');
            }
            $(".GOLOJAN_device_status").addClass('text-danger');
            $(".GOLOJAN_device_status").find('img').attr("src", "/templates/assets/img/offline.png");
            $(".GOLOJAN_device_status").find('span').html("Connect Device")
            $.uiLock('');
        });
    }, 500);

})(jQuery);




///////////////////////////////////////////////////////////////////////////
// Tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})
///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
// Input
$(".clear-input").click(function () {
    $(this).parent(".input-wrapper").find(".form-control").focus();
    $(this).parent(".input-wrapper").find(".form-control").val("");
    $(this).parent(".input-wrapper").removeClass("not-empty");
});
// active
$(".form-group .form-control").focus(function () {
    $(this).parent(".input-wrapper").addClass("active");
}).blur(function () {
    $(this).parent(".input-wrapper").removeClass("active");
})
// empty check
$(".form-group .form-control").keyup(function () {
    var inputCheck = $(this).val().length;
    if (inputCheck > 0) {
        $(this).parent(".input-wrapper").addClass("not-empty");
    }
    else {
        $(this).parent(".input-wrapper").removeClass("not-empty");
    }
});
///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
// Searchbox Toggle
$(".toggle-searchbox").click(function () {
    $("#search").fadeToggle(200);
    $("#search .form-control").focus();
});
///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
// Owl Carousel
$('.carousel-full').owlCarousel({
    loop: true,
    margin: 8,
    nav: false,
    items: 1,
    dots: false,
});
$('.carousel-single').owlCarousel({
    stagePadding: 30,
    loop: true,
    margin: 16,
    nav: false,
    items: 1,
    dots: false,
});
$('.carousel-multiple').owlCarousel({
    stagePadding: 32,
    loop: true,
    margin: 16,
    nav: false,
    items: 2,
    dots: false,
});
$('.carousel-small').owlCarousel({
    stagePadding: 32,
    loop: true,
    margin: 8,
    nav: false,
    items: 4,
    dots: false,
});

$('.carousel-slider').owlCarousel({
    loop: true,
    margin: 8,
    nav: false,
    items: 1,
    dots: true,
});
///////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////
$('.custom-file-upload input[type="file"]').each(function () {
    // Refs
    var $fileUpload = $(this),
        $filelabel = $fileUpload.next('label'),
        $filelabelText = $filelabel.find('span'),
        filelabelDefault = $filelabelText.text();
    $fileUpload.on('change', function (event) {
        var name = $fileUpload.val().split('\\').pop(),
            tmppath = URL.createObjectURL(event.target.files[0]);
        if (name) {
            $filelabel
                .addClass('file-uploaded')
                .css('background-image', 'url(' + tmppath + ')');
            $filelabelText.text(name);
        } else {
            $filelabel.removeClass('file-uploaded');
            $filelabelText.text(filelabelDefault);
        }
    });
});
///////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////
// Notification
// trigger notification
function notification(target, time) {
    var a = "#" + target;
    $(".notification-box").removeClass("show");
    setTimeout(() => {
        $(a).addClass("show");
    }, 300);
    if (time) {
        time = time + 300;
        setTimeout(() => {
            $(".notification-box").removeClass("show");
        }, time);
    }
};
// close button notification
$(".notification-box .close-button").click(function (event) {
    event.preventDefault();
    $(".notification-box.show").removeClass("show");
});
// tap to close notification
$(".notification-box.tap-to-close .notification-dialog").click(function () {
    $(".notification-box.show").removeClass("show");
});
///////////////////////////////////////////////////////////////////////////


///////////////////////////////////////////////////////////////////////////
// Toast
// trigger toast
function toastbox(target, time) {
    var a = "#" + target;
    $(".toast-box").removeClass("show");
    setTimeout(() => {
        $(a).addClass("show");
    }, 100);
    if (time) {
        time = time + 100;
        setTimeout(() => {
            $(".toast-box").removeClass("show");
        }, time);
    }
};

function Toast(target, time) {
    var a = "#" + target;
    $(".toast-box").removeClass("show");
    setTimeout(() => {
        $(a).addClass("show");
    }, 100);
    if (time) {
        time = time + 100;
        setTimeout(() => {
            $(".toast-box").removeClass("show");
        }, time);
    }
};


// close button toast
$(".toast-box .close-button").click(function (event) {
    event.preventDefault();
    $(".toast-box.show").removeClass("show");
});
// tap to close toast
$(".toast-box.tap-to-close").click(function () {
    $(this).removeClass("show");
});
///////////////////////////////////////////////////////////////////////////
