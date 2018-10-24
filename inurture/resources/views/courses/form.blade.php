<div class="form-group {{ $errors->has('course_id') ? 'has-error' : ''}}">
    <label for="course_id" class="control-label">{{ 'Course Id' }}</label>
    <input class="form-control" name="course_id" type="text" id="course_id" value="{{ $course->course_id or ''}}" >
    {!! $errors->first('course_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('course_name') ? 'has-error' : ''}}">
    <label for="course_name" class="control-label">{{ 'Course Name' }}</label>
    <input class="form-control" name="course_name" type="text" id="course_name" value="{{ $course->course_name or ''}}" >
    {!! $errors->first('course_name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('course_type') ? 'has-error' : ''}}">
    <label for="course_type" class="control-label">{{ 'Course Type' }}</label>
    <input class="form-control" name="course_type" type="text" id="course_type" value="{{ $course->course_type or ''}}" >
    {!! $errors->first('course_type', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
