@extends('boards.layout')
   
@section('content')
<style>
 input[type=text],
       input[type=password],
       input[type=number] {
           width: 100%;
           padding: 12px 20px;
           margin: 10px 0;
           display: inline-block;
           border: 1px solid #ccc;
           box-sizing: border-box;
       }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit board</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('board.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="/board" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $board->title }}"  class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    
                    <input type="hidden" name="id" value="{{ $board->id }}"  class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    
                    <input type="hidden" name="edited_by" value=" {{ Auth::user()->name }} "  class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="desc" value="{{ $board->desc }}"  class="form-control" placeholder="desc" >
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control" id="status" name="status">
                        <option value="{{ $board->status }}" selected>{{$board->status}} (Current)</option>
                        <option value="ToDo">ToDo</option>
                        <option value="InProgress">In Progress</option>
                        <option value="Done">Done</option>
                    </select>
                    <!-- <input type="text" name="status" value="{{ $board->status }}"  class="form-control" placeholder="status"> -->
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form>
    </div>
@endsection