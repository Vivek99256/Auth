<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f7fc;
            overflow-x: hidden;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            height: 100vh;
            position: fixed;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            color: white;
            padding-top: 20px;
            transition: 0.3s ease-in-out;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.2);
        }

        .sidebar h4 {
            text-align: center;
            font-weight: 700;
            padding-bottom: 15px;
            border-bottom: 1px solid #ffffff33;
        }

        .sidebar a {
            color: white;
            padding: 12px 20px;
            display: flex;
            align-items: center;
            text-decoration: none;
            border-radius: 8px;
            margin: 8px 10px;
            transition: 0.3s ease;
            font-size: 16px;
            font-weight: 500;
        }

        .sidebar a i {
            margin-right: 12px;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateX(8px);
        }

        .content {
            margin-left: 260px;
            padding: 20px;
            transition: all 0.3s ease-in-out;
        }

        /* Responsive Sidebar */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: absolute;
                z-index: 1000;
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .content {
                margin-left: 0;
            }
        }

        /* Navbar - Glassmorphism */
        .navbar {
    background: rgba(255, 255, 255, 0.7); /* White with transparency */
    backdrop-filter: blur(10px); /* Glass effect */
    box-shadow: none; /* Removes shadow */
    border-radius: 0px;
    padding: 12px 20px;
}

        .navbar img {
            width: 40px;
            height: 40px;
            object-fit: contain;
        }

        /* Search Bar */
        .search-box {
            display: flex;
            align-items: center;
            background: #eef1f5;
            padding: 8px 15px;
            border-radius: 30px;
            width: 220px;
            box-shadow: inset 2px 2px 5px rgba(0,0,0,0.1);
        }

        .search-box input {
            border: none;
            background: transparent;
            outline: none;
            padding: 5px;
            width: 100%;
        }

        .search-box i {
            color: gray;
        }

        /* User Profile */
        .user-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            overflow: hidden;
            margin-left: 15px;
            border: 3px solid #ddd;
        }

        .user-icon img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Dashboard Cards */
        .card {
            border-radius: 12px;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.15);
            transition: 0.3s ease-in-out;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            padding: 20px;
            text-align: center;
            transform: scale(1);
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card.bg-success {
            background: linear-gradient(135deg, #28a745, #218838);
        }

        .card.bg-danger {
            background: linear-gradient(135deg, #dc3545, #b22234);
        }

        @media (max-width: 768px) {
            .search-box {
                width: 160px;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <h4>Admin Panel</h4>
        <nav class="nav flex-column">
            <a href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            <a href="#"><i class="fas fa-users"></i> Users</a>
            <a href="{{ route('students.index') }}"><i class="fas fa-user-graduate"></i> Students</a>
            <a href="{{ route('students.student_report') }}"><i class="fas fa-chart-bar"></i> Reports</a>
            <a href="#"><i class="fas fa-cog"></i> Settings</a>
        </nav>
    </div>

    <!-- Top Navbar -->
    <nav class="navbar">
        <button class="btn btn-dark d-md-none" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <img src="{{ asset('images/logo.png') }}" alt="SMS Logo">
        <span class="fw-bold">Student Management System</span>

        <div class="d-flex align-items-center ms-auto">
            <div class="search-box me-3">
                <input type="search" placeholder="Search...">
                <i class="fas fa-search"></i>
            </div>

            <div class="dropdown">
                <div class="user-icon" id="userDropdown" data-bs-toggle="dropdown">
                    <img src="https://i.pravatar.cc/100" alt="User">
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{route('profile.edit')}}"><i class="fas fa-user-edit"></i> Edit Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="content">
        <div class="container mt-4">
            <h3>Welcome, Admin!</h3>
            <p>Manage your platform efficiently from the admin panel.</p>

            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <h5>Total Users</h5>
                        <p class="fs-4">{{ $totalUsers }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success">
                        <h5>Total Students</h5>
                        <p class="fs-4">{{ $totalStudents }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById("sidebarToggle").addEventListener("click", function() {
            document.getElementById("sidebar").classList.toggle("active");
        });
    </script>

</body>
</html>
