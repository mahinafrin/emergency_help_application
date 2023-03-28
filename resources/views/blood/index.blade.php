@extends('layouts.app')

@section('head')
<style>
 .dataTables_filter {
  padding-bottom: 10px;
 }

 .card img {
  border-radius: 3px;
  border: 1px solid #ccc;
  box-shadow: 0px 0px 5px 0px rgba(0, 0, 0, 0.2);
 }

</style>

@endsection

@section('breadcrumbs')
<section class="contactus" style="background: url('{{asset('image/breadcrumb/blood.png')}}');background-repeat: no-repeat;
    background-size: cover;">
 <div class=" container">
  <div class="w-50 text-center m-auto">
   <h1 style="font-weight: 700;">Blood List</h1>
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;">
     <li class="breadcrumb-item"><a href="/">Home</a></li>
     <li class="breadcrumb-item active" aria-current="page">Bloods</li>
    </ol>
   </nav>
  </div>
 </div>
</section>
@endsection

@section('content')
<div class="container mt-5">
 @role('admin')
 <div class="row d-flex justify-content-center align-items-center">
  <div class="col-md-4">
   <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#addNewblood">Add New
    Blood</button>
  </div>

  <div class="col-md-4">
   <div class="d-flex">
    <input type="text" class="form-control input-1" id="searchBloodByAddress" placeholder="Search By Address">
    <i class="fas fa-search text-info m-2" style="font-size:22px!important"></i>
   </div>
  </div>
  <div class="col-md-4 float-right">
   <div class="d-flex">
    <input type="text" class="form-control input-2" id="searchBloodByGroup" placeholder="Search Blood">
    <i class="fas fa-search text-info m-2" style="font-size:22px!important"></i>
   </div>
  </div>
 </div>
 @else
 <div class="row">
  <div class="col-md-3">
   <div class="d-flex">
    <input type="text" class="form-control input-1" id="searchBloodByAddress" placeholder="Search By Address">
    <i class="fas fa-search text-info m-2" style="font-size:22px!important"></i>
   </div>
  </div>
  <div class="col-md-6"></div>
  <div class="col-md-3">
   <div class="d-flex">
    <input type="text" class="form-control input-2" id="searchBloodByGroup" placeholder="Search Blood">
    <i class="fas fa-search text-info m-2" style="font-size:22px!important"></i>
   </div>
  </div>
 </div>
 @endrole
 <div class="row mt-5" id="groups">
  @foreach ($bloods as $blood)
  <div class="col-md-3 info mt-4 group">
   <div class="card" style="width: 16rem;">
    <img src="{{asset('image/blood/donation-blood.png')}}" class="card-img-top" alt="{{$blood->donner_name}}">
    <div class="card-body">
     <h5 class="card-title">
      <i class="fas fa-user text-success mr-2"></i>
      {{$blood->donner_name}}
     </h5>
     <p class="card-text" style="font-size: large!important">
      <i class="fas fa-medkit text-info mr-2"></i>
      <span class="group_name">{{$blood->group_name}}</span>
      <br>
      <i class="fa fa-phone text-primary"></i> {{$blood->phone}} <br>
      <i class="fa fa-map-marker text-danger"></i>
      <span class="donner_address">{{$blood->address}} </span>
      <br>
     </p>
     {{-- eye icon --}}
     <a href="{{route('blood.view',$blood->id)}}" class="btn btn-sm btn-outline-success"><i class="fa fa-eye"></i></a>
     @role('admin')
     <a href="#" class="btn btn-sm btn-outline-info editBtn" data-bs-toggle="modal" data-bs-target="#editBlood" id="{{$blood->id}}"><i class="fa fa-edit"></i></a>
     <a href="{{route('blood.destroy',$blood->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
     @endrole
    </div>
   </div>
  </div>
  @endforeach
 </div>
</div>

@include('blood.create')
@include('blood.edit')
@endsection

@section('script')
<script>
 $(document).ready(function() {
  editBtn();
  searchBlood();
 });

 function searchBlood() {
  let groups = document.querySelectorAll('.group');
  let list = $('#groups');
  for (let i = 1; i <= 2; i++) {
   $(document).on('input', `.input-${i}`, function() {
    let address = $("#searchBloodByAddress").val();
    let group = $("#searchBloodByGroup").val();
    debounce(function() {
     if (address) {
      let data = Array.from(groups).filter(element => {
       return element.textContent.trim().toLowerCase().includes(address);
      });

      if (group) {
       data = data.filter(element => {
        return element.textContent.trim().toLowerCase().includes(group);
       });
      }
      list.html(data)
     } else if (group) {
      let data = Array.from(groups).filter(element => {
       return element.textContent.trim().toLowerCase().includes(group);
      });

      if (address) {
       data = data.filter(element => {
        return element.textContent.trim().toLowerCase().includes(address);
       });
      }
      list.html(data)
     } else {
      list.html(groups);
     }
    })
   })
  }
 }


 let timeout;
 let debounce = (func, time = 500) => {
  if (timeout) clearTimeout(timeout);
  timeout = setTimeout(() => {
   func();
  }, time);
 }


 function editBtn() {
  $('.editBtn').click(function() {
   var id = $(this).attr('id');
   $('#editId').val(id);
   axios.get(`/blood/${id}/fetch`).then(function(response) {
    let data = response.data.data;
    $('#editName').val(data.donner_name);
    $('#editBlood_group').val(data.group_name);
    $('#editPhone').val(data.phone);
    $('#editAddress').val(data.address);
    console.log(data.group_name);
   });
  });
 }

</script>
@endsection
