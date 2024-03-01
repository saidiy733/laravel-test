@extends('master.layout');

@section('title')
Modifiér {{ $post->title}}

@endsection

@section('content')
<div class="row my-4">
    <div class="col-md-8 mx-auto">
           @if ($errors->any())
             <div class="alert alert-danger">
              <ul>
                   @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
             </div>
           @endif
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                   Modifiér {{ $post->title}}

                </h3>
            </div>
            <div class="card-body">
                <form action="{{route('post.update',$post->slug)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    @method('PUT')

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">titre</label>
                        <input
                        value="{{$post->title}}"
                         type="text" class="form-control" name="title" placeholder="titre">
                    </div>
                    <div class="mb-3">
                      <label for="exampleFormControlInput1" class="form-label">image</label>
                      <input type="file" class="form-control" name="image" >
                    </div>
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">déscription</label>
                        <textarea class="form-control"
                         name="body" rows="3" placeholder="déscription">{{$post->body}}
                        </textarea>
                    </div>
                      <div class="mb-3">
                        <button class="btn btn-primary">
                            Validé
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>

</div>




@endsection

