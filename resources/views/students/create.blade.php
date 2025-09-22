<h1>Add New Student</h1>

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

<form action="{{ route('students.store') }}" method="POST">
    @csrf
    <input type="text" name="studentNumber" value="{{ old('studentNumber') }}" placeholder="Student Number" required><br>
    <input type="text" name="lname" value="{{ old('lname') }}" placeholder="Last Name" required><br>
    <input type="text" name="fname" value="{{ old('fname') }}" placeholder="First Name" required><br>
    <input type="text" name="mi" value="{{ old('mi') }}" placeholder="MI"><br>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"><br>
    <input type="text" name="contactNumber" value="{{ old('contactNumber') }}" placeholder="Contact Number"><br>
    <button type="submit">Save</button>
    <a href="{{ route('students.index') }}">Cancel</a>
    
</form>
