@component('mail::message')
    <h3>Olá {{$dataRequest[0]->name}}.</h3>
    <p>email: {{$dataRequest[0]->email}}</p>
    <p>Token: {{$dataRequest[0]->token}}</p>
@endcomponent