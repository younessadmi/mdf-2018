# Premier exercice
Énoncé

Vous êtes coincé dans votre chambre à réviser vos examens. Heureusement, vous êtes proche de la fenêtre et vous avez une excellente vue sur le grand carrefour de la ville. Ça permet de passer le temps ! Les voitures viennent de 4 directions différentes, le nord, l'ouest, le sud et l'est. Après plusieurs heures à scruter ce carrefour, vous remarquez que les conducteurs sont un peu particuliers, ils vont systématiquement tout droit. Ceux qui viennent du sud sortent du carrefour par le Nord, ceux qui viennent de l'est sortent par l'ouest, etc...

En entendant les nombreux klaxons, vous avez quelques doutes sur le fait que les feux soient synchrones. Vous avez l'impression que les feux verts se chevauchent. D'ailleurs, plus d'une fois, une voiture venant du sud ou du nord a failli percuter une voiture allant à l'est ou à l'ouest.

Vous décidez de noter avec précision l'heure à laquelle les feux passent au vert pour déterminer si il y a un risque de collision (en supposant que les conducteurs respectent les feux). 

Vous commencez à prendre des notes à partir 00:00 et vous vous arrêtez à 23:00 pour vous laisser une heure d'analyse. Mais comme vous n'êtes pas très bien organisé, vous notez les heures sur plusieurs papiers différents. Ce n'est pas grave, vous les trierez à la fin.
Avant de vous lancer, vous avez quand même deux certitudes :
- Lorsqu'un feu passe au vert, il reste vert exactement 3 minutes puis repasse au rouge pour une durée variable.
- Un risque de collision se présente uniquement si une voiture du Nord ou du Sud croise une voiture de l'Est ou de l'Ouest



Format des données

Entrée

Ligne 1 : un entier N compris entre 2 et 1 000 correspondant au nombre de fois où un feu passe au vert dans la journée.
Lignes 2 à N+1 : une chaîne de caractères H et une lettre D séparés par un espace où H correspond à l’heure d’un passage au feu vert au format « hh:mm » et D correspond à la direction du feu: Nord, Sud, Ouest ou Est. (D peut prendre la valeur N pour nord, O pour ouest, S pour sud ou E pour est).

Sortie

La chaîne de caractères `COLLISION` s'il y a eu un risque de collision, `OK` sinon.

Exemples

Exemple n°1
```
3
20:02 N
20:04 O
20:03 S
```

Dans ce cas, il y a un risque de collision car le feu vert du Nord se chevauche avec le feu vert de l'Ouest.

Exemple n°2
```
3
20:02 N
20:05 O
20:03 S
```

Dans ce cas, il n'y a pas de risque de collision car le feu vert du Nord dure exactement 3 minutes (20:02, 20:03, 20:04) et le feu de l'Ouest passe au vert à 20:05. Les feux Nord et Sud se chevauchent mais comme ils ne sont pas perpendiculaires ce n'est pas un problème.
