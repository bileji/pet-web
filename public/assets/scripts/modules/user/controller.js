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

app.controller('sign_up', ['$scope', '$http', function ($scope, $http) {
    var url = "verify/captcha?rand=" + Math.round(Math.random() * 100);
    console.log("start ajax:" + url);
    $http.get(url).success(function (response) {

    });
    console.log("ajax end!!!");

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
