<?php
function listdownload($conn,$tag)
{
    $content ="";
    $content .= '<h1 class="text-center">Muat Turun</h1>';
    $status = '%p%';
    $stmt = $conn->prepare("SELECT * FROM download WHERE status LIKE ?");
    $stmt->bind_param('s',$status);
    $stmt->execute();
    $listdownload_q = $stmt->get_result();
    if ($listdownload_q->num_rows > 0) {
        while ($row = $listdownload_q->fetch_assoc()) {
            $content .= $row['name'].$row['slug'].'<br>';
        }
    } else {
        $content .= 'No results found.';
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
    return($content);
}
?>