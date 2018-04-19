@extends('layouts.app')

@section('content')

    <div class="w-full max-w-lg mx-auto mt-4 p-4">
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <h2 class="text-center">Spørsmål og svar</h2>
            </div>

            <div class="w-full mt-6">

                <p class="mt-4 font-bold">Hvorfor koster tjenesten penger?</p>

                <p class="mt-4">Lagring, infrastruktur, servere, sikkerhet og utvikling koster penger. Vi legger mye ressurser i en sikker tjeneste.
                Til motsettning til en del andre tjenester betaler du kun for forbruket og ikke et løpende abonnement</p>

                <p class="mt-4 font-bold">Kan dere garantere at informasjon aldri kommer på avveie på tjenesten deres?</p>

                <p class="mt-4">Nei. Det er tilnærmet umulig å sikre en tjeneste på Internett 100%.
                    Vi har en rekke sikkerhetstiltak der hvor vi krypterer filer, dokumenter og beskjeder slik at du skal være trygg på
                at data ikke kommer uvedkommende ihende.</p>

                <p class="mt-4 font-bold">Hvem har tilgang til dataen som ligger i løsningen deres?</p>

                <p class="mt-4">Vi som leverandør har tilgang til databaser og dokumenter. En databehandleravtale mellom oss som leverandør og deg som kunde
                regulerer hvordan vi som databehandler behandler personopplysninger. </p>

                <p class="mt-4 font-bold">Lagrer dere dataen i Norge?</p>

                <p class="mt-4">Filer blir lagret på Amazon (S3) sine datalagringssentraler i Europa (Frankfurt - Tyskland). Dokumenter og filer blir
                    kryptert ved lagring med krypteringsstandarden AES-256. Amazon er underlagt EUs GDPR krav og er en svært annerkjent tjeneste</p>

                <p class="mt-4">For å laste ned beskjeder og filer må mottakeren benytte en passordbeskyttet lenke og engangskode mottatt på SMS. To-faktor
                    authentisering regnes som svært sikkert. Bare dersom en uvedkommende får tak i både engangskode og passordbeskyttet lenke sendt på e-post
                    kan man få lastet ned beskjed og dokumenter.</p>

                <p class="mt-4 font-bold">Dokumentene har blitt slettet automatisk, kan dere hente disse tilbake?</p>

                <p class="mt-4">Nei. Vi lagrer ikke informasjon lengre enn angitt lengde.</p>

                <p class="mt-4 font-bold">Gir ikke vanlig E-post, Dropbox, Google Docs god nok sikkerhet?</p>

                <p class="mt-4">Normalt gir ikke slike tjenester tilstrekelig sikkerhet for å kunne sende sensitiv informasjon gjennom dem. E-post er en usikker kommunikasjonskanal om man ikke har satt opp en kryptert forbindelse. Normalt har man
                heller ikke sterk authentisering på e-post. Både Dropbox og Google leverer gode tjenester, men vi har bygget en tjeneste tilpasset nordiske forhold
                med Norsk språk og fokus på enkelhet. Du kan lese mer om når du må bruke
                <a class="font-bold" href="https://www.datatilsynet.no/regelverk-og-skjema/verktoy-skjema/sporsmal-svar/Informasjonssikkerhet-hos-virksomheter/Nar-er-det-krav-om-sterkere-autentisering/">sterk autentisering </a>hos Datatilsynet</p>

                <p class="mt-4 font-bold">Kan dere lage en datebehandleravtale med oss?</p>

                <p class="mt-4">Selvsagt. Tillit og personvern er det viktigste med tjenesten vår.</p>

                <p class="mt-4 font-bold">Kan jeg bruke kontaktskjemaet / opplastingsskjemaet på Wordpress?</p>

                <p class="mt-4">Ja. Du kan lett legge inn en embed-kode på Wordpress. Med vår løsning kan kundene dine enkelt sende konfidensielle dokumenter og personopplysninger gjennom nettsiden din.</p>

                <p class="mt-4 font-bold">Hvilke andre fordeler gir løsningen deres?</p>

                <p class="mt-4">Det er flere fordeler med å bruke vår tjeneste ved sending av enkelte type meldinger. Du får blant annet en lesebekreftelse om mottakeren har lest beskjeden du har sendt.
                En annen fordel er at du kan sende filer og vedlegg som blir sperret av SPAM filterene. Kundene dine kan i tillegg bruke vår skjemafunksjonalitet for å sende dere dokumenter og beskjeder på en sikker måte.</p>

                <p class="mt-4 font-bold">Kan vi sende/motta helseopplysninger via løsningen deres?</p>

                <p class="mt-4">Helseopplysninger er sensitiv informasjon og krever at man foretar grundige risikovurderinger før man sender dette elektronisk. Forskriftene til personopplysningsloven krever at e-post med helseopplysninger må være kryptert.
                    Dersom dette ikke er mulig, kan e-post ikke brukes. Det stilles strenge krav til informasjonssikkerhet,
                    blant annet for å hindre at helseopplysninger kommer på avveier. Dersom man skal drive pasientbehandling via Internett, f.eks. med e-post, må sikkerheten tilfredsstille de strengeste reglene.</p>

            </div>
        </div>

@endsection