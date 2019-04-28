@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                @if( Session::has('success') )
                <div class="alert alert-success alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-check-circle m-right-xs"></i> {{ Session::get('success') }}
                </div>
            @elseif( Session::has('error') )
                <div class="alert alert-danger alert-block" role="alert">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                     <i class="fa fa-times-circle m-right-xs"></i> {{ Session::get('error') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    POST
                    @role('writer|admin')
                    <a href=" {{route('post.create')}} " class="btn btn-xs btn-success float-right">NEW</a>
                    @endrole
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                </form>

                <div class="card-body">
                    @foreach ($posts as $post)
                        
                    <ul>
                        <li>
                            <a href=""> {{ $post->title }} </a>
                            @can('edit post')
                            <a href="{{ route('post.delete', $post->id) }}" class="btn btn-xs btn-danger float-right"> Delete </a>
                            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-xs btn-info float-right "> Edit </a>
                            
                            @endcan
                        </li>
                    </ul>
                    @endforeach
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
