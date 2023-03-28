@extends('layouts.app')

@section('head')
<style>
    .dataTables_filter {
        padding-bottom: 10px;
    }

    th {
        background-color: #0dcaf0 !important;
    }
</style>

@endsection

@section('breadcrumbs')
<section class="contactus" style="background: url('{{asset('image/breadcrumb/oxygen.jpg')}}');background-repeat: no-repeat;
    background-size: cover;">
    <div class="container">
        <div class="w-50 text-center m-auto">
            <h1 style="font-weight: 700;">Oxygen List</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Oxygens</li>
                </ol>
            </nav>
        </div>
    </div>
</section>
@endsection

@section('content')
<div class="container mt-5">
    @role('admin')
    <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#addNewoxygen">Add New
        Oxygen</button>
    @endrole
    <div class="row justify-content-center mt-5">
        <table id="oxygens">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Contact</th>
                    <th>Location</th>
                    @role('admin')
                    <th>Action</th>
                    @endrole
                </tr>
            </thead>
            <tbody>
                @foreach ($oxygens as $oxygen)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td><span>{{$oxygen->quantity}}</span> ML</td>
                    <td>{{$oxygen->price}}</td>
                    <td>{{$oxygen->contact}}</td>
                    <td>{{$oxygen->location}}</td>
                    @role('admin')
                    <td class="d-flex" id={{$oxygen->id}}>
                        <div class="m-1">
                            <button class="editBtn btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                            <button class="checkBtn btn btn-sm btn-outline-success d-none"><i
                                    class="fas fa-check"></i></button>
                        </div>
                        <div class="m-1">
                            <form action="{{route('oxygen.destroy',$oxygen->id)}}" method="post">
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

@include('oxygen.create')
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
            let tr = $(this).parent().parent().parent();
            tr.find('td:not(:last-child,:first-child,:nth-child(2))').each(function () {
                var text = $(this).text();
                $(this).html('<input type="text" class="form-control" value="' + text + '">');
            });
            let qty = tr.find('td:nth-child(2)').text();
            qty = qty.replace(/[^0-9]/g, '');
            tr.find('td:nth-child(2)').html('<input type="number" class="form-control" value="' + qty + '">');
         });
   }
   function checkBtn() {
         $('.checkBtn').click(function () {
              var id = $(this).parent().parent().attr('id');
            $(this).addClass('d-none');
            $(this).parent().parent().find('.editBtn').removeClass('d-none');
            let tr = $(this).parent().parent().parent();
            tr.find('td:not(:last-child,:first-child,:nth-child(2))').each(function () {
                var text = $(this).find('input').val();
                $(this).html(text);
            });
            let qty = tr.find('td:nth-child(2)').find('input').val();
            tr.find('td:nth-child(2)').html(qty + ' ML');
            let data = {
                id: id,
                quantity: qty,
                price: tr.find('td:nth-child(3)').text(),
                contact: tr.find('td:nth-child(4)').text(),
                location: tr.find('td:nth-child(5)').text()
            };
            axios.post('/oxygen/update',data).then(function(response){
                toastr.success('Oxygen Updated Successfully');
            });
         });
   }
</script>
@endsection
