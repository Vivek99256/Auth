<x-app-layout>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #E3FDFD, #FFE6FA);
            margin: 0;
            padding: 0;
        }
        /* Custom CSS for the form */
        .form-container {
            background: linear-gradient(135deg, #f9f9f9, #e0e0e0);
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .form-container h1 {
            color: #333;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        .form-group label {
            font-weight: 600;
            color: #555;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 0.75rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        .form-control::placeholder {
            color: #999;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .form-group textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-group select {
            appearance: none;
            background: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e") no-repeat right 0.75rem center/16px 16px;
            padding-right: 2.5rem;
        }

        .form-group input[type="file"] {
            padding: 0.5rem;
        }
    </style>

    <div class="container py-4">
        <h1 class="mb-4 text-center">Add Student</h1>
        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" class="form-container">
            @csrf
            <!-- Group 1 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="student_name" class="form-label">Student Name*</label>
                        <input type="text" name="stud_name" class="form-control" placeholder="Enter student name" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="middle_name" class="form-label">Middle Name</label>
                        <input type="text" name="mid_name" class="form-control" placeholder="Enter middle name">
                    </div>
                </div>
            </div>

            <!-- Group 2 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="surname" class="form-label">Surname*</label>
                        <input type="text" name="surname" class="form-control" placeholder="Enter surname" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="gr_no" class="form-label">Student Mobile No</label>
                        <input type="text" name="stud_mobile_no" class="form-control" placeholder="Enter your number" required>
                    </div>
                </div>
            </div>

            <!-- Group 3 -->

            <!-- Group 4 -->

            <!-- Group 5 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="birthdate" class="form-label">Birthdate*</label>
                        <input type="date" name="birthdate" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="father_mobile_no" class="form-label">Father Mobile</label>
                        <input type="text" name="father_mobile_no" class="form-control" placeholder="Enter father's mobile number">
                    </div>
                </div>
            </div>

            <!-- Group 6 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email" class="form-label">Email </label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="address" class="form-label">Address</label>
                        <textarea name="address" class="form-control" placeholder="Enter address"></textarea>
                    </div>
                </div>
                

            <!-- Group 7 -->
           
            <!-- Group 8 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="state" class="form-label">State</label>
                        <select name="state" class="form-control" required>
                            <option value="" disabled selected>Select State</option>
                            <option value="gujarat">Gujarat</option>
                            <option value="maharastra">Maharastra</opyion>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="city" class="form-label">City</label>
                        <input type="text" name="city" class="form-control" placeholder="Enter city">
                    </div>
                </div>
            </div>

            <!-- Group 9 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pincode" class="form-label">Pincode*</label>
                        <input type="text" name="pincode" class="form-control" placeholder="Enter pincode" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="section" class="form-label">Search Section</label>
                        <select name="section" id="section" class="form-control" required>
                            <option value="" disabled selected>Select Section</option>
                            <option value="KG">KG</option>
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="HighSecondary">High Secondary</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Group 10 -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="standard" class="form-label">Search Standard</label>
                        <select name="standard" id="standard" class="form-control" required>
                            <option value="" disabled selected>Select Standard</option>
                            <!-- Options will be populated dynamically -->
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="division" class="form-label">Search Division</label>
                        <select name="division" class="form-control">
                            <option value="" disabled selected>Select Division</option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="quota" class="form-label">Search Quota</label>
                        <select name="quota" class="form-control">
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
                    <label class="form-label">Gender*</label>
                        <div class="radio-group">
                            <label><input type="radio" name="gender" value="Male" required> Male</label>
                            <label><input type="radio" name="gender" value="Female"> Female</label>
                            <label><input type="radio" name="gender" value="Other"> Other</label>
                        </div>
                    </div>
                </div>
            </div>

              <!-- Group 1: Photo and Religion -->
              <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="photo" class="form-label">User Image</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="religion" class="form-label">Student Religion</label>
                        <select name="religion" class="form-control" required>
                            <option value="" disabled selected>Select Religion</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Muslim">Muslim</option>
                            <option value="Christian">Christian</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Group 2: Caste and Blood Group -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="caste" class="form-label">Student Caste</label>
                        <select name="caste" class="form-control" required>
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
                        <label for="blood_group" class="form-label">Student Blood Group</label>
                        <select name="blood_group" class="form-control" required>
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

            <!-- Group 3: Aadhar No and Gender -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="adhar_no" class="form-label">Aadhar No</label>
                        <input type="text" name="adhar_no" class="form-control" placeholder="Enter Aadhar number" required>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </form>
    </div>
     <script>
        // JavaScript to handle dynamic dropdowns
        document.addEventListener('DOMContentLoaded', function () {
            const sectionDropdown = document.getElementById('section');
            const standardDropdown = document.getElementById('standard');

            // Define standards for each section
            const standards = {
                KG: ["NR", "JR", "SR"],
                Primary: ["1st", "2nd", "3rd", "4th", "5th"],
                Secondary: ["6th", "7th", "8th", "9th", "10th"],
                HighSecondary:["11th","12th"]
            };

            // Event listener for section dropdown change
            sectionDropdown.addEventListener('change', function () {
                const selectedSection = this.value;

                // Clear previous options
                standardDropdown.innerHTML = '<option value="" disabled selected>Select Standard</option>';

                // Populate standards based on selected section
                if (selectedSection && standards[selectedSection]) {
                    standards[selectedSection].forEach(option => {
                        const newOption = document.createElement('option');
                        newOption.value = option;
                        newOption.textContent = option;
                        standardDropdown.appendChild(newOption);
                    });
                }
            });
        });
    </script>
</x-app-layout>