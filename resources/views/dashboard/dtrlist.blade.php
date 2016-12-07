@extends('dashboard.layout')
@section('title','Employe List')
@section('content')
<div class="container-fluid">
    <div class="alert">
        <div class="row">
            <div class="alert alert-success">
                <h4>Employee attendance list</h4>
                <form action="{{ asset('search') }}" method="POST" class="form-inline">
                   <div class="form-group">
                       <label for="search_key">Search</label>
                       <input type="text" name="search_key" placeholder="Search Name, ID" class="form-control"/>
                   </div>
                </form>
            </div>
        </div>
        <div class="row">
            @if(isset($lists) and count($lists) > 0)
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr class="alert-success text-center">
                            <td><strong>UserID</strong></td>
                            <td><strong>Employee Name</strong></td>
                            <td><strong>Department</strong></td>
                        </tr>
                        @foreach($lists as $list)
                            <tr class="text-center">
                                <td><strong>{{ $list->userid }}</strong></td>
                                <td><strong>{{ $list->firstname ." ". $list->lastname }}</strong></td>
                                <td><strong>{{ $list->department }}</strong></td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="text-center">
                                {{ $lists->links() }}
                            </td>
                        </tr>
                    </table>
                </div>
            @else
                <strong>Dtr details is empty.</strong>
            @endif
        </div>
    </div>
</div>
@endsection
@section('js')
    @@parent
    <script>

    </script>
@endsection