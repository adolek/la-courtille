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

    $inscription='';
    $yesorno='';
    $new='';
    $nomEleve = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['nomEleve'])); 
    $prenomEleve = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['prenomEleve'])); 
    $classe = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['classe'])); 
    $naissance = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['naissance'])); 
    $nomResponsable = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['nomResponsable'])); 
    $prenomResponsable = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['prenomResponsable'])); 
    $nomEntier = $nomResponsable . '  ' . $prenomResponsable;
    $adresse = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['adresse'])); 
    $cp = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['cp'])); 
    $ville = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['ville'])); 
    $mail = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['mail'])); 
    $telPerso = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['telPerso'])); 
    $telPro = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['telPro'])); 
    $lieu = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['lieu'])); 
    $dateFait = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['dateFait'])); 

    foreach ($_POST['yesorno'] as $check){
        $inscription = $check;
    }

    foreach ($_POST['new'] as $n){
        $new = $n;
    }

    foreach ($_POST['inscription'] as $check){
        $yesorno = $check;
    }


    $pdf=new PDF();
    
    $pdf->AddPage();
    $pdf->setSourceFile('assets/pdf/recto formulaire d\'inscription.pdf'); 
    $tplIdx = $pdf->importPage(1); 
    $pdf->useTemplate($tplIdx); 

    $pdf->SetFont('Arial','',14);
    $pdf->RotatedText(58,220,$nomEleve,90);

    $pdf->SetFont('Arial','',14);
    $pdf->RotatedText(58,124,$prenomEleve,90);

    $pdf->SetFont('Arial','',14);
    $pdf->RotatedText(58,55,$classe,90);

    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(66,227,$naissance,90);

    if($yesorno == 'oui'){
        $pdf->SetFont('Arial','',11);
        $pdf->RotatedText(75,217,'x',90);
        
    }
    if($yesorno == 'non'){
        $pdf->SetFont('Arial','',11);
        $pdf->RotatedText(75,202,'x',90);
        
    }

    $pdf->SetFont('Arial','',11);
    $pdf->RotatedText(83,255,'x',90);

    $pdf->SetFont('Arial','',11);
    $pdf->RotatedText(83,215,'x',90);

    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(107,252,$nomResponsable,90);
    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(107,118,$prenomResponsable,90);
    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(115,250,$adresse,90);
    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(115,114,$cp,90);
    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(115,71,$ville,90);
    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(123,211,$mail,90);
    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(131,223,$telPerso,90);
    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(131,93,$telPro,90);
    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(140,227,$nomEntier,90);

    $pdf->SetFont('Arial','',11);
    $pdf->RotatedText(157,269,'x',90);

    $pdf->SetFont('Arial','',11);
    $pdf->RotatedText(166,222,'x',90);

    $pdf->SetFont('Arial','',11);
    $pdf->RotatedText(166,185,'x',90);

    $pdf->SetFont('Arial','',11);
    $pdf->RotatedText(166,147,'x',90);
   
    foreach($_POST['jours'] as $jour)
    {
        if($jour == 'lun'){
            $pdf->SetFont('Arial','',11);
            $pdf->RotatedText(175,182,'x',90);
            
        }
        elseif($jour == 'mar'){
            $pdf->SetFont('Arial','',11);
            $pdf->RotatedText(175,143,'x',90);
            
        }
        elseif($jour == 'jeu'){
            $pdf->SetFont('Arial','',11);
            $pdf->RotatedText(175,104,'x',90);
            
        }
        elseif($jour == 'ven'){
            $pdf->SetFont('Arial','',11);
            $pdf->RotatedText(175,67,'x',90);
            
        }
    }

    $pdf->SetFont('Arial','',11);
    $pdf->RotatedText(186,269,'x',90);

    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(193,253,$lieu,90);
    $pdf->SetFont('Arial','',13);
    $pdf->RotatedText(193,121,$dateFait,90);


    $pdf->AddPage();
    $pdf->setSourceFile('assets/pdf/verso inscription tarification.pdf'); 
    $tplIdx1 = $pdf->importPage(1); 
    $pdf->useTemplate($tplIdx1); 

    $pdf->AddPage();
    $pdf->setSourceFile('assets/pdf/reglement dp.pdf'); 
    $tplIdx2 = $pdf->importPage(1); 
    $pdf->useTemplate($tplIdx2); 



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