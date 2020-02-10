@component('mail::message')
# Nieuw verzoek:

Er is een nieuw verzoek verstuurd. Hieronder vindt u de details:

@component('mail::panel')
    - Naam:{{$name}}
    - Email:{{$email}}
    - Tel.:{{$phone}}
    - Onderwerp:{{$subject}}
    - Bericht:{{$content}}
@endcomponent



@endcomponent
