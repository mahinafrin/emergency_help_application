@extends('layouts.app')

@section('head')
<style>
    .dataTables_filter {
        padding-bottom: 10px;
    }


    .contactus {
        background: url({{asset('image/breadcrumb/fireservice.png')}});
        background-size: cover;
    }

    .btn-outline-fireService {
        color: #c39111;
        border-color: #c39111;
    }

    .btn-outline-fireService:hover {
        color: #fff;
        background-color: #c39111;
        border-color: #c39111;
    }

    .bg-fireService {
        background-color: #c39111;
        color: #fff;
    }

    th {
        text-align: center;
        background-color: #c39111;
        color: #fff;
    }
</style>

@endsection

@section('breadcrumbs')
<section class="contactus">
    <div class="container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700; color:#fff">Fireservice List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;color:#fff!important;">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">FireServices</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container mt-5">
    @role('admin')
    <button class="btn btn-sm btn-outline-fireService" data-bs-toggle="modal" data-bs-target="#addFireService">Add New
        Fireservice</button>
    @endrole
    <div class="row justify-content-center mt-5">
        <table id="fireServices">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fire Service Station Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    @role('admin')
                    <th>Action</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($fireServices as $fireService)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$fireService->name}}</td>
                    <td>{{$fireService->address}}</td>
                    <td>{{$fireService->contact}}</td>
                    @role('admin')
                    <td class="d-flex" id={{$fireService->id}}>
                        <div class="m-1">
                            <button class="editBtn btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                            <button class="checkBtn btn btn-sm btn-outline-success d-none"><i
                                    class="fas fa-check"></i></button>
                        </div>
                        <div class="m-1">
                            <form action="{{route('fire-service.destroy',$fireService->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                    @endrole
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('fire-service.create')
@endsection

@section('script')
<script>
    $(document).ready(function () {
       editBtn();
       checkBtn();
   });
   function editBtn() {
         $('.editBtn').click(function () {
              var id = $(this).parent().parent().attr('id');
            //   toggle edit button
            $(this).addClass('d-none');
            $(this).parent().parent().find('.checkBtn').removeClass('d-none');
            //   toggle input field
            $(this).parent().parent().parent().find('td:not(:last-child,:first-child)').each(function () {
                var text = $(this).text();
                $(this).html('<input type="text" class="form-control" value="' + text + '">');
            });
         });
   }
   function checkBtn() {
         $('.checkBtn').click(function () {
              var id = $(this).parent().parent().attr('id');
            $(this).addClass('d-none');
            $(this).parent().parent().find('.editBtn').removeClass('d-none');
            let tr = $(this).parent().parent().parent();
            tr.find('td:not(:last-child,:first-child)').each(function () {
                var text = $(this).find('input').val();
                $(this).html(text);
            });
            let data = {
                id: id,
                name: tr.find('td:nth-child(2)').text(),
                address: tr.find('td:nth-child(3)').text(),
                contact: tr.find('td:nth-child(4)').text()
            };
            // contact validation
            if (data.contact.length >= 10) {
                axios.post('/fire-service/update',data).then(function(response){
                    toastr.success('Fireservice Updated Successfully');
                });
            }else{
                toastr.error('Contact Number is too short');
            }

         });
   }
</script>
@endsection
