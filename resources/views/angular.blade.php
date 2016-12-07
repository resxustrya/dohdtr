@extends('dashboard.layout')

@section('content')
    <div class="alert alert-success ng-cloak">
        <h1 class="text-center">Angular 1</h1>
        <div ng-app="myApp" class="container">
            <div class="row">
                <div ng-controller="dataController as a" class="col-md-6">
                    <div>
                        <input type="text" ng-model="salary" name="salary" placeholder="Enter Salary" />
                    </div>
                    <div>
                        <input type="text" ng-model="percentage" name="percentage" placeholder="Percentage" />
                    </div>
                    <div><strong class="label-info">Result is :</strong>[[ result() ]]</div>
                    <div>
                        <strong ng-bind="date"></strong>
                    </div>
                </div>
                <div ng-controller="inputController as a" class="col-md-6">
                    <table class="table table-bordered">
                        <tr>
                            <th>Label</th>
                            <th>Status</th>
                            <th>Assgined</th>
                        </tr>
                        <div ng-repeat="(author, note) in a.notes">
                            <strong class="label">[[ note.name ]]</strong>
                            <strong class="author" ng-bind="author"></strong>
                            <strong class="author" ng-bind="note.done"></strong>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @@parent
    <script>
        (function(){
            angular.module('myApp', [],function($interpolateProvider){
                        $interpolateProvider.startSymbol('[[');
                        $interpolateProvider.endSymbol(']]');
                    })
                    .controller('dataController',function($scope){
                        $scope.salary = 0.0;
                        $scope.percentage = 0.0;
                        $scope.result = function() {
                            return ($scope.percentage * 0.01) * $scope.salary;
                        }
                    })
                    .controller('inputController',[function(){
                        var self = this;
                        self.notes = {
                            n1 : {
                                id : 1,
                                name : "Lourence",
                                done : false
                            },
                            n2 : {
                                id : 2,
                                name : "Rexus Traya",
                                done : true
                            },
                            n3 : {
                                id : 3,
                                name : "Rexus Lourence",
                                done : false
                            }
                        };
                    }]);
        })();
    </script>
@endsection