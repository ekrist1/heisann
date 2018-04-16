@extends('layouts.app')

@section('content')

    <div class="w-full max-w-lg mx-auto mt-4">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <h2 class="text-center">Sikkerhet på heisann.no</h2>
            </div>

            <div class="w-full mt-6">
                <p class="mt-4">Vår server(e) står i Frankfurt og vi bruker Vultr som leverandør av serverkapasitet. All trafikk mellom klient
                og server overføres via kryptert kanal (HTTPS/SSL)</p>

                <p class="mt-4">Meldingsteksten som blir sendt eller mottatt med heisann.no blir lagret kryptert i vår database med <a class="text-blue font-bold" href="https://legacy.gitbook.com/book/jedisct1/libsodium/details">Sodium</a>. Dette er et svært sikkert
                    bibliotek for kryptering og med dagens datakraft vil det ta mange hundere år å dekryptere en melding. Alle bedrifter som bruker løsningen vår har en egen og unik
                    krypteringsnøkkel. </p>

                <p class="mt-4">Filer og vedlegg som lastes opp sammen med en melding blir lagret på Amazon (S3) sine datalagringssentraler i Europa (Frankfurt - Tyskland). Dokumenter og filer blir
                    kryptert ved lagring med krypteringsstandarden AES-256.</p>

                <p class="mt-4">For å laste ned beskjeder og filer må mottakeren benytte en passordbeskyttet lenke og engangskode mottatt på SMS. To-faktor
                authentisering regnes som svært sikkert. Bare dersom en uvedkommende får tak i både engangskode og passordbeskyttet lenke sendt på e-post
                kan man få lastet ned beskjed og dokumenter.</p>

                <p class="mt-4">Beskjeder og dokumenter sendt via Heisann.no blir maksimalt lagret i 30 dager. Data blir slettet automatisk etter 30 dager
                og kan ikke gjenskapes.</p>

                <p class="mt-4">Vi benytter også andre mekanismer som brannvegger og oppdaterer kontinuerlig vår programvare for å sikre at sannsynligheten for
                at uvedkommende får tak i informasjon er minimal.</p>

                <p class="mt-4">Heisann.no er en svært sikker tjeneste og kan brukes for å sende sensitiv informasjon og konfendisielle avtaler</p>

                <p class="mt-4 font-bold">Tiltak du kan gjøre for økt sikkerhet</p>

                <p class="mt-4">For å øke sikkerheten bør du benytte et langt passord (over 8 tegn) som er vanskelig å gjette. Passordet
                kan gjerne være en settning. Passordet bør endres jevnling. I tillegg bør du sikre maskinen din med brannvegger og sørge for at den er oppdatert. Du bør unngå
                å bruke tjenesten på ukjente maskiner.</p>

                <p class="mt-4 font-bold">Referanser</p>

                <p class="mt-4">Amazon vil være i samsvar med EUs personvernforordning: <a href="https://aws.amazon.com/compliance/gdpr-center/">Amazon GDPR</a></p>


        </div>
    </div>

@endsection