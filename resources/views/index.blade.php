<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Educational Information Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --background-light: #f4f7f6;
            --text-dark: #2c3e50;
            --card-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        * {
            transition: all 0.3s ease;
        }

        body {
            font-family: 'Inter', 'Arial', sans-serif;
            background-color: var(--background-light);
            color: var(--text-dark);
            line-height: 1.6;
        }

        .container-fluid {
            max-width: 1400px;
        }

        .dashboard-header {
            background: linear-gradient(135deg, var(--primary-color), #6a11cb);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            box-shadow: var(--card-shadow);
        }

        .dashboard-header h1 {
            font-weight: 700;
            letter-spacing: -1px;
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-bottom: 1.5rem;
        }

        .table {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--card-shadow);
        }

        .table thead {
            background-color: #f8f9fa;
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(52, 152, 219, 0.05);
        }

        .btn-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.375rem 0.75rem;
            border-radius: 8px;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #6a11cb);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.4);
        }

        .badge-level {
            font-size: 0.8rem;
            font-weight: 500;
            padding: 0.35em 0.65em;
            border-radius: 50px;
        }

        .modal-content {
            border-radius: 12px;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), #6a11cb);
            color: white;
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem;
        }

        .search-container {
            position: relative;
        }

        .search-container .form-control {
            padding-left: 2.5rem;
        }

        .search-container .search-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
        }

        .pagination {
            justify-content: center;
            margin-top: 1.5rem;
        }

        .page-item.active .page-link {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .table-responsive {
                font-size: 0.9rem;
            }
            
            .btn-action {
                padding: 0.25rem 0.5rem;
                font-size: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-header text-center">
        <div class="container-fluid">
            <h1 class="display-5">
                🎓 Educational Information Management
            </h1>
            <p class="lead">Organize, Track, and Manage Educational Resources</p>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <button class="btn btn-primary btn-action" data-bs-toggle="modal" data-bs-target="#createModal">
                                <i class="bi bi-plus-circle"></i> Add New Educational Info
                            </button>
                            
                            <div class="search-container" style="width: 300px;">
                                <i class="bi bi-search search-icon"></i>
                                <input type="text" class="form-control" placeholder="Search educational info...">
                            </div>
                        </div>

                        <!-- Data Table -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Subject</th>
                                        <th>Education Level</th>
                                        <th>Publication Date</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Introduction to Computer Science</td>
                                        <td>Computer Science</td>
                                        <td>
                                            <span class="badge badge-level bg-info">Higher Education</span>
                                        </td>
                                        <td>2024-01-15</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning btn-action me-2">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-action">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Mathematics Fundamentals</td>
                                        <td>Mathematics</td>
                                        <td>
                                            <span class="badge badge-level bg-success">Secondary</span>
                                        </td>
                                        <td>2024-02-01</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning btn-action me-2">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-action">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Basic Reading Skills</td>
                                        <td>Language Arts</td>
                                        <td>
                                            <span class="badge badge-level bg-primary">Primary</span>
                                        </td>
                                        <td>2024-01-20</td>
                                        <td>
                                            <button class="btn btn-sm btn-warning btn-action me-2">
                                                <i class="bi bi-pencil"></i> Edit
                                            </button>
                                            <button class="btn btn-sm btn-danger btn-action">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Educational Information</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    <form>
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" placeholder="Enter educational resource title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" rows="3" placeholder="Provide a brief description of the educational resource"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Subject</label>
                                <input type="text" class="form-control" placeholder="e.g., Mathematics, Computer Science">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Education Level</label>
                                <select class="form-select">
                                    <option selected>Select Education Level</option>
                                    <option value="Primary">Primary</option>
                                    <option value="Secondary">Secondary</option>
                                    <option value="Higher Education">Higher Education</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Publication Date</label>
                            <input type="date" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary btn-action w-100 mt-3">
                            <i class="bi bi-save"></i> Save Educational Resource
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
</body>
</html>