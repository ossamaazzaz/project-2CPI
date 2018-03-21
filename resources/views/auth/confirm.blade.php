@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Phone Number') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ action('ConfirmationMessageController@check') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="code" class="col-sm-4 col-form-label text-md-right">{{ __('Entry the code :') }}</label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control" name="code" value="" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
