<x-app-layout>
    <style>
        body {
            font-family: Arial, sans-serif;
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
        .btn {
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
    </style>

    <div class="container">

        <form action="{{ route('students.family') }}" method="POST">
            @csrf

            <div class="nav-bar rounded">
                <a href="{{ route('students.edit') }}">Student Information</a>
                <a href="{{ route('students.past') }}">Past Education</a>
                <a href="{{ route('students.family') }}" class="active">Family History</a>
                <a href="{{ route('students.document') }}">Documents</a>
            </div>

            <div id="family-fields">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name[]" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Relation with Student</label>
                            <input type="text" name="relation_with_student[]" placeholder="Enter Relation with Student">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Institute Name</label>
                            <input type="text" name="institute Name[]" placeholder="Enter Institute Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" name="course[]" placeholder="Enter Course">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Annual Income</label>
                            <input type="text" name="annual_income[]" placeholder="Enter Annual Income">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Year</label>
                            <input type="text" name="contact_number[]" placeholder="Enter Contact Number">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="button" id="addRow" class="btn btn-primary">Add More</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('addRow').addEventListener('click', function() {
            let newFields = document.createElement('div');
            newFields.classList.add('row', 'mb-3');

            newFields.innerHTML = `
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name[]" placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Relation with Student</label>
                            <input type="text" name="relation_with_student[]" placeholder="Enter Relation with Student">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Institute Name</label>
                            <input type="text" name="institute Name[]" placeholder="Enter Institute Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Course</label>
                            <input type="text" name="course[]" placeholder="Enter Course">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Annual Income</label>
                            <input type="text" name="annual_income[]" placeholder="Enter Annual Income">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Year</label>
                            <input type="text" name="contact_number[]" placeholder="Enter Contact Number">
                        </div>
                    </div>
            `;

            document.getElementById('family-fields').appendChild(newFields);
        });
    </script>
</x-app-layout>
