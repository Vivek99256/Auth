
<style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg, #FFDEE9, #B5FFFC);
    animation: gradientBG 6s ease infinite alternate;
    margin: 0;
    padding: 0;
}

        .container {
            max-width: 1100px;
            margin: 50px auto;
            background: #ffffff;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.8s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h3 {
            text-align: center;
            color: #0077b6;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            text-transform: uppercase;
        }

        .search-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            padding: 25px;
            border-radius: 15px;
            background: white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
            font-size: 15px;
        }

        .form-select, .form-control {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 2px solid #ccc;
            transition: 0.3s ease-in-out;
            background: #f9f9f9;
        }

        .form-select:focus, .form-control:focus {
            border-color: #0077b6;
            box-shadow: 0 0 8px rgba(0, 119, 182, 0.3);
            background: #fff;
        }

        .btn-search, .btn-download {
            padding: 12px 30px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s ease;
        }

        .btn-search {
            background: #0077b6;
            color: white;
        }

        .btn-search:hover {
            transform: scale(1.05);
            background: #005f8d;
        }

        .btn-download {
    background: #e74c3c;
    color: white;
    padding: 8px 15px; /* Smaller padding */
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-size: 14px; /* Smaller font */
    font-weight: bold;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.3s ease;
}

        .btn-download:hover {
    background: #c0392b;
    transform: scale(1.05);
}

        .table-container {
            margin-top: 30px;
            overflow-x: auto;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
        }

        .table thead {
            background: #0077b6;
            color: white;
        }

        .table th, .table td {
            padding: 14px;
            text-align: center;
            border-bottom: 1px solid #ddd;
            font-size: 16px;
        }

        .table tbody tr:nth-child(even) {
            background: #f8f9fa;
        }

        .table tbody tr:hover {
            background: #e0f7ff;
            transform: scale(1.02);
            transition: 0.3s ease;
        }
    </style>

    <div class="container">
        <h3>📄 Student Report</h3>
        <form action="{{ route('student.search')}}" method="get">
            @csrf
            <div style="text-align: right; margin-bottom: 15px;">
    <a href="#" onclick="downloadPDF()" class="btn-download">
        🖨️ PDF
    </a>
    <a href="#" onclick="downloadExcel()" class="btn-download">📊 Excel</a>
    <a href="#" onclick="downloadCSV()" class="btn-download">📑 CSV</a>
    <a href="#" onclick="printReport()" class="btn-download">🖨️ Print</a>
</div>
            <div class="search-container">
                <div>
                    <label>📚 <strong>Search Section:</strong></label>
                    <select class="form-select" id="section" name="section">
    <option value="" disabled>Select Section</option>
    <option value="KG" {{ request('section') == 'KG' ? 'selected' : '' }}>KG</option>
    <option value="Primary" {{ request('section') == 'Primary' ? 'selected' : '' }}>Primary</option>
    <option value="Secondary" {{ request('section') == 'Secondary' ? 'selected' : '' }}>Secondary</option>
    <option value="HighSecondary" {{ request('section') == 'HighSecondary' ? 'selected' : '' }}>High Secondary</option>
</select>

                </div>
                <div>
                    <label>🎓 <strong>Search Standard:</strong></label>
                    <select name="standard" id="standard" class="form-control">
                        <option value="" disabled selected>Select Standard</option>
                    </select>
                </div>
                <div>
                    <label>📖 <strong>Search Division:</strong></label>
                    <select class="form-select" name="division">
    <option value="">Select</option>
    <option value="A" {{ request('division') == 'A' ? 'selected' : '' }}>A</option>
    <option value="B" {{ request('division') == 'B' ? 'selected' : '' }}>B</option>
    <option value="C" {{ request('division') == 'C' ? 'selected' : '' }}>C</option>
    <option value="D" {{ request('division') == 'D' ? 'selected' : '' }}>D</option>
</select>

                </div>
                <button class="btn-search">🔍 Search</button>
            </div>
        </form>

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>👨‍🎓 Student Name</th>
                        <th>📖 Standard</th>
                        <th>🎓 Division</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($students) && $students->count() > 0)
                        @foreach($students as $student)  
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->stud_name }}</td>
                                <td>{{ $student->standard }}</td>
                                <td>{{ $student->division }}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4">🚫 No students found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const sectionDropdown = document.getElementById('section');
    const standardDropdown = document.getElementById('standard');

    const standards = {
        KG: ["NR", "JR", "SR"],
        Primary: ["1st", "2nd", "3rd", "4th", "5th"],
        Secondary: ["6th", "7th", "8th", "9th", "10th"],
        HighSecondary: ["11th", "12th"]
    };

    // Preselect Standard from previous search
    let selectedSection = "{{ request('section') }}";
    let selectedStandard = "{{ request('standard') }}";

    if (selectedSection && standards[selectedSection]) {
        standardDropdown.innerHTML = '<option value="" disabled>Select Standard</option>';
        
        standards[selectedSection].forEach(option => {
            const newOption = document.createElement('option');
            newOption.value = option;
            newOption.textContent = option;
            if (option === selectedStandard) {
                newOption.selected = true; // Set the previous selected standard
            }
            standardDropdown.appendChild(newOption);
        });
    }

    // Event listener for dropdown change
    sectionDropdown.addEventListener('change', function () {
        const selectedSection = this.value;
        standardDropdown.innerHTML = '<option value="" disabled selected>Select Standard</option>';
        
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


        function downloadPDF() {
        let section = document.getElementById('section').value;
        console.log(section);
        let standard = document.getElementById('standard').value;
        console.log(standard);
        let division = document.querySelector('[name="division"]').value;
        console.log(division);
        
        let url = `{{ route('student.pdf') }}?section=${section}&standard=${standard}&division=${division}`;
        console.log(url);
        window.location.href = url;
    }

    function downloadCSV() {
        let section = document.getElementById('section').value;
        let standard = document.getElementById('standard').value;
        let division = document.querySelector('[name="division"]').value;
        
        let url = `{{ route('student.export.csv') }}?section=${section}&standard=${standard}&division=${division}`;
        window.location.href = url;
    }

    function downloadExcel() {
    let section = document.getElementById('section').value;
    let standard = document.getElementById('standard').value;
    let division = document.querySelector('[name="division"]').value;
    
    let url = `{{ route('student.excel') }}?section=${section}&standard=${standard}&division=${division}`;
    window.location.href = url;
}

function printReport() {
    window.print();
}
    </script>

