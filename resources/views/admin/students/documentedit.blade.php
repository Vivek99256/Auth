<x-app-layout>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #E3FDFD, #FFE6FA);
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            max-width: 600px;
            margin: 30px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .form-group select,
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        .form-group input[type="file"] {
            padding: 5px;
        }
        .current-file {
            margin-top: 10px;
            font-size: 14px;
        }
        .current-file a {
            color: #00AEEF;
            text-decoration: none;
            font-weight: bold;
        }
        .current-file a:hover {
            text-decoration: underline;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn-success {
            background-color: #28a745;
            color: white;
        }
        .btn-secondary {
            background-color: gray;
            color: white;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }
        .btn:hover {
            opacity: 0.8;
        }
        @media (max-width: 480px) {
            .btn-container {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>

    <div class="container">
        <h2>Edit Document</h2>

        @if(session('error'))
            <p style="color: red; text-align: center;">{{ session('error') }}</p>
        @endif

        <form action="{{ route('document.update', $document->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="docType">Document Type</label>
                <select id="docType" name="document_type">
                    <option value="Birth Certificate" {{ $document->document_type == 'Birth Certificate' ? 'selected' : '' }}>Birth Certificate</option>
                    <option value="Income Proof" {{ $document->document_type == 'Income Proof' ? 'selected' : '' }}>Income Proof</option>
                    <option value="Student Achievement Certificates" {{ $document->document_type == 'Student Achievement Certificates' ? 'selected' : '' }}>Student Achievement Certificates</option>
                    <option value="Leaving Certificate" {{ $document->document_type == 'Leaving Certificate' ? 'selected' : '' }}>Leaving Certificate</option>
                </select>
            </div>

            <div class="form-group">
                <label for="docTitle">Document Title</label>
                <input type="text" id="docTitle" name="document_title" value="{{ $document->document_title }}" required>
            </div>

            <div class="form-group">
                <label for="fileUpload">Upload New File (Optional)</label>
                <input type="file" id="fileUpload" name="file_name">
            </div>

            @if($document->file_name)
                <div class="current-file">
                    <strong>Current File:</strong> 
                    <a href="{{ asset('uploads/documents/' . $document->file_name) }}" target="_blank">{{ $document->file_name }}</a>
                </div>
            @endif

            <div class="btn-container">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ route('students.document', $document->student_id) }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</x-app-layout>
