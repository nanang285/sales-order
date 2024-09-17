{{-- <!DOCTYPE html>
<html>
<head>
    <title>Edit Employee</title>
</head>
<body>
    <h1>Edit Employee</h1>
    <form action="{{ route('admin.employees.update', $employees->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $employees->name }}" required>
        <label for="division">Division:</label>
        <select id="division" name="division" required>
            <option value="Backend Developer" {{ $employees->division == 'Backend Developer' ? 'selected' : '' }}>Backend Developer</option>
            <option value="Frontend Developer" {{ $employees->division == 'Frontend Developer' ? 'selected' : '' }}>Frontend Developer</option>
            <option value="UI/UX Depelover" {{ $employees->division == 'UI/UX Depelover' ? 'selected' : '' }}>UI/UX Depelover</option>
            <option value="Mobile Developer" {{ $employees->division == 'Mobile Developer' ? 'selected' : '' }}>Mobile Developer</option>
            <option value="Fullstack Depelover" {{ $employees->division == 'Fullstack Depelover' ? 'selected' : '' }}>Fullstack Depelover</option>
            <option value="DevOps Developer" {{ $employees->division == 'DevOps Developer' ? 'selected' : '' }}>DevOps Developer</option>
        </select>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="Staff" {{ $employees->role == 'Staff' ? 'selected' : '' }}>Staff</option>
            <option value="Instership" {{ $employees->role == 'Instership' ? 'selected' : '' }}>Instership</option>
            <option value="Praktik Kerja Lapangan" {{ $employees->role == 'Praktik Kerja Lapangan' ? 'selected' : '' }}>Praktik Kerja Lapangan</option>
            <option value="Lead" {{ $employees->role == 'Lead' ? 'selected' : '' }}>Lead</option>
            <option value="Project Manager" {{ $employees->role == 'Project Manager' ? 'selected' : '' }}>Project Manager</option>
            <option value="Human Resource Development" {{ $employees->role == 'Human Resource Development' ? 'selected' : '' }}>Human Resource Development</option>
            <option value="Finance" {{ $employees->role == 'Finance' ? 'selected' : '' }}>Finance</option>
            <option value="Direktur" {{ $employees->role == 'Direktur' ? 'selected' : '' }}>Direktur</option>
        </select>
        <label for="fingerprint_id">Fingerprint ID:</label>
        <input type="number" id="fingerprint_id" name="fingerprint_id" value="{{ $employees->fingerprint_id }}">
        <button type="submit">Update</button>
    </form>
    {{-- <a href="{{ route('admin.employees.index') }}">Back to List</a> --}}




