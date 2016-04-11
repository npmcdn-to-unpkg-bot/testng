<!doctype html>
<html ng-app="purchaseApp">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body ng-controller="purchaseController">
<div class="page-header">
    <h1> ������ ������� </h1>
</div>
<div class="panel">
    <div class="form-inline">
        <div class="form-group">
            <div class="col-md-8">
                <input class="form-control" ng-model="text" placeholder = "��������" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6">
                <input type="number" class="form-control" ng-model="price" placeholder="����" />
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-offset-2 col-md-8">
                <button class="btn btn-default" ng-click="addItem(text, price)">��������</button>
            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>�������</th>
            <th>����</th>
            <th>�������</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="item in list.items">
            <td>{{item.purchase}}</td>
            <td>{{item.price}}</td>
            <td><input type="checkbox" ng-model="item.done" /></td>
        </tr>
        </tbody>
    </table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.11/angular.min.js"></script>
<script>
    var model = {
        items: [
            { purchase: "����", done: false, price: 15.9 },
            { purchase: "�����", done: false, price: 60 },
            { purchase: "���������", done: true, price: 22.6 },
            { purchase: "���", done: false, price:310 }
        ]
    };
    var purchaseApp = angular.module("purchaseApp", []);
    purchaseApp.controller("purchaseController", function ($scope) {
        $scope.list = model;
        $scope.addItem = function (text, price) {
            price = parseFloat(price); // ����������� ��������� �������� � �����
            if(text != "" && !isNaN(price)) // ���� ����� ���������� � ������� �����, �� ���������
            {
                $scope.list.items.push({ purchase: text, price: price, done: false });
            }
        }
    });
</script>
</body>
</html>