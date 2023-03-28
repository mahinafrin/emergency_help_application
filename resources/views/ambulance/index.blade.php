@extends('layouts.app')

@section('head')
<style>
    .dataTables_filter {
        padding-bottom: 10px;
    }

    .contactus {
        background: url('image/breadcrumb/ambulance.png');
        background-size: cover;
    }

    .btn-outline-ambulance {
        /* greadiant color */
        color: #fc3604;
        border-color: #fc3604;
    }

    .btn-outline-ambulance:hover {
        color: #fff;
        background-color: #fc3604;
        border-color: #fc3604;
    }

    .bg-ambulance {
        background-color: #fc3604;
        color: #fff;
    }

    .text-ambulance {
        color: #fc3604;
    }

    th {
        text-align: center;
        background-color: #fc3604;
        color: #fff;
    }
</style>

@endsection

@section('breadcrumbs')
<section class="contactus">
    <div class="container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700;">Ambulance List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Ambulances</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container my-5">
    @include('ambulance.edit')
    @role('admin')
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-3">
            <button class="btn btn-sm btn-outline-ambulance" data-bs-toggle="modal"
                data-bs-target="#addNewAmbulance">Add
                New
                Ambulance</button>
        </div>
        <div class="col-md-5"></div>
        <div class="col-md-4 float-right">
            <div class="d-flex">
                <i class="fas fa-search text-info m-2" style="font-size:22px!important"></i>
                <input type="text" class="form-control" id="searchAmbulance" placeholder="Search Ambulance By Address">
            </div>
        </div>
    </div>
    @else
    <div class="d-flex">
        <i class="fas fa-search text-info m-2" style="font-size:22px!important"></i>
        <input type="text" class="form-control w-50" id="searchAmbulance" placeholder="Search Ambulance By Address">
    </div>
    @endrole
    <div class="row mt-5">
        @foreach ($ambulances as $ambulance)
        <div class="col-md-3 info mt-4">
            <div class="card" style="width: 16rem;">
                <img src="{{asset('image/ambulance/ambulence.jpg')}}" class="card-img-top"
                    alt="{{$ambulance->ambulance_number}}">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="fas fa-ambulance text-success mr-2"></i>
                        <span class="ambulanceNo">{{$ambulance->ambulance_number}}</span>
                    </h5>
                    <p class="card-text" style="font-size: large!important">
                        <i class="fa fa-phone text-primary"></i>
                        <span class="contact">{{$ambulance->contact}}</span>
                        <br>
                        <i class="fa fa-map-marker text-danger"></i>
                        <span class="address">{{$ambulance->address}}</span>
                        <br>
                    </p>
                    {{-- eye icon --}}
                    <a href="{{route('ambulance.view',$ambulance->id)}}" class="btn btn-sm btn-outline-success"><i
                            class="fa fa-eye"></i></a>
                    @role('admin')
                    <a href="#" class="btn btn-sm btn-outline-info editBtn" data-bs-toggle="modal"
                        data-bs-target="#editAmbulance" id="{{$ambulance->id}}"><i class="fa fa-edit"></i></a>
                    <a href="{{route('ambulance.destroy',$ambulance->id)}}" class="btn btn-sm btn-outline-danger"><i
                            class="fa fa-trash"></i></a>
                    @endrole
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @include('ambulance.create')
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
       editBtn();
       searchAmbulance();
   });
   function searchAmbulance(){
$('#searchAmbulance').on('keyup', function(){
    var search = $(this).val();
    var address = $('.address');
    for (let index = 0; index < address.length; index++) {
        var element=address[index];
        var info=$(element).text();
        if(info.toLowerCase().includes(search.toLowerCase()))
        {
            $(element).parent().parent().parent().parent().show();
        }
        else{
            $(element).parent().parent().parent().parent().hide();
        }
    }

});
}
   function editBtn() {
       $('.editBtn').click(function () {
            var id=$(this).attr('id');
            $('#editId').val(id);
            axios.get(`/ambulance/${id}/fetch`).then(function (response){
                let data = response.data.data;
                $('#editName').val(data.driver_name);
                $('#editAmbulanceNumber').val(data.ambulance_number);
                $('#editContact').val(data.contact);
                $('#editAddress').val(data.address);
            });
        });
    }
</script>
@endsection
