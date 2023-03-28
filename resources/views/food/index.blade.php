@extends('layouts.app')

@section('head')
<style>
    .dataTables_filter {
        padding-bottom: 10px;
    }


    .contactus {
        background: url('image/breadcrumb/food.png');
        background-size: cover;
    }

    .btn-outline-food {
        color: #ac043c;
        border-color: #ac043c;
    }

    .btn-outline-food:hover {
        color: #fff;
        background-color: #ac043c;
        border-color: #ac043c;
    }

    .bg-food {
        background-color: #ac043c;
        color: #fff;
    }

    .text-food {
        color: #ac043c;
    }

    th {
        text-align: center;
        background-color: #ac043c;
        color: #fff;
    }
</style>

@endsection

@section('breadcrumbs')
<section class="contactus">
    <div class="container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700; color:#ac043c">Food List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;color:#fff!important;">
                    <li class="breadcrumb-item"><a href="/" class="text-food">Home</a></li>
                    <li class="breadcrumb-item active text-food" aria-current="page">Foods</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container mt-5">
    @role('admin')
    <button class="btn btn-sm btn-outline-food" data-bs-toggle="modal" data-bs-target="#addFood">Add New
        Food</button>
    @endrole
    <div class="row justify-content-center mt-5">
        <table id="foods">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Cost</th>
                    <th>Contact</th>
                    @role('admin')
                    <th>Action</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $food)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$food->name}}</td>
                    <td>{{$food->address}}</td>
                    <td>{{$food->price}}</td>
                    <td>{{$food->contact}}</td>
                    @role('admin')
                    <td class="d-flex" id={{$food->id}}>
                        <div class="m-1">
                            <button class="editBtn btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                            <button class="checkBtn btn btn-sm btn-outline-success d-none"><i
                                    class="fas fa-check"></i></button>
                        </div>
                        <div class="m-1">
                            <form action="{{route('food.destroy',$food->id)}}" method="post">
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

@include('food.create')
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
            $(this).addClass('d-none');
            $(this).parent().parent().find('.checkBtn').removeClass('d-none');
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
                cost: tr.find('td:nth-child(4)').text(),
                contact: tr.find('td:nth-child(5)').text()
            };
            // contact validation
            if (data.contact.length == 11) {
                axios.post('/food/update',data).then(function(response){
                    toastr.success('Food Updated Successfully');
                });
            }else{
                toastr.error('Contact number must be 11 digits');
            }

         });
   }
</script>
@endsection
