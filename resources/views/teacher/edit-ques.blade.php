@extends('layouts.default')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/panel.css') }}">
@stop
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12 ">
        <!-- New Edit-Question Form -->
             <form action="{{url('teacher/event/'.$id.'/edit/que/'.$qid)}}" method="POST">
            {{ csrf_field() }}
            @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
            @endif
            @if (session('Option'))
                    <div class="alert alert-danger">
                        {{ session('Option') }}
                    </div>
            @endif
            <!-- Question -->
            <div class="form-group">
                <label for="question" class="col-sm-3 control-label">Question.</label>
                <select name="quetype" class="form-control form-control-sm col-sm-2 col-md-2 float-right" required>
                    <option selected value="0">Single Correct</option>
                    <option value="1">Multiple Correct</option>
                </select>
                @if ($errors->has('question'))
                    <div class="alert alert-danger">
                        @foreach ($errors->get('question') as $ques)
                            <strong>{{$ques}}</strong>
                        @endforeach
                    </div>
                    @endif
                <div>
                    <textarea class="form-control" rows="5" id="question" name="question"></textarea>
                </div>
            </div>

            <div class="form-group form-check">
                <input class="form-check-input" type="checkbox" value="1" id="option1" name="option1">
                <label for="opt1" class="col-sm-3 control-label">Option 1.</label>
                @if ($errors->has('opt1'))
                    <div class="alert alert-danger">
                        @foreach ($errors->get('opt1') as $opt)
                                <strong>{{$opt}}</strong>
                        @endforeach
                        </div>
                @endif

                <div>
                    <textarea class="form-control col-sm-7" rows="5" id="opt1" name="opt1"></textarea>
                </div>
            </div>
            @foreach()
            <div class="form-group form-check" id="add">
                <input type="hidden" name="count" value="2">
                
            </div>

             {{-- @if ($errors->has('option'))
                    <div class="alert alert-danger">
                        @foreach ($errors->get('option') as $opt)
                                <strong>{{$opt}}</strong>
                        @endforeach
                        </div>
                @endif --}}
      
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <a class="anchor btn-outline-primary" href="#" id="btn1" style="text-decoration: none;"> <i class="fa fa-plus"></i> Add Option </a>
                </div>
            </div>
            <script>
            	var count = 3;
            	$("#btn1").click(function(){
            	$("#add").append('<input type="hidden" name="count" value="'+count+'"><input class="form-check-input" type="checkbox" value="1" id="option'+count+'" name="option'+count+'"><label for="opt" class="col-sm-3 control-label">Option '+count+'.</label> <div> <textarea class="form-control col-sm-7" rows="5" id="opt'+count+'" name="opt'+count+'"></textarea> </div>');
            	count++;
            	    });
            </script>

            <!-- Add Question Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-plus"></i> Add Question
                    </button>
                </div>
            </div>
        </form>
       <div>
        <center>
                    <a class="btn btn-success " href="{{url('/')}}" id="btn2" style="text-decoration: none;"> Submit </a>
                </center>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 col-xs-12 ">
        <div class="card">
            <div class="card-header text-white bg-purple shadow text-center">
                <h5>Questions</h5>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered shadow text-center bg-info table-dark table-small">
                    <thead>
                        <tr>
                            <td>Content</td><td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($queans as $row)
                            <tr><td>{!! $row['que'] !!}</td><td><a href="{{ url('teacher/event/'.$id.'/que/'.$row['id']) }}" class="btn btn-primary btn-sm">Edit</a> <a href="{{ url('teacher/event/'.$id.'/que/'.$row['id'].'/delete') }}" class="btn btn-danger btn-sm">Delete</a></td></tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
                    
</div>
@stop

