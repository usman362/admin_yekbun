@extends('layouts/layoutMaster')

@section('title', 'Users - Create')

@section('page-style')
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-icons.css')}}" />
@endsection

@section('content')
<h4 class="fw-bold py-3 mb-4">
    <span class="text-muted fw-light">Users /</span> Add Standard User
</h4>
<div class="row">
    <div class="col-12">
      <div class="card">
        <div id="sticky-wrapper" class="sticky-wrapper" style="height: 86.9375px;"><div class="card-header sticky-element bg-label-secondary d-flex justify-content-sm-between align-items-sm-center flex-column flex-sm-row" style="">
          <h5 class="card-title mb-sm-0 me-2">User</h5>
          <div class="action-btns">
            <a href="{{ route('users.standard.index') }}">
            <button class="btn btn-label-primary me-3">
              <span class="align-middle"> Back</span>
            </button>
        </a>
          </div>
        </div></div>
        <div class="card-body">
            <form action="{{ route('users.standard.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label" for="inputName">Name</label>
                            <input type="text" id="inputName" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="inputEmail">Email</label>
                            <input type="text" id="inputEmail" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="inputPassword">Password</label>
                            <input type="text" id="inputPassword" name="password" class="form-control">
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="inputPasswordConfirmation">Confirm Password</label>
                            <input type="text" id="inputPasswordConfirmation" name="password_confirmation" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="imageInput">Profile Image</label>
                            <input type="file" name="image" id="imageInput" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="imageInput">Status</label>
                            <select class="form-control" name="status" id="imageInput">
                                <option value="1" selected>Active</option>
                                <option value="0" {{ old('status') === '0'? 'selected': '' }}>Disabled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Create</button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection
