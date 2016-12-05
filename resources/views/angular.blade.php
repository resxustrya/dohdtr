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
                        <tr ng-repeat="note in a.notes" ng-class="a.getNoteClass(note.done)">
                            <td>[[ note.label ]]</td>
                            <td>[[ note.done ]] </td>
                            <td ng-show="note.assignee" ng-bind="note.assignee"></td>
                        </tr>
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
            self.notes = [
                {label : 'First Note', done :false, assignee : 'Lourence'},
                {label : '1 Note', done :false},
                {label : '2Note', done :true, assignee : 'Rex'},
                {label : '3 Note', done :false},
                {label : '4 Note', done :true},
                {label : '5 Note', done :false, assignee : 'Lourence'},
                {label : '6 Note', done :true, assignee : 'Rexus'},
            ];
            self.getNoteClass = function(status){
                return {
                  done : status,
                  pending : !status
                };
            };
        }]);
    </script>
@endsection