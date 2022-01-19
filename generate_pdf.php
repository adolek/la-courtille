<?php

    require_once('rotation.php');

    class PDF extends PDF_Rotate
    {
    function RotatedText($x,$y,$txt,$angle)
    {
        //Text rotated around its origin
        $this->Rotate($angle,$x,$y);
        $this->Text($x,$y,$txt);
        $this->Rotate(0);
    }

    function RotatedImage($file,$x,$y,$w,$h,$angle)
    {
        //Image rotated around its upper-left corner
        $this->Rotate($angle,$x,$y);
        $this->Image($file,$x,$y,$w,$h);
        $this->Rotate(0);
    }
    }


    //identifier le nom de base de données
    $database = "la_courtille";
    //connectez-vous dans votre BDD
    //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
    $db_handle = mysqli_connect('localhost', 'root', '' );
    $db_found = mysqli_select_db($db_handle, $database);
   
    session_start();

    $nomEleve = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['nomEleve'])); 
    $prenomEleve = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['prenomEleve'])); 
   

    $pdf=new PDF();
    
    $pdf->AddPage();
    $pdf->setSourceFile('assets/pdf/recto formulaire d\'inscription.pdf'); 
    $tplIdx = $pdf->importPage(1); 
    $pdf->useTemplate($tplIdx); 

    $pdf->SetFont('Arial','',14);
    $pdf->RotatedText(100,60,$nomEleve,90);


/*
    $pdf = new FPDI();

    # Pagina 1
    $pdf->AddPage(); 
    $pdf->setSourceFile('assets/pdf/recto formulaire d\'inscription.pdf'); 
    $tplIdx = $pdf->importPage(1); 
    $pdf->useTemplate($tplIdx); 

    $pdf->SetFont('Arial', 'B', '15'); 
    $pdf->SetXY(90,50);
    $pdf->Write(10,$nomEleve);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(10,220);
    $pdf->Write(10,$prenomEleve);

 /*   $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(100,220);
    $pdf->Write(10,$nametecnico1);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(180,220);
    $pdf->Write(10,$tiempo1); 

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(10,224);
    $pdf->Write(10,$tecnico2);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(100,224);
    $pdf->Write(10,$nametecnico2);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(180,224);
    $pdf->Write(10,$tiempo2);*/


/*
    # Pagina 2
    $pdf->AddPage(); 
    $tplIdx1 = $pdf->importPage(2); 
    $pdf->useTemplate($tplIdx1);     
    $pdf->SetFont('Arial', 'B', '12'); 
    $pdf->SetXY(60,95);
    $pdf->Write(10,$trabajoRealizar." - ".$posicion." - ".$dimension);


    $pdf->SetFont('Arial', 'B', '12'); 
    $pdf->SetXY(10,140);
    $pdf->Write(10,$materiales);

    $pdf->SetFont('Arial', 'B', '12'); 
    $pdf->SetXY(10,145);
    $pdf->Write(10,$id." - ".$codigo." - ".$descripcion." - ".$cantidad);

    $pdf->SetFont('Arial', 'B', '12'); 
    $pdf->SetXY(10,150);
    $pdf->Write(10,$id1." - ".$codigo1." - ".$descripcion1." - ".$cantidad1);


    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(107,200);
    $pdf->Write(10,$textosupervisor);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(107,205);
    $pdf->Write(10,$namesupervisor);

    $pdf->SetFont('Arial', 'B', '11'); 
    $pdf->SetXY(80,250);
    $pdf->Write(10,$nombreFirma);
    //$pdf->Image('firmas/one.png', 90, 248, 40, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
*/

   $pdf->Output('assets/pdf/VYWQ_15_12_2020.pdf', 'I'); //SALIDA DEL PDF
    //    $pdf->Output('original_update.pdf', 'F');
    //    $pdf->Output('original_update.pdf', 'I'); //PARA ABRIL EL PDF EN OTRA VENTANA
    //	  $pdf->Output('original_update.pdf', 'D'); //PARA FORZAR LA DESCARGA
?>