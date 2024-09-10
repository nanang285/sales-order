<!DOCTYPE html>
<html>
<head>
    <title>Employee List</title>
</head>
<body>
    <h1>Employee List</h1>
    <a href="{{ route('employees.create') }}">Add New Employee</a>
    <ul>
        @foreach ($employees as $employee)
            <li>{{ $employee->name }} - {{ $employee->division }} - {{ $employee->role }}
                <a href="{{ route('employees.show', $employee->id) }}">View</a>
                <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
