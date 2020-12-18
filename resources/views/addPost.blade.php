@extends("partials.mainLayout")

@section("content")

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <form class="mb-4" method="post" action="{{ route('post.create') }}" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-between mt-4">
            <div class="mb-3 mr-4 " style="width:70%">
                <label for="inputPassword5" class="form-label label">Title</label>
                <input type="text" id="type" name="title" class="form-control "
                       aria-describedby="passwordHelpBlock" required>
            </div>
            <div class="mb-3 w-25">
                <label for="inputPassword5" class="form-label label">Category</label>
                <select class="form-select" aria-label="Default select example" name="category_id" required>
                    @foreach($categories as $category)
                        <option value={{$category["id"]}}>{{$category["name"]}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
        <div class="mb-3 mr-4 " style="width:70%">
            <label for="inputPassword5" class="form-label label">Short Description</label>
            <textarea name="shortDescription" id="shortDescription" class="w-100" aria-describedby="passwordHelpBlock" required></textarea>
        </div>
            <div class="mb-3 w-25 mt-4 ml-4">
                <label for="image" class="form-label label"> Image</label>
                    <input id="image" type="file" name="image" required>
            </div>
        </div>
        <div class="mb-3 mr-4 w-100">

        <label for="inputPassword5" class="form-label label"> Description</label>
            <textarea name="description" id="description" class="w-100" aria-describedby="passwordHelpBlock" required></textarea>
        </div>

        <p class="label">Tags: </p>
        <select class="form-select" multiple aria-label="multiple select example" name="tags[]" required>
        @foreach($tags as $tag )
{{--            <div class="form-check form-check-inline">--}}
{{--                <input class="form-check-input" type="checkbox" id={{$tag["name"]}} value={{$tag["name"]}}>--}}
{{--                <label class="form-check-label" for="{{$tag["name"]}}">{{$tag["name"]}}</label>--}}
{{--            </div>--}}
                <option value={{$tag["id"]}}>{{$tag["name"]}}</option>
        @endforeach
        </select>
        <div class="d-flex w-100 justify-content-center mt-4">
            <button type="submit" class="w-25 btn btn-dark mb-3">Post</button>
        </div>
    </form>



    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>

    <!-- Initialize the editor. -->
    <script>
        //var csrf_token = $('meta[name="csrf-token"]').attr('content');
        new FroalaEditor('#description', {
            attribution: false,
            // Set the file upload URL.
            imageUploadURL: '/posts/upload',

            imageUploadParams: {
                id: 'my_editor',
                _token: "{{ csrf_token() }}"
            },
        });
        //setTimeout(() => document.querySelector("div.fr-wrapper.show-placeholder > div").style.display = 'none', 400);

    </script>
    <style>
        div.fr-wrapper > div:first-child {
            display: none !important;
            visibility: hidden !important;
        }
    </style>
@endsection
