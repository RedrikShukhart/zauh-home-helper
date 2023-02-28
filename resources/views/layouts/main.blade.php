@extends('layouts.base')

@section('content')

    <section>


        <div class="container" {{--style="border-style: dashed; border-color: #4b5563"--}}>
            <div class="row">
{{--                <div class="col-2" --}}{{--style="border-style: dotted; border-color: #4b5563"--}}{{-->
                    @include('includes.menu')
                </div>--}}
                <div class="col" {{--style="border-style: dotted; border-color: #4b5563"--}}>
                    @yield('main.content')
                </div>
            </div>
            {{--            @yield('main.content')--}}
        </div>


    </section>

@endsection
