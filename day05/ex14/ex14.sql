SELECT etage_salle AS etage, SUM(nbr_siege) AS sieges
FROM salle
GROUP BY etage_salle
ORDER BY sieges DESC;
