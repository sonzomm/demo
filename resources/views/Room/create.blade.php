
@extends('index')
@section('content')
    <form method="post" action="{{route('room.add')}}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="room_name">Name</label>
                <input type="text" name="room_name" class="form-control" id="room_name" placeholder="Enter name">
            </div>
            <div class="form-group">
                <label for="id_type_room">Status</label>
                <input type="text" name="status" class="form-control" id="status" placeholder="Enter status">
            </div>
            <div class="form-group">
                <label for="id_type_room">Type Room</label>
                <select class="form-control" name="id_type_room" id="id_type_room">
                    @foreach($types as $id => $type)
                        <option value="{{ $id }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
@endsection
@push('js')
    <script>
        $(document).ready(function (){
            $('#room').addClass('menu-open');
            $('#room_manage').addClass('active');
            $('#room_create').addClass('active');
        });
    </script>
@endpush
