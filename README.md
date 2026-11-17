# 🎓 Academic Portfolio & Super Admin Panel

A high-tech, responsive academic portfolio website and dynamic Super Admin Content Management System (CMS) created for **Vella Manikanta**, Assistant Professor in the Department of Data Engineering at MVGR College of Engineering (Autonomous).

---

## 🌟 Features

- **💻 Cyberpunk / Terminal Dark UI:** Glassmorphism aesthetics, neon accent badges, interactive terminal simulator box (`bash` commands like `whoami`, `publications`, `exp`, `skills`), and animated smooth scrolling.
- **📚 Interactive Research Publications Modal:** View details and abstracts for all 6+ research papers published across **Springer Nature**, **AIP Conference Proceedings**, and **International Journals** with direct DOI resolution links.
- **📜 Certifications & Workshops Viewer:** Filter certificates by Academic Year (`2025–2026`, `2024–2025`, `2023–2024`, `2020–2021`, `2019–2020`) and view original certificate documents in built-in PDF iframe and image popups.
- **🪪 Academic Identity Bar:** Integrated badges for **Employee ID**, **ORCID ID**, **Scopus ID**, **Researcher ID (Web of Science)**, and **Google Scholar ID** with direct profile links.
- **🔐 Full Super Admin Management Panel:** Dedicated 8-section management dashboard to add, edit, upload, or delete data without editing code:
  1. **ABOUT** (Profile, Bio Highlights, Academic Identity, Stats Counters)
  2. **Experience** (Timeline, Organizations, Bullet Points)
  3. **Skills** (Research Domains, Technologies, Subjects Taught)
  4. **Research** (Paper Titles, Venues, DOIs, Abstracts)
  5. **Education** (Degrees, Institutions, Affiliations, Scores)
  6. **Certs** (FDPs, NPTEL, ATAL, Certificate File Uploader)
  7. **Roles** (Committees, Institutional Positions)
  8. **Contact & Msgs** (Social Links, Contact Info, Visitor Message Inbox)
- **🗃️ Single JSON Database (`data/portfolio.json`):** Zero MySQL/SQL setup required! All portfolio content is stored in a clean, self-contained JSON data store.

---

## 💻 Prerequisites & Requirements

Before running this project, ensure you have:

1. **XAMPP / WAMP / MAMP or Apache + PHP (v7.4 or v8.x)** installed on your machine.
   - For Windows users: [Download XAMPP](https://www.apachefriends.org/index.html) (PHP 8.0+ recommended).
2. **Modern Web Browser** (Google Chrome, Microsoft Edge, Mozilla Firefox, or Safari).

---

## 🚀 Step-by-Step Installation & Setup Guide

### Step 1: Place Files in Web Root
1. Download or copy this project folder into your XAMPP `htdocs` directory:
   ```text
   C:\xampp\htdocs\myportfolio\
   ```

### Step 2: Start XAMPP Apache Web Server
1. Open **XAMPP Control Panel**.
2. Click **Start** next to the **Apache** module.
3. Verify that the Apache status turns green (running on port `80` / `443`).

---

## 🌐 Running the Application

### 1. View Public Portfolio Website
Open your browser and navigate to:
```text
http://localhost/myportfolio/index.php
```
*(Or `http://localhost/myportfolio/index.html` for the static version).*

### 2. Access Super Admin Panel
Navigate to the admin login page:
```text
http://localhost/myportfolio/admin/login.php
```
*(Alternatively, click the neon **`/ADMIN`** button in the top navbar).*

---

## 🔑 Super Admin Credentials

| Field | Configuration |
|---|---|
| **Login URL** | `http://localhost/myportfolio/admin/login.php` |
| **Username** | `admin` |
| **Password** | *Configured securely* |

> 🔒 **Security Tip:** Credentials can be changed anytime by logging into the Admin Panel and clicking **"🔒 Change Password"** in the top bar.

---

## 📁 Folder & Architecture Structure

```text
myportfolio/
│
├── index.php                 # Dynamic portfolio website powered by portfolio.json
├── index.html                # Standalone HTML static portfolio version
├── styles.css                # Master CSS stylesheet (dark theme, grid layouts, animations)
├── script.js                # Frontend JS (terminal widget, filters, paper & cert modals)
├── profile.jpg               # Faculty profile photo
├── README.md                 # Complete setup & user documentation
│
├── data/
│   └── portfolio.json        # Central JSON database for all 8 portfolio sections
│
├── admin/
│   ├── index.php             # Super Admin Panel dashboard (8 tab management system)
│   ├── login.php             # Secure high-tech Admin Login interface
│   └── api.php               # PHP backend API (authentication, JSON persistence, file uploads)
│
└── assets/
    └── certificates/         # Certificate storage directory (PDFs and Images)
```

---

## 🔧 Frequently Asked Questions (FAQ)

#### Q: How do I update my research papers or certificates?
1. Go to `http://localhost/myportfolio/admin/login.php`.
2. Log in with `admin` / `admin`.
3. Select Tab **4. Research** or **6. Certs**.
4. Click **Add New** or **Edit**, enter your details, upload any certificate PDF/image, and click **Save**.

#### Q: Where are contact form messages stored?
When a visitor fills out the contact form on `index.php`, their message is saved directly to `data/portfolio.json`. You can view and manage received messages in Tab **8. Contact & Msgs** inside the Super Admin Panel.

#### Q: Do I need a MySQL database?
**No!** The application operates on a zero-database architecture using `data/portfolio.json` for lightning-fast reads and simple portability.

---

## 👨‍🏫 Author & Credits

- **Faculty / Author:** Vella Manikanta (Assistant Professor, Department of Data Engineering)
- **Institution:** MVGR College of Engineering (Autonomous), Vizianagaram, AP, India
