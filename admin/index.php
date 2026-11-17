<?php
session_start();
if (empty($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>> VM.DEV // Super Admin Panel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --bg-dark: #0a0f1d;
            --card-bg: #111a2e;
            --sidebar-bg: #0d1424;
            --accent-cyan: #00f0ff;
            --accent-green: #00ff66;
            --accent-pink: #ff0055;
            --text-main: #e2e8f0;
            --text-muted: #94a3b8;
            --border-color: #1e293b;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
        }

        /* SIDEBAR */
        .sidebar {
            width: 270px;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0; bottom: 0; left: 0;
            z-index: 100;
        }

        .brand-header {
            padding: 1.5rem;
            border-bottom: 1px solid var(--border-color);
            font-family: 'Fira Code', monospace;
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--accent-cyan);
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }

        .brand-sub {
            font-size: 0.75rem;
            color: var(--text-muted);
            font-weight: 400;
            margin-top: 0.2rem;
        }

        .nav-menu {
            list-style: none;
            padding: 1rem 0;
            flex: 1;
            overflow-y: auto;
        }

        .nav-item {
            margin: 0.2rem 0.8rem;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            padding: 0.85rem 1rem;
            color: var(--text-muted);
            text-decoration: none;
            font-family: 'Fira Code', monospace;
            font-size: 0.88rem;
            border-radius: 8px;
            transition: all 0.25s ease;
            cursor: pointer;
        }

        .nav-link:hover {
            color: #fff;
            background: rgba(0, 240, 255, 0.08);
        }

        .nav-link.active {
            color: var(--accent-cyan);
            background: rgba(0, 240, 255, 0.15);
            border: 1px solid rgba(0, 240, 255, 0.3);
            font-weight: 700;
            box-shadow: 0 0 15px rgba(0, 240, 255, 0.15);
        }

        .sidebar-footer {
            padding: 1rem 1.5rem;
            border-top: 1px solid var(--border-color);
            font-family: 'Fira Code', monospace;
            font-size: 0.8rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        html, body {
            overflow-x: hidden !important;
            width: 100%;
        }

        /* MAIN CONTENT AREA */
        .main-wrapper {
            margin-left: 270px;
            width: calc(100% - 270px);
            max-width: calc(100% - 270px);
            padding: 1.5rem 1.8rem;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        .page-title {
            font-family: 'Fira Code', monospace;
            font-size: 1.5rem;
            color: #fff;
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }

        .btn-action {
            background: var(--card-bg);
            border: 1px solid var(--accent-cyan);
            color: var(--accent-cyan);
            padding: 0.4rem 0.8rem;
            border-radius: 6px;
            font-family: 'Fira Code', monospace;
            font-size: 0.8rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            white-space: nowrap;
        }

        .btn-action:hover {
            background: var(--accent-cyan);
            color: var(--bg-dark);
            box-shadow: 0 0 15px rgba(0, 240, 255, 0.4);
        }

        .btn-danger {
            border-color: var(--accent-pink);
            color: var(--accent-pink);
        }

        .btn-danger:hover {
            background: var(--accent-pink);
            color: #fff;
            box-shadow: 0 0 15px rgba(255, 0, 85, 0.4);
        }

        .btn-success {
            border-color: var(--accent-green);
            color: var(--accent-green);
        }

        .btn-success:hover {
            background: var(--accent-green);
            color: var(--bg-dark);
            box-shadow: 0 0 15px rgba(0, 255, 102, 0.4);
        }

        /* SECTION PANELS */
        .section-panel {
            display: none;
        }

        .section-panel.active {
            display: block;
        }

        .admin-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.8rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            width: 100%;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        .card-head {
            font-family: 'Fira Code', monospace;
            font-size: 1.1rem;
            color: var(--accent-cyan);
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px dashed var(--border-color);
            padding-bottom: 0.8rem;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.2rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            margin-bottom: 0.4rem;
            font-family: 'Fira Code', monospace;
            font-size: 0.82rem;
            color: var(--text-main);
        }

        input[type="text"], input[type="email"], input[type="url"], input[type="number"], select, textarea {
            width: 100%;
            background: #080d19;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 0.75rem 1rem;
            color: #fff;
            font-family: 'Fira Code', monospace;
            font-size: 0.85rem;
            outline: none;
            transition: all 0.25s ease;
            box-sizing: border-box;
        }

        input:focus, select:focus, textarea:focus {
            border-color: var(--accent-cyan);
            box-shadow: 0 0 10px var(--glow-cyan);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* STRICT DESKTOP FIXED TABLE LAYOUT - NO HORIZONTAL SCROLLBAR */
        .item-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Fira Code', monospace;
            font-size: 0.82rem;
            table-layout: fixed;
        }

        .item-table th {
            text-align: left;
            padding: 0.65rem 0.5rem;
            background: #080d19;
            color: var(--accent-cyan);
            border-bottom: 1px solid var(--border-color);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .item-table td {
            padding: 0.7rem 0.5rem;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
            word-wrap: break-word;
            overflow-wrap: break-word;
            word-break: normal;
        }

        .item-table tr:hover {
            background: rgba(0, 240, 255, 0.03);
        }

        .badge-year {
            display: inline-block !important;
            white-space: nowrap !important;
            word-break: keep-all !important;
            background: rgba(0, 240, 255, 0.1);
            color: var(--accent-cyan);
            border: 1px solid rgba(0, 240, 255, 0.3);
            padding: 0.25rem 0.65rem;
            border-radius: 4px;
            font-size: 0.76rem;
            line-height: 1.2;
            max-width: 100%;
            box-sizing: border-box;
        }

        /* Specific Table Column Width Ratios (Optimized for zero overlap & desktop fit) */
        .exp-table th:nth-child(1) { width: 20%; }
        .exp-table th:nth-child(2) { width: 30%; }
        .exp-table th:nth-child(3) { width: 32%; }
        .exp-table th:nth-child(4) { width: 9%; }
        .exp-table th:nth-child(5) { width: 9%; }

        .research-table th:nth-child(1) { width: 32%; }
        .research-table th:nth-child(2) { width: 20%; }
        .research-table th:nth-child(3) { width: 20%; }
        .research-table th:nth-child(4) { width: 18%; }
        .research-table th:nth-child(5) { width: 10%; }

        .edu-table th:nth-child(1) { width: 24%; }
        .edu-table th:nth-child(2) { width: 28%; }
        .edu-table th:nth-child(3) { width: 24%; }
        .edu-table th:nth-child(4) { width: 14%; }
        .edu-table th:nth-child(5) { width: 10%; }

        .certs-table th:nth-child(1) { width: 25%; }
        .certs-table th:nth-child(2) { width: 14%; }
        .certs-table th:nth-child(3) { width: 16%; }
        .certs-table th:nth-child(4) { width: 24%; }
        .certs-table th:nth-child(5) { width: 12%; }
        .certs-table th:nth-child(6) { width: 9%; }

        .roles-table th:nth-child(1) { width: 24%; }
        .roles-table th:nth-child(2) { width: 25%; }
        .roles-table th:nth-child(3) { width: 31%; }
        .roles-table th:nth-child(4) { width: 12%; }
        .roles-table th:nth-child(5) { width: 8%; }

        .msg-table th:nth-child(1) { width: 14%; }
        .msg-table th:nth-child(2) { width: 14%; }
        .msg-table th:nth-child(3) { width: 18%; }
        .msg-table th:nth-child(4) { width: 18%; }
        .msg-table th:nth-child(5) { width: 28%; }
        .msg-table th:nth-child(6) { width: 8%; }

        .memberships-table th:nth-child(1) { width: 26%; }
        .memberships-table th:nth-child(2) { width: 14%; }
        .memberships-table th:nth-child(3) { width: 18%; }
        .memberships-table th:nth-child(4) { width: 22%; }
        .memberships-table th:nth-child(5) { width: 12%; }
        .memberships-table th:nth-child(6) { width: 8%; }

        /* TOAST NOTIFICATION */
        #toast {
            position: fixed;
            bottom: 2rem; right: 2rem;
            background: var(--card-bg);
            border: 1px solid var(--accent-green);
            color: var(--accent-green);
            padding: 1rem 1.5rem;
            border-radius: 8px;
            font-family: 'Fira Code', monospace;
            font-size: 0.9rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.6);
            display: none;
            z-index: 1000;
            align-items: center;
            gap: 0.8rem;
        }

        /* MODAL POPUP FOR ADD / EDIT */
        .admin-modal {
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(10, 15, 29, 0.85);
            backdrop-filter: blur(8px);
            z-index: 500;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .modal-content {
            background: var(--card-bg);
            border: 1px solid var(--accent-cyan);
            border-radius: 12px;
            width: 100%;
            max-width: 700px;
            max-height: 90vh;
            overflow-y: auto;
            padding: 2rem;
            box-shadow: 0 20px 50px rgba(0,0,0,0.8), 0 0 30px rgba(0, 240, 255, 0.2);
        }

        .modal-head {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: 'Fira Code', monospace;
            font-size: 1.2rem;
            color: var(--accent-cyan);
            margin-bottom: 1.5rem;
            border-bottom: 1px dashed var(--border-color);
            padding-bottom: 0.8rem;
        }

        .close-modal {
            background: none;
            border: none;
            color: var(--text-muted);
            font-size: 1.4rem;
            cursor: pointer;
        }

        .close-modal:hover { color: #fff; }
    </style>
</head>
<body>

    <!-- SIDEBAR NAVIGATION -->
    <div class="sidebar">
        <div class="brand-header">
            <div>
                <i class="fa-solid fa-sliders"></i> > VM.DEV
                <div class="brand-sub">SUPER ADMIN PANEL</div>
            </div>
        </div>

        <ul class="nav-menu">
            <li class="nav-item">
                <a class="nav-link active" onclick="showTab('about', this)">
                    <i class="fa-solid fa-user"></i> 1. ABOUT
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showTab('experience', this)">
                    <i class="fa-solid fa-briefcase"></i> 2. Experience
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showTab('skills', this)">
                    <i class="fa-solid fa-laptop-code"></i> 3. Skills
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showTab('research', this)">
                    <i class="fa-solid fa-book-open"></i> 4. Research
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showTab('education', this)">
                    <i class="fa-solid fa-graduation-cap"></i> 5. Education
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showTab('certs', this)">
                    <i class="fa-solid fa-award"></i> 6. Certs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showTab('roles', this)">
                    <i class="fa-solid fa-shield-halved"></i> 7. Roles
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showTab('contact', this)">
                    <i class="fa-solid fa-envelope"></i> 8. Contact & Msgs
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" onclick="showTab('memberships', this)">
                    <i class="fa-solid fa-id-card"></i> 9. Memberships
                </a>
            </li>
            <li class="nav-item" style="margin-top: 1rem; border-top: 1px dashed var(--border-color); padding-top: 1rem;">
                <a class="nav-link" onclick="showTab('settings', this)">
                    <i class="fa-solid fa-key"></i> Change Password
                </a>
            </li>
        </ul>

        <div class="sidebar-footer">
            <span><i class="fa-solid fa-circle" style="color:var(--accent-green); font-size:0.6rem;"></i> Connected</span>
            <a onclick="logout()" style="color:var(--accent-pink); cursor:pointer; text-decoration:none;">
                <i class="fa-solid fa-power-off"></i> Logout
            </a>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-wrapper">

        <!-- TOP BAR -->
        <div class="top-bar">
            <h1 class="page-title" id="currentTabTitle"><i class="fa-solid fa-user"></i> ABOUT SECTION MANAGER</h1>
            <div style="display:flex; gap:0.8rem;">
                <a href="../" target="_blank" class="btn-action">
                    <i class="fa-solid fa-globe"></i> View Live Site
                </a>
                <button class="btn-action btn-success" onclick="saveCurrentTab()">
                    <i class="fa-solid fa-floppy-disk"></i> Save Changes
                </button>
            </div>
        </div>

        <!-- 1. ABOUT SECTION -->
        <div id="tab-about" class="section-panel active">
            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-address-card"></i> Personal & Profile Details</span>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>FULL NAME</label>
                        <input type="text" id="about_name">
                    </div>
                    <div class="form-group">
                        <label>DESIGNATION / TITLE</label>
                        <input type="text" id="about_title">
                    </div>
                    <div class="form-group">
                        <label>DEPARTMENT</label>
                        <input type="text" id="about_department">
                    </div>
                    <div class="form-group">
                        <label>COLLEGE / INSTITUTION</label>
                        <input type="text" id="about_college">
                    </div>
                    <div class="form-group full-width">
                        <label>LOCATION</label>
                        <input type="text" id="about_location">
                    </div>
                    <div class="form-group full-width">
                        <label>TAGLINE / HERO SUBTITLE</label>
                        <textarea id="about_tagline" rows="2"></textarea>
                    </div>
                </div>
            </div>

            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-bullseye"></i> "Who Am I?" Bullet Highlights</span>
                    <button class="btn-action" onclick="addAboutBullet()"><i class="fa-solid fa-plus"></i> Add Bullet</button>
                </div>
                <div id="about_bullets_container"></div>
            </div>

            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-chart-simple"></i> Quick Statistics Counters</span>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>YEARS OF EXPERIENCE</label>
                        <input type="number" id="stat_exp">
                    </div>
                    <div class="form-group">
                        <label>RESEARCH PUBLICATIONS</label>
                        <input type="number" id="stat_pub">
                    </div>
                    <div class="form-group">
                        <label>CERTIFICATIONS & FDPS</label>
                        <input type="number" id="stat_cert">
                    </div>
                    <div class="form-group">
                        <label>STUDENTS MENTORED</label>
                        <input type="number" id="stat_students">
                    </div>
                </div>
            </div>

            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-id-card-clip"></i> Academic Identity Details</span>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>EMPLOYEE ID</label>
                        <input type="text" id="acad_emp_id">
                    </div>
                    <div class="form-group">
                        <label>ORCID ID</label>
                        <input type="text" id="acad_orcid_id">
                    </div>
                    <div class="form-group">
                        <label>SCOPUS ID</label>
                        <input type="text" id="acad_scopus_id">
                    </div>
                    <div class="form-group">
                        <label>RESEARCHER ID</label>
                        <input type="text" id="acad_researcher_id">
                    </div>
                    <div class="form-group">
                        <label>GOOGLE SCHOLAR ID</label>
                        <input type="text" id="acad_scholar_id">
                    </div>
                    <div class="form-group">
                        <label>VIDWAN ID</label>
                        <input type="text" id="acad_vidwan_id">
                    </div>
                </div>
            </div>
        </div>

        <!-- 2. EXPERIENCE SECTION -->
        <div id="tab-experience" class="section-panel">
            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-briefcase"></i> Professional Logs & Career Track</span>
                    <button class="btn-action" onclick="openExpModal()"><i class="fa-solid fa-plus"></i> Add Position</button>
                </div>
                <table class="item-table exp-table">
                    <thead>
                        <tr>
                            <th>ROLE / POSITION</th>
                            <th>ORGANIZATION</th>
                            <th>PERIOD</th>
                            <th>STATUS</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="exp_table_body"></tbody>
                </table>
            </div>
        </div>

        <!-- 3. SKILLS SECTION -->
        <div id="tab-skills" class="section-panel">
            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-chalkboard-user"></i> Subjects Taught</span>
                </div>
                <div class="form-group full-width">
                    <label>SUBJECTS TAUGHT (Comma Separated)</label>
                    <textarea id="skills_subjects" rows="3"></textarea>
                </div>
            </div>

            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-microscope"></i> Research Domains & Capabilities</span>
                </div>
                <div class="form-group full-width">
                    <label>RESEARCH DOMAINS (Comma Separated)</label>
                    <textarea id="skills_domains" rows="3"></textarea>
                </div>
            </div>

            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-code"></i> Tools & Technologies</span>
                </div>
                <div class="form-group full-width">
                    <label>TOOLS & TECHNOLOGIES (Comma Separated)</label>
                    <textarea id="skills_tools" rows="3"></textarea>
                </div>
            </div>

            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-layer-group"></i> Languages & Web Tech</span>
                </div>
                <div class="form-group full-width">
                    <label>LANGUAGES & WEB TECH (Comma Separated)</label>
                    <textarea id="skills_web_tech" rows="3"></textarea>
                </div>
            </div>
        </div>

        <!-- 4. RESEARCH SECTION -->
        <div id="tab-research" class="section-panel">
            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-book-open"></i> Research Publications</span>
                    <button class="btn-action" onclick="openResearchModal()"><i class="fa-solid fa-plus"></i> Add Publication</button>
                </div>
                <table class="item-table research-table">
                    <thead>
                        <tr>
                            <th>PUBLICATION TITLE</th>
                            <th>DATE & YEAR</th>
                            <th>VENUE / PUBLISHER</th>
                            <th>DOI</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="research_table_body"></tbody>
                </table>
            </div>
        </div>

        <!-- 5. EDUCATION SECTION -->
        <div id="tab-education" class="section-panel">
            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-graduation-cap"></i> Academic Profile & Degrees</span>
                    <button class="btn-action" onclick="openEduModal()"><i class="fa-solid fa-plus"></i> Add Degree</button>
                </div>
                <table class="item-table edu-table">
                    <thead>
                        <tr>
                            <th>DEGREE / QUALIFICATION</th>
                            <th>INSTITUTION</th>
                            <th>AFFILIATION</th>
                            <th>YEAR</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="edu_table_body"></tbody>
                </table>
            </div>
        </div>

        <!-- 6. CERTS SECTION -->
        <div id="tab-certs" class="section-panel">
            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-award"></i> Certifications & Workshops</span>
                    <button class="btn-action" onclick="openCertModal()"><i class="fa-solid fa-plus"></i> Add Certification</button>
                </div>
                <table class="item-table certs-table">
                    <thead>
                        <tr>
                            <th>PROGRAM TITLE</th>
                            <th>ACADEMIC YEAR</th>
                            <th>DATE</th>
                            <th>INSTITUTION</th>
                            <th>FILE ATTACHMENT</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="certs_table_body"></tbody>
                </table>
            </div>
        </div>

        <!-- 7. ROLES SECTION -->
        <div id="tab-roles" class="section-panel">
            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-shield-halved"></i> Institutional Roles & Memberships</span>
                    <button class="btn-action" onclick="openRoleModal()"><i class="fa-solid fa-plus"></i> Add Role / Membership</button>
                </div>
                <table class="item-table roles-table">
                    <thead>
                        <tr>
                            <th>TITLE</th>
                            <th>CATEGORY</th>
                            <th>ORGANIZATION</th>
                            <th>PERIOD</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="roles_table_body"></tbody>
                </table>
            </div>
        </div>

        <!-- 8. CONTACT & MESSAGES SECTION -->
        <div id="tab-contact" class="section-panel">
            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-address-book"></i> Contact Information Settings</span>
                </div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>EMAIL ADDRESS</label>
                        <input type="email" id="contact_email">
                    </div>
                    <div class="form-group">
                        <label>PHONE NUMBER</label>
                        <input type="text" id="contact_phone">
                    </div>
                    <div class="form-group full-width">
                        <label>OFFICE / CAMPUS ADDRESS</label>
                        <textarea id="contact_address" rows="2"></textarea>
                    </div>
                    <div class="form-group">
                        <label>GOOGLE SCHOLAR URL</label>
                        <input type="url" id="contact_google_scholar">
                    </div>
                    <div class="form-group">
                        <label>RESEARCHGATE URL</label>
                        <input type="url" id="contact_researchgate">
                    </div>
                    <div class="form-group">
                        <label>LINKEDIN URL</label>
                        <input type="url" id="contact_linkedin">
                    </div>
                    <div class="form-group">
                        <label>GITHUB URL</label>
                        <input type="url" id="contact_github">
                    </div>
                </div>
            </div>

            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-inbox"></i> Visitor Contact Messages Received</span>
                </div>
                <table class="item-table msg-table">
                    <thead>
                        <tr>
                            <th>DATE & TIME</th>
                            <th>SENDER</th>
                            <th>EMAIL</th>
                            <th>SUBJECT</th>
                            <th>MESSAGE BODY</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody id="messages_table_body"></tbody>
                </table>
            </div>
        </div>

        <!-- 9. MEMBERSHIPS SECTION -->
        <div id="tab-memberships" class="section-panel">
            <div class="admin-card">
                <div class="card-head">
                    <span><i class="fa-solid fa-id-card"></i> Professional Memberships & Societies</span>
                    <button class="btn-action" onclick="openMembershipModal()"><i class="fa-solid fa-plus"></i> Add Membership</button>
                </div>
                <table class="item-table memberships-table">
                    <thead>
                        <tr>
                            <th>MEMBERSHIP / SOCIETY</th>
                            <th>CATEGORY</th>
                            <th>MEMBERSHIP ID</th>
                            <th>ORGANIZATION</th>
                            <th>PERIOD</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody id="memberships_table_body"></tbody>
                </table>
            </div>
        </div>

        <!-- CHANGE PASSWORD SECTION -->
        <div id="tab-settings" class="section-panel">
            <div class="admin-card" style="max-width: 500px;">
                <div class="card-head">
                    <span><i class="fa-solid fa-key"></i> Security & Password Settings</span>
                </div>
                <form id="changePasswordForm">
                    <div class="form-group">
                        <label>CURRENT PASSWORD</label>
                        <input type="password" id="curr_pass" required>
                    </div>
                    <div class="form-group">
                        <label>NEW PASSWORD</label>
                        <input type="password" id="new_pass" required>
                    </div>
                    <button type="submit" class="btn-action btn-success" style="width:100%; margin-top:1rem; justify-content:center;">
                        <i class="fa-solid fa-lock"></i> Update Admin Password
                    </button>
                </form>
            </div>
        </div>

    </div>

    <!-- TOAST NOTIFICATION -->
    <div id="toast"><i class="fa-solid fa-circle-check"></i> <span id="toastMsg">Changes saved!</span></div>

    <!-- MODAL POPUP FORM -->
    <div id="adminModal" class="admin-modal">
        <div class="modal-content">
            <div class="modal-head">
                <span id="modalTitle">Edit Item</span>
                <button class="close-modal" onclick="closeAdminModal()">&times;</button>
            </div>
            <form id="adminModalForm">
                <div id="modalFields"></div>
                <div style="display:flex; justify-content:flex-end; gap:1rem; margin-top:1.5rem;">
                    <button type="button" class="btn-action" onclick="closeAdminModal()">Cancel</button>
                    <button type="submit" class="btn-action btn-success"><i class="fa-solid fa-check"></i> Save Item</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let portfolioData = {};
        let currentSection = 'about';

        async function loadPortfolioData() {
            try {
                const res = await fetch('api.php?action=get_data');
                const result = await res.json();
                if (result.status === 'success') {
                    portfolioData = result.data;
                    renderCurrentTab();
                }
            } catch (e) {
                showToast('Failed to load portfolio data', 'error');
            }
        }

        function showTab(tabName, linkEl) {
            document.querySelectorAll('.section-panel').forEach(el => el.classList.remove('active'));
            document.querySelectorAll('.nav-link').forEach(el => el.classList.remove('active'));

            const targetTab = document.getElementById('tab-' + tabName);
            if (targetTab) targetTab.classList.add('active');
            if (linkEl) linkEl.classList.add('active');

            currentSection = tabName;
            const titles = {
                about: '<i class="fa-solid fa-user"></i> 1. ABOUT SECTION MANAGER',
                experience: '<i class="fa-solid fa-briefcase"></i> 2. EXPERIENCE LOGS MANAGER',
                skills: '<i class="fa-solid fa-laptop-code"></i> 3. SKILLS & SUBJECTS MANAGER',
                research: '<i class="fa-solid fa-book-open"></i> 4. RESEARCH PUBLICATIONS MANAGER',
                education: '<i class="fa-solid fa-graduation-cap"></i> 5. ACADEMIC PROFILE MANAGER',
                certs: '<i class="fa-solid fa-award"></i> 6. CERTIFICATIONS & WORKSHOPS MANAGER',
                roles: '<i class="fa-solid fa-shield-halved"></i> 7. ROLES & COMMITTEES MANAGER',
                contact: '<i class="fa-solid fa-envelope"></i> 8. CONTACT & MESSAGES MANAGER',
                memberships: '<i class="fa-solid fa-id-card"></i> 9. PROFESSIONAL MEMBERSHIPS MANAGER',
                settings: '<i class="fa-solid fa-key"></i> SECURITY SETTINGS'
            };
            document.getElementById('currentTabTitle').innerHTML = titles[tabName] || 'SUPER ADMIN PANEL';

            renderCurrentTab();
        }

        function renderCurrentTab() {
            if (!portfolioData.about) return;

            if (currentSection === 'about') {
                document.getElementById('about_name').value = portfolioData.about.name || '';
                document.getElementById('about_title').value = portfolioData.about.title || '';
                document.getElementById('about_department').value = portfolioData.about.department || '';
                document.getElementById('about_college').value = portfolioData.about.college || '';
                document.getElementById('about_location').value = portfolioData.about.location || '';
                document.getElementById('about_tagline').value = portfolioData.about.tagline || '';
                
                document.getElementById('stat_exp').value = portfolioData.about.stats?.experience_years || 9;
                document.getElementById('stat_pub').value = portfolioData.about.stats?.publications_count || 6;
                document.getElementById('stat_cert').value = portfolioData.about.stats?.fdps_certifications || 20;
                document.getElementById('stat_students').value = portfolioData.about.stats?.students_mentored || 500;

                const acadId = portfolioData.about.academic_identity || {};
                document.getElementById('acad_emp_id').value = acadId.employee_id || '2307030947';
                document.getElementById('acad_orcid_id').value = acadId.orcid_id || '0009-0002-0744-6315';
                document.getElementById('acad_scopus_id').value = acadId.scopus_id || '57217184378';
                document.getElementById('acad_researcher_id').value = acadId.researcher_id || 'KII-0590-2024';
                document.getElementById('acad_scholar_id').value = acadId.google_scholar_id || 'JW8H408AAAAJ';
                document.getElementById('acad_vidwan_id').value = acadId.vidwan_id || '521179';

                renderAboutBullets();
            } else if (currentSection === 'experience') {
                renderExperienceTable();
            } else if (currentSection === 'skills') {
                document.getElementById('skills_subjects').value = (portfolioData.skills?.subjects_taught || []).join(', ');
                document.getElementById('skills_domains').value = (portfolioData.skills?.research_domains || []).join(', ');
                document.getElementById('skills_tools').value = (portfolioData.skills?.tools_technologies || []).join(', ');
                document.getElementById('skills_web_tech').value = (portfolioData.skills?.web_languages || ['HTML5', 'CSS3', 'JavaScript', 'React JS', 'Node JS', 'SQL / BigData']).join(', ');
            } else if (currentSection === 'research') {
                renderResearchTable();
            } else if (currentSection === 'education') {
                renderEducationTable();
            } else if (currentSection === 'certs') {
                renderCertsTable();
            } else if (currentSection === 'roles') {
                renderRolesTable();
            } else if (currentSection === 'memberships') {
                renderMembershipsTable();
            } else if (currentSection === 'contact') {
                document.getElementById('contact_email').value = portfolioData.contact?.email || '';
                document.getElementById('contact_phone').value = portfolioData.contact?.phone || '';
                document.getElementById('contact_address').value = portfolioData.contact?.address || '';
                document.getElementById('contact_google_scholar').value = portfolioData.contact?.google_scholar || '';
                document.getElementById('contact_researchgate').value = portfolioData.contact?.researchgate || '';
                document.getElementById('contact_linkedin').value = portfolioData.contact?.linkedin || '';
                document.getElementById('contact_github').value = portfolioData.contact?.github || '';

                renderMessagesTable();
            }
        }

        /* 1. ABOUT BULLETS */
        function renderAboutBullets() {
            const container = document.getElementById('about_bullets_container');
            const bullets = portfolioData.about.who_am_i || [];
            container.innerHTML = bullets.map((b, i) => `
                <div class="form-group" style="display:flex; gap:0.6rem; align-items:center;">
                    <input type="text" value="${escapeHtml(b)}" class="about-bullet-input">
                    <button class="btn-action btn-danger" onclick="removeAboutBullet(${i})"><i class="fa-solid fa-trash"></i></button>
                </div>
            `).join('');
        }

        function addAboutBullet() {
            if (!portfolioData.about.who_am_i) portfolioData.about.who_am_i = [];
            portfolioData.about.who_am_i.push('New highlight bullet point');
            renderAboutBullets();
        }

        function removeAboutBullet(index) {
            portfolioData.about.who_am_i.splice(index, 1);
            renderAboutBullets();
        }

        /* 2. EXPERIENCE TABLE & MODAL */
        function renderExperienceTable() {
            const tbody = document.getElementById('exp_table_body');
            const items = portfolioData.experience || [];
            tbody.innerHTML = items.map((item, i) => `
                <tr>
                    <td><strong>${escapeHtml(item.role)}</strong></td>
                    <td>${escapeHtml(item.organization)}</td>
                    <td><span class="badge-year">${escapeHtml(item.period)}</span></td>
                    <td>${item.current ? '<span style="color:var(--accent-green)">Current</span>' : 'Past'}</td>
                    <td>
                        <button class="btn-action" onclick="openExpModal(${i})"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn-action btn-danger" onclick="deleteExpItem(${i})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            `).join('');
        }

        function openExpModal(index = null) {
            const isEdit = index !== null;
            const item = isEdit ? portfolioData.experience[index] : { role: '', organization: '', location: '', period: '', current: false, bullets: [''] };
            
            document.getElementById('modalTitle').textContent = isEdit ? 'Edit Experience Log' : 'Add Experience Log';
            document.getElementById('modalFields').innerHTML = `
                <input type="hidden" id="exp_index" value="${isEdit ? index : ''}">
                <div class="form-group">
                    <label>ROLE / POSITION TITLE</label>
                    <input type="text" id="m_exp_role" value="${escapeHtml(item.role)}" required>
                </div>
                <div class="form-group">
                    <label>ORGANIZATION / COLLEGE</label>
                    <input type="text" id="m_exp_org" value="${escapeHtml(item.organization)}" required>
                </div>
                <div class="form-group">
                    <label>LOCATION</label>
                    <input type="text" id="m_exp_loc" value="${escapeHtml(item.location)}">
                </div>
                <div class="form-group">
                    <label>PERIOD (e.g. 05 Oct 2020 – Present)</label>
                    <input type="text" id="m_exp_period" value="${escapeHtml(item.period)}" required>
                </div>
                <div class="form-group">
                    <label>RESPONSIBILITIES & HIGHLIGHTS (One per line)</label>
                    <textarea id="m_exp_bullets" rows="4">${escapeHtml((item.bullets || []).join('\n'))}</textarea>
                </div>
            `;

            document.getElementById('adminModalForm').onsubmit = function(e) {
                e.preventDefault();
                const idx = document.getElementById('exp_index').value;
                const newItem = {
                    id: isEdit ? item.id : 'exp_' + Date.now(),
                    role: document.getElementById('m_exp_role').value,
                    organization: document.getElementById('m_exp_org').value,
                    location: document.getElementById('m_exp_loc').value,
                    period: document.getElementById('m_exp_period').value,
                    current: document.getElementById('m_exp_period').value.toLowerCase().includes('present'),
                    bullets: document.getElementById('m_exp_bullets').value.split('\n').filter(b => b.trim())
                };

                if (idx !== '') {
                    portfolioData.experience[idx] = newItem;
                } else {
                    if (!portfolioData.experience) portfolioData.experience = [];
                    portfolioData.experience.unshift(newItem);
                }
                closeAdminModal();
                saveSectionData('experience', portfolioData.experience);
            };

            openAdminModal();
        }

        function deleteExpItem(index) {
            if (confirm('Delete this experience entry?')) {
                portfolioData.experience.splice(index, 1);
                saveSectionData('experience', portfolioData.experience);
            }
        }

        /* 4. RESEARCH TABLE & MODAL */
        function renderResearchTable() {
            const tbody = document.getElementById('research_table_body');
            const items = portfolioData.research || [];
            tbody.innerHTML = items.map((item, i) => `
                <tr>
                    <td><strong>${escapeHtml(item.title)}</strong></td>
                    <td><span class="badge-year">${escapeHtml(item.date)}</span></td>
                    <td>${escapeHtml(item.venue)}</td>
                    <td><a href="${item.link}" target="_blank" style="color:var(--accent-cyan)">${escapeHtml(item.doi)}</a></td>
                    <td>
                        <button class="btn-action" onclick="openResearchModal(${i})"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn-action btn-danger" onclick="deleteResearchItem(${i})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            `).join('');
        }

        function openResearchModal(index = null) {
            const isEdit = index !== null;
            const item = isEdit ? portfolioData.research[index] : { title: '', date: '', year: 2026, venue: '', publisher: 'springer', authors: 'Vella Manikanta et al.', doi: '', link: '', abstract: '' };

            document.getElementById('modalTitle').textContent = isEdit ? 'Edit Research Paper' : 'Add Research Paper';
            document.getElementById('modalFields').innerHTML = `
                <input type="hidden" id="res_index" value="${isEdit ? index : ''}">
                <div class="form-group">
                    <label>PAPER TITLE</label>
                    <input type="text" id="m_res_title" value="${escapeHtml(item.title)}" required>
                </div>
                <div class="form-group">
                    <label>PUBLICATION DATE (e.g. 18 August 2026)</label>
                    <input type="text" id="m_res_date" value="${escapeHtml(item.date)}" required>
                </div>
                <div class="form-group">
                    <label>YEAR (e.g. 2026)</label>
                    <input type="number" id="m_res_year" value="${item.year}" required>
                </div>
                <div class="form-group">
                    <label>VENUE / JOURNAL NAME</label>
                    <input type="text" id="m_res_venue" value="${escapeHtml(item.venue)}" required>
                </div>
                <div class="form-group">
                    <label>PUBLISHER BADGE TYPE</label>
                    <select id="m_res_publisher">
                        <option value="springer" ${item.publisher==='springer'?'selected':''}>Springer Nature</option>
                        <option value="aip" ${item.publisher==='aip'?'selected':''}>AIP Publishing</option>
                        <option value="journals" ${item.publisher==='journals'?'selected':''}>International Journal (IJETT/IJITEE)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>AUTHORS</label>
                    <input type="text" id="m_res_authors" value="${escapeHtml(item.authors)}" required>
                </div>
                <div class="form-group">
                    <label>DOI NUMBER</label>
                    <input type="text" id="m_res_doi" value="${escapeHtml(item.doi)}">
                </div>
                <div class="form-group">
                    <label>DIRECT DOI / PAPER LINK</label>
                    <input type="url" id="m_res_link" value="${escapeHtml(item.link)}">
                </div>
                <div class="form-group">
                    <label>ABSTRACT</label>
                    <textarea id="m_res_abstract" rows="4">${escapeHtml(item.abstract)}</textarea>
                </div>
            `;

            document.getElementById('adminModalForm').onsubmit = function(e) {
                e.preventDefault();
                const idx = document.getElementById('res_index').value;
                const newItem = {
                    id: isEdit ? item.id : 'pub_' + Date.now(),
                    title: document.getElementById('m_res_title').value,
                    date: document.getElementById('m_res_date').value,
                    year: parseInt(document.getElementById('m_res_year').value),
                    venue: document.getElementById('m_res_venue').value,
                    publisher: document.getElementById('m_res_publisher').value,
                    authors: document.getElementById('m_res_authors').value,
                    doi: document.getElementById('m_res_doi').value,
                    link: document.getElementById('m_res_link').value,
                    abstract: document.getElementById('m_res_abstract').value
                };

                if (idx !== '') {
                    portfolioData.research[idx] = newItem;
                } else {
                    if (!portfolioData.research) portfolioData.research = [];
                    portfolioData.research.unshift(newItem);
                }
                closeAdminModal();
                saveSectionData('research', portfolioData.research);
            };

            openAdminModal();
        }

        function deleteResearchItem(index) {
            if (confirm('Delete this publication entry?')) {
                portfolioData.research.splice(index, 1);
                saveSectionData('research', portfolioData.research);
            }
        }

        /* 5. EDUCATION TABLE & MODAL */
        function renderEducationTable() {
            const tbody = document.getElementById('edu_table_body');
            const items = portfolioData.education || [];
            tbody.innerHTML = items.map((item, i) => `
                <tr>
                    <td><strong>${escapeHtml(item.degree)}</strong></td>
                    <td>${escapeHtml(item.institution)}</td>
                    <td>${escapeHtml(item.affiliation)}</td>
                    <td><span class="badge-year">${escapeHtml(item.year)}</span></td>
                    <td>
                        <button class="btn-action" onclick="openEduModal(${i})"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn-action btn-danger" onclick="deleteEduItem(${i})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            `).join('');
        }

        function openEduModal(index = null) {
            const isEdit = index !== null;
            const item = isEdit ? portfolioData.education[index] : { degree: '', institution: '', affiliation: '', year: '2024', icon: 'fa-graduation-cap' };

            document.getElementById('modalTitle').textContent = isEdit ? 'Edit Education Qualification' : 'Add Degree / Qualification';
            document.getElementById('modalFields').innerHTML = `
                <input type="hidden" id="edu_index" value="${isEdit ? index : ''}">
                <div class="form-group">
                    <label>DEGREE / PROGRAM TITLE</label>
                    <input type="text" id="m_edu_degree" value="${escapeHtml(item.degree)}" required>
                </div>
                <div class="form-group">
                    <label>INSTITUTION / COLLEGE NAME</label>
                    <input type="text" id="m_edu_institution" value="${escapeHtml(item.institution)}" required>
                </div>
                <div class="form-group">
                    <label>AFFILIATION / BOARD (e.g. Affiliated to JNTUK)</label>
                    <input type="text" id="m_edu_affiliation" value="${escapeHtml(item.affiliation)}">
                </div>
                <div class="form-group">
                    <label>YEAR OF PASSING</label>
                    <input type="text" id="m_edu_year" value="${escapeHtml(item.year)}" required>
                </div>
            `;

            document.getElementById('adminModalForm').onsubmit = function(e) {
                e.preventDefault();
                const idx = document.getElementById('edu_index').value;
                const newItem = {
                    id: isEdit ? item.id : 'edu_' + Date.now(),
                    degree: document.getElementById('m_edu_degree').value,
                    institution: document.getElementById('m_edu_institution').value,
                    affiliation: document.getElementById('m_edu_affiliation').value,
                    year: document.getElementById('m_edu_year').value,
                    icon: item.icon || 'fa-graduation-cap'
                };

                if (idx !== '') {
                    portfolioData.education[idx] = newItem;
                } else {
                    if (!portfolioData.education) portfolioData.education = [];
                    portfolioData.education.unshift(newItem);
                }
                closeAdminModal();
                saveSectionData('education', portfolioData.education);
            };

            openAdminModal();
        }

        function deleteEduItem(index) {
            if (confirm('Delete this education qualification?')) {
                portfolioData.education.splice(index, 1);
                saveSectionData('education', portfolioData.education);
            }
        }

        /* 6. CERTS TABLE & MODAL (WITH FILE UPLOADER) */
        function renderCertsTable() {
            const tbody = document.getElementById('certs_table_body');
            const items = portfolioData.certifications || [];
            tbody.innerHTML = items.map((item, i) => `
                <tr>
                    <td><strong>${escapeHtml(item.title)}</strong></td>
                    <td><span class="badge-year">${escapeHtml(item.academicYear)}</span></td>
                    <td>${escapeHtml(item.date)}</td>
                    <td>${escapeHtml(item.institution)}</td>
                    <td>
                        ${item.file ? `<a href="../${item.file}" target="_blank" style="color:var(--accent-cyan)"><i class="fa-solid ${item.fileType==='pdf'?'fa-file-pdf':'fa-file-image'}"></i> View File</a>` : '<span style="color:var(--text-muted)">None</span>'}
                    </td>
                    <td>
                        <button class="btn-action" onclick="openCertModal(${i})"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn-action btn-danger" onclick="deleteCertItem(${i})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            `).join('');
        }

        function openCertModal(index = null) {
            const isEdit = index !== null;
            const item = isEdit ? portfolioData.certifications[index] : { key: 'cert_' + Date.now(), title: '', type: 'Faculty Development Program', date: '', academicYear: '2025–2026', institution: '', signatories: '', file: '', fileType: 'pdf' };

            document.getElementById('modalTitle').textContent = isEdit ? 'Edit Certification' : 'Add Certification / Workshop';
            document.getElementById('modalFields').innerHTML = `
                <input type="hidden" id="cert_index" value="${isEdit ? index : ''}">
                <div class="form-group">
                    <label>PROGRAM TITLE</label>
                    <input type="text" id="m_cert_title" value="${escapeHtml(item.title)}" required>
                </div>
                <div class="form-group">
                    <label>ACADEMIC YEAR FILTER</label>
                    <select id="m_cert_ay">
                        <option value="2026–2027" ${item.academicYear==='2026–2027'?'selected':''}>2026–2027</option>
                        <option value="2025–2026" ${item.academicYear==='2025–2026'?'selected':''}>2025–2026</option>
                        <option value="2024–2025" ${item.academicYear==='2024–2025'?'selected':''}>2024–2025</option>
                        <option value="2023–2024" ${item.academicYear==='2023–2024'?'selected':''}>2023–2024</option>
                        <option value="2020–2021" ${item.academicYear==='2020–2021'?'selected':''}>2020–2021</option>
                        <option value="2019–2020" ${item.academicYear==='2019–2020'?'selected':''}>2019–2020</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>PROGRAM TYPE / BADGE</label>
                    <input type="text" id="m_cert_type" value="${escapeHtml(item.type)}" required>
                </div>
                <div class="form-group">
                    <label>DATE / DURATION</label>
                    <input type="text" id="m_cert_date" value="${escapeHtml(item.date)}" required>
                </div>
                <div class="form-group">
                    <label>ORGANIZING INSTITUTION</label>
                    <input type="text" id="m_cert_inst" value="${escapeHtml(item.institution)}" required>
                </div>
                <div class="form-group">
                    <label>SIGNATORIES / CERTIFICATE DETAILS</label>
                    <input type="text" id="m_cert_sig" value="${escapeHtml(item.signatories || '')}">
                </div>
                <div class="form-group">
                    <label>ATTACH CERTIFICATE FILE (PDF or Image)</label>
                    <input type="file" id="m_cert_file_upload" accept=".pdf,.png,.jpg,.jpeg">
                    <input type="hidden" id="m_cert_file" value="${escapeHtml(item.file || '')}">
                    <input type="hidden" id="m_cert_filetype" value="${escapeHtml(item.fileType || 'pdf')}">
                    ${item.file ? `<div style="margin-top:0.4rem; font-size:0.8rem; color:var(--accent-cyan);">Current File: ${item.file}</div>` : ''}
                </div>
            `;

            document.getElementById('adminModalForm').onsubmit = async function(e) {
                e.preventDefault();
                const idx = document.getElementById('cert_index').value;
                const fileInput = document.getElementById('m_cert_file_upload');

                let filePath = document.getElementById('m_cert_file').value;
                let fileType = document.getElementById('m_cert_filetype').value;

                if (fileInput.files.length > 0) {
                    const formData = new FormData();
                    formData.append('action', 'upload_file');
                    formData.append('file', fileInput.files[0]);

                    const uploadRes = await fetch('api.php', { method: 'POST', body: formData });
                    const uploadResult = await uploadRes.json();
                    if (uploadResult.status === 'success') {
                        filePath = uploadResult.file_path;
                        fileType = uploadResult.file_type;
                    }
                }

                const newItem = {
                    id: isEdit ? item.id : 'cert_' + Date.now(),
                    key: item.key || 'key_' + Date.now(),
                    title: document.getElementById('m_cert_title').value,
                    type: document.getElementById('m_cert_type').value,
                    date: document.getElementById('m_cert_date').value,
                    academicYear: document.getElementById('m_cert_ay').value,
                    institution: document.getElementById('m_cert_inst').value,
                    signatories: document.getElementById('m_cert_sig').value,
                    file: filePath,
                    fileType: fileType
                };

                if (idx !== '') {
                    portfolioData.certifications[idx] = newItem;
                } else {
                    if (!portfolioData.certifications) portfolioData.certifications = [];
                    portfolioData.certifications.unshift(newItem);
                }
                closeAdminModal();
                saveSectionData('certifications', portfolioData.certifications);
            };

            openAdminModal();
        }

        function deleteCertItem(index) {
            if (confirm('Delete this certification entry?')) {
                portfolioData.certifications.splice(index, 1);
                saveSectionData('certifications', portfolioData.certifications);
            }
        }

        /* 7. ROLES TABLE & MODAL */
        function renderRolesTable() {
            const tbody = document.getElementById('roles_table_body');
            const items = portfolioData.roles || [];
            tbody.innerHTML = items.map((item, i) => `
                <tr>
                    <td><strong>${escapeHtml(item.title)}</strong></td>
                    <td><span class="badge-year">${escapeHtml(item.category)}</span></td>
                    <td>${escapeHtml(item.organization)}</td>
                    <td>${escapeHtml(item.period)}</td>
                    <td>
                        <button class="btn-action" onclick="openRoleModal(${i})"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn-action btn-danger" onclick="deleteRoleItem(${i})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            `).join('');
        }

        function openRoleModal(index = null) {
            const isEdit = index !== null;
            const item = isEdit ? portfolioData.roles[index] : { title: '', category: 'Institutional Governance', organization: '', period: '', description: '' };

            document.getElementById('modalTitle').textContent = isEdit ? 'Edit Institutional Role' : 'Add Role / Membership';
            document.getElementById('modalFields').innerHTML = `
                <input type="hidden" id="role_index" value="${isEdit ? index : ''}">
                <div class="form-group">
                    <label>ROLE / COMMITTEE TITLE</label>
                    <input type="text" id="m_role_title" value="${escapeHtml(item.title)}" required>
                </div>
                <div class="form-group">
                    <label>CATEGORY</label>
                    <input type="text" id="m_role_cat" value="${escapeHtml(item.category)}" required>
                </div>
                <div class="form-group">
                    <label>ORGANIZATION / BODY</label>
                    <input type="text" id="m_role_org" value="${escapeHtml(item.organization)}" required>
                </div>
                <div class="form-group">
                    <label>PERIOD / YEAR</label>
                    <input type="text" id="m_role_period" value="${escapeHtml(item.period)}" required>
                </div>
                <div class="form-group">
                    <label>DESCRIPTION & IMPACT</label>
                    <textarea id="m_role_desc" rows="3">${escapeHtml(item.description)}</textarea>
                </div>
            `;

            document.getElementById('adminModalForm').onsubmit = function(e) {
                e.preventDefault();
                const idx = document.getElementById('role_index').value;
                const newItem = {
                    id: isEdit ? item.id : 'role_' + Date.now(),
                    title: document.getElementById('m_role_title').value,
                    category: document.getElementById('m_role_cat').value,
                    organization: document.getElementById('m_role_org').value,
                    period: document.getElementById('m_role_period').value,
                    description: document.getElementById('m_role_desc').value
                };

                if (idx !== '') {
                    portfolioData.roles[idx] = newItem;
                } else {
                    if (!portfolioData.roles) portfolioData.roles = [];
                    portfolioData.roles.unshift(newItem);
                }
                closeAdminModal();
                saveSectionData('roles', portfolioData.roles);
            };

            openAdminModal();
        }

        function deleteRoleItem(index) {
            if (confirm('Delete this role entry?')) {
                portfolioData.roles.splice(index, 1);
                saveSectionData('roles', portfolioData.roles);
            }
        }

        /* 9. MEMBERSHIPS TABLE & MODAL */
        function renderMembershipsTable() {
            const tbody = document.getElementById('memberships_table_body');
            const items = portfolioData.memberships || [];
            tbody.innerHTML = items.map((item, i) => `
                <tr>
                    <td><strong>${escapeHtml(item.title)}</strong></td>
                    <td><span class="badge-year">${escapeHtml(item.category)}</span></td>
                    <td><span style="color:var(--accent-amber); font-size:0.8rem;">${escapeHtml(item.membership_id || 'Member')}</span></td>
                    <td>${escapeHtml(item.organization)}</td>
                    <td>${escapeHtml(item.period)}</td>
                    <td>
                        <button class="btn-action" onclick="openMembershipModal(${i})"><i class="fa-solid fa-pen"></i></button>
                        <button class="btn-action btn-danger" onclick="deleteMembershipItem(${i})"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            `).join('');
        }

        function openMembershipModal(index = null) {
            const isEdit = index !== null;
            const item = isEdit ? portfolioData.memberships[index] : { title: '', type: 'Professional Body', membership_id: '', category: 'National', organization: '', period: 'Member', description: '' };

            document.getElementById('modalTitle').textContent = isEdit ? 'Edit Professional Membership' : 'Add Professional Membership';
            document.getElementById('modalFields').innerHTML = `
                <input type="hidden" id="mem_index" value="${isEdit ? index : ''}">
                <div class="form-group">
                    <label>SOCIETY / MEMBERSHIP TITLE</label>
                    <input type="text" id="m_mem_title" value="${escapeHtml(item.title)}" placeholder="e.g. Computer Society of India (CSI)" required>
                </div>
                <div class="form-group">
                    <label>CATEGORY (National / International)</label>
                    <select id="m_mem_cat">
                        <option value="National" ${item.category==='National'?'selected':''}>National</option>
                        <option value="International" ${item.category==='International'?'selected':''}>International</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>MEMBERSHIP ID / NUMBER</label>
                    <input type="text" id="m_mem_id" value="${escapeHtml(item.membership_id || '')}" placeholder="e.g. Member ID: CSI-2024">
                </div>
                <div class="form-group">
                    <label>ORGANIZATION / INSTITUTION</label>
                    <input type="text" id="m_mem_org" value="${escapeHtml(item.organization)}" placeholder="e.g. Computer Society of India" required>
                </div>
                <div class="form-group">
                    <label>MEMBERSHIP PERIOD / STATUS</label>
                    <input type="text" id="m_mem_period" value="${escapeHtml(item.period)}" placeholder="e.g. Life Member / Senior Member" required>
                </div>
                <div class="form-group">
                    <label>DESCRIPTION & DETAILS</label>
                    <textarea id="m_mem_desc" rows="3">${escapeHtml(item.description)}</textarea>
                </div>
            `;

            document.getElementById('adminModalForm').onsubmit = function(e) {
                e.preventDefault();
                const idx = document.getElementById('mem_index').value;
                const newItem = {
                    id: isEdit ? item.id : 'mem_' + Date.now(),
                    title: document.getElementById('m_mem_title').value,
                    type: isEdit ? (item.type || 'Professional Body') : 'Professional Body',
                    category: document.getElementById('m_mem_cat').value,
                    membership_id: document.getElementById('m_mem_id').value,
                    organization: document.getElementById('m_mem_org').value,
                    period: document.getElementById('m_mem_period').value,
                    description: document.getElementById('m_mem_desc').value
                };

                if (idx !== '') {
                    portfolioData.memberships[idx] = newItem;
                } else {
                    if (!portfolioData.memberships) portfolioData.memberships = [];
                    portfolioData.memberships.unshift(newItem);
                }
                closeAdminModal();
                saveSectionData('memberships', portfolioData.memberships);
            };

            openAdminModal();
        }

        function deleteMembershipItem(index) {
            if (confirm('Delete this membership entry?')) {
                portfolioData.memberships.splice(index, 1);
                saveSectionData('memberships', portfolioData.memberships);
            }
        }

        /* 8. MESSAGES TABLE */
        function renderMessagesTable() {
            const tbody = document.getElementById('messages_table_body');
            const messages = portfolioData.messages || [];
            if (messages.length === 0) {
                tbody.innerHTML = `<tr><td colspan="6" style="text-align:center; color:var(--text-muted);">No contact messages received yet.</td></tr>`;
                return;
            }

            tbody.innerHTML = messages.map(msg => `
                <tr>
                    <td><span class="badge-year">${escapeHtml(msg.timestamp)}</span></td>
                    <td><strong>${escapeHtml(msg.name)}</strong></td>
                    <td><a href="mailto:${msg.email}" style="color:var(--accent-cyan)">${escapeHtml(msg.email)}</a></td>
                    <td>${escapeHtml(msg.subject || 'No Subject')}</td>
                    <td style="max-width:300px; white-space:normal;">${escapeHtml(msg.message)}</td>
                    <td>
                        <button class="btn-action btn-danger" onclick="deleteMessage('${msg.id}')"><i class="fa-solid fa-trash"></i></button>
                    </td>
                </tr>
            `).join('');
        }

        async function deleteMessage(msgId) {
            if (confirm('Delete this message?')) {
                const formData = new FormData();
                formData.append('action', 'delete_message');
                formData.append('msg_id', msgId);

                const res = await fetch('api.php', { method: 'POST', body: formData });
                const result = await res.json();
                if (result.status === 'success') {
                    showToast('Message deleted');
                    loadPortfolioData();
                }
            }
        }

        /* SAVE SECTION HANDLER */
        async function saveCurrentTab() {
            if (currentSection === 'about') {
                const bullets = Array.from(document.querySelectorAll('.about-bullet-input')).map(el => el.value).filter(v => v.trim());
                portfolioData.about = {
                    name: document.getElementById('about_name').value,
                    title: document.getElementById('about_title').value,
                    department: document.getElementById('about_department').value,
                    college: document.getElementById('about_college').value,
                    location: document.getElementById('about_location').value,
                    tagline: document.getElementById('about_tagline').value,
                    who_am_i: bullets,
                    stats: {
                        experience_years: parseInt(document.getElementById('stat_exp').value) || 9,
                        publications_count: parseInt(document.getElementById('stat_pub').value) || 6,
                        fdps_certifications: parseInt(document.getElementById('stat_cert').value) || 20,
                        students_mentored: parseInt(document.getElementById('stat_students').value) || 500
                    },
                    academic_identity: {
                        employee_id: document.getElementById('acad_emp_id').value,
                        orcid_id: document.getElementById('acad_orcid_id').value,
                        scopus_id: document.getElementById('acad_scopus_id').value,
                        researcher_id: document.getElementById('acad_researcher_id').value,
                        google_scholar_id: document.getElementById('acad_scholar_id').value,
                        vidwan_id: document.getElementById('acad_vidwan_id').value
                    }
                };
                saveSectionData('about', portfolioData.about);
            } else if (currentSection === 'skills') {
                portfolioData.skills = {
                    subjects_taught: document.getElementById('skills_subjects').value.split(',').map(s => s.trim()).filter(s => s),
                    research_domains: document.getElementById('skills_domains').value.split(',').map(s => s.trim()).filter(s => s),
                    tools_technologies: document.getElementById('skills_tools').value.split(',').map(s => s.trim()).filter(s => s),
                    web_languages: document.getElementById('skills_web_tech').value.split(',').map(s => s.trim()).filter(s => s)
                };
                saveSectionData('skills', portfolioData.skills);
            } else if (currentSection === 'contact') {
                portfolioData.contact = {
                    email: document.getElementById('contact_email').value,
                    phone: document.getElementById('contact_phone').value,
                    location: portfolioData.about?.location || '',
                    address: document.getElementById('contact_address').value,
                    google_scholar: document.getElementById('contact_google_scholar').value,
                    researchgate: document.getElementById('contact_researchgate').value,
                    linkedin: document.getElementById('contact_linkedin').value,
                    github: document.getElementById('contact_github').value
                };
                saveSectionData('contact', portfolioData.contact);
            } else {
                showToast('Changes saved successfully!');
            }
        }

        async function saveSectionData(sectionName, sectionData) {
            const formData = new FormData();
            formData.append('action', 'save_section');
            formData.append('section', sectionName);
            formData.append('data', JSON.stringify(sectionData));

            try {
                const res = await fetch('api.php', { method: 'POST', body: formData });
                const result = await res.json();
                if (result.status === 'success') {
                    showToast(result.message);
                    renderCurrentTab();
                } else {
                    showToast(result.message, 'error');
                }
            } catch (e) {
                showToast('Failed to save data to server', 'error');
            }
        }

        /* CHANGE PASSWORD HANDLER */
        document.getElementById('changePasswordForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            const curr = document.getElementById('curr_pass').value;
            const newP = document.getElementById('new_pass').value;

            const formData = new FormData();
            formData.append('action', 'change_password');
            formData.append('current_password', curr);
            formData.append('new_password', newP);

            const res = await fetch('api.php', { method: 'POST', body: formData });
            const result = await res.json();
            if (result.status === 'success') {
                showToast('Password updated successfully!');
                document.getElementById('changePasswordForm').reset();
            } else {
                showToast(result.message, 'error');
            }
        });

        /* LOGOUT */
        async function logout() {
            await fetch('api.php?action=logout');
            window.location.href = 'login.php';
        }

        /* UTILS */
        function openAdminModal() {
            document.getElementById('adminModal').style.display = 'flex';
        }

        function closeAdminModal() {
            document.getElementById('adminModal').style.display = 'none';
        }

        function showToast(msg, type = 'success') {
            const toast = document.getElementById('toast');
            document.getElementById('toastMsg').textContent = msg;
            toast.style.borderColor = type === 'error' ? 'var(--accent-pink)' : 'var(--accent-green)';
            toast.style.color = type === 'error' ? 'var(--accent-pink)' : 'var(--accent-green)';
            toast.style.display = 'flex';
            setTimeout(() => { toast.style.display = 'none'; }, 3000);
        }

        function escapeHtml(str) {
            if (!str) return '';
            return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
        }

        // Init load
        loadPortfolioData();
    </script>
</body>
</html>
