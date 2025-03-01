@extends('user.layouts.master-layout')
@section('head')
@section('title','- Notification')

@endsection
@section('main_content')

    <div class="right_section">
        <div>
            <h4>My Notification</h4>
        </div>
    </div>
    <div class="media-list">
         <div class="show-notification-data ">
            @foreach ($notifications as $notification)

            
              @if ($notification->type == 'university')
              <div class="card card-body shadow mb-1">
                {{-- @foreach (@$notification->application->carts  as $cart) --}}
                  <a href="{{ route('frontend.application-details', @$notification->application->id) }}" class="media-list-link @if(@$notification->is_read == 0)unread @else read @endif">
                    <div class="media">
                      <img src="{{ @$notification->application->student->image_show }}" alt="" style="height:60px;width:60px;">
                      <div class="media-body">
                        <p class="noti-text">&nbsp; <strong> &nbsp; {{ @$notification->application->student->name }}</strong> {{ @$notification->text }}.</p>
                        <p> &nbsp; {{date('F,d,Y H:i:s',strtotime(@$notification->created_at))}}</p>
                      </div>
                    </div><!-- media -->
                  </a>
                {{-- @endforeach --}}
              </div>

              @elseif ($notification->type == 'event')
              <div class="card card-body shadow mb-1">
                <a href="{{ route('frontend.event.details',$notification->event_cart->event->id) }}" class="media-list-link @if($notification->is_read == 0)unread @else read @endif">
                  <div class="media">
                    <img src="{{ @$notification->event_cart->event->host->image_show }}" alt="" style="height:60px;width:60px;">
                    <div class="media-body">
                      <p class="noti-text">&nbsp; Event<strong> &nbsp;  {{ @$notification->event_cart->order->order_number }}</strong> {{ $notification->text }}.</p>
                      <p> &nbsp; {{date('F,d,Y H:i:s',strtotime($notification->created_at))}}</p>
                    </div>
                  </div><!-- media -->
                </a>
              </div>
              @else
              
              
              @endif






                
            @endforeach
         </div>
    </div>









@endsection
