<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Data</title>
</head>
<body>
    <h1>Edit Data</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $value = $_POST['value'];

        $stmt = $conn->prepare("UPDATE data SET name=?, value=? WHERE id=?");
        $stmt->bind_param("sdi", $name, $value, $id);
        $stmt->execute();

        echo "Data updated successfully. <a href='index.php'>Go back to the list</a>";
        $stmt->close();
    } else {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM data WHERE id=$id");
        $row = $result->fetch_assoc();
    ?>
    <form method="post" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>"><br>
        <label for="value">Value:</label><br>
        <input type="text" id="value" name="value" value="<?php echo $row['value']; ?>"><br><br>
        <input type="submit" value="Update">
    </form>
    <?php
    }
    ?>
</body>
</html>

<?php $conn->close(); ?>