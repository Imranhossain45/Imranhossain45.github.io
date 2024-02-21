@extends('layouts.backend.master')
@section('title', 'All User')
@section('content')
    <div class="container-fluid page__heading-container">
        <div class="page__heading d-flex align-items-end">
            <div class="flex">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">User</li>
                    </ol>
                </nav>
                <h1 class="m-0">User</h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h1 class="text-center">All User</h1>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone }}</td>
                                                <td class="td_btn d-flex">
                                                    <a href="{{ route('backend.user.status',$user->id) }}" class="btn {{ $user->status == 'unblock' ? 'btn btn-warning' : 'btn btn-success' }} mb-2" style="height: 26px;margin-right:5px">
                                                        {{ $user->status == 'unblock' ? 'Block' : 'Unblock' }}
                                                    </a>
                                                    <a href="{{ route('backend.user.edit',$user->id) }}" class="btn btn-sm btn-info mb-2" style="height: 26px;margin-right:5px">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                    
                                                    <form action="{{ route('backend.user.delete', $user->id) }}"
                                                      method="POST" class="delete_form">
                                                      @csrf
                                                      @method('DELETE')
                                                      <button type="submit" class="btn btn-sm btn-danger"
                                                          onclick="return confirm('Are you Sure to Delete?')">
                                                          <i class="fa-solid fa-trash-can"></i>
                                                        </button>
                                                  </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
