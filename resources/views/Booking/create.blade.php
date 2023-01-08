
@extends('index')
@section('content')
    <form method="post" action="{{route('booking.add')}}">
        @csrf
        <div class="card-body">
            <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li class="active">Reservation</li>
                </ol>
            </div><!--/.row-->
            <div class="panel-body">
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="name">Name staff</label>
                        <select class="form-control" name="name_staff" id="name_staff">
                            <option>Select Staff Name</option>
                            @foreach($staffs as $id => $staffs)
                                <option value="{{ $id }}">{{ $staffs }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group col-lg-6">
                    <label>Customer Name</label>
                    <select class="form-control" id="customer_name" name="name_cus" >
                        <option>Select Customer Name</option>
                        @foreach($customers as $id => $customers)
                            <option value="{{ $id }}">{{ $customers }}</option>
                        @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Room Type</label>
                        <select class="form-control" id="room_type" name="room_type" >
                            <option selected disabled>Select Room Type</option>
                            @foreach($type as $id => $type)
                                <option value="{{ $id }}">{{ $type }}</option>
                            @endforeach
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Room No</label>
                        <select class="form-control" id="room_no" name="room">
                            <option>Select Room</option>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="" name="max_person" id="max_person">
                        </label>
                    </div>
                </div>

                <div class="form-group col-lg-6">
                    <label>Service</label>
                    <select class="form-control" id="service" name="id_service">
                        <option>Select service </option>
                        @foreach($service as $id => $service)
                            <option value="{{ $id }}">{{ $service }}</option>
                        @endforeach
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label>Check In Date</label>
                        <input type="datetime-local" class="form-control" name="date_checkin" placeholder="mm/dd/yyyy" id="check_in_date" data-error="Select Check In Date" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label>Check Out Date</label>
                        <input type="datetime-local" class="form-control" name="date_checkout" placeholder="mm/dd/yyyy" id="check_out_date" data-error="Select Check Out Date" required>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                <div class="form-group col-lg-6">
                    <label>price room</label>
                    <input type="text" class="form-control" name="price_room" data-error="Select Check Out Date" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group col-lg-6">
                    <label>price service</label>
                    <input type="text" class="form-control" name="price_service" data-error="Select Check Out Date" required>
                    <div class="help-block with-errors"></div>
                </div>

                <div class="form-group col-lg-6">
                    <label>Status</label>
                    <select class="form-control" id="status" name="status">
                        <option value="0">Đã thanh toán</option>
                        <option value="1">chưa thanh toán</option>
{{--                        @foreach($booking as $id => $status)--}}
{{--                            <option value="{{ $status }}">{{ $ }}</option>--}}
{{--                        @endforeach--}}
                    </select>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="col-lg-12" >
                    <h4 style="font-weight: bold"><span id="price"></span></h4>
                    <h4 style="font-weight: bold"><span id="price_service"></span></h4>
                </div>
            </div>
        </div>
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
        $("#room_type").change(function(){
            $.ajax({
                url: '{{ route('get_room_theo_type') }}',
                type: 'GET',
                data: {
                    id: $(this).val()
                },
                success:function(data){
                    $("#room_no").html(data);
                }
            });
        });
        $("#room_type").change(function(){
            $.ajax({
                url: '{{ route('get_price_theo_type') }}',
                type: 'GET',
                data: {
                    id: $(this).val()
                },
                success:function(data){
                    $("#price").html(data);
                }
            });
        });
        $("#room_type").change(function(){
            $.ajax({
                url: '{{ route('get_max_theo_type') }}',
                type: 'GET',
                data: {
                    id: $(this).val()
                },
                success:function(data){
                    $("#max_person").html(data);
                }
            });
        });
        $("#service").change(function(){
            $.ajax({
                url: '{{ route('get_price_theo_service') }}',
                type: 'GET',
                data: {
                    id: $(this).val()
                },
                success:function(data){
                    $("#price_service").html(data);
                }
            });
        });
    </script>
@endpush
