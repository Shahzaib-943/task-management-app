@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center"><u>Add New Task</u></h1>
            <form action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select class="form-select" id="priority" name="priority" required>
                        <option value="" selected disabled>--- Select an option ---</option>
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3rd">3rd</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="due_date" class="form-label">Due Date</label>
                    <input type="date" class="form-control" id="due_date" name="due_date" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Task</button>
                <a href="{{ route('home') }}" class="btn btn-info">GoTo Home</a>
            </form>
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var dueDateInput = document.getElementById('dueDate');

        dueDateInput.addEventListener('input', function () {
            var currentDate = new Date();
            var enteredDueDate = new Date(dueDateInput.value);

            if (enteredDueDate < currentDate) {
                alert('Due date must be a future date.');
                dueDateInput.value = '';
            }
        });
    });
</script>



@endsection
