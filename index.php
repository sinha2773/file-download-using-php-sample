<?php
if ( isset($_GET['download']) && $_GET['download']=='1' ) {
	$filepath = "sample.pdf";

    // Process to download
    if(file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        die();
    } else {
        http_response_code(404);
        die();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Download file by using PHP</title>
</head>
<body>

	<table width="600" cellpadding="2" cellspacing="2" border="1" style="margin:0 auto;">
		<tr>
			<th>Title</th>
			<th>Action</th>
		</tr>
		<tr>
			<td>Downloadble PDF</td>
			<td>
				<a target="_blank" href="sample.pdf">View</a><br>
				<a href="?download=1">Download</a>
			</td>
		</tr>
	</table>

</body>
</html>