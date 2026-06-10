<x-mail::message>
# Nouveau message de contact

**De :** {{ $data['name'] }} ({{ $data['email'] }})  
**Sujet :** {{ ucfirst($data['subject']) }}

**Message :**
{{ $data['message'] }}

<x-mail::button :url="config('app.url')">
Retour sur le site
</x-mail::button>

Merci,<br>
{{ config('app.name') }}
</x-mail::message>
