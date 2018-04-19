@extends('layouts.app')

@section('content')
    <div class="w-full max-w-lg mx-auto mt-4 p-4">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <h2 class="text-center">Hvorfor benytte Heisann.no?</h2>
            </div>

            <div class="w-full mt-6">
                <p>25. mai 2018 blir ny personvernforordning (GDPR) innført i EU, og blir også gjeldende for Norge gjennom vår EØS avtalen. Norge har allerede
                blant de strengeste reglene i verden for personvern, men de nye reglene skjerper kravene for hvordan bedrifter, kommuner og staten
                kan behandle personopplysninger. Viktigheten av å sikre personopplysninger og konfidensiell informasjon blir stadig viktigere og hensikten bak Heisann.no er å
                tilby en løsning for sikker kommunikasjon med to-faktor pålogging og kryptering.</p>

                <p class="font-bold mt-4 mb-4">Med Heisann.no kan du sende informasjon trygt og enkelt</p>

                <p>E-post er fortsatt en utrygg kanal for å sende personopplysninger og konfidensiell informasjon. En e-post kan
                sammenlignes med å sende et postkort, der hvor veldig mange kan lese innholdet. Både Google Apps og Office 365 er svært gode tjenester til sine formål. Med
                Heisann.no har vi prøvd å forenkle mottak og sending av konfidensiell informasjon og personopplysninger der hvor både avsender og mottaker kan
                være sikker på at informasjonen ikke kan leses av uvedkommende.</p>

                <p class="mt-4">Når du sender en beskjed gjennom Heisann.no så går beskjeden gjennom kryptert overføring på Internett (HTTPS/SSL), beskjeder
                blir kryptert når de lagres i vår database og dokumenter blir lagret kryptert på Amazon sine datasentraler i Frankfurt.</p>


            </div>

        </div>
    </div>

@endsection