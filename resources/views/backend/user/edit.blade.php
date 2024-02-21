@extends('layouts.backend.master')
@section('title', 'Edit User')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit User</li>
          </ol>
        </nav>
        <h1 class="m-0">Edit User</h1>
      </div>
    </div>
  </div>
  <section>
    <div class="container-fluid text-dark" >
      <div class="row justify-content-center" >
        <div class="col-lg-8" >
          <div class="card" >
            <div class="card-header">
              <h1 class="text-center">Edit User</h1>
            </div>
            <div class="card-body">
              <form action=""></form>
              <form action="{{ route('backend.user.update',$user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <b>Name:</b>
                  <input type="text" name="name" class=" form-control" required value="{{ $user->name }}">
                </div>
                <div class="form-group mt-2">
                  <b>Email:</b>
                  <input type="email" name="email" class=" form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group mt-2">
                  <b>Phone:</b>
                  <input type="number" name="phone" class="form-control" placeholder="Enter Phone" value="{{ $user->phone }}">
                </div>
                <div class="form-group mt-2">
                  <b>Password:</b>
                  <input type="password" name="password" class="form-control" autocomplete="new-password" placeholder="If you don't want to update password keep it blank" >
                </div>
                <div class="form-group mt-2">
                  <b>Confirm Password:</b>
                  <input type="password" name="password_confirmation" class="form-control" autocomplete="new-password" placeholder="If you don't want to update password keep it blank">
                </div>
                
                <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection