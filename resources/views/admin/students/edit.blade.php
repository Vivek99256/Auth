<x-app-layout>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #E3FDFD, #FFE6FA);
            margin: 0;
            padding: 0;
        }
        .nav-bar {
            background-color: #00AEEF;
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .nav-bar a {
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            font-weight: bold;
            margin: 5px;
            border-radius: 20px;
            transition: background-color 0.3s ease;
        }
        .nav-bar a.active, .nav-bar a:hover {
            background-color: black;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
    </style>

    <div class="container py-4">

    <form action="{{ route('students.update', $student->id ?? '') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')



            <div class="nav-bar rounded py-2">
                <a href="{{ route('students.edit',$student->id ?? '') }}" class="active">Student Information</a>
                <!-- <a href="{{ route('students.past', $student->id ?? '') }}">Past Education</a>
                <a href="{{ route('students.family', $student->id ?? '') }}">Family History</a> -->
                <a href="{{ route('students.document', $student->id ?? '') }}">Documents</a>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="student_name">Student Name*</label>
                        <input type="text" name="stud_name" value="{{ old('stud_name', $student->stud_name ?? '') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" name="mid_name" value="{{ old('mid_name', $student->mid_name ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="surname">Surname*</label>
                        <input type="text" name="surname" value="{{ old('surname', $student->surname ?? '') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stud_mobile_no">Student Mobile No</label>
                        <input type="text" name="stud_mobile_no" value="{{ old('stud_mobile_no', $student->stud_mobile_no ?? '') }}" required>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birthdate">Birthdate*</label>
                        <input type="date" name="birthdate" value="{{ old('birthdate', $student->birthdate ?? '') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="father_mobile_no">Father Mobile</label>
                        <input type="text" name="father_mobile_no" value="{{ old('father_mobile_no', $student->father_mobile_no ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" value="{{ old('email', $student->email ?? '') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address">{{ old('address', $student->address ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="state">State</label>
                        <select name="state" required>
                            <option value="" disabled>Select State</option>
                            <option value="gujarat" {{ old('state', $student->state ?? '') == 'gujarat' ? 'selected' : '' }}>Gujarat</option>
                            <option value="maharastra" {{ old('state', $student->state ?? '') == 'maharastra' ? 'selected' : '' }}>Maharastra</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" value="{{ old('city', $student->city ?? '') }}">
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pincode">Pincode*</label>
                        <input type="text" name="pincode" value="{{ old('pincode', $student->pincode ?? '') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="photo">User Image</label>
                        <input type="file" name="photo">
                        @if(isset($student->photo))
                            <img src="{{ asset('storage/' . $student->photo) }}" width="100">
                        @endif
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="religion">Student Religion</label>
                        <select name="religion" required>
                            <option value="" disabled>Select Religion</option>
                            <option value="Hindu" {{ old('religion', $student->religion ?? '') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                            <option value="Muslim" {{ old('religion', $student->religion ?? '') == 'Muslim' ? 'selected' : '' }}>Muslim</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
