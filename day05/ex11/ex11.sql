SELECT UPPER(fiche_personne.nom) as NOM, fiche_personne.prenom, abonnement.prix
FROM membre
INNER JOIN abonnement
ON abonnement.id_abo = membre.id_abo
INNER JOIN fiche_personne
ON membre.id_membre = fiche_personne.id_perso
WHERE abonnement.prix > 42
ORDER BY fiche_personne.nom, fiche_personne.prenom;
