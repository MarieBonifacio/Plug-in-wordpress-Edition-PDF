<?php
session_start();
// $nom = htmlspecialchars($_SESSION['nom']);
// $prenom = htmlspecialchars($_SESSION['prenom']);
// $sexe = $_SESSION['sexe'];
// $date = date("d/m/Y");

//On teste si le serveur a la page précédente en mémoire pour rediriger l'utilisateur
if(isset($_SERVER['HTTP_REFERER'])){
    $redirect = $_SERVER['HTTP_REFERER'];
}else{
    $redirect = '../';
}
//On teste si l'utilisateur est bien venu avec le formulaire et que donc $_POST existe
if(!empty($_POST)){
//0n génère le pdf avec les infos nécessaires
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $sexe = $_POST['sexe'];
        $date = date("d/m/Y");
        genererPdf($nom, $prenom, $sexe, $date);
}else{
    header('Location:'.$redirect);
    exit;
}

// Mise en forme du diplome
use setasign\Fpdi\Fpdi;
use setasign\Fpdi\PdfReader;

function genererPdf($nom, $prenom, $sexe, $date){

require_once('fpdf/fpdf.php');
require_once('fpdi2/src/autoload.php');

//initialisation
$pdf = new Fpdi('L'); 
//Pour ne pas créer une atre page si dépassement
$pdf->SetAutoPageBreak(true);

if($sexe=="fille"){
//pdf source fille
    $pdf->setSourceFile('./diplomes/diplomePotagerFille.pdf');
}else{ 
//pdf source garçon
    $pdf->setSourceFile('./diplomes/diplomePotagerGarçon.pdf');
};  

//importation page 1
$pageId = $pdf->importPage(1);
//Ajout police Lato
$pdf->AddFont('Lato-Black','','Lato-Black.php');
//ajout d'une page format paysage
$pdf->addPage('L');
$pdf->useImportedPage($pageId);


//Taille de police selon nombre de caractères
$pdf->SetFont('Lato-Black');
if((strlen($nom) + strlen($prenom))>=20){
    $pdf->SetFont('Arial', 'B', 30);
}elseif((strlen($nom) + strlen($prenom))<=19 && (strlen($nom) + strlen($prenom))>= 10){
    $pdf->SetFont('Arial', 'B', 40);
}else{
    $pdf->SetFont('Arial', 'B', 70);
}

//Marges à 0
$pdf->SetXY(0, 0);
//texte nom et prénom
$pdf->Cell(290, 175,  utf8_decode($prenom.' '.$nom), 0, 2, 'C');


//date du jour
$pdf->SetFont('Arial', 'B', 25);
$pdf->Cell(280,27, $date, 0, 0, 'R');

$pdf->Output('D', 'diplome.pdf');

exit;
}
?>