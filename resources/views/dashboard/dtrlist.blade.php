@extends('dashboard.layout')
@section('title','Employe List')
@section('content')
<div class="container-fluid">
    <div class="alert">
        <div class="jumbotron" style="background-color: #f2f2f2;padding: 15px;">
           <h3>Employee Attendance</h3>
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ asset('search') }}" method="POST" class="form-inline">
                        <div class="form-group">
                            <input type="text" name="search" class="form-control">
                        </div>
                        <div class="form-group">
                           <button type="submit" name="submit" class="btn btn-success">
                               <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Search
                           </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <form action="{{ asset('personal/filter') }}" method="GET" class="filter">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="input-group input-daterange" style="z-index: 9999 !important;">
                            <span class="input-group-addon">From</span>
                            <input type="text" class="form-control" name="from" value="2012-04-05">
                            <span class="input-group-addon">To</span>
                            <input type="text" class="form-control" name="to" value="2012-04-19">
                            <span class="input-group-addon"></span>
                            <button type="submit" name="filter" class="btn btn-success form-control" value="Filter">
                                <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Filter
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert">
                        <div class="table-responsive">
                            @if(isset($lists) and count($lists) > 0)
                                <table class="table table-bordered">
                                    <thead>
                                    <tr class="success">
                                        <td>UserId</td>
                                        <td>Name</td>
                                        <td>Department</td>
                                        <td>Date</td>
                                        <td>Event</td>
                                        <td>Terminal</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lists as $list)
                                        <tr>
                                            <td>{{ $list->userid }}</td>
                                            <td>{{ $list->firstname ." " . $list->lastname }}</td>
                                            <td>{{ $list->department }}</td>
                                            <td>{{ date("M",strtotime($list->datein)).'. ' . $list->date_d .' , ' .$list->date_y }}</td>
                                            <td>{{ $list->event }}</td>
                                            <td>{{ $list->terminal }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">
                                            {{ $lists->links() }}
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            @else
                                <h1>No employee attendance</h1>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    @@parent
    <script>
        $('.input-daterange input').each(function() {
            $(this).datepicker("clearDates");
        });
    </script>
@endsection