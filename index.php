<?php

/** 
* @package Test
* @version 1.0.0
*/
/*
Plugin Name: Sloli Extension Diplomes
Plugin URL:
Description: Extension spécialement adaptée à Sloli-Editions permettant d'afficher et d'éditer (prénom, nom, date du jour) des pdf sous forme de diplômes.
Author: Marie Bonifacio
Version: 1.0.0
Author URL: www.linkedin.com/in/marie-bonifacio
*/

//-----------------------------------------Affichages formulaire---------------------------------------------------------------------------


//soit je renvoie sur la page du formulaire (si vide) soit j'applique le processform.

//Formulaire Amazonie
function monplugin_afficheFormulaireA() {
    echo '
    <div class="sectionForm">
        <div class="formWrapper" id="formA">
            <form method="post" action="'.plugins_url().'/Diplomes_Sloli_Plugin/diplome-mission-amazonie.php" class="Formu" id="formulaireA" name="formulaireA">
                <label class="ttl">Ton prénom :</label><input class="texteinput" type="text" name="prenom" required><br>
                <label class="ttl" >Ton nom :</label><input class="texteinput" type="text" name="nom" required><br>
                <div class="fRadio">
                <label id="rad">Tu es : </label>
                    <div class="choix"><div class="chx">Une fille</div><input type="radio" value="fille" name="sexe" required></div>
                    <div class="choix"><div class="chx">Un garçon</div><input type="radio" value="garçon" name="sexe"></div>
                </div>
                    <div class="champForm">
                        <button type="submit" name="submit" class="btnForm btnStyle" id="boutonA" onclick="cacherFormulaireA()" >
                            <span class="w-btn-label">Télécharge ton diplôme !</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    ';
    if(!empty($_SESSION['diplome_msg'])){
        echo '<div>'.$_SESSION['diplome_msg'].'</div>';
        unset($_SESSION['diplome_msg']);
    }
}

//Formulaire Ocean
function monplugin_afficheFormulaireO() {
    echo '
    <div class="sectionForm">
        <div class="formWrapper" id="formO">
            <form method="post" action="'.plugins_url().'/Diplomes_Sloli_Plugin/diplome-mission-ocean.php" class="Formu" id="formulaireO">
                <label>Ton prénom :</label><input class="texteinput" type="text" name="prenom" required><br>
                <label>Ton nom :</label><input class="texteinput" type="text" name="nom" required><br>
                <div class="fRadio">
                <label id="rad">Tu es : </label>
                    <div class="choix"><div class="chx">Une fille</div><input type="radio" value="fille" name="sexe" required></div>
                    <div class="choix"><div class="chx">Un garçon</div><input type="radio" value="garçon" name="sexe"></div>
                </div>
                <div class="Formu1 fSubmit align_left">
                    <div class="champForm">
                        <button type="submit" name="submit" class="btnForm btnStyle" id="boutonO" onclick="cacherFormulaireO()" >
                            <span class="w-btn-label">Télécharge ton diplôme !</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    ';
    if(!empty($_SESSION['diplome_msg'])){
        echo '<div>'.$_SESSION['diplome_msg'].'</div>';
        unset($_SESSION['diplome_msg']);
    }
}

//Formulaire Potager
function monplugin_afficheFormulaireP() {
    echo '
    <div class="sectionForm">
        <div class="formWrapper" id="formP">
            <form method="post" action="'.plugins_url().'/Diplomes_Sloli_Plugin/diplome-mission-potager.php" class="Formu" id="formulaireP">
                <label>Ton prénom :</label><input class="texteinput" type="text" name="prenom" required><br>
                <label>Ton nom :</label><input class="texteinput" type="text" name="nom" required><br>
                <div class="fRadio">
                <label id="rad">Tu es : </label>
                    <div class="choix"><div class="chx">Une fille</div><input type="radio" value="fille" name="sexe" required></div>
                    <div class="choix"><div class="chx">Un garçon</div><input type="radio" value="garçon" name="sexe"></div>
                </div>
                <div class="Formu1 fSubmit align_left">
                    <div class="champForm">
                        <button type="submit" name="submit" class="btnForm btnStyle" id="boutonP" onclick="cacherFormulaireP()" >
                            <span class="w-btn-label">Télécharge ton diplôme !</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    ';
    if(!empty($_SESSION['diplome_msg'])){
        echo '<div>'.$_SESSION['diplome_msg'].'</div>';
        unset($_SESSION['diplome_msg']);
    }
}





function register_my_session(){
    session_start();
}

//Script
// function monPluginSloliScript(){
//     wp_enqueue_script('mainForm',"/wp-content/plugins/Diplomes_Sloli_Plugin/js/mainForm.js");
// }
// add_action('wp_enqueue_scripts', 'monPluginSloliScript');

//CSS
function monPluginSloliStyle(){
    wp_enqueue_style('mainForm',"/wp-content/plugins/Diplomes_Sloli_Plugin/css/mainForm.css");
}
add_action('wp_enqueue_scripts', 'monPluginSloliStyle');

//Init est un hook qui appelle la fonction tout au début
add_action('init', 'register_my_session');


add_shortcode('Sloli_diplome_Amazonie', 'monplugin_afficheFormulaireA');
add_shortcode('Sloli_diplome_Ocean', 'monplugin_afficheFormulaireO');
add_shortcode('Sloli_diplome_Potager', 'monplugin_afficheFormulaireP');
?>