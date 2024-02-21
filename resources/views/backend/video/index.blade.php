@extends('layouts.backend.master')
@section('title', 'All Videos')
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
                <h4 class="text-center">Active Videos</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="">
                      <tr>
                        <th>SL</th>
                        <th>Thumb Photo</th>
                        <th>Alter text</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>URL</th>
                        <th>ID</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table">

                      @foreach ($activevideo as $index => $video)
                        <tr>
                          <td>{{ $index + 1 }}</td>
                          <td>
                            <img src="{{ $video->photo }}" width="80px" alt="" style="padding: 0!important">
                          </td>
                          <td>{{ $video->alt_text }}</td>
                          <td>{{ $video->title }}</td>
                          <td>
                            @if ($video->date)
                              {{ \Carbon\Carbon::parse($video->date)->format('d M Y h:i A') }}
                            @endif
                          </td>
                          <td>{{ $video->video }}</td>
                          <td>{{ $video->video_id }}</td>
                          <td class="td_btn text-center">
                            <a href="{{ route('backend.videoGallery.edit', $video->id) }}" class="btn btn-sm btn-info"> <i
                                class="fa-solid fa-pen-to-square"></i></a>
                            <a href="{{ route('backend.videoGallery.status', $video->id) }}"
                              class=" btn {{ $video->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                              @if ($video->status == 'publish')
                                <i class="fa-solid fa-pen-ruler"></i>
                              @else
                                <i class="fa-solid fa-upload"></i>
                              @endif
                            </a>
                            <a href="{{ route('backend.videoGallery.trash', $video->id) }}" class="btn btn-sm btn-danger">
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
                    {{ $activevideo->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
            tabindex="0">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center">Draft video</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class=" table">
                    <thead class="">
                      <tr>
                        <th>SL</th>
                        <th>Thumb Photo</th>
                        <th>Alter text</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>URL</th>
                        <th>ID</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table">

                      @foreach ($draftvideo as $index=>$video)
                        <tr>
                           <td>{{ $index + 1 }}</td>
                          <td>
                            <img src="{{ $video->photo }}" width="80px" alt="" style="padding: 0!important">
                          </td>
                          <td>{{ $video->alt_text }}</td>
                          <td>{{ $video->title }}</td>
                          <td>
                            @if ($video->date)
                              {{ \Carbon\Carbon::parse($video->date)->format('d M Y h:i A') }}
                            @endif
                          </td>
                          <td>{{ $video->video }}</td>
                          <td>{{ $video->video_id }}</td>
                          <td class="td_btn">

                            <a href="{{ route('backend.videoGallery.edit', $video->id) }}" class="btn btn-sm btn-info">
                              <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            <a href="{{ route('backend.videoGallery.status', $video->id) }}"
                              class=" btn {{ $video->status == 'publish' ? 'btn btn-warning' : 'btn btn-success' }}">
                              @if ($video->status == 'publish')
                                <i class="fa-solid fa-pen-ruler"></i>
                              @else
                                <i class="fa-solid fa-upload"></i>
                              @endif
                            </a>
                            <a href="{{ route('backend.videoGallery.trash', $video->id) }}"
                              class="mt-2 btn btn-sm btn-danger">
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
                    {{ $draftvideo->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
            tabindex="0">
            <div class="card">
              <div class="card-header">
                <h4 class="text-center">Trashed video</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class=" table">
                    <thead class="">
                      <tr>
                        <th>SL</th>
                        <th>Thumb Photo</th>
                        <th>Alter text</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>URL</th>
                        <th>ID</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody class="table">

                      @foreach ($trashedvideo as $index=>$video)
                        <tr>
                           <td>{{ $index + 1 }}</td>
                          <td>
                            <img src="{{ $video->photo }}" width="80px" alt=""
                              style="padding: 0!important">
                          </td>
                          <td>{{ $video->alt_text }}</td>
                          <td>{{ $video->title }}</td>
                          <td>
                            @if ($video->date)
                              {{ \Carbon\Carbon::parse($video->date)->format('d M Y h:i A') }}
                            @endif
                          </td>
                          <td>{{ $video->video }}</td>
                          <td>{{ $video->video_id }}</td>
                          <td class="td_btn">
                            <a href="{{ route('backend.videoGallery.reStore', $video->id) }}"
                              class="btn btn-sm btn-success">
                              <i class="fa-solid fa-box"></i>
                            </a>

                            <form action="{{ route('backend.videoGallery.delete', $video->id) }}" method="POST"
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
                    {{ $trashedvideo->links() }}
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
