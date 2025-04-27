<?php
// search.php
include 'connect.php';

// Search
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM buyers WHERE name LIKE '%$search%' OR email LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM buyers";
}

$result = $conn->query($sql);
?>

<h2>Search Buyers</h2>
<form method="GET">
    <input type="text" name="search" placeholder="Search by name or email" value="<?php echo $search; ?>">
    <button type="submit">Search</button>
    <a href="search.php">Reset</a>
</form>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?php echo htmlspecialchars($row['name']); ?></td>
        <td><?php echo htmlspecialchars($row['email']); ?></td>
        <td>
            <a href="update.php?edit_id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php } ?>
</table>
