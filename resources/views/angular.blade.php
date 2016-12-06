@extends('dashboard.layout')

@section('content')
    <div class="alert alert-success ng-cloak">
        <h1 class="text-center">Angular 1</h1>
        <div ng-app="myApp" class="container">
            <div class="row">
                <div ng-controller="dataController as a" class="col-md-6">
                    <strong>[[ a.message ]]</strong>
                    <strong>[[ a.name ]]</strong>
                    <button class="btn btn-default" ng-click="a.changeMessage()">Save changes</button>
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
        angular.module('myApp', [],function($interpolateProvider){
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        })
        .controller('dataController',[function(){
            var self = this;
            self.name = "Lourence Rex B. Traya";
            self.changeMessage = function(){
                console.log('Hello World');
                self.message = "Hi";
            };
        }])
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
    </script>
@endsection