$(function () {
    'use strict'

    $('[data-toggle="offcanvas"]').on('click', function () {
        console.log('click');
        $('.offcanvas-collapse').toggleClass('open')
    })

    $('nav .collapse ul li a[href="' + location.pathname + '"]').parent().addClass('active');
});

if (location.pathname === '/contact') {
    const publicKey = "6Lcll9UUAAAAAMu_zAeRu-rKMILBAU16TwDSUSW0";

    $(document).ready(function () {
        // Recaptcha init
        check_grecaptcha();

        // Submitting the form
        $("form").submit(function (e) {
            var form = $(this);
            var token = $("[name='recaptcha-token']").val();
            var btn_val = $("#submit-btn");
            var init_btn_val = btn_val.html();

            btn_val.prop("disabled", true);
            btn_val.html("<i class='fa fa-circle-o-notch fa-spin'></i>")

            $.post(form.attr("action"), form.serialize() + "&token=" + token)

                .done(function (response) {
                    response = JSON.parse(response);

                    btn_val.prop("disabled", false);
                    btn_val.html(init_btn_val);

                    if (typeof response.type !== "undefined" && response.type === "success") {
                        set_alert(response);
                        form[0].reset();
                        check_grecaptcha();
                    } else {
                        set_alert(response);
                    }
                    
                })

                .fail(function (response) {
                    set_alert(response);
                });

            e.preventDefault();
        });
    });

    // Custom alert on ajax callback
    function set_alert(response) {
        var type;
        var status = $("#status");

        switch (response.type) {
            case "success":
                type = "alert-success p-2";
                break;
            case "error":
                type = "alert-danger p-2";
                break;
            default:
                type = "alert-secondary p-2";
                break;
        }
        status.html(response.response).addClass(type);
        setTimeout(function() {
            status.html("").removeClass(type);
        }, 5000);
    }

    // Get token from API
    function check_grecaptcha() {
        grecaptcha.ready(function () {
            grecaptcha.execute(publicKey, {
                action: "ajaxForm"
            }).then(function (token) {
                $("[name='recaptcha-token']").val(token);
            });
        });
    }
}
