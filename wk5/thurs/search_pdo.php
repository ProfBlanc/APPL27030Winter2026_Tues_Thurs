<?php

require_once 'connection_pdo.php'; // include connection file

$search_query = '';
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search'])) {
    $search_query = $_POST['search'];
    $stmt = $conn->prepare("SELECT id, username, email FROM login WHERE username LIKE :search_query OR email LIKE :search_query");
    $stmt->bindValue(':search_query', "%$search_query%");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $result = [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<h2>Search</h2>
    <?php include 'nav_bar.php';?>

<form method="POST">
    <input type="text" name="search" value="<?php echo htmlspecialchars($search_query); ?>" placeholder="Search users..." />
    <button type="submit">Search</button>
</form>

<table >
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result): ?>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</div>
</body>
</html>