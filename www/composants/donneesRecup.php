<?php

    // Charger les données des utilisateurs depuis le fichier JSON
    $jsonUtilisateurs = file_get_contents("../../donnees/utilisateurs.json");
    $utilisateurs = json_decode($jsonUtilisateurs, true);



