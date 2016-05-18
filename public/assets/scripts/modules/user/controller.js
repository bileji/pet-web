var app = angular.module('user', []);

var progress_bar = $("#progress-bar");

app.controller('sign_up', ['$scope', function ($scope) {
    $scope.user = {};

    $scope.validate = {
        ID : {
            format: ''
        }
    }
}]).directive('phoneOrEmail', function () {
    var email = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var phone = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            ngModelController.$parsers.push(function (viewValue) {
                if (email.test(viewValue) || phone.test(viewValue)) {
                    progress_bar.css({"width": "20%"});
                    ngModelController.$setValidity('wrongID', true);
                } else {
                    progress_bar.css({"width": "0"});
                    ngModelController.$setValidity('wrongID', false);
                }
                return viewValue;
            });
        }
    }
}).directive('nickname', function () {
    var nickname = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            ngModelController.$parsers.push(function (viewValue) {
                if (nickname.test(viewValue) || (viewValue.length >= 4 && viewValue.length <= 16)) {
                    progress_bar.css({"width": "40%"});
                    ngModelController.$setValidity('nickname', true);
                } else {
                    progress_bar.css({"width": "31%"});
                    ngModelController.$setValidity('nickname', true);
                }
                return viewValue;
            });
        }
    }
});
