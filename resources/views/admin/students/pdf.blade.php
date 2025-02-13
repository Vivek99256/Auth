<!DOCTYPE html>
<html>
<head>
    <title>Student Report</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #E3FDFD, #FFE6FA);
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        h2 {
            text-transform: uppercase;
            color: #0077b6;
            font-size: 28px;
            margin-bottom: 20px;
            font-weight: 700;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background: white;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: center;
            font-size: 16px;
            border-bottom: 1px solid #ddd;
        }

        th {
            background: #0077b6;
            color: white;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        tbody tr:hover {
            background: #d0f0ff;
            transform: scale(1.02);
            transition: 0.3s ease-in-out;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Student Report</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th> Student Name</th>
                    <th> Standard</th>
                    <th> Division</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->stud_name }}</td>
                        <td>{{ $student->standard }}</td>
                        <td>{{ $student->division }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
