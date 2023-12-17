@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form class="form" action="{{ route('attendance.search') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-4">
            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Select Student</label>
            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="student_id">
                <option selected value="all">All Students</option>
                @foreach($students_form as $student_form)
                <option value="{{$student_form->id}}">{{$student_form->first_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="from">Start date</label>
            <input type="date" class="form-control" id="from" name="from" value="{{ date('Y-m-d') }}">
        </div>
        <div class="col-md-4">
            <label for="to">End da</label>
            <input type="date" class="form-control" id="to" name="to" value="{{ date('Y-m-d') }}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary my-1">Submit</button>
</form>