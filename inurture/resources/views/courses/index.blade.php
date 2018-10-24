@extends('layouts.app')

@section('content')
           <div class="row">
          
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Courses</div>
                    <div class="panel-body">
						<?php
						$course=DB::table('courses')->count('id');
						if($course==0)
							{
						?>
							<a href="{{ url('/coursesInsert') }}" class="btn btn-success btn-sm" title="Add New course">
								<i class="fa fa-plus" aria-hidden="true"></i> Click API
							</a> 
						<?php
							}
							else
							{
						?>
						<a href="{{ url('/coursesInsert') }}" class="btn btn-success btn-sm" title="Add New course">
								<i class="fa fa-plus" aria-hidden="true" disabled></i> Click API
						</a> 
						<?php
							}
						?>
                        <form method="GET" action="{{ url('/courses') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th><th>Course Id</th><th>Course Name</th><th>Course Type</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($courses as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->course_id }}</td><td>{{ $item->course_name }}</td><td>{{ $item->course_type }}</td>
                                        <td>
                                            <a href="{{ url('/courses/' . $item->id) }}" title="View course"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/courses/' . $item->id . '/edit') }}" title="Edit course"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/courses' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" title="Delete course" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $courses->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection
