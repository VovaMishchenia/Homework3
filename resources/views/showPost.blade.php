@extends("partials.mainLayout")

@section("content")
    <article class="blog-post">
        <h2 class="blog-post-title">{{$post["title"]}}</h2>
        <p class="blog-post-meta">{{$post["postedOn"]}} <a href="#">{{$post->category["name"]}}</a></p>

        <p>{{$post["shortDescription"]}}</p>
        <hr>
        <div>

            {!! $post->description ?? '' !!}

        </div>

    </article>
    <hr>
    <div class="d-flex mt-2  justify-content-between" style="width:15%">
        <p class="font-weight-bold mr-2">Tags: </p>
        @foreach($post->tags as $item)
            <a class="link-secondary pr-2"  href="#"> {{$item["name"]}}  </a>
        @endforeach
    </div>
    <div class="d-flex justify-content-end w-100">

    <a href="/UpdatePost/{{$post["id"]}}" class="btn btn-dark mb-4">Change post</a>
    </div>

@endsection

