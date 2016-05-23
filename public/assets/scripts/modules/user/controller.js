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
};

var progress_reduce = function (progress, percent) {
    var total_width = parseFloat(progress.parent().css("width"));
    var width = parseFloat(progress.css("width")) - total_width * percent / 100;
    progress.css({"width": width > 0 ? width : 0});
};

var button_shake = function (button) {
    var times = 4, range = 3, animate_time = 30;
    button.html("请完成验证").css({"position": "relative"});
    for (var time = times; time >= 0 ; time--) {
        button.animate({"left": time * range}, animate_time);
        button.animate({"left": - time * range}, animate_time);
    }
};

var verify_handler = function (captcha) {
    var percent = 11, fade_out_time = 200, button = $("#check-phone"), container = $("#captcha"), html = button.html(), progress = $("#progress_bar");

    container.children("div").css({"position": "absolute", "z-index": -9999}).first().fadeOut(fade_out_time);
    captcha.appendTo("#captcha");

    captcha.onSuccess(function () {
        console.log($("#ID").attr("wrong"));
        if ($("#ID").attr("wrong") != true) {
            container.attr("cache") != true && progress_plus(progress, percent) && button.html(html);
            container.attr("cache", true);
        }
    });

    captcha.onFail(function () {
        container.attr("cache") == true && progress_reduce(progress, percent);
        container.removeAttr("cache");
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

    //
    $scope.user = {};

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
                    progress_plus(progress, length);
                    ngModelController.$setValidity("wrong", true);
                } else {
                    progress_reduce(progress, length);
                    ngModelController.$setValidity("wrong", false);
                }
                return viewValue;
            });
        }
    };
}).directive('nickname', function () {
    var progress = $("#progress-bar");

    var min = 4, max = 16, length = 10;

    var nickname = /^[\-\w\u4e00-\u9fa5]+$/;

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            attrs.cache = "";
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

    var min = 6, max = 16, length = 10;

    var password = /^(?=.{6,16}$)(?![0-9]+$)[\w!@#$%^&*()-_+=]+$/;

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            attrs.cache = "";

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

    var length = 10;

    var verify = /^\d{6}$/;

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            attrs.cache = "";

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
