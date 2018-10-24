@extends('layouts.app')

@section('content')
   
         <div class="row" style="width: 80%; margin: 0 auto;">
           
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">course {{ $course->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/courses') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/courses/' . $course->id . '/edit') }}" title="Edit course"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('courses' . '/' . $course->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete course" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $course->id }}</td>
                                    </tr>
                                    <tr><th> Course Id </th><td> {{ $course->course_id }} </td></tr><tr><th> Course Name </th><td> {{ $course->course_name }} </td></tr><tr><th> Course Type </th><td> {{ $course->course_type }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
