<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Data List</title>
</head>
<body>
    <h1>Data List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Value</th>
            <th>Action</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM data");
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['value'] . "</td>";
            echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete.php?id=" . $row['id'] . "' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>