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
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        .form-group input, .form-group select {
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
            margin-top: 10px;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background-color: #00AEEF;
            color: white;
        }
    </style>

    <div class="container">
        
        <div class="nav-bar rounded">
            <a href="{{ route('students.edit') }}">Student Information</a>
            <a href="{{ route('students.past') }}">Past Education</a>
            <a href="{{ route('students.family') }}">Family History</a>
            <a href="{{ route('students.document') }}" class="active">Documents</a>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="docType">Document Type</label>
                    <select id="docType">
                        <option value="">Select</option>
                        <option value="Birth Certificate">Birth Certificate</option>
                        <option value="Income Proof">Income Proof</option>
                        <option value="Student Achievement Certificates">Student Achievement Certificates</option>
                        <option value="Leaving Certificate">Leaving Certificate</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="docTitle">Document Title</label>
                    <input type="text" id="docTitle" placeholder="Enter document title">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="fileUpload">File</label>
                    <input type="file" id="fileUpload">
                </div>
            </div>
        </div>

        <button class="btn btn-success" onclick="saveDocument()">Save</button>

        <table>
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Document Type</th>
                    <th>Document Title</th>
                    <th>Date</th>
                    <th>File Name</th>
                </tr>
            </thead>
            <tbody id="docTableBody"></tbody>
        </table>
    </div>

    <script>
        let docCount = 0;

        function saveDocument() {
            const docType = document.getElementById("docType").value;
            const docTitle = document.getElementById("docTitle").value;
            const fileUpload = document.getElementById("fileUpload").files[0];

            if (!docType || !docTitle || !fileUpload) {
                alert("Please fill in all fields and select a file.");
                return;
            }

            docCount++;
            const date = new Date().toISOString().split("T")[0] + " " + new Date().toLocaleTimeString();

            const tableBody = document.getElementById("docTableBody");
            const newRow = document.createElement("tr");

            newRow.innerHTML = `
                <td>${docCount}</td>
                <td>${docType}</td>
                <td>${docTitle}</td>
                <td>${date}</td>
                <td><a href="#" onclick="alert('File download not implemented!')">${fileUpload.name}</a></td>
            `;

            tableBody.appendChild(newRow);
            document.getElementById("docType").value = "";
            document.getElementById("docTitle").value = "";
            document.getElementById("fileUpload").value = "";
        }
    </script>
</x-app-layout>
