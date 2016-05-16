var app = angular.module('user', []);

app.controller('sign_up', ['$scope', function ($scope) {
    $scope.placeholder = {
        nickname: '昵称',
        phone: '手机号码',
        verify: '短信验证码'
    };
}]);
