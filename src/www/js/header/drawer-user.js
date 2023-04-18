
var DrawerUser = {

    init: function () {

        $("#drawer-user-form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Please enter email.",
                    email: "The email address you entered is incorrect."
                },
                password: {
                    required: "Please enter password."
                }
            },

            submitHandler: function (form) {
                $.ajax({
                    url: DRAWER_USER_LOGIN_CHECK_URL,
                    data : $(form).serialize(),
                    type: "POST",
                    success: function (json) {
                        if (json.success) {
                            window.location.href = DRAWER_USER_DASHBOARD_URL
                        } else {
                            alert(json.message);
                        }
                    },
                    error: function () {
                        alert("User login failed!");
                    }
                });
            }
        });
    },

    toggle: function () {
        if ($("html").hasClass("js-open-drawer-user")) {
            DrawerUser.hide();
        } else {
            DrawerUser.show();
        }
        return false;
    },

    show: function () {
        $("html").addClass("js-open-drawer").addClass("js-open-drawer-user");
        return false;
    },

    hide: function () {
        $("html").removeClass("js-open-drawer").removeClass("js-open-drawer-user");
        return false;
    },

};

$(function () {
    DrawerUser.init();
});