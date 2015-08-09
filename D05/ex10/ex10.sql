SELECT film.titre as 'Titre', film.resum as 'Resume', film.annee_prod FROM film 
INNER JOIN genre
ON film.id_genre=25
GROUP BY Titre ORDER BY film.annee_prod DESC;