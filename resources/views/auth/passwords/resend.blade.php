@extends('layouts.app')

@section('content')
    <div class="flex items-center mt-8">
        <div class="md:w-1/2 md:mx-auto">
            <div class="rounded shadow">
                <div class="font-medium text-lg text-white bg-indigo p-3">
                    Få ny kontoaktiveringslenke på e-post
                </div>
                <div class="bg-white p-3 rounded rounded-b">

                    <div class="text-center">
                        @include('layouts.partials.img_forgot_password')
                    </div>

                    <form class="form-horizontal" method="POST" action="{{ route('auth.resend') }}">
                        {{ csrf_field() }}


                        <div class="flex items-stretch mb-3">
                            <label for="email" class="text-right font-semibold text-grey-dark text-sm pt-2 pr-3 align-middle w-1/4">E-post adresse</label>
                            <div class="flex flex-col w-3/4">
                                <input id="email" type="email" class="flex-grow h-8 px-2 border rounded {{ $errors->has('email') ? 'border-red-dark' : 'border-grey-light' }}" name="email" value="{{ $email or old('email') }}" required autofocus>
                                {!! $errors->first('email', '<span class="text-red-dark text-sm mt-2">:message</span>') !!}
                            </div>
                        </div>

                        <div class="flex">
                            <div class="w-3/4 ml-auto">
                                <button type="submit" class="bg-brand hover:bg-brand-dark text-white text-sm font-sembiold py-2 px-4 rounded mr-3">
                                    Send kontoaktiveringslenke
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
