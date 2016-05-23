var app = angular.module('user', []);

var progress_plus = function (progress, percent) {
    var total_width = parseFloat(progress.parent().css("width"));
    progress.css({"width": parseFloat(progress.css("width")) + total_width * percent / 100});
};

var progress_reduce = function (progress, percent) {
    var total_width = parseFloat(progress.parent().css("width"));
    var width = parseFloat(progress.css("width")) - total_width * percent / 100;
    progress.css({"width": width > 0 ? width : 0});
};

app.controller('sign_up', ['$scope', function ($scope) {
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

    var email = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var phone = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            ngModelController.$parsers.push(function (viewValue) {
                if (email.test(viewValue) || phone.test(viewValue)) {
                    progress_plus(progress, 20);
                    ngModelController.$setValidity("wrong", true);
                } else {
                    progress_reduce(progress, 20);
                    ngModelController.$setValidity("wrong", false);
                }
                return viewValue;
            });
        }
    };
}).directive('nickname', function () {
    var progress = $("#progress-bar");

    var nickname = /^[\-\w\u4e00-\u9fa5]+$/;

    var clear_nickname = function (attrs) {
        attrs.$set("cache_nickname", "");
    };

    var save_nickname = function (attrs, nickname) {
        attrs.$set("cache_nickname", nickname);
    };

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            attrs.cache_nickname = "";
            ngModelController.$parsers.push(function (viewValue) {
                    if (nickname.test(viewValue) && viewValue.length >= 4 && viewValue.length <= 16) {
                        !attrs.cache_nickname && progress_plus(progress, 10);
                        save_nickname(attrs, viewValue);
                    } else {
                        attrs.cache_nickname && progress_reduce(progress, 10);
                        clear_nickname(attrs);
                    }

                    if (viewValue.length < 4) {
                        ngModelController.$setValidity("less", false);
                        ngModelController.$setValidity("more", true);
                        ngModelController.$setValidity("wrong", true);
                    } else if (viewValue.length > 16) {
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

    var password = /^(?=.{6,16}$)(?![0-9]+$)[\w!@#$%^&*()-_+=]+$/;

    var clear_password = function (attrs) {
        attrs.$set("cache_password", "");
    };

    var save_password = function (attrs, nickname) {
        attrs.$set("cache_password", nickname);
    };

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            attrs.cache_password = "";

            ngModelController.$parsers.push(function (viewValue) {
                if (password.test(viewValue) && viewValue.length >= 6 && viewValue.length <= 16) {
                    !attrs.cache_password && progress_plus(progress, 10);
                    save_password(attrs, "cache");
                } else {
                    attrs.cache_password && progress_reduce(progress, 10);
                    clear_password(attrs);
                }

                if (viewValue.length < 6) {
                    ngModelController.$setValidity("less", false);
                    ngModelController.$setValidity("more", true);
                    ngModelController.$setValidity("easy", true);
                } else if (viewValue.length > 16) {
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

    var verify = /^\d{6}$/;

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            ngModelController.$parsers.push(function (viewValue) {
                if (verify.test(viewValue)) {
                    ngModelController.$setValidity("wrong", true);
                } else {
                    ngModelController.$setValidity("wrong", false);
                }
                return viewValue;
            });
        }
    };
});
