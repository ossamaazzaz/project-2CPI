@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Phone Number') }}</div>

                <div class="card-body">
                    <form id="confirmation" action="#">

                        <div class="form-group row">
                            <label for="code" class="col-sm-4 col-form-label text-md-right">{{ __('Entry the code :') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" name="code" value="" required autofocus>
                                <button id="resend" onclick="resendcode(this)" class="btn btn-success">{{ __('Resend') }}</button>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4" >
                                <p id="wrongcode" hidden="true" style="color:Tomato;"> wrong code type the code again</p>
                            </div>
                            <div class="col-md-8 offset-md-4">
                                <input type="button" id="confirm" class="btn btn-primary" value="{{ __('Confirm') }}">
                            </div>
                        </div>

                       <div id="cmodale" class="cmodale canimated jackInTheBox">
                            <img class="confirmed" src="{{ asset('images/pic.png')}}">
                            <h1>confirmed</h1>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
