# Aide-mémoire

## Synchroniser les dépôts

Avant de travailler sur votre site Web, assurez-vous toujours que vos dépôts sont synchronisés.

### Statut du dépôt

Vérifiez le statut de votre dépôt (est-il synchronisé avec le dépôt distant GitHub, ou en retard, ou en avance sur celui-ci) :

```sh
git status
```

### Rapatrier et intégrer les changements

Si votre dépôt est en retard avec le dépôt distant GitHub, il faut rapatrier et intégrer les changements à notre dépôt local.

Toutefois, si votre répertoire de travail est « sale » (c'est-à-dire qu'contient des changements non enregistrés), alors il est nécessaire de remiser ces changements locaux avant d'intégrer les changements du dépôt distant :

```sh
git stash
```

Maintenant que votre dépôt local est « propre », nous pouvons rapatrier et intégrer les changements du dépôt distant :

```sh
git pull
```

Enfin, n'oubliez pas de restaurer les changements locaux remisés précédemment :

```sh
git stash pop
```

### Résoudre les conflits de fusion

Quelques fois, le processus ci-dessus ne se déroule pas aussi bien. Si vous avez modifié différemment la même partie du même fichier dans plusieurs dépôts, Git ne sera pas capable de réaliser proprement la fusion.

Git ajoute des marques de résolution de conflit dans les fichiers concernés. Il suffit d'ouvrir de résoudre les conflits manuellement. Si vous êtes sur le serveur, vous pouvez ouvrir un fichier avec l'éditeur de texte Vim :

```sh
vim chemin/vers/fichier
```

Si vous n'êtes pas familier·ère avec Vim, un court tutoriel est disponible lorsque vous entrez la commande `:help tutor` dans Vim.

Alternativement, vous pouvez copiez le contenu du dépôt sur votre ordinateur avec SCP, faire les corrections nécessaires, et re-copier le contenu sur le serveur.

### Indexer les changements

Si des modifications ont étés faites sur le dépôt local, il faut les indexer :

```sh
git add .
```

### Enregistrer les changements

Il faut ensuite enregistrer les changements :

```sh
git commit -m "Message qui décrit les changements"
```

### Pousser les changements

Une fois les changements indexés et enregistrés, il faut les pousser vers le dépôt distant GitHub :

```sh
git push
```

## Développement local

### Démarrer le serveur PHP

```sh
php -S localhost:8000 chemin/vers/kirby/router.php
```

### Transfert de fichiers

```sh
scp -r chemin/vers/fichier/ <codereseau>@webdev.cmaisonneuve.qc.ca:chemin/vers/destination
```

Vous pouvez utiliser le métacaractère `*` pour copier tous les fichiers d'un dossier (et `.*` pour copier tous les fichiers cachés).

## Serveur webdev du Collège

### Accès SSH

Attention, le mot de passe est celui que vous utilisez pour vous connecter aux ordinateurs du Collège.

```sh
ssh <codereseau>@webdev.cmaisonneuve.qc.ca
```

### Connection VPN

Le serveur du Collège est accessible de l'extérieur du Collège à partir d’une passerelle OpenVPN. Consulter la procédure d'installation du VPN pour votre plateforme :

-   [Mac](https://webdev.cmaisonneuve.qc.ca/pdf/webdev-vpn-mac.pdf)
-   [Windows](https://webdev.cmaisonneuve.qc.ca/pdf/webdev-vpn-windows.pdf)

## Ressources supplémentaires

-   [Pro Git](https://git-scm.com/book/fr/v2)
-   [Merge conflicts](https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/addressing-merge-conflicts/about-merge-conflicts)
-   [Resolving a merge conflict using the command line](https://docs.github.com/en/pull-requests/collaborating-with-pull-requests/addressing-merge-conflicts/resolving-a-merge-conflict-using-the-command-line)
-   [Aide-mémoire Git](https://education.github.com/git-cheat-sheet-education.pdf)
