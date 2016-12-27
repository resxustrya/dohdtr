@extends('personal.layout')
@section('title', 'Attendace')
@section('content')
    <div class="container-fluid">
        <div class="alert">
            <div class="row">
                <div class="alert alert-success">
                    <h4>Attendance</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="alert">
                        <h5>Filter date attendance</h5>
                        <form action="{{ asset('personal/filter') }}" method="GET" class="filter">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="input-group input-daterange" style="z-index: 9999 !important;">
                                <span class="input-group-addon">From</span>
                                <input type="text" class="form-control" name="from" value="2012-04-05">
                                <span class="input-group-addon">To</span>
                                <input type="text" class="form-control" name="to" value="2012-04-19">
                                <span class="input-group-addon"></span>
                                <button type="submit" name="filter" class="btn btn-info form-control" value="Filter">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div id="loading">
                </div>
                <div class="col-md-12 data-content">
                    @if(isset($dtr) and count($dtr) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr class="alert-success text-center">
                                    <td>UserID</td>
                                    <td>Name</td>
                                    <td>Date</td>
                                    <td>Time</td>
                                    <td>Event</td>
                                    <td>WeedDay</td>
                                </tr>
                                @foreach($dtr as $d)
                                    <tr class="text-center">
                                        <td>{{ $d->userid }}</td>
                                        <td>{{ $d->firstname." ".$d->lastname }}</td>
                                        <td>{{ date("M",strtotime($d->datein)).'. ' . $d->date_d .' , ' .$d->date_y }}</td>
                                        <td>{{ date("h:i A", strtotime($d->time)) }}</td>
                                        <td>{{ $d->event }}</td>
                                        <td>{{ date('l',strtotime($d->datein)) }}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6" class="text-center">
                                        {{ $dtr->links() }}
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @@parent
    <script>
        (function($){
            $('#loading').hide();
            $('.filter').submit(function(e){
                $('#loading').show();
            });
        })($);
        $('.input-daterange input').each(function() {
            $(this).datepicker("clearDates");
        });
        var opts = {
            lines: 13 // The number of lines to draw
            , length: 28 // The length of each line
            , width: 14 // The line thickness
            , radius: 42 // The radius of the inner circle
            , scale: 1 // Scales overall size of the spinner
            , corners: 1 // Corner roundness (0..1)
            , color: '#000' // #rgb or #rrggbb or array of colors
            , opacity: 0.25 // Opacity of the lines
            , rotate: 0 // The rotation offset
            , direction: 1 // 1: clockwise, -1: counterclockwise
            , speed: 1 // Rounds per second
            , trail: 60 // Afterglow percentage
            , fps: 20 // Frames per second when using setTimeout() as a fallback for CSS
            , zIndex: 2e9 // The z-index (defaults to 2000000000)
            , className: 'spinner' // The CSS class to assign to the spinner
            , top: '50%' // Top position relative to parent
            , left: '50%' // Left position relative to parent
            , shadow: false // Whether to render a shadow
            , hwaccel: false // Whether to use hardware acceleration
            , position: 'absolute' // Element positioning
        };
        var target = document.getElementById('loading');
        var spinner = new Spinner(opts).spin(target);
    </script>
@endsection