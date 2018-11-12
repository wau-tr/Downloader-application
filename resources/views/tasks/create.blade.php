@extends('html')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create task') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tasks.store') }}" aria-label="{{ __('Create') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="url" class="col-sm-4 col-form-label text-md-right">{{ __('Resource URL') }}</label>

                            <div class="col-md-6">
                                <input id="url" type="text" class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" value="{{ old('url') }}" required autofocus>
                                @if ($errors->has('url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="v-btn btn-primary">
                                    {{ __('Create') }}
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
