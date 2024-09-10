<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee List</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mx-auto mt-5">
        <h1 class="text-2xl font-bold mb-4">Employee List</h1>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Phone Number</th>
                    <th class="py-2 px-4 border-b">Address</th>
                    <th class="py-2 px-4 border-b">Fingerprint ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $employee->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->phone_number }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->address }}</td>
                    <td class="py-2 px-4 border-b">{{ $employee->fingerprint_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
