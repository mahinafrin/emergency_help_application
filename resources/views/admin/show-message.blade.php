@extends('layouts.app')

@section('head')
<style>
  #chat3 .form-control {
    border-color: transparent;
  }

  #chat3 .form-control:focus {
    border-color: transparent;
    box-shadow: inset 0px 0px 0px 1px transparent;
  }

  .badge-dot {
    border-radius: 50%;
    height: 10px;
    width: 10px;
    margin-left: 2.9rem;
    margin-top: -.75rem;
  }

  .fw-bold {
    font-size: 13px;
    text-decoration: none !important;
  }

  main {
    background: rgb(225 228 230 / 91%);
  }

  a {
    text-decoration: none;
  }
</style>
@endsection

@section('content')
<section style="margin-top:10rem;">
  <div class="container py-5">
    <div class="row">
      <div class="col-md-12">
        <h3 class="text-center">Client Message</h3>
        <div class="card" id="chat3" style="border-radius: 15px;">
          <div class="card-body">
            <div class="row">
              <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
                <div class="p-3">
                  <div class="input-group rounded mb-3">
                    <input type="search" class="form-control rounded" placeholder="Search" id="searchInput"
                      aria-label="Search" aria-describedby="search-addon" style="background: rgb(218, 216, 216)" />
                    <span class="input-group-text border-0" id="search-addon" style="cursor: pointer">
                      <i class="fas fa-search"></i>
                    </span>
                  </div>

                  <div data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px;overflow-y: auto">
                    <ul class="list-unstyled mb-0">
                      @foreach($messengers as $messenger)
                      <li class="p-2 border-bottom">
                        <a href="{{ route('admin.messages.index',$messenger->id)}}"
                          class="d-flex justify-content-between">
                          <div class="d-flex flex-row">
                            <div>
                              <img src="{{asset('image/client.png')}}" alt="avatar"
                                class="d-flex align-self-center me-3" width="60">
                              <span class="badge bg-success badge-dot"></span>
                            </div>
                            <div class="pt-1">
                              <p class="fw-bold mb-0">{{ $messenger->name}}</p>
                              <p class="small text-muted">{{ $messenger->address }}</p>
                            </div>
                          </div>
                          <div class="pt-1">
                            <p class="small text-muted mb-1">{{ $messenger->phone }}</p>
                            @if($messenger->messages->where('read_at',null)->count() > 0)
                            <span class="badge bg-danger rounded-pill float-end">{{
                              $messenger->messages->where('read_at',null)->count()}}</span>
                            @endif
                          </div>
                        </a>
                      </li>
                      @endforeach
                    </ul>
                  </div>

                </div>
              </div>

              <div class="col-md-6 col-lg-7 col-xl-8">

                @if($messages)
                <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true" id="message_list"
                  style="position: relative; height: 400px; overflow-y: auto;">

                  @foreach($messages as $message)
                  <div class="d-flex flex-row justify-content-start">
                    <img src="{{ asset('image/client.png')}}" alt="avatar 1" style="width: 45px; height: 100%;">
                    <div>
                      <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">{{ $message->message}}
                      </p>
                      <p class="small ms-3 mb-3 rounded-3 text-muted float-end">
                        {{ $message->created_at->diffForHumans()}}
                      </p>
                    </div>
                  </div>
                  @if(count($message->replies) > 0)
                  <div class="d-flex flex-row justify-content-end">
                    <div>
                      @foreach($message->replies as $reply)
                      <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">{{$reply->message}}</p>
                      @endforeach
                      <p class="small me-3 mb-3 rounded-3 text-muted">{{ $reply->created_at->diffForHumans()}}</p>
                    </div>
                    @if(auth()->user()->image)
                    <img src="{{ asset('/storage/Doctor_Image/'.auth()->user()->image)}}" alt="avatar 1"
                      class="rounded-pill" style="width: 45px; height: 45px;">
                    @else
                    <img src="{{ asset('image/doctor.jpg')}}" alt="avatar 1" style="width: 45px; height: 45px;">
                    @endif
                  </div>
                  @endif
                  @endforeach
                </div>
                @else
                <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true"
                  style="position: relative; height: 400px; overflow-y: auto;">
                  <p class="text-center text-info mt-5 font-italic">Choose A Client</p>
                </div>
                @endif

                @if($msgr)
                <form action="{{ route('admin.messages.reply',$msgr->id)}}" id="replyForm"
                  class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2" method="POST">
                  @csrf
                  @if(auth()->user()->image)
                  <img src="{{ asset('/storage/Doctor_Image/'.auth()->user()->image)}}" alt="avatar 1"
                    class="rounded-pill" style="width: 45px; height: 45px; margin-right: 1rem">
                  @else
                  <img src="{{ asset('image/doctor.jpg')}}" alt="avatar 1" style="width: 45px; height: 45px;">
                  @endif
                  <input type="text" class="form-control form-control-lg" name="message"
                    style="font-size: 12px; background: rgb(230, 228, 225)" placeholder="Type message">
                  <a role="button" type="submit" onclick="document.querySelector('#replyForm').submit()" class="ms-3">
                    <i class="fas fa-paper-plane"></i>
                  </a>
                </form>
                @else
                <div class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2" method="POST">
                  <img src="{{ asset('image/doctor.jpg')}}" alt="avatar 3"
                    style="width: 40px; height: 100%;margin-right:1rem ">
                  <input type="text" class="form-control form-control-lg" name="message"
                    style="font-size: 12px; background: rgb(230, 228, 225)" placeholder="Type message">
                  <a role="button" type="submit" onclick="document.querySelector('#replyForm').submit()" class="ms-3">
                    <i class="fas fa-paper-plane"></i>
                  </a>
                </div>
                @endif

              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>
</section>
@endsection

@section('script')
<script>
  setTimeout(() => {
        let boxHeight = $("#message_list").height();
        let nodes = document.getElementById("message_list").childElementCount;
        $("#message_list").animate({ scrollTop: boxHeight + 100 * nodes }, 1000);
    }, 100);

    // search

    // $(document).on('click','#search-addon',function(){
    //   let sVal = $()
    // })
</script>
@endsection