<?php
require_once 'inc/auth.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/../config/config.php';

$stmt = $pdo->query("
    SELECT *
    FROM " . POSTS_TABLE . "
    ORDER BY sort_order ASC, pinned DESC, created_at DESC
");     
$posts = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Naturfreunde CMS</title>
    <link rel="stylesheet" href="../css/style.css"> 
    <style>
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            background: white;
        }

        .admin-table th {
            background: linear-gradient(135deg, #2c5f2d 0%, #1e4620 100%);
            color: white;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            border-bottom: 3px solid #1e4620;
        }

        .admin-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }

        .admin-table tbody tr {
            transition: background-color 0.2s ease;
        }

        .admin-table tbody tr:hover {
            background-color: #f5f5f5;
        }

        .admin-table tbody tr:nth-child(odd) {
            background-color: #fafafa;
        }

        .admin-table tbody tr:nth-child(even) {
            background-color: #ffffff;
        }

        .admin-table tr:last-child td {
            border-bottom: 2px solid #2c5f2d;
        }

        .admin-table td:nth-child(1) {
            font-weight: 500;
            color: #1e4620;
            min-width: 250px;
        }

        .admin-table td:nth-child(2) {
            background-color: rgba(44, 95, 45, 0.03);
            text-align: center;
            font-size: 12px;
            color: #555;
        }

        .admin-table td:nth-child(3) {
            font-size: 12px;
            color: #666;
            min-width: 150px;
        }

        .admin-table td:nth-child(4) {
            font-size: 13px;
        }

        .admin-table a {
            color: #0066cc;
            text-decoration: none;
            padding: 2px 5px;
            border-radius: 3px;
            transition: all 0.2s ease;
        }

        .admin-table a:hover {
            background-color: #e3f2fd;
            color: #0052a3;
        }

        .action-separator {
            color: #ccc;
            margin: 0 5px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 90%;
            max-width: 600px;
            border-radius: 5px;
        }
        .modal-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        .modal-close:hover {
            color: black;
        }
        .sortable-list {
            list-style: none;
            padding: 0;
        }
        .sortable-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin: 5px 0;
            background: #f0f0f0;
            border-radius: 3px;
            border: 1px solid #ddd;
        }
        .sort-buttons {
            display: flex;
            gap: 5px;
        }
        .sort-btn {
            padding: 5px 10px;
            background: #2c5f2d;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.2s ease;
        }
        .sort-btn:hover {
            background: #1e4620;
        }
        .sort-btn:disabled {
            background: #ccc;
            cursor: not-allowed;
        }
        .confirm-btn {
            background: #28a745;
            padding: 10px 20px;
            margin-top: 15px;
        }
        .confirm-btn:hover {
            background: #218838;
        }
        .cancel-btn {
            background: #dc3545;
            padding: 10px 20px;
            margin-top: 15px;
            margin-left: 10px;
        }
        .cancel-btn:hover {
            background: #c82333;
        }
        .filter-btn {
            padding: 8px 12px;
            background: #e0e0e0;
            border: 2px solid #ccc;
            border-radius: 3px;
            cursor: pointer;
            font-size: 12px;
            transition: all 0.2s ease;
            margin-right: 5px;
        }
        .filter-btn.active {
            background: #2c5f2d;
            color: white;
            border-color: #1e4620;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn-group a, .btn-group button {
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.2s ease;
        }

        .btn-new {
            background: #28a745;
            color: white;
        }

        .btn-new:hover {
            background: #218838;
        }

        .btn-sort {
            background: #ff9800;
            color: white;
        }

        .btn-sort:hover {
            background: #e68900;
        }
    </style>
</head>
<body class="admin-body">
    <div class="admin">
        <div style="display:flex;justify-content:space-between;align-items:center;">
            <h1>Naturfreunde CMS</h1>
            <div>
                <a href="../team/">→ Team</a>
                <a href="logout.php" style="margin-left: 15px;">Abmelden</a>
            </div>
        </div> 
        <div class="btn-group">
            <a href="neu.php" class="btn-new">➕ Neuer Beitrag</a>
            <a href="#" onclick="openSortModal(); return false;" class="btn-sort">🔀 Reihenfolge bearbeiten</a>
        </div>
        
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Titel</th>
                    <th>Typ</th>
                    <th>Datum</th>
                    <th>Aktionen</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($posts as $post): ?>
            <tr>
                <td><?= htmlspecialchars($post['title']) ?></td>
                <td><?= ucfirst($post['type']) ?></td>
                <td><?= date('d.m.Y H:i', strtotime($post['created_at'])) ?></td>
                <td>
                    <a href="bearbeiten.php?id=<?= $post['id'] ?>">Bearbeiten</a>
                    <span class="action-separator">|</span>
                    <a href="loeschen.php?id=<?= $post['id'] ?>"
                    onclick="return confirm('Diesen Beitrag wirklich löschen?');">
                        Löschen
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Modal für Reihenfolge -->
    <div id="sortModal" class="modal">
        <div class="modal-content">
            <span class="modal-close" onclick="closeSortModal()">&times;</span>
            <h2>Reihenfolge bearbeiten</h2>
            <ul id="sortableList" class="sortable-list"></ul>
            <button class="sort-btn confirm-btn" onclick="saveSortOrder()">✓ Bestätigen</button>
            <button class="sort-btn cancel-btn" onclick="closeSortModal()">✕ Abbrechen</button>
        </div>
    </div>

    <script>
        const postsData = <?= json_encode($posts) ?>;
        let currentFilter = 'all';

        function openSortModal() {
            document.getElementById('sortModal').style.display = 'block';
            loadSortList();
        }

        function closeSortModal() {
            document.getElementById('sortModal').style.display = 'none';
        }

        function filterByType(type) {
            currentFilter = type;
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            loadSortList();
        }

        function loadSortList() {
            const list = document.getElementById('sortableList');
            list.innerHTML = '';
            
            let filtered = postsData;
            if (currentFilter !== 'all') {
                filtered = postsData.filter(p => p.type === currentFilter);
            }

            filtered.sort((a, b) => a.sort_order - b.sort_order);

            filtered.forEach((post, index) => {
                const li = document.createElement('li');
                li.className = 'sortable-item';
                li.dataset.id = post.id;
                li.dataset.index = index;

                const title = document.createElement('span');
                title.textContent = post.title;

                const buttons = document.createElement('div');
                buttons.className = 'sort-buttons';

                const upBtn = document.createElement('button');
                upBtn.className = 'sort-btn';
                upBtn.textContent = '↑';
                upBtn.disabled = index === 0;
                upBtn.onclick = () => moveItem(li, -1, filtered);

                const downBtn = document.createElement('button');
                downBtn.className = 'sort-btn';
                downBtn.textContent = '↓';
                downBtn.disabled = index === filtered.length - 1;
                downBtn.onclick = () => moveItem(li, 1, filtered);

                buttons.appendChild(upBtn);
                buttons.appendChild(downBtn);

                li.appendChild(title);
                li.appendChild(buttons);
                list.appendChild(li);
            });
        }

        function moveItem(li, direction, filtered) {
            const index = parseInt(li.dataset.index);
            const newIndex = index + direction;

            if (newIndex < 0 || newIndex >= filtered.length) return;

            const currentPost = filtered[index];
            const swapPost = filtered[newIndex];

            const temp = currentPost.sort_order;
            currentPost.sort_order = swapPost.sort_order;
            swapPost.sort_order = temp;

            loadSortList();
        }

        function saveSortOrder() {
            const updates = postsData.map(post => ({
                id: post.id,
                sort_order: post.sort_order
            }));

            fetch('save_sort_order.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(updates)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Reihenfolge gespeichert!');
                    closeSortModal();
                    location.reload();
                } else {
                    alert('Fehler beim Speichern: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Fehler beim Speichern');
            });
        }

        window.onclick = function(event) {
            const modal = document.getElementById('sortModal');
            if (event.target === modal) {
                closeSortModal();
            }
        }
    </script>
</body>
</html>