SELECT COUNT(id_abo) as 'nb_abo', FLOOR((sum(prix) / COUNT(id_abo))) as 'moy_abo', (sum(duree_abo) % 42) as 'ft' FROM abonnement;