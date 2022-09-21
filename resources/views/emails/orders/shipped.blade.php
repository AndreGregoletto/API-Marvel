@component('mail::message')
    <h3>Olá {{$dataRequest[0]->name}}, estamos te enviando seus dados novamente.</h3>
    <p>email: {{$dataRequest[0]->email}}</p>
    <p>senha: {{$dataRequest[0]->password}}</p>
@endcomponent