@extends('layouts.app')

@section('content')
    <div class="flex h-full max-w-full">
        <div class="m-auto sd:max-w-prose max-w-full">
            <p class="leading-normal text-base md:text-2xl mb-8 text-center">
                No setup required. Just copy-paste the code and you're done!
            </p>
            {!!$html!!}
        </div>
    </div>
@endsection
