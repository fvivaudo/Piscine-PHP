INSERT INTO ft_table (login, date_de_creation, groupe) SELECT nom as login, date_naissance as date_de_creation, "other" FROM fiche_personne WHERE CHAR_LENGTH(nom) < 9 && nom LIKE '%a%' ORDER BY nom LIMIT 10;