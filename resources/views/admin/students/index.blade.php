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
        .table-responsive {
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #00AEEF;
            color: white;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
        }
        .btn-warning {
            background: #ffcc00;
            color: black;
        }
        .btn-danger {
            background: #dc3545;
            color: white;
        }
        .btn:hover {
            opacity: 0.8;
        }
        .student-photo {
            cursor: pointer;
            border-radius: 5px;
        }
        @media (max-width: 768px) {
            .nav-bar {
                flex-direction: column;
                align-items: center;
            }
            table {
                font-size: 12px;
            }
        }

        /* Modal Styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            padding-top: 60px;
        }
        .modal-content {
            background-color: white;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 600px;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
        .btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: scale(1.05);
    opacity: 0.9;
}

    </style>

    <div class="container py-4">

        <div class="student-list-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 15px;">
    <h2>Student List</h2>
    <a href="{{ route('students.create') }}" class="btn btn-success" style="padding: 8px 15px; text-decoration: none; color: white; background-color: green; border-radius: 5px;">
        + Add Student
    </a>
</div>

        

        <!-- Table displaying student details -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Actions</th>
                        <th>Name</th>
                        <th>Middle Name</th>
                        <th>Surname</th>
                        <th>Mobile No</th>
                        <th>Birthdate</th>
                        <th>Photo</th>
                        <th>Father's Mobile</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>State</th>
                        <th>City</th>
                        <th>Pincode</th>
                        <th>Section</th>
                        <th>Standard</th>
                        <th>Division</th>
                        <th>Quota</th>
                        <th>Gender</th>
                        <th>Religion</th>
                        <th>Caste</th>
                        <th>Blood Group</th>
                        <th>Aadhar No</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $index => $student)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
    <div style="display: flex; gap: 5px;">
        <a href="{{ route('students.edit', $student->id ?? '') }}" class="btn btn-warning btn-sm"
            style="display: flex; align-items: center; gap: 5px; background: #ffc107; color: black; font-weight: bold; padding: 8px 12px; border-radius: 5px; text-decoration: none;">
            ✏️ Edit
        </a>

        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm"
                style="display: flex; align-items: center; gap: 5px; background: #dc3545; color: white; font-weight: bold; padding: 8px 12px; border-radius: 5px; border: none; cursor: pointer;"
                onclick="return confirm('Are you sure you want to delete this student?')">
                🗑️ Delete
            </button>
        </form>
    </div>
</td>
                            <td>{{ $student->stud_name }}</td>
                            <td>{{ $student->mid_name }}</td>
                            <td>{{ $student->surname }}</td>
                            <td>{{ $student->stud_mobile_no }}</td>
                            <td>{{ \Carbon\Carbon::parse($student->birthdate)->format('d-m-Y') }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $student->photo) }}" alt="Student Photo" width="80" class="student-photo" data-photo="{{ asset('storage/' . $student->photo) }}">
                            </td>
                            <td>{{ $student->father_mobile_no }}</td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->state }}</td>
                            <td>{{ $student->city }}</td>
                            <td>{{ $student->pincode }}</td>
                            <td>{{ $student->section }}</td>
                            <td>{{ $student->standard }}</td>
                            <td>{{ $student->division }}</td>
                            <td>{{ $student->quota }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->religion }}</td>
                            <td>{{ $student->caste }}</td>
                            <td>{{ $student->blood_group }}</td>
                            <td>{{ $student->adhar_no }}</td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Image Preview -->
    <div id="photoModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="modalImage" src="" alt="Student Photo" style="width:100%;">
        </div>
    </div>

    <script>
        var modal = document.getElementById("photoModal");
        var modalImg = document.getElementById("modalImage");
        var images = document.querySelectorAll(".student-photo");

        images.forEach(image => {
            image.addEventListener("click", function() {
                modal.style.display = "block";
                modalImg.src = this.getAttribute("data-photo");
            });
        });

        document.getElementsByClassName("close")[0].onclick = function() {
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</x-app-layout>
