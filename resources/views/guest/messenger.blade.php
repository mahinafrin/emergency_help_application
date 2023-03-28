<input type="checkbox" id="check">
<label class="chat-btn" for="check">
  <i class="fa fa-message"></i>
  <sup class="text-white mb-3"> 
      <small>
      <strong id="messageCount">0</strong>
    </small>
    </sup>
</label>

@if(session('messenger'))
<input type="hidden" name="messenger_id" value="{{ session("messenger")->id}}">
<div class="wrapper chat-box">
  <div class="card" id="chat2">
    <div class="card-header d-flex justify-content-between align-items-center p-3">
      <h5 class="mb-0">{{ session('messenger')->name }}</h5>
    </div>
    <div class="card-body" id="printMsg" data-mdb-perfect-scrollbar="true"
      style=" height: 300px;overflow-y: auto;z-index: 6">
    </div>
    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
      <img src="{{asset('image/client.png')}}" alt="avatar 3" style="width: 40px; height: 100%;">
      <input type="text" class="form-control form-control-lg" id="messageInput" placeholder="Type message">
      <a class="ms-3" role="button" id="sendMessageBtn"><i class="fas fa-paper-plane"></i></a>
    </div>
  </div>
</div>
@else
<div class="wrapper">
  <div class="header">
    <h6>Let's Chat</h6>
  </div>
  <div class="text-center p-2"> <span>Please fill out the form to start chat!</span> </div>
  <form class="chat-form" action="{{route('messanger.info')}}" method="POST">
    @csrf
    <input type="text" class="form-control" name="name" placeholder="Name" value="{{old('name')}}" required>
    @error('name')
    <span class="text-danger text-sm font-sm font-italic">{{ $message }}</span>
    @enderror
    <input type="text" class="form-control" name="phone" placeholder="Phone" value="{{old('phone')}}" required>
    @error('phone')
    <span class="text-danger text-sm font-sm font-italic">{{ $message }}</span>
    @enderror
    <textarea class="form-control" placeholder="Your Address" name="address" value="{{old('address')}}"
      required></textarea>
    @error('address')
    <span class="text-danger text-sm font-sm font-italic">{{ $message }}</span>
    @enderror
    <button class="btn btn-success btn-block" type="submit">Submit</button>
  </form>
</div>
@endif