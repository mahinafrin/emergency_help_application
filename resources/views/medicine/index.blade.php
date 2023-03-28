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

 .btn-outline-medicine {
  /* greadiant color */
  color: #501b76;
  border-color: #501b76;
 }

 .btn-outline-medicine:hover {
  color: #fff;
  background-color: #501b76;
  border-color: #501b76;
 }

 .text-medicine {
  color: #501b76;
 }

 .bg-medicine {
  background-color: #501b76;
  color: #fff;
 }

 .text-medicine {
  color: #501b76;
 }

 .btn-outline-medicine {
  color: #501b76;
  border-color: #501b76;
 }

 .btn-outline-medicine:hover {
  color: #fff;
  background-color: #501b76;
  border-color: #501b76;
 }

 th {
  text-align: center;
  background-color: #501b76;
  color: #fff;
 }

</style>

@endsection

@section('breadcrumbs')
<section class="contactus" style="background: url('{{asset('image/breadcrumb/medicine.png')}}');background-repeat: no-repeat;
    background-size: cover;">
 <div class=" container">
  <div class="w-50 text-center m-auto">
   <h1 style="font-weight: 700;">Medicine List</h1>
   <nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent pl-0 px-0" style="margin-left: 37%;">
     <li class="breadcrumb-item"><a href="/">Home</a></li>
     <li class="breadcrumb-item active" aria-current="page">Medicines</li>
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
  <div class="col-md-2">
   <button class="btn btn-sm btn-outline-medicine" data-bs-toggle="modal" data-bs-target="#addNewMedicine">Add
    New
    Medicine</button>
  </div>
  <div class="col-md-5">
   <div class="d-flex">
    <i class="fas fa-search text-medicine m-2" style="font-size:22px!important"></i>
    <input type="text" class="form-control w-50 input-1" id="searchMedicineByAddress" placeholder="Search Medicine by Address">
   </div>
  </div>
  <div class="col-md-5">
   <div class="d-flex">
    <i class="fas fa-search text-medicine m-2" style="font-size:22px!important"></i>
    <input type="text" class="form-control input-2" id="searchMedicineByName" placeholder="Search Medicine by name">
   </div>
  </div>
 </div>
 @else
 <div class="row">
  <div class="col-md-6">
   <div class="d-flex">
    <i class="fas fa-search text-medicine m-2" style="font-size:22px!important"></i>
    <input type="text" class="form-control w-50 input-1" id="searchMedicineByAddress" placeholder="Search Medicine by Address">
   </div>
  </div>
  <div class="col-md-6">
   <div class="d-flex">
    <i class="fas fa-search text-medicine m-2" style="font-size:22px!important"></i>
    <input type="text" class="form-control input-2" id="searchMedicineByName" placeholder="Search Medicine by name">
   </div>
  </div>
 </div>
 @endrole
 <div class="row mt-5" id="medicines">
  @foreach ($medicines as $medicine)
  <div class="col-md-3 info mt-4 medicine">
   <div class="card" style="width: 16rem;">
    <img src="{{asset('image/medicine.jpg')}}" class="card-img-top" alt="{{$medicine->name}}">
    <div class="card-body">
     <h5 class="card-title">
      <i class="fas fa-medkit text-success mr-2"></i>
      <span class="medicine_name">{{$medicine->name}}</span>
     </h5>
     <p class="card-text" style="font-size: large!important">
      <span class="text-medicine">৳</span> <span class="group_name">{{$medicine->cost}}</span><br>
      <i class="fa fa-phone text-primary"></i> {{$medicine->contact}} <br>
      <i class="fa fa-map-marker text-danger"></i> <span class="medi_address">{{$medicine->address}}</span> <br>
      <i class="fa fa-university text-info"></i> {{$medicine->pharmacy_name}} <br>
     </p>
     @role('admin')
     <a href="#" class="btn btn-sm btn-outline-medicine editBtn" data-bs-toggle="modal" data-bs-target="#editMedicine" id="{{$medicine->id}}"><i class="fa fa-edit"></i></a>
     <a href="{{route('medicine.destroy',$medicine->id)}}" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>
     @endrole
    </div>
   </div>
  </div>
  @endforeach
 </div>
</div>

@include('medicine.create')
@include('medicine.edit')
@endsection

@section('script')
<script>
 $(document).ready(function() {
  editBtn();
  searchMedicine();
 });

 function searchMedicine() {
  let medicines = document.querySelectorAll('.medicine');
  let list = $('#medicines');
  for (let i = 1; i <= 2; i++) {
   $(document).on('input', `.input-${i}`, function() {
    let address = $("#searchMedicineByAddress").val();
    let name = $("#searchMedicineByName").val();

    debounce(function() {
     if (address) {
      let data = Array.from(medicines).filter(element => {
       return element.textContent.trim().toLowerCase().includes(address);
      });

      if (name) {
       data = data.filter(element => {
        return element.textContent.trim().toLowerCase().includes(name);
       });
      }
      list.html(data)
     } else if (name) {
      let data = Array.from(medicines).filter(element => {
       return element.textContent.trim().toLowerCase().includes(name);
      });

      if (address) {
       data = data.filter(element => {
        return element.textContent.trim().toLowerCase().includes(address);
       });
      }
      list.html(data)
     } else {
      list.html(medicines);
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
   axios.get(`/medicine/${id}/fetch`).then(function(response) {
    let data = response.data.data;
    $('#editName').val(data.name);
    $('#editCost').val(data.cost);
    $('#editContact').val(data.contact);
    $('#editAddress').val(data.address);
    $('#editPharmacyName').val(data.pharmacy_name);
   });
  });
 }

</script>
@endsection
