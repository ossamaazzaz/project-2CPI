@extends('layouts.dashboard')

@section('section')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Code :') }}</div>
                <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="codeinput" type="code" class="form-control" name="code" placeholder="entry code of the product here" required autofocus>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success" onclick="check()">Check</button>
                        <label class="text-md-right"></label>
                        <label class="text-justify" id="validationMsg"></label>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
