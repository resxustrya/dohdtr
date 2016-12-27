@extends('dashboard.layout')

@section('content')
    <div class="alert alert-success ng-cloak">
        <div class="row">
            <div class="progress">
                <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <strong class="text-center" style="font-size: medium;font-weight: bold;">
                        Please wait. The system is extracting data from the file.
                        <span id="count"></span> / <span class="total"></span>
                    </strong>
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
            $('.progress').hide();
            $('#file').change(function(event){
                $('.progress').show();
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function(progress){
                    var lines = this.result.split('\n');
                    var token = $('#token').data('token');
                    var count = lines.length;
                    $('.total').text(count);
                    setTimeout(function(){
                        for (var line = 0; line < lines.length;line++) {
                            if(line == 0 ){
                                continue;
                            }
                            var data = {
                                line : lines[line],
                                _token : token
                            };
                            $.get($('#link').data('link'),data,function(response){
                                var res = JSON.parse(response);
                                console.log(res.status);
                                if(res.status == "ok"){
                                    console.log(res.status);
                                    var per = (percent  / 100 ) * 100;
                                    $('.progress-bar').css("width" , per+"%");
                                }
                            });
                        }
                    },600);
                };
                reader.readAsText(file);
            });
        })($);
    </script>
@endsection