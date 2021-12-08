@extends('template/main')

@section('containers')      
          @if(session('pesan'))
          <div class="alert alert-success" role="alert">
            {{ session('pesan') }}
          </div>
          @endif 

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">           
          @foreach($posts as $post)
            <div class="col">
              <div class="card shadow-sm">
                <img class="card-img-top" src="{{ asset('image/'.$post->image)  }}" alt="{{ $post->image  }}" style="max-width:400px; max-height=400px; " >          
                <div class="card-body">
                  <h3 class="card-title">{{ $post->title }}</h3>
                  <p class="card-text">{{ $post->body }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      {{-- <a type="button" class="btn btn-sm btn-outline-secondary">View</a> --}}
                      <a type="button" class="btn btn-sm btn-outline-secondary" href="edit/{{ $post->id }}">Edit</a>
                    </div>
                    <a data-bs-toggle="modal" data-bs-target="#exampleModal{{ $post->id }}">
                      <small class="text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg>
                      </small>
                    </a>                    
                  </div>
                </div>
              </div>
            </div>
                @endforeach
          </div>
          <a class="btn btn-secondary position-sticky bottom-0 start-100" data-bs-toggle="modal" data-bs-target="#staticBackdrop" href="">Create Album</a> 
                    
          <!-- Modal -->
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  
                  <form action="/post/insert" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInput"> 
                      <label for="exampleInput">Title</label>
                      <div class="invalid-feedback">
                        @error('title')
                          <div class="alert alert-danger mb-3" role="alert">
                            {{ $message }}
                          </div>  
                        @enderror
                      </div>                                         
                    </div>
                    <div class="form-floating">
                      <textarea class="form-control @error('body') is-invalid @enderror" name="body" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px" ></textarea>
                      <label for="floatingTextarea2">Descriptions</label>
                      <div class="invalid-feedback">
                        @error('body')
                          <div class="alert alert-danger mb-3" role="alert">
                            {{ $message }}
                          </div>  
                        @enderror
                      </div>
                    </div>
                    <div class="mb-3 mt-4">
                      <label for="formFile" class="form-label">Default file input example</label>
                      <input class="form-control @error('image') is-invalid @enderror" name="image"type="file" id="formFile">
                      @error('image')
                          <div class="alert alert-danger mb-3" role="alert">
                            {{ $message }}
                          </div>  
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </form>

                </div>
                
              </div>
            </div>
          </div>  

          @foreach($posts as $post)
            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $post->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ $post->title }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Apakah anda yakin ingin menghapusnya ?
                  </div>
                  <div class="modal-footer">
                    <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                    <a type="button" href="/post/delete/{{ $post->id }}" class="btn btn-danger">Delete</a>
                  </div>
                </div>
              </div>
            </div>

          @endforeach
          
@endsection