@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-end">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">{{ __('Company') }} / {{ __('Add Company') }}</div>

        <div class="card-body">
          <div class="row justify-content-start">
            <div class="col-md-2 d-flex justify-content-start">
              <a href="{{ route('companies.index') }}" class="btn btn-primary">
                Go Back
              </a>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group pb-2">
                      <label for="title">Name</label>
                      <input type="text" class="form-control" id="name" name="name" required>
                      @error('name')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group pb-2">
                      <label for="title">Email</label>
                      <input type="text" class="form-control" id="email" name="email">
                      @error('email')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group pb-2">
                      <label for="title">Website Link</label>
                      <input type="text" class="form-control" id="website_url" name="website_url">
                      @error('website_url')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group pb-2">
                      <label for="logo_upload" class="form-label">Logo</label>
                      <input class="form-control" type="file" id="logo_upload" name="logo_upload">
                      @error('logo_upload')
                        <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                </div>

                <br>
                <button type="submit" class="btn btn-success">Save Company</button>
              </form>
            </div>
            <div class="col-md-2"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection