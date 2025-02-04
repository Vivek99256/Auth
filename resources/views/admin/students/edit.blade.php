<x-app-layout>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
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
        .form-group .radio-group {
            display: flex;
            gap: 10px;
        }
        .form-group .radio-group label {
            font-weight: normal;
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .form-group .radio-group input[type="radio"] {
            appearance: none;
            -webkit-appearance: none;
            width: 16px;
            height: 16px;
            border: 2px solid #00AEEF;
            border-radius: 50%;
            outline: none;
            cursor: pointer;
            margin-right: 5px;
            position: relative;
        }
        .form-group .radio-group input[type="radio"]:checked {
            background-color: #00AEEF;
            border-color: #00AEEF;
        }
        .form-group .radio-group input[type="radio"]:checked::before {
            content: '';
            display: block;
            width: 8px;
            height: 8px;
            background-color: white;
            border-radius: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }
        .col-md-6 {
            flex: 1 1 calc(50% - 15px);
            box-sizing: border-box;
        }
        @media (max-width: 768px) {
            .col-md-6 {
                flex: 1 1 100%;
            }
            .nav-bar {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
    <div class="container py-4">
        <form action="{{ route('students.index') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            <div class="nav-bar rounded py-2" >
                <a href="{{ route('students.edit') }}" class="active">Student Information</a>
                <a href="{{ route('students.past') }}" class="Active">Past Education</a>
                <a href="{{ route('students.family') }}">Family History</a>
                <a href="{{ route('students.document') }}">Documents</a>
            </div>

            <!-- Group 1 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="student_name">Student Name*</label>
                        <input type="text" name="stud_name" placeholder="Enter student name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" name="mid_name" placeholder="Enter middle name">
                    </div>
                </div>
            </div>

            <!-- Group 2 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="surname">Surname*</label>
                        <input type="text" name="surname" placeholder="Enter surname" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gr_no">Student Mobile No</label>
                        <input type="text" name="stud_mobile_no" placeholder="Enter your number" required>
                    </div>
                </div>
            </div>

            <!-- Group 3 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birthdate">Birthdate*</label>
                        <input type="date" name="birthdate" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="father_mobile_no">Father Mobile</label>
                        <input type="text" name="father_mobile_no" placeholder="Enter father's mobile number">
                    </div>
                </div>
            </div>

            <!-- Group 4 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" placeholder="Enter address"></textarea>
                    </div>
                </div>
            </div>

            <!-- Group 5 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="state">State</label>
                        <select name="state" required>
                            <option value="" disabled selected>Select State</option>
                            <option value="gujarat">Gujarat</option>
                            <option value="maharastra">Maharastra</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" placeholder="Enter city">
                    </div>
                </div>
            </div>

            <!-- Group 6 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pincode">Pincode*</label>
                        <input type="text" name="pincode" placeholder="Enter pincode" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="section">Search Section</label>
                        <select name="section" id="section" required>
                            <option value="" disabled selected>Select Section</option>
                            <option value="KG">KG</option>
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="HighSecondary">High Secondary</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Group 7 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="standard">Search Standard</label>
                        <select name="standard" id="standard" required>
                            <option value="" disabled selected>Select Standard</option>
                            <!-- Options will be populated dynamically -->
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="division">Search Division</label>
                        <select name="division">
                            <option value="" disabled selected>Select Division</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Group 8 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="quota">Search Quota</label>
                        <select name="quota">
                            <option value="" disabled selected>Quota</option>
                            <option value="gen">General</option>
                            <option value="obc">OBC</option>
                            <option value="sc">SC</option>
                            <option value="st">ST</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender*</label>
                        <div class="radio-group">
                            <label><input type="radio" name="gender" value="Male" required> Male</label>
                            <label><input type="radio" name="gender" value="Female"> Female</label>
                            <label><input type="radio" name="gender" value="Other"> Other</label>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Group 9: Photo and Religion -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="photo">User Image</label>
                        <input type="file" name="photo">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="religion">Student Religion</label>
                        <select name="religion" required>
                            <option value="" disabled selected>Select Religion</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Christian">Christian</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Group 10: Caste and Blood Group -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="caste">Student Caste</label>
                        <select name="caste" required>
                            <option value="" disabled selected>Select Caste</option>
                            <option value="General">General</option>
                            <option value="OBC">OBC</option>
                            <option value="SC">SC</option>
                            <option value="ST">ST</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="blood_group">Student Blood Group</label>
                        <select name="blood_group" required>
                            <option value="" disabled selected>Select Blood Group</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>