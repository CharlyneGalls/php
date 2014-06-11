# 3TID-PHP: EXAMEN

### Mailing-list avec interface d'administration

##### Mailing-list

L'utilisateur a la possibilité de s'inscrire à une liste de diffusion afin d'être informé de la sortie de l'application « Pourquoi ? »  sur l'AppStore.
Dès lors, son adresse e-mail est ajoutée à la base de données associé à une URL de désinscription unique (nombre aléatoire (rand(1111, 99999)) + hash md5 de l'e-mail + nombre aléatoire(rand(1111, 99999))).

Il reçoit automatiquement un e-mail lui confirmant que son inscription a bien été prise en compte. L'e-mail généré contient également le lien pour se désinscrire (un fichier .htaccess "nettoie" au préalable l'URL) qui redirigera l'utilisateur vers le site de présentation en lui confirmant que sa désinscription a bien été effectuée.

##### Interface d'administration

La base de données contient une table d'administrateurs avec des mots de passe cryptés en MD5.

- nom d'utilisateur : tfedwm14
- mot de passe : tfedwm14

Après connexion, l'administrateur a accès à l'interface e-mail, où il a la possibilité d'envoyer un mail à l'entièreté de la liste de diffusion, il est "obligé" de renseigner l'objet, mais surtout le titre du mail ainsi que le message.
Chaque e-mail contient le lien de désinscription associé à l'utilisateur.

L'intérêt de cette interface était réellement important pour moi, puisqu'elle me permettra de facilement avertir mes possibles utilisateurs de la mise en ligne de l'application sur l'AppStore.

##### E-mail

L'e-mail est en HTML et est responsive. Il est préformaté avec un "header" contenant le logo de l'application. Un gros titre, un message et un "footer" qui lui, contient le lien de désinscription.

_

Projet réalisé en PHP dans le cadre de mon TFE, à l'ESIAJ.

- [L'URL du défi.](http://charlynerivera.be/tfe/final)