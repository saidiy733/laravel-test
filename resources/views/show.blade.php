@extends('master.layout');

@section('title')
{{$post->title}}

@endsection

@section('content')
<div class="row my-5">
    <div class="col-md-8">
        <div class="row">
            <div class="col-md-12 mb-2">
                <div class="card h-100 " >
                    <img src="{{ asset('./uploads/'.$post->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$post->title}}</h5>
                      <p class="card-text">{{$post->body}}</p>
                    </div>
                </div>
                <a href="{{route('post.edit',$post->slug)}}" class="btn btn-warning">
                    Modifiér
                </a>
                <form id="{{$post->id}}" action="{{route('post.delete',$post->slug)}}" method="POST" >
                    @csrf
                    @method('DELETE')

                </form>
                <button
                onclick="event.preventDefault();
                if(confirm('étes vous sur'))
                document.getElementById({{$post->id}}).submit();"
                class="btn btn-danger" type="submit">
                    Supprimér
                </button>
            </div>
        </div>
    </div>
</div>

@endsection

