@extends('layouts.app')

@section('head')
<style>
    .dataTables_filter {
        padding-bottom: 10px;
    }

    .btn-outline-hospital {
        /* greadiant color */
        color: #b80771;
        border-color: #b80771;
    }

    .btn-outline-hospital:hover {
        color: #fff;
        background-color: #b80771;
        border-color: #b80771;
    }

    .bg-hospital {
        background-color: #b80771;
        color: #fff;
    }

    .text-hospital {
        color: #b80771;
    }

    th {
        text-align: center;
        background-color: #b80771;
        color: #fff;
    }
</style>

@endsection

@section('breadcrumbs')
<section class="contactus" style="background: url('{{asset('image/breadcrumb/hospital.jpg')}}');">
    <div class="container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700;">Hospital List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Hospital</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container mt-5">
    @role('admin')
    <button class="btn btn-sm btn-outline-hospital" data-bs-toggle="modal" data-bs-target="#addNewHospital">Add New
        Hospital</button>
    @endrole
    <div class="row justify-content-center mt-5">
        <table id="hospitals">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Hospital Name</th>
                    <th>Address</th>
                    <th>Content</th>
                    @role('admin')
                    <th>Action</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitals as $hospital)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$hospital->name}}</td>
                    <td>{{$hospital->address}}</td>
                    <td>{{$hospital->contact}}</td>
                    @role('admin')
                    <td class="d-flex" id={{$hospital->id}}>
                        <div class="m-1">
                            <button class="editBtn btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                            <button class="checkBtn btn btn-sm btn-outline-success d-none"><i
                                    class="fas fa-check"></i></button>
                        </div>
                        <div class="m-1">
                            <form action="{{route('hospital.destroy',$hospital->id)}}" method="post">
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

@include('hospital.create')
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
                axios.post('/hospital/update',data).then(function(response){
                    toastr.success('Hospital Updated Successfully');
                });
            }else{
                toastr.error('Contact Number is too short');
            }

         });
   }
</script>
@endsection
