SELECT film.id_genre as 'id_genre', genre.nom as 'nom genre', distrib.id_distrib as 'id_distrib', distrib.nom as 'nom distrib',  film.titre as 'titre film' FROM film 
INNER JOIN genre
INNER JOIN distrib
ON (film.id_genre >= 4 AND film.id_genre <= 8 AND film.id_genre = genre.id_genre) ORDER BY titre;