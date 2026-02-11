<?php

require_once 'connection_mysqli.php'; // include connection file

$search_query = '';
$result = null; // Initialize $result as null for no search query

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search'])) {
    $search_query_original = $_POST['search']; // Add wildcards for LIKE search
    $search_query = '%' . $search_query_original . '%'; // Add wildcards for LIKE search
    $stmt = $conn->prepare("SELECT id, username, email FROM login WHERE username LIKE ? OR email LIKE ?");
    $stmt->bind_param("ss", $search_query, $search_query);
    $stmt->execute();
    $result = $stmt->get_result(); // Get the result set from the query
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
        <input type="text" name="search" value="<?php echo htmlspecialchars($search_query_original); ?>" placeholder="Search users..." />
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="3">No results found</td></tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
