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
        .education-group {
            width: 100%;
            border: 1px solid #ddd;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 10px;
            background-color: #fafafa;
        }
    </style>

    <div class="container">
        <form action="{{ route('students.past') }}" method="POST">
            @csrf

            <div class="nav-bar rounded">
                <a href="{{ route('students.edit') }}">Student Information</a>
                <a href="{{ route('students.past') }}" class="active">Past Education</a>
                <a href="{{ route('students.family') }}">Family History</a>
                <a href="{{ route('students.document') }}">Documents</a>
            </div>

            <div id="education-fields">
                <!-- Initial Input Fields -->
                <div class="education-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Medium</label>
                                <input type="text" name="medium[]" placeholder="Enter Medium">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name of Board</label>
                                <input type="text" name="board_name[]" placeholder="Enter Board Name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Year</label>
                                <input type="text" name="year[]" placeholder="Enter Year">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Percentage</label>
                                <input type="text" name="percentage[]" placeholder="Enter Percentage">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>School Name</label>
                                <input type="text" name="school_name[]" placeholder="Enter School Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Place</label>
                                <input type="text" name="place[]" placeholder="Enter Place">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trial</label>
                                <input type="text" name="trial[]" placeholder="Enter Trial">
                            </div>
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
            newFields.classList.add('education-group'); // Ensure grouping

            newFields.innerHTML = `
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Medium</label>
                            <input type="text" name="medium[]" placeholder="Enter Medium">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Name of Board</label>
                            <input type="text" name="board_name[]" placeholder="Enter Board Name">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Year</label>
                            <input type="text" name="year[]" placeholder="Enter Year">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Percentage</label>
                            <input type="text" name="percentage[]" placeholder="Enter Percentage">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>School Name</label>
                            <input type="text" name="school_name[]" placeholder="Enter School Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Place</label>
                            <input type="text" name="place[]" placeholder="Enter Place">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Trial</label>
                            <input type="text" name="trial[]" placeholder="Enter Trial">
                        </div>
                    </div>
                </div>
            `;

            document.getElementById('education-fields').appendChild(newFields); // Append at the bottom
        });
    </script>
</x-app-layout>
