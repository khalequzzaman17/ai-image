@extends('layouts.master')

@section('title', 'Image Generator with OpenAI')

@section('styles')

    <style>
        .card {
            background-image:linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
        }
    </style>

@endsection

@section('content')

    <div class="row justify-content-center">
        <div class="col col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Image Generator with OpenAI</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('generate') }}" method="POST" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Imagine anything and write down below:</label>
                            <input type="text" class="form-control @error('desc') is-invalid @enderror" name="desc" id="desc" maxlength="1000" placeholder="Writing a love letter to her" value="{{ old('desc') }}" required>
                            @error('desc')
                            <div class="invalid-feedback">
                                {{ __('Provide provide a valid description')  }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Please select a size of the image</label>
                            <select class="form-select @error('size') is-invalid @enderror" name="size">
                                <option selected>Open this select menu</option>
                                <option value="sm @if (old('size') === 'sm') selected @endif">Small</option>
                                <option value="md @if (old('size') === 'md') selected @endif">Medium</option>
                                <option value="lg @if (old('size') === 'lg') selected @endif">Large</option>
                            </select>
                            @error('size')
                            <div class="invalid-feedback">
                                {{ __('Provide provide a valid size')  }}
                            </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-secondary mt-2 mb-3 w-100">Generate Image</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
