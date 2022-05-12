@component('mail::message')
    <strong>Thanks you for the message</strong><br>
    <strong>Name:</strong> {{$data['name']}}<br>
    <strong>Email from:</strong> {{$data['email']}}<br>
    <strong>Message:</strong><br>
    {{$data['message']}}

@endcomponent
