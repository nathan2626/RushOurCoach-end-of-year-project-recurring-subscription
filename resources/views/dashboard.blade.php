@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="">
                    @csrf

                    <!-- Name -->
                        <div>
                            <label for="name" value="{{ Auth::user()->name }}" />

                            <input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ Auth::user()->name }}" required autofocus />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <label for="email" value="{{ Auth::user()->email }}" />

                            <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ Auth::user()->email }}" required />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <label for="password" value="**************" />

                            <input id="password" class="block mt-1 w-full"
                                   type="password"
                                   name="password"
                                   required autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <label for="image_confirmation" />

                            <input id="image_confirmation" class="block mt-1 w-full"
                                   type="file"
                                   name="image_confirmation" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="ml-4">
                                Edit
                            </button>
                            <a class="ml-4" href="/user/delete/{{Auth::user()->id}}">
                                Delete
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
