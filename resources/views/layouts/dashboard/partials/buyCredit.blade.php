<p>Tilgjengelig på konto: 40 kr</p>

<a>Fyll på</a>


<add-credit
        id="{{ Session::get('tenant') }}"
        name="Stillingsannonse"
        description="Annonse aktiveres rett etter kjøp"
        stripekey="{{ config('services.stripe.key') }}"
        email="{{ $user->email }}">
</add-credit>

@section('stripe')
    <script src="https://checkout.stripe.com/checkout.js"></script>

@endsection