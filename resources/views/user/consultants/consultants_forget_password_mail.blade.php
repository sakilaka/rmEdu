@php
     $title = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
@endphp
<h1>Welcome {{ @$user->name }},</h1>
<h4>You are Selected to Consultants of  {{ @$user->continents?->name }}</h4>
<p>Here is Your Login Information</p>
<p>Your Email/username: {{ @$user->email }} 
<p>Your Password : 12345678 
<br>
<a href="{{ url('/consultant-sign-in') }}">Click Here To Login</a>
<h4>Sincerely Your ,</h4>
<p>{{ @$title->company_name }}</p>
<p>By System Admin</p>

