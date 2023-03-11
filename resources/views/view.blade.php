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

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Preview</h5>
                        <img src="{{ $imgUrl }}" alt="preview" class="img-fluid rounded mb-3">
                        <div class="d-grid gap-2">
                            <a href="{{ $imgUrl }}" class="btn btn-secondary" id="download-link">Download Image</a>
                        </div>
                        <p class="card-text mt-3">{{ $desc }}</p>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-info me-3" onclick="window.location.reload()">Generate Another Image</button>
                    <a href="{{ route('home') }}" class="btn btn-danger">Go back to the Homepage</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        const downloadLink = document.getElementById('download-link');
        downloadLink.addEventListener('click', (event) => {
            event.preventDefault();
            fetch(downloadLink.href)
                .then(response => response.blob())
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = '{{ $desc }}.png';
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                });
        });
    </script>

@endsection
