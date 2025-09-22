<h1>Edit Student</h1>

@if ($errors->any())
    <div>
        <strong>Whoops!</strong> Please fix the following errors:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('students.update', $student) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="studentNumber" value="{{ old('studentNumber', $student->studentNumber) }}" placeholder="Student Number" required><br>
    <input type="text" name="lname" value="{{ old('lname', $student->lname) }}" placeholder="Last Name" required><br>
    <input type="text" name="fname" value="{{ old('fname', $student->fname) }}" placeholder="First Name" required><br>
    <input type="text" name="mi" value="{{ old('mi', $student->mi) }}" placeholder="MI"><br>
    <input type="email" name="email" value="{{ old('email', $student->email) }}" placeholder="Email"><br>
    <input type="text" name="contactNumber" value="{{ old('contactNumber', $student->contactNumber) }}" placeholder="Contact Number"><br>
    <button type="submit">Update</button>
    <a href="{{ route('students.index') }}">Cancel</a>
</form>
