<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\course;
use Illuminate\Http\Request;
use DB;

class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $courses = course::where('course_id', 'LIKE', "%$keyword%")
                ->orWhere('course_name', 'LIKE', "%$keyword%")
                ->orWhere('course_type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $courses = course::latest()->paginate($perPage);
        }

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        course::create($requestData);

        return redirect('courses')->with('flash_message', 'course added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $course = course::findOrFail($id);

        return view('courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $course = course::findOrFail($id);

        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $course = course::findOrFail($id);
        $course->update($requestData);

        return redirect('courses')->with('flash_message', 'course updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        course::destroy($id);

        return redirect('courses')->with('flash_message', 'course deleted!');
    }
	
	public function courseInsert(Request $request){
		
		$requestData = $request->all();
		 
        $str = file_get_contents('https://api.coursera.org/api/courses.v1');

        $json = json_decode($str, true);

        $dataElements = $json['elements'];

        if(isset($dataElements)){

            foreach ($dataElements as $element) {

                $data = $element;
                $course_type = $data['courseType'];
				$course_id = $data['id'];
                $course_name = $data['name'];

                $insertData = DB::table('courses')->insert([ ['course_type' => $course_type], ['course_id' => $course_id], ['course_name' => $course_name] ]);
            }   

            return redirect('courses');
        } else {
            return false;
        }

	}
}
