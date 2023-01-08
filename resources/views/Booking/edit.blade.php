
@extends('index')
@section('content')
    <form method="post" action="{{route('type.put', $type->id)}}">
        @method('PUT')
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter name" value="{{$type->name}}">
            </div>
            <div class="form-group">
                <label for="price">price</label>
                <input type="text" name="price" class="form-control" id="price" placeholder="Enter name" value="{{$type->price}}">
            </div>
            <div class="form-group">
                <label for="">Max Person</label>
                <input type="text" name="max_person" class="form-control" id="max_person" placeholder="Enter name" value="{{$type->max_person}}">
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
            $('#customer').addClass('menu-open');
            $('#customer_manage').addClass('active');
            $('#customer_create').addClass('active');
        });
    </script>
@endpush
@endsection
