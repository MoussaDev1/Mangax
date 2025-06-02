
# Mangax description
Une application de stockage de manga et anime dans une base donnée MySQL, développer avec PHP vanilla.

---

## Tech Stack

- SCSS
- PHP Vanilla
- Mysql
- Javascript Vanilla
---



## Lancer le projet localement.

### 1. Pré-requis
- PHP 8
- Mysql
- Apache

## 📚 Documentation de l'API Mangax

Cette API permet de créer, lire, mettre à jour et supprimer des œuvres (mangas, animés, etc.).

### 🔹 Endpoints principaux

| Méthode | Endpoint            | Description                       |
|---------|---------------------|-----------------------------------|
| GET     | `/api/pieces`       | Récupérer toutes les œuvres       |
| GET     | `/api/pieces/{id}`  | Récupérer une œuvre par ID        |
| POST    | `/api/pieces`       | Créer une nouvelle œuvre          |
| PUT     | `/api/pieces/{id}`  | Modifier une œuvre existante      |
| DELETE  | `/api/pieces/{id}`  | Supprimer une œuvre               |
