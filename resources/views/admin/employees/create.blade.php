<!DOCTYPE html>
<html>
<head>
    <title>Add New Employee</title>
</head>
<body>
    <h1>Add New Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="division">Division:</label>
        <select id="division" name="division" required>
            <option value="Backend Developer">Backend Developer</option>
            <option value="Frontend Developer">Frontend Developer</option>
            <option value="UI/UX Depelover">UI/UX Depelover</option>
            <option value="Mobile Developer">Mobile Developer</option>
            <option value="Fullstack Depelover">Fullstack Depelover</option>
            <option value="DevOps Developer">DevOps Developer</option>
        </select>
        <label for="role">Role:</label>
        <select id="role" name="role" required>
            <option value="Staff">Staff</option>
            <option value="Instership">Instership</option>
            <option value="Praktik Kerja Lapangan">Praktik Kerja Lapangan</option>
            <option value="Lead">Lead</option>
            <option value="Project Manager">Project Manager</option>
            <option value="Human Resource Development">Human Resource Development</option>
            <option value="Finance">Finance</option>
            <option value="Direktur">Direktur</option>
        </select>
        <label for="fingerprint_id">Fingerprint ID:</label>
        <input type="number" id="fingerprint_id" name="fingerprint_id">
        <button type="submit">Save</button>
    </form>
    <a href="{{ route('employees.index') }}">Back to List</a>
</body>
</html>
