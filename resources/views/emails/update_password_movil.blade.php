@component('mail::message')
#¡ Que tal {{ $name }} !

Recibes este email porque se solicitó un restablecimiento de contraseña para tu cuenta.
@component('mail::table')

| Usuario | Nueva Contraseña |
|:---------|:------------|
| {{ $user }} | {{ $password }} |


@endcomponent
Recurda en tu perfil cambiar esta contraseña.<br>
Gracias,<br>
{{ config('app.name') }}
@endcomponent
