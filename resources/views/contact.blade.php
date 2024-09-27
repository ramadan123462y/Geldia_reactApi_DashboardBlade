@component('mail::message')
<h1>{{ $name }}</h1>

<p>{{ $content }}</p>

<ul>
    <li><strong>Phone:</strong> {{ $phone }}</li>
    <li><strong>User Type:</strong> {{ $userType }}</li>
    <li><strong>Email :</strong> {{ $email }}</li>
</ul>

<p>Thanks<br></p>
@endcomponent
