<?php
require '../includes/db.php';
require '../includes/tcpdf/tcpdf.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Récupérer les données
$sql = "SELECT d.id, d.title, d.content, u.username, d.created_at 
        FROM data d 
        JOIN users u ON d.user_id = u.id 
        ORDER BY d.created_at DESC";
$stmt = $pdo->query($sql);
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Création du PDF
$pdf = new TCPDF();
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle("Export des données");
$pdf->AddPage();
$pdf->SetFont('Helvetica', '', 12);

$html = "<h1>Liste des données</h1><table border='1' cellpadding='5'>
<tr><th>ID</th><th>Titre</th><th>Contenu</th><th>Auteur</th><th>Date</th></tr>";

foreach ($datas as $data) {
    $html .= "<tr>
        <td>{$data['id']}</td>
        <td>" . htmlspecialchars($data['title']) . "</td>
        <td>" . htmlspecialchars($data['content']) . "</td>
        <td>" . htmlspecialchars($data['username']) . "</td>
        <td>{$data['created_at']}</td>
    </tr>";
}

$html .= "</table>";

$pdf->writeHTML($html);
$pdf->Output("export.pdf", "D");
?>