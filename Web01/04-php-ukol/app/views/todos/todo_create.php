<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Přidat úkol</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/styles.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">To-Do List</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Přidat úkol</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/todo_list.php">Seznam úkolů</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white text-center">
                        <h2>Přidat nový úkol</h2>
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/ToDoController.php?action=create" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="name" class="form-label">Název úkolu: <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Popis: <span class="text-danger">*</span></label>
                                <input id="description" name="description" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="date" class="form-label">Termín: <span class="text-danger">*</span></label>
                                <input type="date" id="date" name="date" class="form-control" required>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" id="completion" name="completion" class="form-check-input">
                                <label for="completion" class="form-check-label">Dokončeno</label>
                            </div>

                            <div class="mb-3">
                                <label for="priority" class="form-label">Priorita: <span class="text-danger">*</span></label>
                                <select id="priority" name="priority" class="form-select" required>
                                    <option value="1">Nízká</option>
                                    <option value="2" selected>Střední</option>
                                    <option value="3">Vysoká</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="images" class="form-label">Přílohy:</label>
                                <input type="file" id="images" name="images[]" class="form-control" multiple>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Uložit úkol</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>