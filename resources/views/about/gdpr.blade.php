@extends('layouts.app')

@section('content')
    <div class="w-full max-w-lg mx-auto mt-4 p-4">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <h2 class="text-center">GDPR og Heisann.no</h2>
            </div>

            <div class="w-full mt-6">
                <p class="text-xl">Ny personopplysningslov (GDPR) sier at Databehandler skal gjennomføre egnende tekniske og organisatoriske tiltak og gi tilstrekelig garantier for
                    at vernet til den registerte ivaetas.</p>

                <p class="font-bold mt-4 mb-4">Databehandlers ansvar i ny personvernforordning</p>

                <p>Databehandler skal også bistå behandlingsansvarlig med å overholde forpliktelsene i henhold til artikkel 32-16. Disse artiklene
                    angår personopplysningssikkerhet.</p>

                <p class="mt-2">Artikkel 32 sier blant annet at behandlingsansvarlig og databehandler skal gjennomføre egnende tekniske og organisatoriske tiltak
                    for å oppnå et sikkerhetsnivå som er egnet med hensyn til risiko for at opplysninger kommer på avveie minimaliseres.</p>

                <p class="font-bold mt-4 mb-4">Hva gjør vi i Heisann.no for å sikre etterlevelse av ny personopplysningslov?</p>

                <p>
                    <ul>
                    <li>Vi bruker kjente programmeringsspråk og et rammeverk som oppdateres jevnlig. Heisann kjører oppgraderinger av programvare minimum måndelig eller ved
                        oppdagelse av kjente svakheter</li>
                    <li>Servere oppgraderes jevnlig</li>
                    <li>To-faktor pålogging for å lese mottatte meldinger og for å lese sendte meldinger</li>
                    <li>Meldinger og dokumenter slettes automatisk etter 30 dager</li>
                    <li>Meldingstekst krypteres</li>
                    <li>Filer og dokumenter krypteres på Amazon sin lagringssentral i Frankfurt</li>
                </ul>

                </p>

                <p class="font-bold mt-4 mb-4">Hvilke ansvar har du som behandlingsansvarlig?</p>

                <p class="mt-2">Som behandlingsansvarlig er du ansvarlig for at du håndterer personopplysninger i henhold til ny personvernforordning som trer i kraft 25. mai 2018.</p>

                <p class="mt-2 mb-2">Kort fortalt betyr ny personopplysningslov:</p>

                <p>
                <ul>
                    <li>Åpenhet på hvordan du bruker og innsamler personopplysninger. Den som ber om samtykke til å bruke opplysninger skal gi klar og tydelig informasjon om hvordan personopplysningene skal brukes.</li>
                    <li>Du skal ikke samle inn flere personopplysninger enn det du behøver. Det vil ikke være lov å samle inn eller lagre personopplysninger man ikke trenger. Opplysninger som det ikke lenger er behov for, skal slettes. </li>
                    <li>Det skal gis adgang til den registerte til å rette uriktige opplysninger</li>
                    <li>Den registerte har rett til innsyn i opplysninger som er lagret</li>
                    <li>Du har rett til å bli slettet ("rett til å bli glemt")</li>
                </ul>

                </p>

            </div>

        </div>
    </div>

@endsection