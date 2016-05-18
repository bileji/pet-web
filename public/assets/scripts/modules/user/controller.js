var app = angular.module('user', []);

app.controller('sign_up', ['$scope', function ($scope) {
    $scope.user = {};

    $scope.validate = {
        ID: {
            format: ''
        }
    }
}]).directive('phoneOrEmail', function () {
    var progress_bar = $("#progress-bar");

    var email = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var phone = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;

    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            ngModelController.$parsers.push(function (viewValue) {
                if (email.test(viewValue) || phone.test(viewValue)) {
                    progress_bar.css({"width": "20%"});
                    ngModelController.$setValidity("wrongID", true);
                } else {
                    progress_bar.css({"width": "0"});
                    ngModelController.$setValidity("wrongID", false);
                }
                return viewValue;
            });
        }
    }
}).directive('nickname', function () {
        var progress_bar = $("#progress-bar");

        var nickname = /^[\-\w\u4e00-\u9fa5]+$/;

        var clear_nickname = function (attrs) {
            attrs.$set("cache_nickname", "");
        };

        var save_nickname = function (attrs, nickname) {
            attrs.$set("cache_nickname", nickname);
        };

        var progress_bar_plus = function (percent) {
            var total_width = parseFloat(progress_bar.parent().css("width"));
            progress_bar.css({"width": parseFloat(progress_bar.css("width")) + total_width * percent / 100});
        };

        var progress_bar_reduce = function (percent) {
            var total_width = parseFloat(progress_bar.parent().css("width"));
            progress_bar.css({"width": parseFloat(progress_bar.css("width")) - total_width * percent / 100});
        };

        return {
            restrict: "A",
            require: "ngModel",
            link: function (scope, element, attrs, ngModelController) {
                attrs.cache_nickname = "";
                ngModelController.$parsers.push(function (viewValue) {
                        if (nickname.test(viewValue) && viewValue.length >= 4 && viewValue.length <= 16) {
                            !attrs.cache_nickname && progress_bar_plus(10);
                            save_nickname(attrs, viewValue);
                        } else {
                            attrs.cache_nickname && progress_bar_reduce(10);
                            clear_nickname(attrs);
                        }

                        if (nickname.test(viewValue)) {
                            ngModelController.$setValidity("nickname", true);
                        } else {
                            if (viewValue.length < 4) {
                                ngModelController.$setValidity("less", false);
                                ngModelController.$setValidity("more", true);
                            } else if (viewValue.length > 16) {
                                ngModelController.$setValidity("more", false);
                                ngModelController.$setValidity("less", true);
                            } else {
                                ngModelController.$setValidity("nickname", false);
                            }
                            return viewValue;
                        }
                    }
                );
            }
        }
    }
);
