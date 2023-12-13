<p align="center" style="color: red; font-size:30px">
  <a  target="_blank">
    <!-- Remove the Laravel logo and replace it with text -->
    Task Manager Project
  </a>
</p>

___

## Overview
---

The Task Manager project is a web application built with Laravel, designed to manage tasks. It allows users to create, edit, delete tasks, mark tasks as done, and prioritize tasks.


## Features
---

- Task Listing: Display a list of tasks with details such as title, description, priority, due date, and status.
- Task Creation: Users can add new tasks to the system, specifying details like title, description, priority, and due date.
- Task Update: Edit existing tasks to modify their details.
- Task Deletion: Remove unwanted tasks from the system.
- Mark as Done: Change the status of a task to "done."
- Priority Sorting: Tasks are listed by priority, with the ability to identify the most repeated priority.


## Getting Started
---
- Clone the repository: git clone <repository_url>
- Install dependencies: composer install and npm install
- Copy .env.example to .env and configure your database settings
- Generate application key: php artisan key:generate
- Run migrations: php artisan migrate
- Start the development server: php artisan serve


## Routes
---
## Task Routes

- List Tasks: /tasks - Displays a paginated list of tasks.
- Create Task: /tasks/create - Form to add a new task.
- Edit Task: /tasks/{task}/edit - Form to edit an existing task.
- Update Task: POST /tasks/{task} - Update an existing task.
- Delete Task: DELETE /tasks/{task} - Delete an existing task.
- Mark as Done: POST /tasks/{task}/status - Mark a task as done.

## Priority Routes
---

- Most Repeated Priority: /tasks/most-repeated-priority Displays tasks with the most repeated priority.

- Route Binding
Update and Delete Routes
The project utilizes route model binding for task updates and deletions. When accessing routes that require a task ID, the application automatically binds the corresponding Task model instance.

## Examples:
- Update Task Route:

- php
Copy code
// In the routes file
Route::get('/tasks/{task}/edit', 'TaskController@edit')->name('tasks.edit');
Route::post('/tasks/{task}', 'TaskController@update')->name('tasks.update');
php
Copy code
// In the controller
public function edit(Task $task)
{
    // $task is automatically populated with the corresponding Task model instance
    return view('tasks.edit', compact('task'));
}
## Delete Task Route:

- php
Copy code
// In the routes file
Route::delete('/tasks/{task}', 'TaskController@destroy')->name('tasks.destroy');
php
Copy code
// In the controller
public function destroy(Task $task)
{
    // $task is automatically populated with the corresponding Task model instance
    $task->delete();
    // Additional logic...
}
Custom Requests
To validate incoming request data, custom Request classes have been created.

## Create Task Request:

- php
Copy code
// In the controller
public function store(CreateTaskRequest $request)
{
    // The CreateTaskRequest class handles validation
    // If validation fails, the user is redirected back with validation errors
    // If validation passes, the controller logic is executed
    // ...
}
- Update Task Request:

- php
Copy code
// In the controller
public function update(UpdateTaskRequest $request, Task $task)
{
    // The UpdateTaskRequest class handles validation
    // If validation fails, the user is redirected back with validation errors
    // If validation passes, the controller logic is executed
    // ...
}
---

## Author

---

<p align="right">
  <span style="color: red; font-size: 18px; font-weight: bold;">M. Shahzaib</span>
</p>

