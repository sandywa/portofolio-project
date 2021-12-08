@extends('template/main')

@section('containers')      
                      
                  <form action="/post/update/{{ $posts[0]->id; }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-floating">
                      <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInput" value="{{ $posts[0]->title; }}"> 
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
                      <textarea class="form-control @error('body') is-invalid @enderror" name="body" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 300px" >{{ $posts[0]->body; }}</textarea>
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
                      <img class="mb-3" src="{{ asset('image/'.$posts[0]->image)  }}" alt="{{ $posts[0]->image  }}"> 
                      <br>
                      <label for="formFile" class="form-label">Default file input example</label>
                      <input class="form-control @error('image') is-invalid @enderror" name="image"type="file" value="" id="formFile" value="{{ $posts[0]->image }}">
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
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
          
@endsection