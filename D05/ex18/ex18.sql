SELECT id_distrib FROM distrib WHERE ((id_distrib REGEXP '(42|([6-6][2-9])|71|88|89|90)') OR (LENGTH(nom) - LENGTH(REPLACE(nom, 'y', '')) = 2) OR (LENGTH(nom) - LENGTH(REPLACE(nom, 'Y', '')) = 2))  LIMIT 2, 5;