@component('mail::message')
# Uw verzoek is verstuurd!

Uw verzoek is zojuist succesvol verstuurd. Wij zullen z.s.m. contact proberen te leggen met u.

Hieronder vindt u een overzicht met de gegevens die u heeft gestuurd:

@component('mail::panel')
    - Naam:{{$name}}
    - Email:{{$email}}
    - Tel.:{{$phone}}
    - Onderwerp:{{$subject}}
    - Bericht:{{$content}}
@endcomponent

Met vriendelijke groet,<br/>
{{ config('app.name') }}
@endcomponent
