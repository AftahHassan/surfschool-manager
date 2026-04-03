# 🌊 SurfSchool Manager

## 📌 Description

**SurfSchool Manager** est une application web développée en **PHP/MySQL** utilisant la **programmation orientée objet (POO)** et une **architecture MVC simplifiée**.

Cette application permet de gérer une école de surf avec un système d’authentification sécurisé et gestion des rôles :

* 👑 **Admin** : gère les étudiants, les cours et les inscriptions
* 🏄 **Student (Client)** : peut consulter les cours et s’inscrire

---

## 🎯 Objectifs

* Gérer une école de surf (students, lessons, enrollments)
* Implémenter un système d’authentification sécurisé
* Automatiser la création d’un étudiant lors de l’inscription
* Appliquer une architecture **MVC + POO**
* Structurer un projet web de manière professionnelle

---

## 🔐 Compte de test (Admin)

👉 Utilisez ce compte pour tester :

```plaintext
Email : admin@surfschool.com
Mot de passe : admin123
```

⚠️ **Important** : changer le mot de passe après connexion.

---

## 🔁 Fonctionnement global

1. L’utilisateur accède à l’application (`index.php`)
2. Il arrive sur la page **splash**
3. Il choisit :

   * Se connecter
   * S’inscrire
4. Lors de l’inscription :

   * création d’un **user**
   * création automatique d’un **student**
5. Connexion → vérification des données
6. Création d’une session
7. Redirection selon rôle :

   * Admin → `admin/dashboard.php`
   * Student → `client/dashboard.php`
8. L’utilisateur effectue ses actions (CRUD)
9. Déconnexion → destruction de la session

---

## 🧠 Architecture du projet

```
/surfschool-manager
│
├── /app
│   ├── /models
│   │   ├── Database.php        # 🔌 Connexion PDO (Singleton)
│   │   ├── User.php            # 🔐 Gestion utilisateurs
│   │   ├── Student.php         # 🧑‍🎓 CRUD étudiants
│   │   ├── Lesson.php          # 🏄 CRUD cours
│   │   └── Enrollment.php      # 🔗 Inscriptions
│   │
│   ├── /controllers
│   │   ├── AuthController.php
│   │   ├── StudentController.php
│   │   ├── LessonController.php
│   │   └── EnrollmentController.php
│   │
│   └── /views
│       ├── /includes
│       │   ├── header.php
│       │   └── footer.php
│       │
│       ├── /auth
│       │   ├── splash.php
│       │   ├── login.php
│       │   └── register.php
│       │
│       ├── /admin
│       │   ├── dashboard.php
│       │   ├── students.php
│       │   ├── lessons.php
│       │   └── enrollments.php
│       │
│       └── /client
│           └── dashboard.php
│
├── /config
│   └── database.php
│
├── /public
│   └── /css
│       └── style.css
│
├── index.php                  # 🚪 Accueil (splash)
├── login.php                  # 🔐 Login
├── register.php               # 📝 Register
├── logout.php                 # 🔓 Déconnexion
├── dashboard.php              # 🔁 Redirection
├── students.php               # 👑 Gestion étudiants
├── lessons.php                # 👑 Gestion cours
├── enrollments.php            # 👑 Gestion inscriptions
├── create_admin.php           # 👑 Création admin
│
├── /database
│   └── surf_manage.sql
│
└── README.md
```

---

## 🗄️ Base de données

Le fichier `database/surf_manage.sql` contient :

* **users** → comptes utilisateurs
* **students** → informations étudiants
* **lessons** → cours de surf
* **enrollments** → inscriptions

---

### 🔗 Relations :

* 1 user → 1 student
* 1 student → plusieurs cours (via enrollments)

---

## ⚙️ Installation

### 1️⃣ Cloner le projet

```bash
git clone  https://github.com/prog26/Prompt_Repository_.git
```

---

### 2️⃣ Importer la base de données

* Ouvrir **phpMyAdmin**
* Créer une base : `surf_manage`
* Importer :

```plaintext
database/surf_manage.sql
```

---

### 3️⃣ Configurer la connexion

📄 `config/database.php`

```php
$host = 'localhost';
$dbname = 'surf_manage';
$user = 'root';
$password = '';
```

---

### 4️⃣ Lancer le projet

```plaintext
http://localhost/surfschool-manager/
```

---

## 🔐 Sécurité

* Hachage des mots de passe (`password_hash`)
* Requêtes préparées (PDO)
* Sessions sécurisées (`$_SESSION`)
* Vérification des rôles
* Protection des pages

---

## 🎨 Design

* CSS global (`style.css`)
* Interface simple et moderne
* Structure claire et lisible

---

## 🚀 Améliorations possibles

* 📊 Dashboard avec statistiques
* 🔔 Notifications
* 📱 Responsive design avancé
* 🔍 Recherche de cours
* 💳 Paiement en ligne

---

## 👨‍💻 Auteur

Projet réalisé par **Hassan AFTAH** 💻🔥

---

## 🏆 Conclusion

Ce projet démontre :

✔️ Architecture MVC
✔️ Programmation orientée objet
✔️ Authentification sécurisée
✔️ Gestion des rôles
✔️ CRUD complet
✔️ Bonne organisation du code

---
