var app = angular.module('user', []);

app.controller('sign_up', ['$scope', function ($scope) {
    $scope.user = {};

    $scope.validate = {
        ID : {
            format: '<span class="glyphicon glyphicon-remove x"></span> 请填写正确的手机号或邮箱'
        }
    }
}]).directive('phoneOrEmail', function () {
    var email = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var phone = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
    var progress_bar = $("#progress-bar");
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
});
