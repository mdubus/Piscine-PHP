SELECT COUNT(*) AS films
FROM membre
WHERE (date_dernier_film BETWEEN '2006-10-30' AND '2007-07-27')
OR (MONTH(date_dernier_film) = 12 AND DAY(date_dernier_film) = 24);
