@extends('layouts.app')

@section('head')
<style>
    .dataTables_filter {
        padding-bottom: 10px;
    }


    .contactus {
        background: url('image/breadcrumb/helper.jpg');
        background-size: cover;
    }

    .btn-outline-helper {
        color: #8b05a0;
        border-color: #8b05a0;
    }

    .btn-outline-helper:hover {
        color: #fff;
        background-color: #8b05a0;
        border-color: #8b05a0;
    }

    .bg-helper {
        background-color: #8b05a0;
        color: #fff;
    }

    .text-helper {
        color: #8b05a0;
    }

    th {
        text-align: center;
        background-color: #8b05a0;
        color: #fff;
    }
</style>

@endsection

@section('breadcrumbs')
<section class="contactus">
    <div class="container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700; color:rgb(5, 5, 5)">Social Worker List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;color:#fff!important;">
                    <li class="breadcrumb-item"><a href="/" class="">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Social Workers</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container mt-5">
    @role('admin')
    <button class="btn btn-sm btn-outline-helper" data-bs-toggle="modal" data-bs-target="#addHelper">Add New
        Social Worker</button>
    @endrole
    <div class="row justify-content-center mt-5">
        <table id="helpers">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Group Name</th>
                    <th>Contact</th>
                    <th>Address</th>
                    <th>Details</th>
                    @role('admin')
                    <th>Action</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($helpers as $helper)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$helper->group_name}}</td>
                    <td>{{$helper->contact}}</td>
                    <td>{{$helper->address}}</td>
                    <td>{{$helper->about_help}}</td>
                    @role('admin')
                    <td class="d-flex" id={{$helper->id}}>
                        <div class="m-1">
                            <button class="editBtn btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                            <button class="checkBtn btn btn-sm btn-outline-success d-none"><i
                                    class="fas fa-check"></i></button>
                        </div>
                        <div class="m-1">
                            <form action="{{route('helper.destroy',$helper->id)}}" method="post">
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

@include('helper.create')
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
                group_name: tr.find('td:nth-child(2)').text(),
                contact: tr.find('td:nth-child(3)').text(),
                address: tr.find('td:nth-child(4)').text(),
                about_help: tr.find('td:nth-child(5)').text()
            };
            // contact validation
            if (data.contact.length == 11) {
                axios.post('/helper/update',data).then(function(response){
                    toastr.success('Helper Updated Successfully');
                });
            }else{
                toastr.error('Contact number must be 11 digits');
            }

         });
   }
</script>
@endsection
