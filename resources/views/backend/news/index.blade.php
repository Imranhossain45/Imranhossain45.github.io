@extends('layouts.backend.master')
@section('title', 'All News')
@section('content')
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
              type="button" role="tab" aria-controls="pills-home" aria-selected="true">Active</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
              type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Draft</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
              type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Trash</button>
          </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
            tabindex="0">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center">Active News</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="">
                      <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Journalist</th>
                        <th>Title</th>
                        <th>Published Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table">

                      @foreach ($activeNews as $index => $news)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>
                            <img src="{{ $news->photo }}" width="80px" alt="" style="padding: 0!important">
                          </td>
                          <td>{{ @$news->journalist->name }}</td>
                          <td>{{ $news->title }}</td>
                          <td>{{ \Carbon\Carbon::parse($news->date)->format('d M Y h:i A') }}</td>
                          <td>{{ $news->status }}</td>
                          <td class="td_btn d-flex gap-1">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal{{ $news->id }}"
                              class="btn btn-sm btn-success">
                              <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('backend.news.edit', $news->id) }}" class="btn btn-sm btn-info">
                              <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="{{ route('backend.news.status', $news->id) }}"
                              class="btn {{ $news->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                              @if ($news->status == 'publish')
                                <i class="fa-solid fa-pen-ruler"></i>
                              @else
                                <i class="fa-solid fa-upload"></i>
                              @endif
                            </a>
                            <a href="{{ route('backend.news.trash', $news->id) }}" class="btn btn-sm btn-danger">
                              <i class="fa-solid fa-trash"></i>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="row justify-content-end">
                  <div class="mt-3">
                    {{ $activeNews->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
            tabindex="0">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center">Draft News</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class=" table">
                    <thead class="">
                      <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Journalist</th>
                        <th>Title</th>
                        <th>Published Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table">

                      @foreach ($draftNews as $index => $news)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>
                            <img src="{{ $news->photo }}" width="80px" alt="" style="padding: 0!important">
                          </td>
                          <td>{{ @$news->journalist->name }}</td>
                          <td>{{ $news->title }}</td>
                          <td>{{ \Carbon\Carbon::parse($news->date)->format('d M Y h:i A') }}</td>
                          <td>{{ $news->status }}</td>
                          <td class="td_btn d-flex gap1">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#viewModal{{ $news->id }}"
                              class="btn btn-sm btn-success">
                              <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="{{ route('backend.news.edit', $news->id) }}" class="btn btn-sm btn-info">
                              <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <a href="{{ route('backend.news.status', $news->id) }}"
                              class=" btn {{ $news->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                              @if ($news->status == 'publish')
                                <i class="fa-solid fa-pen-ruler"></i>
                              @else
                                <i class="fa-solid fa-upload"></i>
                              @endif
                            </a>
                            <a href="{{ route('backend.news.trash', $news->id) }}" class="mt-2 btn btn-sm btn-danger">
                              <i class="fa-solid fa-trash"></i>
                            </a>

                          </td>
                        </tr>
                      @endforeach

                    </tbody>

                  </table>
                </div>
                <div class="row justify-content-end">
                  <div class="mt-3">
                    {{ $draftNews->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
            tabindex="0">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center">Trashed News</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class=" table">
                    <thead class="text-center">
                      <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Journalist</th>
                        <th>Title</th>
                        <th>Published Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody class="table">

                      @foreach ($trashedNews as $index => $news)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>
                            <img src="{{ $news->photo }}" width="80px" alt="">
                          </td>
                          <td>{{ @$news->journalist->name }}</td>
                          <td>{{ $news->title }}</td>
                          <td>{{ \Carbon\Carbon::parse($news->date)->format('d M Y h:i A') }}</td>
                          <td>{{ $news->status }}</td>
                          <td class="td_btn d-flex">
                            <a href="{{ route('backend.news.reStore', $news->id) }}" class="btn btn-sm btn-success"
                              style="height: 22px;margin-top:8px;margin-right:5px">
                              <i class="fa-solid fa-box"></i>
                            </a>

                            <form action="{{ route('backend.news.delete', $news->id) }}" method="POST"
                              class="delete_form">
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
                <div class="row justify-content-end">
                  <div class="mt-3">
                    {{ $trashedNews->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
@foreach ($newsModaldata as $news)
  <div id="viewModal{{ $news->id }}" class="modal custom_modal fade" tabindex="-1"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="modal-title text-center" id="myModalLabel">News Info</div>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="row">
            <div class="col-lg-3">
              <label for="">Photo:</label>
              <br>
              <img src="{{ $news->photo }}" width="200" height="160" alt="">
            </div>
            <div class="col-lg-3">
              <label for="">Meta Photo:</label>
              <br>
              <img src="{{ $news->m_photo }}" width="200" height="160" alt="">
            </div>
            <div class="col-lg-3">
              <label for="">Title:</label>
              <br>
              {{ $news->title }}
            </div>
            <div class="col-lg-3">
              <label for="">Slug:</label>
              <br>
              {{ $news->slug }}
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-lg-2">
              <label for="">Alter Text:</label>
              <br>
              {{ $news->alt_text }}
            </div>
            <div class="col-lg-2">
              <label for="">Published Date:</label>
              <br>
              {{ $news->date }}
            </div>
            <div class="col-lg-2">
              <label for="">Journalist:</label>
              <br>
              {{ $news->journalist->name }}
            </div>
            <div class="col-lg-3">
              <label for="">Meta Title:</label>
              <br>
              {{ $news->m_title }}
            </div>
            <div class="col-lg-2">
              <label for="">Meta Keyword:</label>
              <br>
              {{ $news->m_keyword }}
            </div>

          </div>
          <div class="row mt-3">
            <div class="col-lg-6">
              <label for="">Description:</label>
              <br>
              {!! $news->description !!}
            </div>
            <div class="col-lg-6">
              <label for="">Meta Description:</label>
              <br>
              {{ $news->m_description }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endforeach
