<?php
// search_not_secure.php
require_once 'connection_mysqli.php'; // include connection file

$search_query = ''; 
$search_results = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['search'])) {
    $search_query = $_POST['search'];

    // Unsecure SQL query directly using user input
    $query = "SELECT id, username, email FROM login WHERE username LIKE '%$search_query%' or email LIKE '%$search_query%'";
    $result = $conn->query($query);

    // Fetch results
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $search_results[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Users</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
<h2>Search Users</h2>
    <?php include 'nav_bar.php';?>
<form method="POST" action="search_not_secure.php">
    <label for="search">Search (Username or Email):</label><br>
    <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($search_query); ?>" required><br><br>
    <button type="submit">Search</button>
</form>

<?php if (!empty($search_results)): ?>
    <h3>Search Results:</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($search_results as $row): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
            </div>
</body>
</html>
