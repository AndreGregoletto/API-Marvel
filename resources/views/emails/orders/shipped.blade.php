@component('mail::message')
    <h3>Olá {{$dataRequest[0]->name}}.</h3>
    <p>email: {{$dataRequest[0]->email}}</p>
    <p>Token: {{$dataRequest[0]->token}}</p>
    <span>Lembre-se de que o Token só pode ser usado uma vez!</span>
@endcomponent