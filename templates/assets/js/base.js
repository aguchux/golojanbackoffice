
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


$(function () {

    $('#xResendWithDrawalOTP').on("click", function (e) {
        e.preventDefault();
        let withid = $(this).data('withid');
        Dialog("OTP has been resent to your mobile id: " + withid, 1);
        /*
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
        */
    });

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

    $('#accountnumber').on("input", function (e) {
        var txt = $(this).val();
        if (txt.length == 10) {
            $('#xLoadAccountName').trigger("change");
        } else {
            $("#xAccountAddButton").prop('disabled', true).addClass("disabled");
            $("#saved_account_number").val("0");
        }

    });

    $('#xLoadAccountName').on("change", function (e) {
        e.preventDefault();
        var accountnumber = $("#accountnumber").val();
        var bankcode = $(this).val();
        var fd = new FormData;
        fd.append('accountnumber', accountnumber);
        fd.append('bankcode', bankcode);
        $.ajax("/ajax/bankers/getinfo", {
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            async: true,
            beforeSend: function () {
                $("#xLoadingInAccount").removeClass('d-none');
            },
            success: function (data, status, xhr) {
                var jData = JSON.parse(data);
                if (jData.done) {
                    $("#xAccountNameDiv").removeClass('d-none');
                    $("#xAccountName").val(jData.account_name);
                    $("#xAccountAddButton").prop('disabled', false).removeClass("disabled");
                    $("#saved_account_number").val(jData.account_number);
                } else {
                    $("#xAccountNameDiv").addClass('d-none');
                    $("#xAccountName").val(jData.account_name);
                    $("#xAccountAddButton").prop('disabled', true).addClass("disabled");
                    $("#saved_account_number").val("0");
                }
                $("#xLoadingInAccount").addClass('d-none');
            },
            error: function (jqXhr, textStatus, errorMessage) {
                //alert(errorMessage);
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
    $('#sponsor_id').keyup(function (event) {
        let El = $(this);
        let sponsorid = $(this).val();
        let key_in = event.which;
        if (sponsorid == '') {
            $("#SponsorInfo").html('').addClass('d-none');
            event.preventDefault();
            return false;
        }
        if (sponsorid.length <= 4) {
            $("#SponsorInfo").html('').addClass('d-none');
            event.preventDefault();
            return false;
        }
        if (key_in == 13) {
            event.preventDefault();
            return false;
        }



        $.ajax("/ajax/profile/" + sponsorid + "/sponsor", {
            type: 'post',
            data: null,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#SponsorInfo").html('').addClass('d-none');
            },
            success: function (data, status, xhr) {
                let jDATA = JSON.parse(data);
                let accid = parseInt(jDATA.accid);
                if (accid) {
                    let info = '<a href="javacript:;" class="item"><div class="imageWrapper"><img src="' + jDATA.avatar + '" class="imaged w64"></div><div class="in"><div>' + jDATA.name + '<div class="text-muted">Joined : <strong>' + jDATA.created + '</strong></div></div></div></a>';
                    $("#SponsorInfo").html(info).removeClass('d-none');
                } else {
                    $("#SponsorInfo").html('').addClass('d-none');
                }
            },
            error: function (jqXhr, textStatus, errorMessage) {
            }
        });
    });
});


$(function () {
    $('#amount_on_transfer').keyup(function (event) {
        let El = $(this);
        let amount = $(this).val();
        amount = parseFloat(amount);

        let key_in = event.which;
        if (key_in == 13) {
            event.preventDefault();
            return false;

        }

    });
});


$(function () {
    $('#receipient_id').keyup(function (event) {
        let El = $(this);
        let sponsorid = $(this).val();
        let key_in = event.which;
        if (sponsorid == '') {
            $("#TransferBtn").prop('disabled', true);
            $("#ReceipientInfo").html('').addClass('d-none');
            event.preventDefault();
            return false;
        }
        if (sponsorid.length <= 4) {
            $("#TransferBtn").prop('disabled', true);
            $("#ReceipientInfo").html('').addClass('d-none');
            event.preventDefault();
            return false;
        }
        if (key_in == 13) {
            event.preventDefault();
            return false;
        }

        $.ajax("/ajax/profile/" + sponsorid + "/receipient", {
            type: 'post',
            data: null,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#ReceipientInfo").html('').addClass('d-none');
            },
            success: function (data, status, xhr) {
                let jDATA = JSON.parse(data);
                let accid = parseInt(jDATA.accid);
                let sameperson = parseInt(jDATA.sameperson);
                if (accid) {
                    if (sameperson) {
                        let info = '<a href="javacript:;" class="text-danger" style="color:red;">You cannot make transfer to yourself.</a>';
                        $("#ReceipientInfo").html(info).removeClass('d-none');
                        $("#TransferBtn").addClass('disabled');
                        $("#TransferBtn").prop('disabled', true);
                    } else {
                        let info = '<a href="javacript:;" class="item"><div class="imageWrapper"><img src="' + jDATA.avatar + '" class="imaged w64"></div><div class="in"><div>' + jDATA.name + '<div class="text-muted">Joined : <strong>' + jDATA.created + '</strong></div></div></div></a>';
                        $("#ReceipientInfo").html(info).removeClass('d-none');
                        $("#TransferBtn").removeClass('disabled');
                        $("#TransferBtn").prop('disabled', false);
                    }
                } else {
                    $("#ReceipientInfo").html('').addClass('d-none');
                    $("#TransferBtn").addClass('disabled');
                    $("#TransferBtn").prop('disabled', true);
                }

            },
            error: function (jqXhr, textStatus, errorMessage) {
            }
        });
    });
});



$(function () {
    $('#MagicUploader').on("change", function (e) {
        var file_data = $("#MagicUploader").prop("files")[0];
        var frmData = new FormData();
        frmData.append("imagefile", file_data);
        $.ajax("/ajax/profile/upload", {
            type: 'post',
            data: frmData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $("#MagicUploaderBtn").html("<img width='90%' src='./_store/imgs/uploading.gif' alt='...'>");
            },
            success: function (data, status, xhr) {
                let jDATA = JSON.parse(data);
                let doneInt = parseInt(jDATA.done);
                let doneUrl = (jDATA.image).toString();
                if (doneInt) {
                    $("#UserInfoAvatar").attr("src", doneUrl);
                    $("#UserInfoAvatarTop").attr("src", doneUrl);
                    Dialog("Your profile photo has been updated successfully.", 1);
                }
                $("#MagicUploaderBtn").html("<ion-icon name='camera-outline'></ion-icon>");
            },
            error: function (jqXhr, textStatus, errorMessage) {
            }
        });
    });
});





$(function () {
    let array_of_uploaded_photos = [];
    array_of_uploaded_photos.splice(0, array_of_uploaded_photos.length)
    $('.xProductPhotoUploader').each(function (i, el) {
        var el = $(this);
        let tabindex = el.attr("tabindex");
        el.on('change', function (e) {
            var file_data = el.prop("files")[0];
            var frmData = new FormData();
            frmData.append("imagefile", file_data);
            $.ajax("/ajax/products/photos/upload", {
                type: 'post',
                data: frmData,
                cache: false,
                contentType: false,
                processData: false,
                async: true,
                beforeSend: function () {
                    $("#xActivityLoader-" + tabindex).html("<div class=\"spinner-grow text-primary\" role=\"status\"></div>");
                },
                success: function (data, status, xhr) {
                    let jDATA = JSON.parse(data);
                    let doneInt = parseInt(jDATA.done);
                    let doneUrl = (jDATA.image).toString();
                    if (doneInt) {
                        array_of_uploaded_photos[tabindex] = doneUrl;
                        $("#array_of_uploaded_photos").val(array_of_uploaded_photos);
                        $("#custom-file-upload-" + tabindex).css({ "background-image": "url('" + doneUrl + "')", "background-size": "cover" });
                    }
                    $("#xActivityLoader-" + tabindex).html("<ion-icon name=\"arrow-up-circle-outline\"></ion-icon>");
                },
                error: function (jqXhr, textStatus, errorMessage) { }
            });

        })
    });

});


$(function () {
    $('#LoadCategories').on("change", function (e) {
        var el = $(this);
        var elVal = el.val();
        if (elVal == 0) {
            window.location.href = "/dashboard/marketplace";
        }
        if (elVal >= 1) {
            window.location.href = "/dashboard/category/" + elVal + "/marketplace";
        }
    });
});




$(function () {
    $('#maincategoryloader').on("change", function (e) {
        var el = $(this);
        var elVal = el.val();
        if (elVal.length == 0) {
            e.preventDefault();
            return false;
        }
        $.ajax("/ajax/categories/sub/" + elVal + "/load", {
            type: 'post',
            data: {},
            cache: false,
            contentType: false,
            processData: false,
            async: true,
            beforeSend: function () {
                $("#sub_category_box_loader").html("<div class=\"spinner-grow text-secondary\" role=\"status\"></div>").removeClass("d-none");
            },
            success: function (data, status, xhr) {
                $("#subcategory_select_input").html(data);
                $("#sub_category_box_loader").html("").addClass("d-none");
            },
            error: function (jqXhr, textStatus, errorMessage) { }
        });

    });
});



$(function () {
    $('.xNotixText').each(function (i, el) {
        var el = $(this);
        $(this).attr("tabindex", i);
        el.on('blur', function (e) {
            var elVal = el.val();
            var _id = el.attr("id");
            let FD = new FormData;
            FD.append("data", elVal)
            $.ajax("/ajax/settings/" + _id, {
                type: 'post',
                data: FD,
                contentType: false,
                processData: false,
                async: true,
                success: function (data, status, xhr) {
                    let intData = parseInt(data);
                    if (intData) {
                        Dialog("Settings information saved successfully.", 1);
                    } else {
                        Dialog("Settings update failed, try again much later.", 0);
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    Dialog("Settings update failed, try again much later.", 0);
                }
            });
        })
    });
});



$(function () {
    $('.DeleteBanker').each(function (i, el) {
        var el = $(this);
        $(this).attr("tabindex", i);
        el.on('click', function (e) {
            var _id = el.attr("id");
            let FD = new FormData;
            FD.append("bankid", _id)
            $.ajax("/ajax/bankers/" + _id + "/delete", {
                type: 'post',
                data: FD,
                contentType: false,
                processData: false,
                async: true,
                beforeSend: function () {
                    $("#xCustomCheckBox_" + _id).addClass('d-none');
                    $("#xCustomCheckLoader_" + _id).removeClass('d-none');
                },
                success: function (data, status, xhr) {
                    let intData = parseInt(data);
                    if (intData) {
                        Dialog("Bank account deleted successfully.", 1);
                        $("#xCustomCheckLoader_" + _id).addClass('d-none');
                        $("#xCustomCheckBox_" + _id).removeClass('d-none');

                        let ParentBankerBox = $("#BankerBox_" + _id);
                        ParentBankerBox.remove();

                    } else {
                        Dialog("Sorry! something may have gone wrong, delete failed.", 0);
                        $("#xCustomCheckLoader_" + _id).addClass('d-none');
                        $("#xCustomCheckBox_" + _id).removeClass('d-none');
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    Dialog("Sorry! something may have gone wrong, delete failed.", 0);
                }
            });
        })
    });
});


function Dialog(msg, status = '1') {
    if (status == '1') {
        $('#DialogSuccessMessage').html(msg);
        $('#ModalSuccessDialog').modal('show');
    } else if (status == '0') {
        $('#DialogFailedMessage').html(msg);
        $('#ModalFailedDialog').modal('show');
    }
}


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
                    let intData = parseInt(data);
                    if (intData) {
                        Dialog("Settings was successfully saved.", 1);
                    } else {
                        Dialog("Settings update failed, try again much later.", 0);
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) {
                    Dialog("Settings update failed, try again much later.", 0);
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
                    if (parseInt(fData.done)) {
                        $("#xStoreTotal").html(fData.capacity);
                        $("#xStoreCount").html(fData.count);
                        Dialog("Product has been added to your online shop.", 1);
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
            let elVal = el.val();
            let _id = el.attr("id");
            let frmData = new FormData();
            frmData.append("dataval", elVal);
            $.ajax("/ajax/exists/" + _id, {
                type: 'post',
                data: frmData,
                contentType: false,
                processData: false,
                async: true,
                success: function (data, status, xhr) {
                    let intResult = parseInt(data);
                    if (intResult) {
                        el.css("color", "red").focus().select();
                    } else {
                        el.css("color", "green");
                    }
                },
                error: function (jqXhr, textStatus, errorMessage) { }
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
