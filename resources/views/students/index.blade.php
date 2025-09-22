<h1>Students List</h1>

@if (session('status'))
    <div>{{ session('status') }}</div>
@endif

<a href="{{ route('students.create') }}">Add Student</a>

<table border="1" cellpadding="6" cellspacing="0">
    <thead>
        <tr>
            <th>#</th>
            <th>Student No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->studentNumber }}</td>
                <td>{{ $student->lname }}, {{ $student->fname }} {{ $student->mi }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->contactNumber }}</td>
                <td>
                    <a href="{{ route('students.edit', $student) }}">Edit</a>
                    <form action="{{ route('students.destroy', $student) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Delete this student?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
