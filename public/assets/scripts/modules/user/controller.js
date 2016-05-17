var app = angular.module('user', []);

app.controller('sign_up', ['$scope', function ($scope) {
    $scope.user = {};
}]).directive('phoneOrEmail', function () {
    var email = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
    var phone = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
    var progress_bar = $("#progress-bar");
    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, element, attrs, ngModelController) {
            ngModelController.$parsers.push(function (viewValue) {
                console.log(progress_bar);
                if (email.test(viewValue) || phone.test(viewValue)) {
                    ngModelController.$setValidity('phone-or-email', true);
                } else {
                    ngModelController.$setValidity('phone-or-email', false);
                }
                return viewValue;
            });
        }
    }
});
