<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seznam úkolů</title>
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
                            <a class="nav-link" href="../todos/todo_create.php">Přidat úkol</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../controllers/todo_list.php">Seznam úkolů</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <h2>Seznam úkolů</h2>
        <?php if(!empty($todo)): ?>
            <table class="table table-bordered table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Název</th>
                        <th>Popis</th>
                        <th>Termín</th>
                        <th>Stav</th>
                        <th>Priorita</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($todo as $task): ?>
                        <tr>
                            <td><?= htmlspecialchars($task['name']) ?></td>
                            <td><?= htmlspecialchars($task['description']) ?></td>
                            <td><?= htmlspecialchars($task['date']) ?></td>
                            <td><?= $task['completion'] ? 'Dokončeno' : 'Nedokončeno' ?></td>
                            <td><?= htmlspecialchars($task['priority']) ?></td>
                        </tr>
                    <?php endforeach; ?>    
                </tbody>
            </table>    
        <?php else: ?>
            <div class="alert alert-info">Nebyly načteny žádné úkoly.</div>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>