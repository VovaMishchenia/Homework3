<div class="row mb-2">
    @foreach($posts as $post)
    <div class="col-md-6">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
                <strong class="d-inline-block mb-2 text-primary">{{$post->category["name"]}}</strong>
                <h3 class="mb-0">{{$post["title"]}}</h3>
                <div class="mb-1 text-muted">{{$post["postedOn"]}}</div>
                <p class="card-text mb-auto">{{$post["shortDescription"]}}</p>
                <div class="d-flex mt-2  justify-content-evenly">
                    <label class="font-weight-bold mr-2">Tags: </label>
                    @foreach($post->tags as $item)
                        <a class="link-secondary pr-2"  href="#"> {{$item["name"]}}  </a>
                    @endforeach
                </div>
                <a href="/ShowPost/{{$post["id"]}}" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
                <img class="bd-placeholder-img" width="200" height="250" src="{{asset($post["urlSlug"])}}"/>

            </div>
        </div>
    </div>
    @endforeach
</div>
