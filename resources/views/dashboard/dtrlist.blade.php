@extends('dashboard.layout')
@section('title','Employe List')
@section('content')
<div class="container-fluid">
    <div class="alert">
        @if(isset($lists) and count($lists) > 0)
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h4>
                        Employee attendace list
                    </h4>
                </div>
                <div class="table-responsive">
                    <table class="table table-fixed">
                        <thead>
                        <tr>
                            <th class="col-lg-4 text-center">Userid</th>
                            <th class="col-lg-4 text-center">Name</th>
                            <th class="col-lg-4 text-center">Department</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lists as $list)
                            <tr class="text-center">
                                <td class="col-xs-4">{{ $list->userid }}</td>
                                <td class="col-xs-4">{{ $list->firstname ." ". $list->lastname }}</td>
                                <td class="col-xs-4">{{ $list->department }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td class="col-md-12 text-center">
                                {{ $lists->links() }}
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <strong>Dtr details is empty.</strong>
        @endif
    </div>
</div>
@endsection
@section('js')
    @@parent
    <script>

    </script>
@endsection