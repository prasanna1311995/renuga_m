@extends('layouts.app')

@section('content')
   
         <div class="row" style="width: 80%; margin: 0 auto;">
         
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit course #{{ $course->id }}</div>
                    <div class="panel-body">
                        <a href="{{ url('/courses') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/courses/' . $course->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}

                            @include ('courses.form', ['formMode' => 'edit'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
  
@endsection
