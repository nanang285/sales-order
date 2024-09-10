<!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $employee->name }}" required>
        <label for="division">Division:</label>
        <select id="division" name="division" required>
            <option value="Backend Developer" {{ $employee->division == 'Backend Developer' ? 'selected' : '' }}>Backend Developer</option>
            <option value="Frontend Developer" {{ $employee->division == 'Frontend Developer' ? 'selected' : '' }}>Frontend Developer</option>
            <option value="UI/UX Depelover" {{ $employee->division == 'UI/UX Depelover' ? 'selected' : '' }}>UI/UX Depelover</option>
            <option value="Mobile Developer" {{ $employee->division == 'Mobile Developer' ? 'selected' : '' }}>Mobile Developer</option>
            <option value="Fullstack Depelover" {{ $employee->division == 'Fullstack Depelover' ? 'selected' : '' }}>Fullstack Depelover</option>
            <option value="DevOps Developer" {{ $employee->division == 'DevOps Developer' ? 'selected' : '' }}>DevOps Developer</option>
        </select>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="Staff" {{ $employee->role == 'Staff' ? 'selected' : '' }}>Staff</option>
            <option value="Instership" {{ $employee->role == 'Instership' ? 'selected' : '' }}>Instership</option>
            <option value="Praktik Kerja Lapangan" {{ $employee->role == 'Praktik Kerja Lapangan' ? 'selected' : '' }}>Praktik Kerja Lapangan</option>
            <option value="Lead" {{ $employee->role == 'Lead' ? 'selected' : '' }}>Lead</option>
            <option value="Project Manager" {{ $employee->role == 'Project Manager' ? 'selected' : '' }}>Project Manager</option>
            <option value="Human Resource Development" {{ $employee->role == 'Human Resource Development' ? 'selected' : '' }}>Human Resource Development</option>
            <option value="Finance" {{ $employee->role == 'Finance' ? 'selected' : '' }}>Finance</option>
            <option value="Direktur" {{ $employee->role == 'Direktur' ? 'selected' : '' }}>Direktur</option>
        </select>
        <label for="fingerprint_id">Fingerprint ID:</label>
        <input type="number" id="fingerprint_id" name="fingerprint_id" value="{{ $employee->fingerprint_id }}">
        <button type="submit">Update</button>
    </form>
    <a href="{{ route('employees.index') }}">Back to List</a>
</body>
</html>
