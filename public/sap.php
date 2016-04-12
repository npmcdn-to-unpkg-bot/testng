<!doctype html>
<html ng-app="contApp">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
</head>
<body>
<div class="page-header">
    <h1>Проды</h1>
</div>

<div class="panel">
    <table class="table table-striped" ng-controller="contController">
        <thead>
        <tr>
            <th>Название</th>
            <th>Ссылка</th>
            <th>Размер</th>
            <th>Время</th>
            <th>Автор</th>
            <th>Жанр</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="cont in conts">
            <td>{{cont.title}}</td>
            <td>{{cont.link}}</td>
            <td>{{cont.size}}</td>
            <td>{{cont.time}}</td>
            <td>{{cont.author_id}}</td>
            <td>{{cont.genre_id}}</td>
        </tr>
        </tbody>
    </table>
</div>

<script src="js/angular-1.5.3/angular.js"></script>
<script>
    var model = {
        items: [{
            "id": 1,
            "title": "Consequatur quidem aliquid aliquid distinctio.",
            "link": "http:\/\/TARASOV.org\/qui-aut-aut-atque-cum-corporis-voluptate-dolor.html",
            "size": 1598.03,
            "time": "14:30:00",
            "author_id": 3,
            "genre_id": 26,
            "created_at": "2016-04-08 07:07:04",
            "updated_at": "2016-04-08 07:07:04"
        }, {
            "id": 2,
            "title": "Id id placeat dignissimos omnis mollitia qui.",
            "link": "http:\/\/MOLCANOV.ru\/aut-est-perspiciatis-qui-minima-ducimus-suscipit",
            "size": 544.36,
            "time": "01:25:00",
            "author_id": 10,
            "genre_id": 15,
            "created_at": "2016-04-08 07:07:04",
            "updated_at": "2016-04-08 07:07:04"
        }, {
            "id": 3,
            "title": "Omnis aperiam fuga neque aliquid excepturi.",
            "link": "http:\/\/www.LAZAREV.org\/qui-et-harum-eligendi-provident-optio-accusamus-voluptas-sed",
            "size": 1342.5,
            "time": "07:08:00",
            "author_id": 7,
            "genre_id": 18,
            "created_at": "2016-04-08 07:07:04",
            "updated_at": "2016-04-08 07:07:04"
        }]
    };
    var purchaseApp = angular.module("contApp", []);
    purchaseApp.controller("contController", function ($scope) {
        $scope.conts = model.items;

        function GetConts(){

        }
    });
</script>
</body>
</html>