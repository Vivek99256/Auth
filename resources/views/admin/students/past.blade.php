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

        .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .table thead {
        background: #00AEEF;
        color: white;
        font-weight: bold;
        text-transform: uppercase;
    }

    .table th, .table td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    .table tbody tr:hover {
        background: #f1f9ff;
        transition: 0.3s;
    }

    .text-center {
        text-align: center;
    }
    .btn-danger {
        background-color: #dc3545;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        color: white;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }
    </style>
    <div class="container py-4">
            <div class="nav-bar rounded py-2">
                <a href="{{ route('students.edit',$student->id ?? '') }}" class="active">Student Information</a>
                <a href="{{ route('students.past', $student->id ?? '') }}">Past Education</a>
                <!-- <a href="{{ route('students.family', $student->id ?? '') }}">Family History</a> -->
                <a href="{{ route('students.document', $student->id ?? '') }}">Documents</a>
            </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('students.past.store', $student->id) }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="previous_school">Previous School Name</label>
                    <input type="text" name="previous_school" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="last_standard">Last Standard Passed</label>
                    <input type="text" name="last_standard" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <label for="percentage">Percentage Obtained</label>
                    <input type="text" name="percentage" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="board">Board Name</label>
                    <input type="text" name="board" required>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>

        <h3 class="mt-4 text-center" style="color: #00AEEF; font-weight: bold;">📚 Past Education Records</h3>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>🛠 Action</th>
                <th>🏫 Previous School</th>
                <th>🎓 Last Standard</th>
                <th>📊 Percentage</th>
                <th>🏛 Board</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pastEducationRecords as $key => $record)
            <tr>
                <td>
                    <form action="{{ route('students.past.destroy', [$student->id, $record->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">🗑 Delete</button>
                    </form>
                </td>
                <td>{{ $record->previous_school }}</td>
                <td>{{ $record->last_standard }}</td>
                <td>{{ $record->percentage }}%</td>
                <td>{{ $record->board }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    </div>
</x-app-layout>
