<?php
// connect.php
$conn = new mysqli('localhost', 'root', '', 'your_database_name');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle Update
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE buyers SET name='$name', email='$email' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "<p style='color:green;'>Record updated successfully!</p>";
    } else {
        echo "<p style='color:red;'>Error updating record: " . $conn->error . "</p>";
    }
}

// Fetch Record to Edit
if (isset($_GET['edit_id'])) {
    $id = $_GET['edit_id'];
    $result = $conn->query("SELECT * FROM buyers WHERE id='$id'");
    $row = $result->fetch_assoc();
}
?>

<!-- Update Form -->
<h2>Edit Buyer</h2>
<form method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Name: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
    Email: <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
    <button type="submit" name="update">Save Changes</button>
</form>

<a href="search.php">Back to Search</a>
