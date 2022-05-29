@extends('layouts.skeleton')

@section('body')

        <x-layouts.navbar />


        <div class="container min-vh-100">

            @if(session('message'))
            <div class="my-2 alert alert-primary alert-dismissable fade show" role="alert">
                <div class="d-flex w-100 justify-content-between align-items-center">
                    <h4>
                        {{ session('message') }}
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            @endif

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

