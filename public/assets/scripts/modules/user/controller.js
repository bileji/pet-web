var app = angular.module('user', []);

app.controller('sign_up', ['$scope', function ($scope) {
    $scope.user = {};
}]).directive('phoneOrEmail', function () {
    return {
        restrict: "A",
        require: "ngModel",
        link: function (scope, ele, attrs, ngModelController) {
            ngModelController.$parsers.push(function (viewValue) {
                console.log(viewValue);
                if (viewValue % 2 === 0) {
                    ngModelController.$setValidity('phone-or-email', true);
                } else {
                    ngModelController.$setValidity('phone-or-email', false);
                }
                return viewValue;
            });
        }
    }
});
