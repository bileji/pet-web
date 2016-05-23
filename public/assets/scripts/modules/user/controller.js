var app = angular.module('user', []);

var clear_cache = function (attrs) {
    attrs.$set("cache", "");
};

var save_cache = function (attrs) {
    attrs.$set("cache", true);
};

var progress_plus = function (progress, percent) {
    var total_width = parseFloat(progress.parent().css("width"));
    progress.css({"width": parseFloat(progress.css("width")) + total_width * percent / 100});
    return true;
};

var progress_reduce = function (progress, percent) {
    var total_width = parseFloat(progress.parent().css("width"));
    var width = parseFloat(progress.css("width")) - total_width * percent / 100;
    progress.css({"width": width > 0 ? width : 0});
    return true;
};

var button_shake = function (button, message) {
    var times = 4, range = 3, animate_time = 30;
    button.html(message).css({"position": "relative"});
    for (var time = times; time >= 0 ; time--) {
        button.animate({"left": time * range}, animate_time);
        button.animate({"left": - time * range}, animate_time);
    }
};

var step_show_one = function (step) {
    $(".sign-up-body").children().addClass("hide");
    step.removeClass("hide");
};

var verify_handler = function (captcha) {
    var percent = 11, fade_out_time = 200, button = $("#check-phone"), container = $("#captcha"), html = button.html(), progress = $("#progress-bar");

    container.children("div").css({"position": "absolute"}).first().fadeOut(fade_out_time);
    captcha.appendTo("#captcha");
    container.children("div").last().css({"position": "absolute", "z-index": 9999});

    captcha.onSuccess(function () {
        !$("#ID").attr("wrong") && button.html(html);
        !container.attr("cache") && progress_plus(progress, percent);
        container.attr("cache", "true");
    });

    captcha.onFail(function () {
        container.attr("cache") && progress_reduce(progress, percent);
        container.removeAttr("cache");
    });

    captcha.onRefresh(function () {
        container.attr("cache") && progress_reduce(progress, percent);
        container.removeAttr("cache");
    });

    // 点击下一步step1
    button.click(function () {
        var validate = captcha.getValidate();
        if (!validate || $("#ID").attr("wrong") == "true") {
            button_shake(button, "请完成验证");
            return;
        }
        $.ajax({
            url: "http://www.bileji.com/verify/captcha",
            type: "post",
            dataType: "json",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {
                geetest_seccode: validate.geetest_seccode,
                geetest_validate: validate.geetest_validate,
                geetest_challenge: validate.geetest_challenge
            },
            success: function (object) {
                if (object.status == 0) {
                    $("#dot").animate({"left": "70%"}, 1500);
                    step_show_one($("#step2"));
                    //$("#step1").addClass("hide") && $("#step2").removeClass("hide");
                } else {
                    button_shake(button, "请刷新重试");
                }
            }
        });
    });
};

app.controller('sign_up', ['$scope', '$http', '$location', function ($scope, $http, $location) {
    // 移除alert的隐藏
    $(".alter").children('span').removeClass("hide");

    // 验证码相关
    var verify_url = "http://" + $location.host() + "/verify/captcha?rand=" + Math.round(Math.random() * 100);
    $http.get(verify_url).success(function (response) {
        initGeetest({
            gt: response.gt,
            challenge: response.challenge,
            product: "float",
            offline: !response.success
        }, verify_handler);
    });

    // 点击事件
    $scope.send_verify = function () {
        var count_down = 60;
        var button = $("#resend");

        var able = function () {
            button.removeAttr("disabled").html("发送验证码");
        };

        var disable = function (time) {
            button.attr("disabled", "true").html(time + "s重新发送");
        };

        var interval = setInterval(function () {
            if (count_down <= 0) {
                able();
                clearInterval(interval);
            } else {
                disable(count_down--);
            }
        }, 1000);
    };

    $scope.sign_up = function () {
        var sign_up = $("#user-sign-up"), nickname = $("#nickname"), password = $("#password"), verify = $("#verify");

        if (!(nickname.attr("cache") && password.attr("cache") && verify.attr("cache"))) {
            button_shake(sign_up, "请正确填写账号信息");
        }

        step_show_one($("#step3"));
    }
}]).directive('username', function () {
    var progress = $("#progress-bar");

    var length = 20;

    var email = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var phone = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            ngModelController.$parsers.push(function (viewValue) {
                if (email.test(viewValue) || phone.test(viewValue)) {
                    !attrs.cache && progress_plus(progress, length);
                    save_cache(attrs);
                    ngModelController.$setValidity("wrong", true);
                    $("#captcha").attr("cache") && $("#check-phone").html("下一步");
                } else {
                    attrs.cache && progress_reduce(progress, length);
                    clear_cache(attrs);
                    ngModelController.$setValidity("wrong", false);
                }
                return viewValue;
            });
        }
    };
}).directive('nickname', function () {
    var progress = $("#progress-bar");

    var min = 4, max = 16, length = 16;

    var nickname = /^[\-\w\u4e00-\u9fa5]+$/;

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            ngModelController.$parsers.push(function (viewValue) {
                    if (nickname.test(viewValue) && viewValue.length >= min && viewValue.length <= max) {
                        !attrs.cache && progress_plus(progress, length);
                        save_cache(attrs);
                    } else {
                        attrs.cache && progress_reduce(progress, length);
                        clear_cache(attrs);
                    }

                    if (viewValue.length < min) {
                        ngModelController.$setValidity("less", false);
                        ngModelController.$setValidity("more", true);
                        ngModelController.$setValidity("wrong", true);
                    } else if (viewValue.length > max) {
                        ngModelController.$setValidity("more", false);
                        ngModelController.$setValidity("less", true);
                        ngModelController.$setValidity("wrong", true);
                    } else if (!nickname.test(viewValue)) {
                        ngModelController.$setValidity("wrong", false);
                        ngModelController.$setValidity("less", true);
                        ngModelController.$setValidity("more", true);
                    } else {
                        ngModelController.$setValidity("less", true);
                        ngModelController.$setValidity("more", true);
                        ngModelController.$setValidity("wrong", true);
                    }

                    return viewValue;
                }
            );
        }
    };
}).directive('password', function () {
    var progress = $("#progress-bar");

    var min = 6, max = 16, length = 12;

    var password = /^(?=.{6,16}$)(?![0-9]+$)[\w!@#$%^&*()-_+=]+$/;

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            ngModelController.$parsers.push(function (viewValue) {
                if (password.test(viewValue) && viewValue.length >= min && viewValue.length <= max) {
                    !attrs.cache && progress_plus(progress, length);
                    save_cache(attrs);
                } else {
                    attrs.cache && progress_reduce(progress, length);
                    clear_cache(attrs);
                }

                if (viewValue.length < min) {
                    ngModelController.$setValidity("less", false);
                    ngModelController.$setValidity("more", true);
                    ngModelController.$setValidity("easy", true);
                } else if (viewValue.length > max) {
                    ngModelController.$setValidity("more", false);
                    ngModelController.$setValidity("less", true);
                    ngModelController.$setValidity("easy", true);
                } else if (!password.test(viewValue)) {
                    ngModelController.$setValidity("easy", false);
                    ngModelController.$setValidity("less", true);
                    ngModelController.$setValidity("more", true);
                } else {
                    ngModelController.$setValidity("more", true);
                    ngModelController.$setValidity("less", true);
                    ngModelController.$setValidity("easy", true);
                }

                return viewValue;
            });
        }
    };
}).directive("verify", function () {
    var progress = $("#progress-bar");

    var length = 12;

    var verify = /^\d{6}$/;

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            ngModelController.$parsers.push(function (viewValue) {
                if (verify.test(viewValue)) {
                    ngModelController.$setValidity("wrong", true);
                    !attrs.cache && progress_plus(progress, length);
                    save_cache(attrs);
                } else {
                    ngModelController.$setValidity("wrong", false);
                    attrs.cache && progress_reduce(progress, length);
                    clear_cache(attrs);
                }
                return viewValue;
            });
        }
    };
});
