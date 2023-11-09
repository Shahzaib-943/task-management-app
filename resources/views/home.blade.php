@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-3">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary">+ Add New Task</a>
            </div>
            <table class="table table-striped">
                <h1 class="text-center"><u>Task List</u></h1>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                {{-- @dd($tasks) --}}
                <tbody>
                    @foreach ($tasks as $task )
                        <tr>
                            <th scope="row">{{ $loop->iteration}}</th>
                            <td>{{ $task->title}}</td>
                            <td>{{ $task->description}}</td>
                            <td>{{ $task->priority}}</td>
                            <td>{{ $task->due_date}}</td>
                            <td>{{ ucfirst($task->status) }}</td>
                            <td class="d-flex align-items-center">
                                @if($task->status == 'pending')
                                    <form action="{{ route('tasks.status.update',['task' => $task->id]) }}" method="post" class="mr-2">
                                        @csrf
                                        <button class="btn btn-primary custom-btn">
                                            Done
                                        </button>
                                    </form>
                                @endif
                            
                                <a href="{{ route('tasks.edit',['task' => $task->id]) }}" class="btn btn-info mr-2 custom-btn">
                                    Edit
                                </a>
                            
                                <form action="{{ route('tasks.delete',['task' => $task->id]) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger custom-btn">
                                        Delete
                                    </button>
                                </form>
                            </td>
                            
                            
                            
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tasks->links() }}
        </div>
    </div>
</div>
@if(session('status'))
    <script>
        toastr.success('{{ session('status') }}', 'Success');
        toastr.options = 
            {
                "closeButton" : true,
                "progressBar" : true,
                "preventDuplicates" : true,
            }
    </script>
@endif
@endsection
