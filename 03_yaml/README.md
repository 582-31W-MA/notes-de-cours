# YAML

YAML (_Yet Another Markup Language_, ou _YAML Ain't Markup Language_) est un format de représentation de données, comme le sont JSON, XML, ou CSV. Son objectif est de représenter des informations élaborées tout en gardant une bonne lisibilité. YAML est un langage souvent utilisé pour les fichiers de configuration.

## Structure

Un fichier YAML peut contenir des *maps* et des listes. Toutefois, YAML n'utilise pas les symboles habituels (accolades, crochets, parenthèses, etc.) pour le formatage du code. Plutôt, YAML utilise une indentation similaire à celle utilisée en Python pour déterminer la structure et la hiérarchie des données.

## Tableau associatif

Les *maps* sont de formes `clé: valeur`, à raison d'un couple par ligne :

```yaml
nom: Jean
nomFamille: Starobinski
occupation: Philosophe
```

## Liste

Les éléments de listes sont dénotés par le tiret (`-`), suivi d'une espace, à raison d'un élément par ligne :

```yaml
- PHP
- Javascript
- Python
```

## Exemple complexe

```yaml
invoice: 34843
date: 2001-01-23
bill-to: &id001
    given: Chris
    family: Dumars
    address:
        lines: |
            458 Walkman Dr.
            Suite #292
        city: Royal Oak
        state: MI
        postal: 48046
ship-to: *id001
product:
    - sku: BL394D
      quantity: 4
      description: Basketball
      price: 450.00
    - sku: BL4438H
      quantity: 1
      description: Super Hoop
      price: 2392.00
tax: 251.42
total: 4443.52
comments: Late afternoon is best.
    Backup contact is Nancy
    Billsmer @ 338-4338.
```

## Ressources

-   [Documentation officielle](https://yaml.org)
