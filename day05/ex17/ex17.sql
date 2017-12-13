SELECT COUNT(id_abo) AS nb_abo, FLOOR(Sum(prix) / COUNT(prix)) AS moy_abo, (Sum(duree_abo) % 42) AS ft
FROM abonnement;
