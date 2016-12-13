@extends('dashboard.layout')

@section('content')
    <div class="alert alert-success ng-cloak">
        <div class="row">
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:1000px;">
                    60%
                </div>
            </div>
        </div>
        <h1 class="text-center">Angular 1</h1>
        <div ng-app="myApp" class="container">
            <span data-link="{{asset('deploy')}}" id="link"></span>
            <span id="token" data-token="{{ csrf_token() }}"></span>
            <input class="form-control" type="file" id="file" name="file" />
        </div>
    </div>
@endsection
@section('js')
    @@parent
    <script>
        var percent = 0;
        (function ($) {
            $('#file').change(function(event){

                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(progress){
                    //console.log(this.result);
                    var lines = this.result.split('\n');
                    for (var line = 0; line < 10;line++) {
                        if(line == 0){
                            continue;
                        }
                        var data = {
                            line : lines[line],
                            _token : $('#token').data('token'),
                            percent : percent
                        };
                        $.post($('#link').data('link'),data,function(response){
                            var res = JSON.parse(response);
                           console.log(res);
                        });
                    }
                };
                reader.readAsText(file);
            });
        })($);
    </script>
@endsection