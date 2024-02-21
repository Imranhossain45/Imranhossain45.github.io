@extends('layouts.backend.master')
@section('title', 'All Magazine Info')
@section('content')
  <div class="container-fluid page__heading-container">
    <div class="page__heading d-flex align-items-end">
      <div class="flex">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard/</a></li>
            <li class="breadcrumb-item active" aria-current="page">Magazine Info</li>
          </ol>
        </nav>
        <h1 class="m-0">Magazine Info</h1>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-header">
            <h4 class="text-center">All magazine Info</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class="text-center">
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Photo1</th>
                    <th>Photo2</th>
                    <th>Photo3</th>
                    <th>
                      <div class="action_btn">Action</div>
                    </th>
                  </tr>
                </thead>
                <tbody class="table text-center">

                  @foreach ($magazines as $magazine)
                    <tr>
                      <td>{{ $magazine->id }}</td>
                      <td>{{ $magazine->name }}</td>
                      <td>
                        <img src="{{ $magazine->photo1 }}" width="60" alt="magazine">
                      </td>
                      <td>
                        <img src="{{ $magazine->photo2 }}" width="60" alt="magazine">
                      </td>
                      <td>
                        <img src="{{ $magazine->photo3 }}" width="60" alt="magazine">
                      </td>
                      <td class="td_btn d-flex justify-content-center mt-2">

                        <a href="{{ route('backend.magazine.edit', $magazine->id) }}" class="btn btn-sm btn-info"
                          style="margin-right:5px">
                          <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        {{-- <form action="{{ route('backend.magazine.delete', $magazine->id) }}" method="POST"
                          class="delete_form">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you Sure to Delete?')">
                            <i class="fa-solid fa-trash-can"></i>
                          </button>
                        </form> --}}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="row justify-content-end">
              <div class="mt-3">
                {{ $magazines->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
