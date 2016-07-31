<?php

	session_start();

	$searchQuery = $_GET['query'];
		 
	require_once('tcpdf/tcpdf.php');
			
	$pdf = 
		new TCPDF(
			$orientation =	'L', 
			$unit = 		'mm', 
			$format = 		'folio', 
			$unicode =		'true', 
			$encoding =		'UTF-8', 
			$diskcache =	false, 
			$pdfa =			false
		);
	$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('MedTrack Team');
	$pdf->SetTitle('Summary of Issuance');
	$pdf->SetSubject('Summary of Issuance');	
	$pdf->SetFont('Helvetica', '', 10);
	
	$pdf->SetPrintHeader(false);
	$pdf->SetPrintFooter(false);
	
	$pdf->SetMargins(8, 8, 8, 8);
	
	$pdf->AddPage();
			
	$html = '
		<html>
			<head>
				<style>
					td{ text-align: center; }
				</style>
			</head>	
			<body>
				<h1>Summary of Issuance Form</h1>';
						
				date_default_timezone_set("Asia/Manila");
										
	$html .= 
				'<h4>Date Generated: ' . date("m/d/Y") . ' ' . date("h:i a") . '</h4>
				<h4>Generated by: ' . $_SESSION['fullname'] . '</h4>
				<div style="margin-bottom:20px"></div>
					
				<table border="1" cellpadding="8">
					<tr>
						<td><b>Requesting Unit</b></td>
						<td><b>Run Date and Time</b></td>
						<td><b>Generic Name</b></td>
						<td><b>Brand Name</b></td>
						<td><b>Dosage</b></td>
						<td><b>Type</b></td>
						<td><b>Quantity</b></td>
						<td><b>Issued By</b></td>
					</tr>' ;
							
	include_once('./_connect.php');	
		
	if(strlen($searchQuery) == 10){
		$sql = 
			"SELECT * 
			FROM dispensedmedicinetable,producttable
			WHERE dispensedmedicinetable.productId = producttable.productId
			AND LEFT(dispensedmedicinetable.dispenseId,2) = '" . substr($searchQuery, 0, 2) . "' 
			AND MID(dispensedmedicinetable.dispenseId,4,2) = '" . substr($searchQuery, 3, 2) . "' 
			AND MID(dispensedmedicinetable.dispenseId,7,4) = '" . substr($searchQuery, 6, 4) . "';";
	} else if(strlen($searchQuery) == 7){
		$sql = 
			"SELECT * 
			FROM dispensedmedicinetable,producttable
			WHERE dispensedmedicinetable.productId = producttable.productId
			AND LEFT(dispensedmedicinetable.dispenseId,2) = '" . substr($searchQuery, 0, 2) . "' 
			AND MID(dispensedmedicinetable.dispenseId,7,4) = '" . substr($searchQuery, 3, 4) . "';";
	} else if(strlen($searchQuery) == 4){
		$sql = 
			"SELECT * 
			FROM dispensedmedicinetable,producttable
			WHERE dispensedmedicinetable.productId = producttable.productId 
			AND MID(dispensedmedicinetable.dispenseId,7,4) = '" . substr($searchQuery, 0, 4) . "';";
	}
	$result = mysqli_query($connect, $sql);
					
	$withElements = false;
	while($row = mysqli_fetch_array($result)) {
		$withElements = true;
							
							$dispenseId = $row['dispenseId'];
							$dispenseDate = substr($dispenseId,0,2) . "-" . substr($dispenseId,3,2) . "-" . substr($dispenseId,6,4);
							$dispenseTime = substr($dispenseId,11,2) . ":" . substr($dispenseId,14,2) . ":" .  substr($dispenseId,17,2) . " " . strtoupper(substr($dispenseId,26,2)); 
							
							$requestingUnit = $row['requestingUnit'];
							
							if($requestingUnit == ''){
								$requestingUnit = "Out-Patient";
							}
							
	$html .='
					<tr nobr="true"> 
						<td>' . $requestingUnit . '</td>
						<td>' . $dispenseDate . '<br>' . $dispenseTime . '</td>
						<td>' . $row['genericName'] . '</td>
						<td>' . $row['brandName'] . '</td>
						<td>' . $row['dosage'] . '</td>
						<td>' . $row['type'] . '</td>
						<td>' . $row['quantity'] . '</td>
						<td>' . $row['receivedBy'] . '</td>
					</tr>' ;
	}
	
	if(!$withElements){
		$html .='
					<tr nobr="true"> 
						<td colspan="8">There are no entries for ' . $searchQuery . '</td>
					</tr>' ;
	}
	
	$html .='
				</table>
			</body>
		<html>';
			
	
	ob_clean(); 		
	
	$pdf->writeHTML(
		$html,
		$ln = true,
		$fill = false,
		$reseth = false,
		$cell = false,
		$align = '' );
	$pdf->lastPage();
	
	ob_end_clean();
	
	$pdf->Output('Summary of Issuance.pdf','I');