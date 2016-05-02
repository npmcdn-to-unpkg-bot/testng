<!doctype html>
<html ng-app="contApp">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<div class="page-header">
    <h1>Проды</h1>
</div>

<!-- LOADING ICON =============================================== -->
<!-- show loading icon if the loading variable is set to true -->
<p class="text-center" ng-show="loading"><span class="fa fa-meh-o fa-5x fa-spin"></span></p>

<div class="panel" ng-controller="mainController">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>№</th>
            <th>Название</th>
            <th>Размер</th>
            <th>Время</th>
            <th>Автор</th>
            <th>Жанр</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="cont in conts">
            <td>{{cont.id}}</td>
            <td><a href="{{cont.link}}">{{cont.title}}</a></td>
            <td>{{cont.size}}</td>
            <td>{{cont.time}}</td>
            <td><a href="{{cont.alink}}">{{cont.aname}}</a></td>
            <td>{{cont.genre}}</td>
        </tr>
        </tbody>
    </table>
    <uib-pagination total-items="totalItems" ng-model="currentPage" max-size="maxSize" class="pagination-sm" boundary-links="true" rotate="false" ng-change="pageChanged()"></uib-pagination>
</div>
<script src="js/angular-1.5.3/angular.js"></script>
<script src="js/angular-1.5.3/angular-animate.min.js"></script>
<script src="js/ui-bootstrap-tpls-1.3.2.min.js"></script>

<!-- ANGULAR -->
<!-- all angular resources will be loaded from the /public folder -->
<script src="js/controllers/mainCtrl.js"></script>
<!-- load our controller -->
<script src="js/services/contService.js"></script>
<!-- load our service -->
<script src="js/app.js"></script>
<!-- load our application -->
</body>
</html>