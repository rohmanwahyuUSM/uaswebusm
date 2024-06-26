<?php include 'db.php'; ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Menghapus data berdasarkan ID
    $stmt = $conn->prepare("DELETE FROM data WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Mengarahkan kembali ke halaman index setelah data dihapus
    header("Location: index.php");
    exit();
}
?>

<?php $conn->close(); ?>