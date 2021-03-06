@extends('reviewer.admin')

@section('content')
<h1>your Reviewer</h1>
<div class="col-sm-6">
    <form>
        <input type="hidden" class="reviewerid" value="{{$data->id}}">
        <div class="form-group">
            <label>status </label>
            <select id="status_id" class="form-control reviewerstatus_id" name="status_id" value="{{$data->status_id}}">
                <option value="In-progress" {{ old('status_id', $data->status_id) == 'In-progress' ? 'selected' : '' }}>In-progress</option>
                <option value="Approved" {{ old('status_id', $data->status_id) == 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Rejected" {{ old('status_id', $data->status_id) == 'Rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <div class="form-group">
            <label>Comment</label>
            <input type="text" name="comment" id="comment" class="form-control reviewercomment" value="{{$data->comment}}" placeholder="Enter Comments">
            <span class="help-block comment"></span>
        </div>
        <button class="btn btn-primary reviewedit">Submit</button>
    </form>
</div>

@endsection