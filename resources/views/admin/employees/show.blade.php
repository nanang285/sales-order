<!DOCTYPE html>
<html>
<head>
    <title>View Employee</title>
</head>
<body>
    <h1>Employee Details</h1>
    <p>Name: {{ $employee->name }}</p>
    <p>Division: {{ $employee->division }}</p>
    <p>Role: {{ $employee->role }}</p>
    <p>Fingerprint ID: {{ $employee->fingerprint_id }}</p>
    <a href="{{ route('employees.index') }}">Back to List</a>
</body>
</html>
