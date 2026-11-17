<?php
// Load portfolio data from JSON
$jsonPath = __DIR__ . '/data/portfolio.json';
$portfolioData = [];
if (file_exists($jsonPath)) {
    $portfolioData = json_decode(file_get_contents($jsonPath), true) ?: [];
}

$about = $portfolioData['about'] ?? [];
$experience = $portfolioData['experience'] ?? [];
$skills = $portfolioData['skills'] ?? [];
$research = $portfolioData['research'] ?? [];
$education = $portfolioData['education'] ?? [];
$certifications = $portfolioData['certifications'] ?? [];
$roles = $portfolioData['roles'] ?? [];
$memberships = $portfolioData['memberships'] ?? [];
$contact = $portfolioData['contact'] ?? [];

// WhatsApp URL generator
$rawPhone = $contact['phone'] ?? '+918978970366';
$digitsOnly = preg_replace('/[^0-9]/', '', $rawPhone);
if (strlen($digitsOnly) === 10) {
    $digitsOnly = '91' . $digitsOnly;
}
$whatsappUrl = "https://wa.me/" . ($digitsOnly ?: '918978970366');

// Build certificates map by key
$certsMap = [];
foreach ($certifications as $c) {
    $key = $c['key'] ?? ('cert_' . ($c['id'] ?? rand()));
    $certsMap[$key] = $c;
}
?>
<!DOCTYPE html>
<html lang="en" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($about['name'] ?? 'Vella Manikanta'); ?> | Assistant Professor & Academic Portfolio</title>
    <meta name="description" content="Academic Portfolio & Resume of Vella Manikanta, Assistant Professor in Department of Data Engineering at MVGR College of Engineering. Researcher in Machine Learning, Web Technologies & Data Systems.">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom CSS (Original Styling) -->
    <link rel="stylesheet" href="styles.css">

    <!-- Inject dynamic JS data for Modals -->
    <script>
        window.publicationsData = <?php echo json_encode($research, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;
        window.certificatesData = <?php echo json_encode($certsMap, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE); ?>;
    </script>
</head>
<body>

    <!-- Header / Navbar -->
    <header class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#hero" class="nav-brand">
                <span class="brand-prefix">&gt;</span> VM<span class="cursor-blink">.DEV</span>
            </a>
            
            <nav class="nav-links" id="nav-links">
                <a href="#about" class="nav-item"><span class="nav-slash">/</span>ABOUT</a>
                <a href="#experience" class="nav-item"><span class="nav-slash">/</span>EXPERIENCE</a>
                <a href="#skills" class="nav-item"><span class="nav-slash">/</span>SKILLS</a>
                <a href="#research" class="nav-item"><span class="nav-slash">/</span>RESEARCH</a>
                <a href="#education" class="nav-item"><span class="nav-slash">/</span>EDUCATION</a>
                <a href="#certifications" class="nav-item"><span class="nav-slash">/</span>CERTS</a>
                <a href="#committees" class="nav-item"><span class="nav-slash">/</span>ROLES</a>
                <a href="#memberships" class="nav-item"><span class="nav-slash">/</span>MEMBERSHIPS</a>
                <a href="#contact" class="nav-item"><span class="nav-slash">/</span>CONTACT</a>
                <!--<a href="admin/login.php" target="_blank" class="nav-item" style="color:var(--accent-cyan); font-weight:700;"><span class="nav-slash">/</span>ADMIN</a>-->
            </nav>

            <div class="nav-actions">
                <button class="mobile-toggle" id="mobile-toggle" aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="hero-section" id="hero">
            <div class="hero-bg-grid"></div>
            <div class="container hero-container">
                <div class="hero-content">
                    <div class="status-badge">
                        <span class="pulse-dot"></span>
                        <span class="badge-text">FACULTY & RESEARCHER · <?php echo htmlspecialchars(strtoupper($about['college'] ?? 'MVGR COLLEGE OF ENGINEERING')); ?></span>
                    </div>

                    <?php
                        $fullName = $about['name'] ?? 'VELLA MANIKANTA';
                        $nameParts = explode(' ', $fullName, 2);
                        $firstName = $nameParts[0] ?? 'VELLA';
                        $lastName = $nameParts[1] ?? 'MANIKANTA';
                    ?>
                    <h1 class="hero-title">
                        <?php echo htmlspecialchars($firstName); ?> <span class="highlight-text"><?php echo htmlspecialchars($lastName); ?></span>
                    </h1>

                    <p class="hero-subtitle">
                        <?php echo htmlspecialchars($about['title'] ?? 'Assistant Professor'); ?> (<?php echo htmlspecialchars($about['department'] ?? 'Department of Data Engineering'); ?>)
                    </p>

                    <p class="hero-description">
                        <?php echo htmlspecialchars($about['tagline'] ?? 'Academician with 8+ years of teaching excellence in Computer Science, Data Engineering, and Web Technologies. Experienced mentor in Smart India Hackathon (SIH), research contributor with 6+ international publications in Springer & AIP, and dedicated computer science educator.'); ?>
                    </p>

                    <div class="hero-tags">
                        <?php foreach (($skills['tools_technologies'] ?? ['HTML / CSS / JS', 'React JS', 'Node JS', 'Data Engineering', 'Java & C++']) as $tech): ?>
                            <span class="tech-tag"><i class="fa-solid fa-code"></i> <?php echo htmlspecialchars($tech); ?></span>
                        <?php endforeach; ?>
                    </div>

                    <div class="hero-actions">
                        <a href="#research" class="btn btn-primary">
                            <i class="fa-solid fa-microscope"></i> EXPLORE RESEARCH
                        </a>
                        <a href="#experience" class="btn btn-secondary">
                            <i class="fa-solid fa-briefcase"></i> VIEW EXPERIENCE
                        </a>
                        <a href="#contact" class="btn btn-outline">
                            <i class="fa-solid fa-paper-plane"></i> GET IN TOUCH
                        </a>
                    </div>

                    <div class="contact-pills">
                        <a href="mailto:<?php echo htmlspecialchars($contact['email'] ?? 'manikantavella48@gmail.com'); ?>" class="pill-item">
                            <i class="fa-solid fa-envelope"></i> <?php echo htmlspecialchars($contact['email'] ?? 'manikantavella48@gmail.com'); ?>
                        </a>
                        <a href="<?php echo $whatsappUrl; ?>" target="_blank" rel="noopener noreferrer" class="pill-item" title="Chat on WhatsApp">
                            <i class="fa-brands fa-whatsapp" style="color:#25D366; font-size:1.05rem;"></i> <?php echo htmlspecialchars($contact['phone'] ?? '+91 89789 70366'); ?>
                        </a>
                        <span class="pill-item">
                            <i class="fa-solid fa-location-dot"></i> <?php echo htmlspecialchars($about['location'] ?? 'Vizianagaram, AP, India'); ?>
                        </span>
                    </div>
                </div>

                <!-- Terminal Side Widget -->
                <div class="hero-terminal">
                    <div class="terminal-header">
                        <div class="terminal-dots">
                            <span class="dot red"></span>
                            <span class="dot yellow"></span>
                            <span class="dot green"></span>
                        </div>
                        <div class="terminal-title">manikanta@mvgr: ~ (bash)</div>
                        <button class="terminal-copy" id="terminal-copy-btn" title="Copy profile output">
                            <i class="fa-regular fa-copy"></i>
                        </button>
                    </div>
                    <div class="terminal-body" id="terminal-body">
                        <div class="terminal-line"><span class="prompt">$</span> <span class="cmd">whoami</span></div>
                        <div class="terminal-output"><?php echo htmlspecialchars($about['name'] ?? 'Vella Manikanta'); ?> | <?php echo htmlspecialchars($about['title'] ?? 'Assistant Professor'); ?> | Data Engineer</div>
                        
                        <div class="terminal-line"><span class="prompt">$</span> <span class="cmd">cat status.json</span></div>
                        <div class="terminal-output json-output">
{
  <span class="json-key">"role"</span>: <span class="json-str">"<?php echo htmlspecialchars($about['title'] ?? 'Assistant Professor'); ?>"</span>,
  <span class="json-key">"dept"</span>: <span class="json-str">"<?php echo htmlspecialchars($about['department'] ?? 'Data Engineering'); ?>"</span>,
  <span class="json-key">"institution"</span>: <span class="json-str">"<?php echo htmlspecialchars($about['college'] ?? 'MVGR College of Engineering(A)'); ?>"</span>,
  <span class="json-key">"experience"</span>: <span class="json-str">"<?php echo htmlspecialchars($about['stats']['experience_years'] ?? 9); ?>+ Years"</span>,
  <span class="json-key">"location"</span>: <span class="json-str">"<?php echo htmlspecialchars($about['location'] ?? 'Vizianagaram, India'); ?>"</span>,
  <span class="json-key">"publications"</span>: <span class="json-num"><?php echo count($research); ?></span>,
  <span class="json-key">"sih_mentor"</span>: <span class="json-bool">true</span>
}</div>

                        <div class="terminal-line"><span class="prompt">$</span> <span class="cmd">cat core_skills.txt</span></div>
                        <div class="terminal-output"><?php echo htmlspecialchars(implode(', ', $skills['subjects_taught'] ?? ['Machine Learning', 'Deep Learning', 'Computer Networks'])); ?></div>

                        <div class="terminal-line"><span class="prompt">$</span> <span class="cmd">echo $OBJECTIVE</span></div>
                        <div class="terminal-output">"Seeking a challenging position enabling me to utilize my competence & innovative skills with emerging technologies."</div>

                        <div class="terminal-input-line">
                            <span class="prompt">$</span>
                            <input type="text" id="terminal-input" placeholder="Type 'help', 'publications', 'exp', 'skills', 'clear'" autocomplete="off">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- About Section -->
        <section class="section" id="about">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Who Am I<span class="accent-dot">?</span></h2>
                    <div class="section-line"></div>
                </div>

                <div class="about-grid">
                    <div class="about-card main-bio">
                        <div class="bio-header-wrap">
                            <div class="profile-avatar-container">
                                <img src="profile.jpg" alt="Vella Manikanta" class="profile-img" onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                                <div class="profile-avatar-fallback">
                                    <i class="fa-solid fa-user-tie"></i>
                                </div>
                            </div>
                            <div>
                                <h3>Academician & Technology Educator</h3>
                                <p class="bio-subtitle-tag"><i class="fa-solid fa-graduation-cap"></i> <?php echo htmlspecialchars($about['college'] ?? 'MVGR College of Engineering(A)'); ?></p>
                            </div>
                        </div>
                        <p>
                            I am a dedicated <strong><?php echo htmlspecialchars($about['title'] ?? 'Assistant Professor'); ?></strong> in the <?php echo htmlspecialchars($about['department'] ?? 'Department of Data Engineering'); ?> at <?php echo htmlspecialchars($about['college'] ?? 'MVGR College of Engineering (Autonomous)'); ?>, <?php echo htmlspecialchars($about['location'] ?? 'Vizianagaram'); ?>. With over <strong><?php echo htmlspecialchars($about['stats']['experience_years'] ?? 9); ?>+ years of continuous teaching experience</strong> across computer science disciplines, my goal is to nurture innovation, problem-solving, and critical thinking capabilities among engineering students.
                        </p>

                        <div class="bio-highlights">
                            <?php foreach (($about['who_am_i'] ?? []) as $bullet): ?>
                                <div class="highlight-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span><?php echo htmlspecialchars($bullet); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                            <div class="stat-number" data-target="<?php echo htmlspecialchars($about['stats']['experience_years'] ?? 9); ?>"><?php echo htmlspecialchars($about['stats']['experience_years'] ?? 9); ?>+</div>
                            <div class="stat-label">Years Teaching Experience</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon"><div class="stat-icon"><i class="fa-solid fa-book-open"></i></div></div>
                            <div class="stat-number" data-target="<?php echo count($research); ?>"><?php echo count($research); ?></div>
                            <div class="stat-label">Research Publications</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon"><i class="fa-solid fa-award"></i></div>
                            <div class="stat-number" data-target="<?php echo count($certifications); ?>"><?php echo count($certifications); ?></div>
                            <div class="stat-label">FDPs & Certifications</div>
                        </div>

                        <div class="stat-card">
                            <div class="stat-icon"><i class="fa-solid fa-users-gear"></i></div>
                            <div class="stat-number" data-target="<?php echo htmlspecialchars($about['stats']['students_mentored'] ?? 500); ?>"><?php echo htmlspecialchars($about['stats']['students_mentored'] ?? 500); ?>+</div>
                            <div class="stat-label">Students Mentored</div>
                        </div>
                    </div>
                </div>

                <?php 
                    $acadId = $about['academic_identity'] ?? [
                        'employee_id' => '2307030947',
                        'orcid_id' => '0009-0002-0744-6315',
                        'scopus_id' => '57217184378',
                        'researcher_id' => 'KII-0590-2024',
                        'google_scholar_id' => 'JW8H408AAAAJ'
                    ];
                ?>
                <!-- Academic Identity Widget -->
                <div class="academic-identity-card">
                    <div class="identity-header">
                        <i class="fa-solid fa-id-card-clip"></i>
                        <h3>Academic Identity</h3>
                    </div>
                    <div class="identity-grid">
                        <div class="identity-item">
                            <div class="identity-icon"><i class="fa-solid fa-id-badge" style="color: #38bdf8;"></i></div>
                            <div class="identity-info">
                                <span class="identity-label">Employee Id</span>
                                <span class="identity-val"><?php echo htmlspecialchars($acadId['employee_id'] ?? '2307030947'); ?></span>
                            </div>
                        </div>
                        <div class="identity-item">
                            <div class="identity-icon"><i class="fa-brands fa-orcid" style="color: #a6ce39;"></i></div>
                            <div class="identity-info">
                                <span class="identity-label">Orcid Id</span>
                                <a href="https://orcid.org/<?php echo htmlspecialchars($acadId['orcid_id'] ?? '0009-0002-0744-6315'); ?>" target="_blank" rel="noopener noreferrer" class="identity-val link">
                                    <?php echo htmlspecialchars($acadId['orcid_id'] ?? '0009-0002-0744-6315'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.7rem;"></i>
                                </a>
                            </div>
                        </div>
                        <div class="identity-item">
                            <div class="identity-icon"><i class="fa-solid fa-microscope" style="color: #0077b5;"></i></div>
                            <div class="identity-info">
                                <span class="identity-label">Scopus Id</span>
                                <a href="https://www.scopus.com/authid/detail.uri?authorId=<?php echo htmlspecialchars($acadId['scopus_id'] ?? '57217184378'); ?>" target="_blank" rel="noopener noreferrer" class="identity-val link">
                                    <?php echo htmlspecialchars($acadId['scopus_id'] ?? '57217184378'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.7rem;"></i>
                                </a>
                            </div>
                        </div>
                        <div class="identity-item">
                            <div class="identity-icon"><span class="researcher-r">R</span></div>
                            <div class="identity-info">
                                <span class="identity-label">Researcher Id</span>
                                <a href="https://www.webofscience.com/wos/author/record/<?php echo htmlspecialchars($acadId['researcher_id'] ?? 'KII-0590-2024'); ?>" target="_blank" rel="noopener noreferrer" class="identity-val link">
                                    <?php echo htmlspecialchars($acadId['researcher_id'] ?? 'KII-0590-2024'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.7rem;"></i>
                                </a>
                            </div>
                        </div>
                        <div class="identity-item">
                            <div class="identity-icon"><i class="fa-solid fa-graduation-cap" style="color: #4285f4;"></i></div>
                            <div class="identity-info">
                                <span class="identity-label">Google Scholar Id</span>
                                <a href="https://scholar.google.com/citations?user=<?php echo htmlspecialchars($acadId['google_scholar_id'] ?? 'JW8H408AAAAJ'); ?>" target="_blank" rel="noopener noreferrer" class="identity-val link">
                                    <?php echo htmlspecialchars($acadId['google_scholar_id'] ?? 'JW8H408AAAAJ'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.7rem;"></i>
                                </a>
                            </div>
                        </div>
                        <div class="identity-item">
                            <div class="identity-icon"><i class="fa-solid fa-building-columns" style="color: #ec4899;"></i></div>
                            <div class="identity-info">
                                <span class="identity-label">Vidwan Id</span>
                                <a href="https://vidwan.inflibnet.ac.in/profile/<?php echo htmlspecialchars($acadId['vidwan_id'] ?? '521179'); ?>" target="_blank" rel="noopener noreferrer" class="identity-val link">
                                    <?php echo htmlspecialchars($acadId['vidwan_id'] ?? '521179'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.7rem;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Experience Section -->
        <section class="section section-alt" id="experience">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Professional Logs<span class="accent-dot">.</span></h2>
                    <div class="section-line"></div>
                </div>

                <div class="timeline-container">
                    <?php foreach ($experience as $exp): ?>
                        <div class="timeline-item">
                            <div class="timeline-marker">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <div class="timeline-card">
                                <div class="timeline-header">
                                    <div>
                                        <h3 class="role-title"><?php echo htmlspecialchars($exp['role']); ?></h3>
                                        <h4 class="company-name"><i class="fa-solid fa-building"></i> <?php echo htmlspecialchars($exp['organization']); ?></h4>
                                    </div>
                                    <div class="timeline-date">
                                        <i class="fa-regular fa-calendar-days"></i> <?php echo htmlspecialchars($exp['period']); ?>
                                    </div>
                                </div>
                                <div class="timeline-location">
                                    <i class="fa-solid fa-location-dot"></i> <?php echo htmlspecialchars($exp['location']); ?>
                                </div>
                                <ul class="timeline-bullets">
                                    <?php foreach (($exp['bullets'] ?? []) as $b): ?>
                                        <li><?php echo htmlspecialchars($b); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Skills Section -->
        <section class="section" id="skills">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Capabilities & Tools<span class="accent-dot">.</span></h2>
                    <div class="section-line"></div>
                </div>

                <div class="skills-wrapper">
                    <!-- Research Domains & Core Focus -->
                    <div class="skill-category-card">
                        <div class="category-header">
                            <i class="fa-solid fa-brain"></i>
                            <h3>Research Domains</h3>
                        </div>
                        <div class="skill-list">
                            <?php foreach (($skills['research_domains'] ?? ['Map-Reduce & Big Data', 'Medical Image Segmentation', 'Blockchain & Security', 'WSN Routing']) as $domain): ?>
                                <div class="skill-pill"><i class="fa-solid fa-microscope"></i> <?php echo htmlspecialchars($domain); ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Frameworks & Technologies -->
                    <div class="skill-category-card">
                        <div class="category-header">
                            <i class="fa-solid fa-cubes"></i>
                            <h3>Technologies & Tools</h3>
                        </div>
                        <div class="skill-list">
                            <?php foreach (($skills['tools_technologies'] ?? ['Python', 'Java', 'C/C++', 'TensorFlow', 'Power BI', 'Ethereum', 'Git']) as $tool): ?>
                                <div class="skill-pill"><i class="fa-solid fa-laptop-code"></i> <?php echo htmlspecialchars($tool); ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Web & Systems -->
                    <div class="skill-category-card">
                        <div class="category-header">
                            <i class="fa-solid fa-code"></i>
                            <h3>Languages & Web Tech</h3>
                        </div>
                        <div class="skill-list">
                            <?php 
                                $webTechMap = [
                                    'HTML5' => 'fa-brands fa-html5',
                                    'CSS3' => 'fa-brands fa-css3-alt',
                                    'JavaScript' => 'fa-brands fa-js',
                                    'React JS' => 'fa-brands fa-react',
                                    'Node JS' => 'fa-brands fa-node-js',
                                    'SQL / BigData' => 'fa-solid fa-database',
                                    'Python' => 'fa-brands fa-python',
                                    'PHP' => 'fa-brands fa-php'
                                ];
                                foreach (($skills['web_languages'] ?? ['HTML5', 'CSS3', 'JavaScript', 'React JS', 'Node JS', 'SQL / BigData']) as $webTech):
                                    $webIcon = $webTechMap[$webTech] ?? 'fa-solid fa-code';
                            ?>
                                <div class="skill-pill"><i class="<?php echo $webIcon; ?>"></i> <?php echo htmlspecialchars($webTech); ?></div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <!-- Subjects Taught (Featured Card) -->
                    <div class="skill-category-card featured-category">
                        <div class="category-header">
                            <i class="fa-solid fa-chalkboard"></i>
                            <h3>Subjects Taught</h3>
                        </div>
                        <div class="subjects-grid">
                            <?php 
                                $defaultSubjects = [
                                    ['icon' => 'fa-terminal', 'name' => 'Programming in C'],
                                    ['icon' => 'fa-sitemap', 'name' => 'Data Structures'],
                                    ['icon' => 'fa-cubes-stacked', 'name' => 'OOP through Java & C++'],
                                    ['icon' => 'fa-gears', 'name' => 'Operating Systems'],
                                    ['icon' => 'fa-globe', 'name' => 'Web Technologies'],
                                    ['icon' => 'fa-network-wired', 'name' => 'Computer Networks']
                                ];
                                $subList = $skills['subjects_taught'] ?? [];
                                if (empty($subList)) {
                                    $subList = array_column($defaultSubjects, 'name');
                                }

                                $iconsMap = [
                                    'Programming in C' => 'fa-terminal',
                                    'Data Structures' => 'fa-sitemap',
                                    'Object Oriented Programming (Java/C++)' => 'fa-cubes-stacked',
                                    'OOP through Java & C++' => 'fa-cubes-stacked',
                                    'Operating Systems' => 'fa-gears',
                                    'Web Technologies' => 'fa-globe',
                                    'Computer Networks' => 'fa-network-wired',
                                    'Machine Learning' => 'fa-brain',
                                    'Deep Learning' => 'fa-atom'
                                ];

                                foreach ($subList as $subName):
                                    $iconClass = $iconsMap[$subName] ?? 'fa-book-open';
                            ?>
                                <div class="subject-card">
                                    <i class="fa-solid <?php echo $iconClass; ?>"></i>
                                    <span><?php echo htmlspecialchars($subName); ?></span>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Research Publications Section -->
        <section class="section section-alt" id="research">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Research Publications<span class="accent-dot">.</span></h2>
                    <div class="section-line"></div>
                </div>

                <div class="research-toolbar">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" id="paper-search" placeholder="Search publications by title, publisher, topic...">
                    </div>
                    <div class="filter-buttons">
                        <button class="filter-btn active" data-filter="all">All (<?php echo count($research); ?>)</button>
                        <button class="filter-btn" data-filter="springer">Springer</button>
                        <button class="filter-btn" data-filter="aip">AIP</button>
                        <button class="filter-btn" data-filter="journals">International Journals</button>
                    </div>
                </div>

                <div class="publications-grid" id="publications-grid">
                    <?php foreach ($research as $index => $pub): ?>
                        <div class="pub-card" data-publisher="<?php echo htmlspecialchars($pub['publisher'] ?? 'springer'); ?>">
                            <div class="pub-header">
                                <span class="pub-badge <?php echo ($pub['publisher']??'')==='springer'?'springer-badge':(($pub['publisher']??'')==='aip'?'aip-badge':'journal-badge'); ?>">
                                    <i class="fa-solid <?php echo ($pub['publisher']??'')==='springer'?'fa-book':(($pub['publisher']??'')==='aip'?'fa-atom':'fa-newspaper'); ?>"></i> <?php echo htmlspecialchars($pub['venue']); ?>
                                </span>
                                <span class="pub-type" style="font-weight:700; color:var(--accent-cyan);"><?php echo htmlspecialchars($pub['date']); ?></span>
                            </div>
                            <h3 class="pub-title"><?php echo htmlspecialchars($pub['title']); ?></h3>
                            <p class="pub-authors"><?php echo htmlspecialchars($pub['authors']); ?></p>
                            <?php if (!empty($pub['doi'])): ?>
                                <p class="pub-summary" style="font-family: var(--font-mono); font-size: 0.78rem; color: var(--accent-amber);">
                                    <i class="fa-solid fa-fingerprint"></i> DOI: <?php echo htmlspecialchars($pub['doi']); ?>
                                </p>
                            <?php endif; ?>
                            <div class="pub-footer">
                                <?php if (!empty($pub['link'])): ?>
                                    <a href="<?php echo htmlspecialchars($pub['link']); ?>" target="_blank" rel="noopener noreferrer" class="btn-link" style="color: var(--accent-cyan);">
                                        <i class="fa-solid fa-external-link"></i> DOI Link
                                    </a>
                                <?php endif; ?>
                                <button class="btn-link" onclick="openPaperModal(<?php echo $index; ?>)"><i class="fa-solid fa-expand"></i> Details</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Academic Profile / Education Section -->
        <section class="section" id="education">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Academic Profile<span class="accent-dot">.</span></h2>
                    <div class="section-line"></div>
                </div>

                <div class="education-grid">
                    <?php foreach ($education as $edu): ?>
                        <div class="edu-card">
                            <div class="edu-card-top">
                                <div class="edu-icon"><i class="fa-solid <?php echo htmlspecialchars($edu['icon'] ?? 'fa-graduation-cap'); ?>"></i></div>
                                <span class="edu-year-badge"><?php echo htmlspecialchars($edu['year']); ?></span>
                            </div>
                            <h3 class="edu-degree"><?php echo htmlspecialchars($edu['degree']); ?></h3>
                            <p class="edu-institution"><i class="fa-solid fa-university"></i> <?php echo htmlspecialchars($edu['institution']); ?></p>
                            <p class="edu-board"><i class="fa-solid fa-building-columns"></i> <?php echo htmlspecialchars($edu['affiliation']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Certifications & Workshops Section -->
        <section class="section section-alt" id="certifications">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Certifications & Workshops<span class="accent-dot">.</span></h2>
                    <div class="section-line"></div>
                </div>

                <div class="research-toolbar" style="margin-bottom:1.5rem;">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" id="cert-search" placeholder="Search certifications, FDPs, institutes...">
                    </div>
                    <div class="filter-buttons">
                        <button class="cert-filter-btn active" data-cert-filter="all">All (<?php echo count($certifications); ?>)</button>
                        <?php
                            $uniqueYears = [];
                            foreach ($certifications as $c) {
                                $ay = trim($c['academicYear'] ?? '');
                                if ($ay !== '' && !in_array($ay, $uniqueYears)) {
                                    $uniqueYears[] = $ay;
                                }
                            }
                            rsort($uniqueYears);
                            foreach ($uniqueYears as $yr):
                        ?>
                            <button class="cert-filter-btn" data-cert-filter="<?php echo htmlspecialchars($yr); ?>"><?php echo htmlspecialchars($yr); ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="certifications-grid" id="certifications-grid">
                    <?php foreach ($certifications as $cert): 
                        $key = $cert['key'] ?? ('cert_' . rand());
                    ?>
                        <div class="cert-card" data-year="<?php echo htmlspecialchars($cert['academicYear']); ?>" onclick="openCertModal('<?php echo htmlspecialchars($key); ?>')">
                            <div class="cert-icon"><i class="fa-solid fa-award"></i></div>
                            <div class="cert-content">
                                <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:0.4rem; margin-bottom:0.4rem;">
                                    <span class="cert-badge atal-cert"><?php echo htmlspecialchars($cert['type']); ?></span>
                                    <span style="font-family:var(--font-mono); font-size:0.75rem; color:var(--accent-cyan); font-weight:700;"><?php echo htmlspecialchars($cert['date']); ?></span>
                                </div>
                                <h3><?php echo htmlspecialchars($cert['title']); ?></h3>
                                <p class="cert-issuer"><i class="fa-solid fa-university"></i> <?php echo htmlspecialchars($cert['institution']); ?></p>
                                <button class="btn-link" style="margin-top:0.6rem; color:var(--accent-cyan); font-family:var(--font-mono); font-size:0.78rem;" onclick="event.stopPropagation(); openCertModal('<?php echo htmlspecialchars($key); ?>')">
                                    <i class="fa-solid <?php echo ($cert['fileType']??'')==='pdf'?'fa-file-pdf':'fa-file-image'; ?>"></i> View Certificate File <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Institutional Roles Section -->
        <section class="section" id="committees">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Institutional Roles & Committees<span class="accent-dot">.</span></h2>
                    <div class="section-line"></div>
                </div>

                <div class="committees-grid">
                    <?php foreach ($roles as $role): ?>
                        <div class="committee-card">
                            <div class="committee-icon"><i class="fa-solid fa-shield-halved"></i></div>
                            <div class="committee-content">
                                <h3><?php echo htmlspecialchars($role['title']); ?></h3>
                                <p class="committee-org"><i class="fa-solid fa-building"></i> <?php echo htmlspecialchars($role['organization']); ?></p>
                                <p class="committee-desc"><?php echo htmlspecialchars($role['description']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Professional Memberships Module Section -->
        <section class="section section-alt" id="memberships">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Professional Memberships<span class="accent-dot">.</span></h2>
                    <div class="section-line"></div>
                </div>

                <div class="research-toolbar" style="margin-bottom: 2rem;">
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" id="mem-search" placeholder="Search memberships, societies, councils...">
                    </div>
                    <div class="filter-buttons">
                        <button class="mem-filter-btn active" data-mem-filter="all">All (<?php echo count($memberships); ?>)</button>
                        <button class="mem-filter-btn" data-mem-filter="National">National</button>
                        <button class="mem-filter-btn" data-mem-filter="International">International</button>
                    </div>
                </div>

                <div class="certifications-grid" id="memberships-grid">
                    <?php foreach ($memberships as $mem): ?>
                        <div class="cert-card mem-card" data-category="<?php echo htmlspecialchars($mem['category'] ?? 'National'); ?>">
                            <div class="cert-icon" style="background: rgba(0, 240, 255, 0.1); color: var(--accent-cyan); border-color: rgba(0, 240, 255, 0.3);">
                                <i class="fa-solid <?php echo (strtolower($mem['category']??'')==='international')?'fa-globe':'fa-id-card'; ?>"></i>
                            </div>
                            <div class="cert-content">
                                <div style="display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; gap:0.4rem; margin-bottom:0.4rem;">
                                    <span class="cert-badge nptel-cert"><?php echo htmlspecialchars($mem['category'] ?? 'Professional'); ?></span>
                                    <span style="font-family:var(--font-mono); font-size:0.75rem; color:var(--accent-cyan); font-weight:700;"><?php echo htmlspecialchars($mem['period'] ?? 'Member'); ?></span>
                                </div>
                                <h3 style="color: #fff; font-size: 1.05rem; margin-bottom: 0.3rem;"><?php echo htmlspecialchars($mem['title']); ?></h3>
                                <p class="cert-issuer" style="margin-bottom: 0.4rem;"><i class="fa-solid fa-building-columns"></i> <?php echo htmlspecialchars($mem['organization']); ?></p>
                                <p style="font-family: var(--font-mono); font-size: 0.78rem; color: var(--accent-amber); margin-bottom: 0.5rem;">
                                    <i class="fa-solid fa-hashtag"></i> <?php echo htmlspecialchars($mem['membership_id'] ?? 'Member'); ?>
                                </p>
                                <p class="cert-desc" style="font-size: 0.83rem; color: var(--text-muted); line-height: 1.4;"><?php echo htmlspecialchars($mem['description']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="section section-alt" id="contact">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Get In Touch<span class="accent-dot">.</span></h2>
                    <div class="section-line"></div>
                </div>

                <div class="contact-grid">
                    <div class="contact-info-card">
                        <h3>Let's Connect & Collaborate</h3>
                        <p>Feel free to reach out for academic inquiries, research collaborations, student guidance, or technical discussions.</p>
                        
                        <div class="info-items-list">
                            <div class="info-item">
                                <div class="info-icon"><i class="fa-solid fa-envelope"></i></div>
                                <div>
                                    <span class="info-label">Email Address</span>
                                    <a href="mailto:<?php echo htmlspecialchars($contact['email'] ?? 'manikantavella48@gmail.com'); ?>" class="info-value"><?php echo htmlspecialchars($contact['email'] ?? 'manikantavella48@gmail.com'); ?></a>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon" style="background:rgba(37,211,102,0.12); border:1px solid rgba(37,211,102,0.3);"><i class="fa-brands fa-whatsapp" style="color:#25D366;"></i></div>
                                <div>
                                    <span class="info-label">Phone / WhatsApp</span>
                                    <a href="<?php echo $whatsappUrl; ?>" target="_blank" rel="noopener noreferrer" class="info-value" title="Chat on WhatsApp">
                                        <?php echo htmlspecialchars($contact['phone'] ?? '+91 89789 70366'); ?> <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.7rem; color:var(--accent-cyan);"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="info-item">
                                <div class="info-icon"><i class="fa-solid fa-location-dot"></i></div>
                                <div>
                                    <span class="info-label">Campus Address</span>
                                    <span class="info-value"><?php echo htmlspecialchars($contact['address'] ?? 'Department of Data Engineering, MVGR College of Engineering (A), Vizianagaram, AP, India'); ?></span>
                                </div>
                            </div>
                        </div>

                        <div class="social-bar">
                            <a href="<?php echo htmlspecialchars($contact['google_scholar'] ?? '#'); ?>" target="_blank" title="Google Scholar" class="social-icon"><i class="fa-solid fa-graduation-cap"></i></a>
                            <a href="<?php echo htmlspecialchars($contact['researchgate'] ?? '#'); ?>" target="_blank" title="ResearchGate" class="social-icon"><i class="fa-brands fa-researchgate"></i></a>
                            <a href="<?php echo htmlspecialchars($contact['linkedin'] ?? '#'); ?>" target="_blank" title="LinkedIn" class="social-icon"><i class="fa-brands fa-linkedin"></i></a>
                            <a href="<?php echo htmlspecialchars($contact['github'] ?? '#'); ?>" target="_blank" title="GitHub" class="social-icon"><i class="fa-brands fa-github"></i></a>
                        </div>
                    </div>

                    <div class="contact-form-card">
                        <form id="contact-form" onsubmit="handleContactSubmit(event)">
                            <div class="form-group">
                                <label for="form-name">Full Name *</label>
                                <input type="text" id="form-name" required placeholder="Dr. / Mr. / Ms. Name">
                            </div>

                            <div class="form-group">
                                <label for="form-email">Email Address *</label>
                                <input type="email" id="form-email" required placeholder="your.email@institution.edu">
                            </div>

                            <div class="form-group">
                                <label for="form-subject">Subject</label>
                                <input type="text" id="form-subject" placeholder="Research Collaboration / Query">
                            </div>

                            <div class="form-group">
                                <label for="form-message">Message *</label>
                                <textarea id="form-message" rows="5" required placeholder="Write your message here..."></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">
                                <i class="fa-solid fa-paper-plane"></i> SEND MESSAGE
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Modal for Publication Details -->
    <div class="modal" id="paper-modal">
        <div class="modal-content">
            <button class="modal-close" onclick="closePaperModal()">&times;</button>
            <div class="modal-header" id="modal-header">
                <!-- Dynamic Content -->
            </div>
            <div class="modal-body" id="modal-body">
                <!-- Dynamic Content -->
            </div>
        </div>
    </div>

    <!-- Modal for Certificate Document Viewer -->
    <div class="modal" id="cert-modal">
        <div class="modal-content" style="max-width: 900px; width: 94%; max-height: 90vh; overflow-y: auto;">
            <button class="modal-close" onclick="closeCertModal()">&times;</button>
            <div class="modal-header" id="cert-modal-header">
                <!-- Dynamic Content -->
            </div>
            <div class="modal-body" id="cert-modal-body">
                <!-- Dynamic Content -->
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container footer-container">
            <div class="footer-left">
               <!--  <a href="#hero" class="footer-brand">&gt; VM.DEV</a> -->
				<a href="#hero" class="footer-brand">&gt; Vella Manikanta</a>
                <p><?php echo htmlspecialchars($about['title'] ?? 'Assistant Professor'); ?> · <?php echo htmlspecialchars($about['college'] ?? 'MVGR College of Engineering'); ?> · <?php echo htmlspecialchars($about['location'] ?? 'Vizianagaram, AP, India'); ?></p>
            </div>
            
            <div class="footer-center">
                <div class="visitor-counter">
                    <i class="fa-solid fa-eye"></i> <span id="visitor-count">1,028</span> views
                </div>
                <p class="copyright">&copy; <span id="current-year"><?php echo date('Y'); ?></span> Vella Manikanta. All rights reserved.</p>
            </div>

            <div class="footer-right">
                <button class="back-to-top" onclick="scrollToTop()" title="Back to Top">
                    <i class="fa-solid fa-arrow-up"></i> TOP
                </button>
            </div>
        </div>
    </footer>

    <!-- Contact Form Handler JS -->
    <script>
        async function handleContactSubmit(event) {
            event.preventDefault();
            const name = document.getElementById("form-name").value;
            const email = document.getElementById("form-email").value;
            const subject = document.getElementById("form-subject").value || "Portfolio Contact";
            const message = document.getElementById("form-message").value;

            const formData = new FormData();
            formData.append('action', 'submit_contact');
            formData.append('name', name);
            formData.append('email', email);
            formData.append('subject', subject);
            formData.append('message', message);

            try {
                const res = await fetch('admin/api.php', { method: 'POST', body: formData });
                const result = await res.json();
                if (result.status === 'success') {
                    alert('Thank you! Your message has been sent successfully.');
                    document.getElementById("contact-form").reset();
                } else {
                    alert(result.message || 'Error submitting message.');
                }
            } catch (err) {
                alert('Thank you! Your message has been sent.');
                document.getElementById("contact-form").reset();
            }
        }
    </script>

    <!-- JavaScript (Original Interactive Script) -->
    <script src="script.js"></script>
</body>
</html>
