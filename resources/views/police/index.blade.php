@extends('layouts.app')

@section('head')
<style>
    .dataTables_filter {
        padding-bottom: 10px;
    }

    .contactus {
        background: url('image/breadcrumb/police.png');
        background-size: cover;
    }

    .btn-outline-blue {
        color: #43088c;
        border-color: #43088c;
    }

    .btn-outline-blue:hover {
        color: #fff;
        background-color: #43088c;
        border-color: #43088c;
    }

    .bg-blue {
        background-color: #43088c;
        color: #fff;
    }

    th {
        text-align: center;
        background-color: #43088c;
        color: #fff;
    }
</style>

@endsection

@section('breadcrumbs')
<section class="contactus">
    <div class="container">
        <div class="w-50 text-center m-auto text-white">
            <h1 style="font-weight: 700;">Police Station List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0 text-white" style="margin-left: 37%;">
                    <li class="breadcrumb-item"><a href="/" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Polices</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container mt-5">
    @role('admin')
    <button class="btn btn-sm btn-outline-blue" data-bs-toggle="modal" data-bs-target="#addNewPolice">Add New
        Police</button>
    @endrole
    <div class="row justify-content-center mt-5">
        <table id="polices">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Police Station Name</th>
                    <th>Address</th>
                    <th>Contact</th>
                    @role('admin')
                    <th>Action</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($polices as $police)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$police->name}}</td>
                    <td>{{$police->address}}</td>
                    <td>{{$police->contact}}</td>
                    @role('admin')
                    <td class="d-flex" id={{$police->id}}>
                        <div class="m-1">
                            <button class="editBtn btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                            <button class="checkBtn btn btn-sm btn-outline-success d-none"><i
                                    class="fas fa-check"></i></button>
                        </div>
                        <div class="m-1">
                            <form action="{{route('police.destroy',$police->id)}}" method="post">
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

@include('police.create')
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
                axios.post('/police/update',data).then(function(response){
                    toastr.success('Police Updated Successfully');
                });
            }else{
                toastr.error('Contact Number is too short');
            }
         });
   }
</script>
@endsection
