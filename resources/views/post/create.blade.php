@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">NEW</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('post.createsave') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control" name="title"  required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="body" class="col-md-2 col-form-label text-md-right">Body</label>

                            <div class="col-md-8">
                                <textarea id="body" type="text" class="form-control" name="body"  rows ="5" required > </textarea>

                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                   Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
