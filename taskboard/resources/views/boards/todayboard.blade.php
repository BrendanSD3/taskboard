@extends('boards.layout')
@section('content')
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<div class="board-layout" >
      
   
        <div class="left">
          <div class="board-text">Today Board</div>
         <button class="primary btn-primary"onclick="document.getElementById('id01').style.display='block'" style="width:auto;" >Add New</button>
        </div>
       
      <div id='boardlists' class="board-lists">
        <div id='list1' class="board-list" ondrop="dropIt(event)" ondragover="allowDrop(event)">
          <div class="list-title">
            To Do
          </div>
          @foreach ($Todos as $todo) 
          <div id="card{{$todo->id}}" class="card" draggable="true" ondragstart="dragStart(event)" > <a class="btn btn-primary" href="{{ route('board.edit',$todo->id) }}">Edit</a> {{ $todo->title }}  <div class="card-body">{{ $todo->desc }}</div></div>

            @endforeach
            
       
         
        </div>
        <div  id='list2' class="board-list" ondrop="dropIt(event)" ondragover="allowDrop(event)">
          <div  class="list-title">
          In Progress
          </div>
          @foreach ($inprogress as $inprog) 
          <div id="card{{$inprog->id}}" class="card" draggable="true" ondragstart="dragStart(event)">  <a class="btn btn-primary" href="{{ route('board.edit',$inprog->id) }}">Edit</a>  {{ $inprog->title }} 
          <div class="card-body">{{ $inprog->desc }}</div>
          </div>

        @endforeach


        </div>
        <div  id='list3' class="board-list"  ondrop="dropIt(event)" ondragover="allowDrop(event)">
          <div  class="list-title">
            Done
            </div>
            @foreach ($dones as $done) 
          <div id="card{{$done->id}}" class="card" draggable="true" ondragstart="dragStart(event)"> <a class="btn btn-primary" href="{{ route('board.edit',$done->id) }}">Edit</a>   {{ $done->title }} 
          <div class="card-body">{{ $done->desc }}</div>
          </div>

          @endforeach
            

            
            </div>
      </div>
    </div></div></div>  
    <div id="id01" class="modal">
    <form class="modal-content animate" method="POST" action="/board">
    
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      
   


  
    <div class="container">
    @csrf
                    <h1> Enter Details to create a new card</h1>
                    <div class="form-input">
                        <label>Title:</label> <input type="text" name="title">
                    </div>

                    <div class="form-input">
                        <label>Description:</label> <input type="text" name="desc">
                    </div>
                    <div class="form-input">
                        <label>Status:</label>  
                    <select class="form-control" id="status" name="status">
                        <option value="ToDo">ToDo</option>
                        <option value="InProgress">In Progress</option>
                        <option value="Done">Done</option>
                    </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    
                    <input type="hidden" name="edited_by" value=" {{ Auth::user()->name }} "  class="form-control" >
                </div>
            </div>
                    <br>
                     <button type="submit">Submit</button>
    
   
    </div>
</div>
<script>

</script>
@endsection

