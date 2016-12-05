@extends('dashboard.layout')
@section('content')
<div class="container-fluid">
    <div class="alert alert-info">
        <div class="container-fluid">
            <div class="row">
                @if(isset($lists) and count($lists) > 0)
                    <table class="table table-responsive">
                        <tr>
                            <th>User ID</th>
                            <th>Name</th>
                            <th>Dept.</th>
                        </tr>
                        @foreach($lists as $l)
                            <tr>
                                <td>{{ $l->dtr_id }}</td>
                                <td>{{ $l->firstname ." ". $l->lastname }}</td>
                                <td>{{ $l->department }}</td>
                            </tr>
                        @endforeach
                    </table>
                @else
                    <strong>Dtr details is empty.</strong>
                @endif
            </div>
            <div class="row">
                {{ $lists->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    @@parent
    <script>

    </script>
@endsection