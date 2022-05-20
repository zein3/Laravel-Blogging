@extends('layouts.skeleton')

@section('body')

        <x-layouts.navbar />

        <div class="container min-vh-100">
            <div class="row min-vh-100">
                
                <x-layouts.sidebar />

                {{--Content--}}
                <div class="col-lg-9 min-vh-100">
                    @yield('content')
                </div>

            </div>
        </div>

        <x-layouts.footer />

@endsection

