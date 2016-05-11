var app = angular.module('angular', []);

app.controller('test', ['$scope', function ($scope) {
    $scope.data = [{
        name: 'shuchao',
        age: 20
    }, {
        name: 'yy',
        age: 21
    }];
}]);