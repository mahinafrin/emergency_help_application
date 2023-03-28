@extends('layouts.app')

@section('head')
<style>
 .dataTables_filter {
  padding-bottom: 10px;
 }

</style>

@endsection

@section('breadcrumbs')
<section class="contactus" style="background: url('{{asset('image/breadcrumb/doctor.jpg')}}');background-repeat: no-repeat;
    background-size: cover;">
 <div class="container">
  <div class="w-50 text-center m-auto">
   <h1 style="font-weight: 700;">Doctor List</h1>
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;">
     <li class="breadcrumb-item"><a href="/">Home</a></li>
     <li class="breadcrumb-item active" aria-current="page">Doctors</li>
    </ol>
   </nav>
  </div>
 </div>
</section>
@endsection

@section('content')
<div class="container mt-3">
 @role('admin')
 <div class="row d-flex justify-content-center align-items-center">
  <div class="col-md-4">
   <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#addNewDoctor">Add New
    Doctor</button>
  </div>
  <div class="col-md-4">
   <div class="d-flex">
    <input type="text" class="form-control input-1" id="searchByAddress" placeholder="Search Doctor by address">
    <i class="fas fa-search text-info m-2" style="font-size:22px!important"></i>
   </div>
  </div>
  <div class="col-md-4 float-right">
   <div class="d-flex">
    <input type="text" class="form-control input-2" id="searchBySpecialist" placeholder="Search by Specialist Title">
    <i class="fas fa-search text-info m-2" style="font-size:22px!important"></i>
   </div>
  </div>
 </div>
 @else
 <div class="row">
  <div class="col-md-4">
   <div class="d-flex">
    <input type="text" class="form-control input-1" id="searchByAddress" placeholder="Search Doctor by address">
    <i class="fas fa-search text-info m-2" style="font-size:22px!important"></i>
   </div>
  </div>
  <div class="col-md-4"></div>
  <div class="col-md-4">
   <div class="d-flex">
    <input type="text" class="form-control input-2" id="searchBySpecialist" placeholder="Search by Specialist Title">
    <i class="fas fa-search text-info m-2" style="font-size:22px!important"></i>
   </div>
  </div>
 </div>
 @endrole
 <div class="row mt-5" id="doctors">
  @foreach ($doctors as $doctor)
  <div class="col-md-3 info mt-4 doctor">
   <div class="card" style="width: 16rem;">
    <img src="{{asset('storage/Doctor_Image/'. $doctor->image)}}" height="170px" class="card-img-top" alt="{{$doctor->name}}">
    <div class="card-body">
     <h5 class="card-title">{{$doctor->name}}</h5>
     <p class="card-text" style="font-size: smaller!important">
      {{-- <i class="fa fa-phone"></i> {{$doctor->phone}} <br>
      <i class="fa fa-envelope"></i> {{$doctor->email}} <br> --}}
      <i class="fa fa-map-marker"></i>
      {{$doctor->address}}
      <br>
      <i class="fa fa-user-md"></i>
      {{$doctor->specialist}}
      <br>
     </p>
     {{-- eye icon --}}
     <a href="{{route('doctor.view',$doctor->id)}}" class="btn btn-sm btn-outline-success"><i class="fa fa-eye"></i></a>
     @role('admin')
     <a href="#" class="btn btn-sm btn-outline-info editBtn" data-bs-toggle="modal" data-bs-target="#editDoctor" id="{{$doctor->id}}"><i class="fa fa-edit"></i></a>
     <a href="{{route('doctor.destroy',$doctor->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
     @endrole
    </div>
   </div>
  </div>
  @endforeach
 </div>
</div>

@include('doctor.create')
@include('doctor.edit')
@endsection

@section('script')
<script>
 $(document).ready(function() {
  editBtn();
  searchDoctor();
 });

 function searchDoctor() {
  let doctors = document.querySelectorAll('.doctor');
  let list = $('#doctors');
  for (let i = 1; i <= 2; i++) {
   $(document).on('input', `.input-${i}`, function() {
    let address = $("#searchByAddress").val();
    let specialist = $("#searchBySpecialist").val();
    debounce(function() {
     if (address) {
      let data = Array.from(doctors).filter(element => {
       return element.textContent.trim().toLowerCase().includes(address);
      });

      if (specialist) {
       data = data.filter(element => {
        return element.textContent.trim().toLowerCase().includes(specialist);
       });
      }
      list.html(data)
     } else if (specialist) {
      let data = Array.from(doctors).filter(element => {
       return element.textContent.trim().toLowerCase().includes(specialist);
      });

      if (address) {
       data = data.filter(element => {
        return element.textContent.trim().toLowerCase().includes(address);
       });
      }
      list.html(data)
     } else {
      list.html(doctors);
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
   axios.get(`/doctor/${id}/fetch`).then(function(response) {
    let data = response.data.data;
    $('#editName').val(data.name);
    $('#editPhone').val(data.phone);
    $('#editEmail').val(data.email);
    $('#editAddress').val(data.address);
    $('#editDetails').val(data.details);
    $('#editSpecialist').val(data.specialist);
   });
  });
 }

</script>
@endsection
