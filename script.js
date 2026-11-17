/* ==========================================================================
   VELLA MANIKANTA - PORTFOLIO INTERACTIVE SCRIPT
   ========================================================================== */

// Publication Data Array (Ordered Latest First by Exact Publication Date: 2026 to 2017)
let publicationsData = window.publicationsData || [
    {
        title: "Enhanced Document Clustering Using Residue Modulo Partitioner in Map-Reduce Framework",
        doi: "10.1007/978-3-032-35516-4_6",
        link: "https://doi.org/10.1007/978-3-032-35516-4_6",
        date: "18 August 2026",
        year: 2026,
        publisher: "Springer Nature",
        venue: "Springer Nature (International Conference)",
        type: "International Conference",
        authors: "Vella Manikanta et al.",
        abstract: "Information Retrieval (IR) is a domain within computer science focused on the efficient retrieval of text documents based on user queries containing specific keywords. The demand for automated IR systems has grown significantly to meet business requirements based on user inquiries. Recent techniques have proposed various IR frameworks utilizing different data mining algorithms, as well as novel map and reduce approaches, while leveraging default partitioners. However, none of these methods have effectively utilized custom partitioners. The primary goal of this paper is to implement a custom partitioner, Residue Modulo-K, where K denotes the number of reducers used in the process. Map Reduce framework utilizing proposed custom partitioner to the default partitioner is executed and the results were tabulated. Based on the experimental analysis the proposed custom partitioner outperformed the default one. The performance metrics utilized for this study are job execution time, data transfer time, CPU utilization, and F-score."
    },
    {
        title: "Efficient skin disease detection with CNNs",
        doi: "10.1063/5.0284693",
        link: "https://doi.org/10.1063/5.0284693",
        date: "09 July 2025",
        year: 2025,
        publisher: "AIP Conference Proceedings",
        venue: "International Conference",
        type: "International Conference",
        authors: "Vella Manikanta et al.",
        abstract: "No other diseases are as prevalent today as skin issues, which pose grave danger to our health. Notably, skin cancer, particularly melanoma, is of utmost concern. Timely identification and prevention is essential in mitigating the risks associated with these ailments. However, the prevailing methods of diagnosing skin disorders usually take time and are elaborate. Recent advances in AI and computing have enabled faster and more accurate diagnosis of skin problems. This paper presents a new approach which uses the Inception-V3 model from Convolutional Neural Networks (CNNs) to classify skin diseases. Our model trained on a large dataset of 4925 images promises to be both accurate. The results were encouraging as they achieved an impressive skin diseases detection accuracy of 89.27%. This technology aims at simplifying the diagnostic process for medical specialists such as doctors or dermatologists. By speeding up detection time and increasing precision this method can improve the outcome for patients leading to general public health advancements at large."
    },
    {
        title: "DR-HIPI: Performance Evaluation of Retinal Images for DR Lesion Segmentation Using the HIPI Architecture",
        doi: "10.1007/978-3-031-51163-9_14",
        link: "https://doi.org/10.1007/978-3-031-51163-9_14",
        date: "14 May 2024",
        year: 2024,
        publisher: "Springer",
        venue: "Springer International",
        type: "International Journal",
        authors: "Vella Manikanta et al.",
        abstract: "This chapter proposes a framework that examines possible categories of image modalities available for diabetic retinopathy (DR) and recommends the type of image modality that is better to perform DR segmentation and appropriate post-segmentation machine vision analysis for better DR diagnosis. The proposed system consists of pre-processing step, which uses an order statistics filter to eliminate the noise from the acquired retinal images. The pre-processed images will be sent to the Hadoop Image Processing Interface (HIPI) architecture, implemented using the map-reduce framework. Necessary map and reduce algorithms were implemented to measure the mean pixel intensity values for each type of image modality. For comparison, the proposed system analysis employs 50 color fundus photographs (CFP), 30 fluorescein angiography (FA), and 50 optical coherence tomography (OCT). The average pixel intensity values for CFP are close to 0.31, 0.21, and 0.19 for the RGB channel. The FA values obtained were relative to 0.19, 0.08, and 0.04 for the RGB channel. Similarly, the values for OCT were 0.04, 0.04, and 0.04 for the RGB channel. In comparison to FA and OCT, our proposed work has shown that CFP produces better results. With the proposed map and reduce algorithms, any other type of fundus image could be implemented in the future. The methodology we have implemented using the HIPI architecture is not found in previous research findings in DR, which is the primary motivation for carrying out our work."
    },
    {
        title: "A Hybrid Cluster based Routing model for wireless sensor Networks",
        doi: "10.14445/22315381/IJETT-V68I1P214",
        link: "https://doi.org/10.14445/22315381/IJETT-V68I1P214",
        date: "Year 2020",
        year: 2020,
        publisher: "IJETT",
        venue: "IJETT (International Journal of Engineering Trends and Technology)",
        type: "International Journal",
        authors: "Vella Manikanta et al.",
        abstract: "We propose an empirical and custom model with clustering with optimal cost for wireless route implementation. Even though various models proposed by various authors from years of research, every model has its own advantages and disadvantages. We propose a proficient routing method with ideal parameters like sign quality, channel limit, line delay and in-out. In this model we wipe out the superfluous nodes or transitional nodes while transfer of data among source and destination. Cluster usage association the comparable kind of items dependent on the scopes and longitudes of the nodes. Our proposed model gives more efficient results than traditional models."
    },
    {
        title: "An Efficient Technique for Managing User Information using Ethereum Network",
        doi: "10.35940/ijitee.b7585.129219",
        link: "https://doi.org/10.35940/ijitee.b7585.129219",
        date: "10 December 2019",
        year: 2019,
        publisher: "IJITEE",
        venue: "IJITEE (International Journal of Innovative Technology and Exploring Engineering)",
        type: "International Journal",
        authors: "Vella Manikanta et al.",
        abstract: "Due to enormous increase in development of technology maintenance of user’s information has become major concern. However, user’s information has been effectively maintained by the third parties but the problems with the current system are cost has been increased for maintaining information, lack of transparency and fairness, overuse of power and nature of opaqueness in the current system. So distributed system/ledger i.e., Blockchain came into existence to solve the problems encountered with the current system. The advantages of the proposed distributed system are cost is negligible by eliminating the need of third parties, effectively enhancing the execution speed of transactions and facilitating its reconciliation, maintaining transparency thereby ensuring integrity of user’s information. In this paper, we introduce Ethereum based blockchain network for maintaining user’s information through smart contracts. Experimental results shows that how effectively user’s information has been maintained through blockchain based networks."
    },
    {
        title: "A Secure and Hybrid Model for Auditing and Deduplication",
        doi: "10.14445/22315381/IJETT-V51P210",
        link: "https://doi.org/10.14445/22315381/IJETT-V51P210",
        date: "Year 2017",
        year: 2017,
        publisher: "IJETT",
        venue: "IJETT (International Journal of Engineering Trends and Technology)",
        type: "International Journal",
        authors: "Vella Manikanta et al.",
        abstract: "We propose an empirical model of secure authorization de-duplication. Millions of data components uploaded to server every day, duplicate copy of data components reduce the space of cloud drive. Cloud acts as resource area for data owners and End users. In this model we reduce the duplication of the data components without violating privacy and privileges or access permissions of the while sharing between multiple data owner. Our auditing protocol improves the confidentiality of the auditing with efficient authentication technique and encoding model. Our proposed model improves the performance and maintains data confidentiality than the traditional approaches."
    }
];

document.addEventListener("DOMContentLoaded", () => {
    initNavbarScroll();
    initMobileNav();
    initTerminal();
    initResearchFilters();
    initCertFilters();
    initMemFilters();
    initStatCounters();
    initVisitorCounter();
    updateYear();
});

/* 1. Navbar Scroll & Active Section Highlight */
function initNavbarScroll() {
    const navbar = document.getElementById("navbar");
    const navLinks = document.querySelectorAll(".nav-item");
    const sections = document.querySelectorAll("section[id]");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }

        let currentSectionId = "";
        sections.forEach(section => {
            const sectionTop = section.offsetTop - 120;
            const sectionHeight = section.offsetHeight;
            if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
                currentSectionId = section.getAttribute("id");
            }
        });

        navLinks.forEach(link => {
            link.classList.remove("active");
            if (link.getAttribute("href") === `#${currentSectionId}`) {
                link.classList.add("active");
            }
        });
    });
}

/* 2. Mobile Navigation Toggle */
function initMobileNav() {
    const mobileToggle = document.getElementById("mobile-toggle");
    const navLinks = document.getElementById("nav-links");

    if (mobileToggle && navLinks) {
        mobileToggle.addEventListener("click", () => {
            navLinks.classList.toggle("active");
            const icon = mobileToggle.querySelector("i");
            if (navLinks.classList.contains("active")) {
                icon.className = "fa-solid fa-xmark";
            } else {
                icon.className = "fa-solid fa-bars";
            }
        });

        // Close nav when clicking link on mobile
        document.querySelectorAll(".nav-item").forEach(item => {
            item.addEventListener("click", () => {
                navLinks.classList.remove("active");
                mobileToggle.querySelector("i").className = "fa-solid fa-bars";
            });
        });
    }
}

/* 3. Interactive Terminal Command Processor */
function initTerminal() {
    const terminalInput = document.getElementById("terminal-input");
    const terminalBody = document.getElementById("terminal-body");
    const copyBtn = document.getElementById("terminal-copy-btn");

    if (!terminalInput || !terminalBody) return;

    terminalInput.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
            const inputVal = terminalInput.value.trim().toLowerCase();
            if (!inputVal) return;

            // Append input line
            const line = document.createElement("div");
            line.className = "terminal-line";
            line.innerHTML = `<span class="prompt">$</span> <span class="cmd">${escapeHtml(inputVal)}</span>`;
            terminalBody.insertBefore(line, terminalInput.parentElement);

            // Process command
            const output = document.createElement("div");
            output.className = "terminal-output";

            switch (inputVal) {
                case "help":
                    output.innerHTML = `Available Commands:
  <span class="json-key">whoami</span>       - Display profile overview
  <span class="json-key">exp</span>          - Show career logs & experience
  <span class="json-key">skills</span>       - View tech stack & subjects taught
  <span class="json-key">publications</span> - List research paper titles
  <span class="json-key">edu</span>          - Show academic degrees & scores
  <span class="json-key">certs</span>        - List certifications & FDPs
  <span class="json-key">contact</span>      - Get email & phone details
  <span class="json-key">clear</span>        - Clear terminal output`;
                    break;

                case "whoami":
                    output.innerText = "Vella Manikanta | Assistant Professor in Data Engineering @ MVGR College of Engineering(A), Vizianagaram. SIH Hackathon Mentor & Research Author.";
                    break;

                case "exp":
                case "experience":
                    output.innerText = "1. Assistant Professor (Data Engineering) @ MVGR College of Engg (07/2023 - Present)\n2. Assistant Professor (CSE) @ Raghu Institute of Tech (07/2018 - 06/2023)";
                    break;

                case "skills":
                    output.innerText = "Tech Stack: HTML, CSS, JavaScript, React JS, Node JS, Java, C, C++, Data Structures, OS, Web Tech.\nTools: VS Code, Eclipse, Git.";
                    break;

                case "publications":
                case "pub":
                    output.innerText = "1. Enhanced Document Clustering Using Residue Modulo Partitioner (Springer Nature)\n2. Efficient skin disease detection with CNNs (AIP)\n3. DR-HIPI Retinal Image Segmentation (Springer)\n4. Hybrid Cluster based Routing for WSNs (IJETT)\n5. User Info Management via Ethereum Network (IJITEE)\n6. Secure Auditing & Deduplication (IJETT)";
                    break;

                case "edu":
                case "education":
                    output.innerText = "M.Tech CSE (2017) - 71.86% (Avanthi Inst / JNTUK)\nB.Tech IT (2014) - 62.08% (LENDI Inst / JNTUK)\nIntermediate MPC (2009) - 62.3%\nSSC (2007) - 68.3%";
                    break;

                case "certs":
                    output.innerText = "• Mentor SIH 2024 (Ministry of Education / AICTE)\n• NVIDIA Deep Learning Competency\n• NPTEL Elite OOP (IIT Roorkee)\n• AICTE ATAL FDPs (Cyber Security, Next-Gen AI, Quantum Computing)\n• EdX IIMBx Macroeconomics";
                    break;

                case "contact":
                    output.innerText = "Email: manikantavella48@gmail.com\nPhone: +91-8978970366\nLocation: Vizianagaram, Andhra Pradesh";
                    break;

                case "clear":
                    const lines = terminalBody.querySelectorAll(".terminal-line, .terminal-output");
                    lines.forEach((l, idx) => {
                        if (idx >= 3) l.remove(); // keep default first lines
                    });
                    terminalInput.value = "";
                    return;

                default:
                    output.innerText = `Command not recognized: '${inputVal}'. Type 'help' for available commands.`;
                    break;
            }

            terminalBody.insertBefore(output, terminalInput.parentElement);
            terminalInput.value = "";
            terminalBody.scrollTop = terminalBody.scrollHeight;
        }
    });

    if (copyBtn) {
        copyBtn.addEventListener("click", () => {
            const textToCopy = `VELLA MANIKANTA - Assistant Professor (Data Engineering)
Email: manikantavella48@gmail.com | Phone: +91-8978970366
MVGR College of Engineering(A), Vizianagaram, AP, India`;
            navigator.clipboard.writeText(textToCopy).then(() => {
                copyBtn.innerHTML = '<i class="fa-solid fa-check" style="color: #10b981;"></i>';
                setTimeout(() => {
                    copyBtn.innerHTML = '<i class="fa-regular fa-copy"></i>';
                }, 2000);
            });
        });
    }
}

/* 4. Research Publications Search & Filter */
function initResearchFilters() {
    const filterBtns = document.querySelectorAll(".filter-btn");
    const searchInput = document.getElementById("paper-search");
    const pubCards = document.querySelectorAll(".pub-card");

    if (!filterBtns.length || !pubCards.length) return;

    let activeFilter = "all";

    function filterPapers() {
        const query = searchInput ? searchInput.value.toLowerCase().trim() : "";

        pubCards.forEach(card => {
            const publisher = card.getAttribute("data-publisher");
            const textContent = card.innerText.toLowerCase();

            const matchesFilter = (activeFilter === "all" || publisher === activeFilter);
            const matchesQuery = query === "" || textContent.includes(query);

            if (matchesFilter && matchesQuery) {
                card.style.display = "flex";
            } else {
                card.style.display = "none";
            }
        });
    }

    filterBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            filterBtns.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            activeFilter = btn.getAttribute("data-filter");
            filterPapers();
        });
    });

    if (searchInput) {
        searchInput.addEventListener("input", filterPapers);
    }
}

/* Certifications & Workshops Search & Filter */
function initCertFilters() {
    const certFilterBtns = document.querySelectorAll("#certifications .cert-filter-btn");
    const certSearchInput = document.getElementById("cert-search");
    const certCards = document.querySelectorAll("#certifications-grid .cert-card");

    if (!certFilterBtns.length || !certCards.length) return;

    let activeCertFilter = "all";

    function filterCerts() {
        const query = certSearchInput ? certSearchInput.value.toLowerCase().trim() : "";

        certCards.forEach(card => {
            const yearGroup = card.getAttribute("data-year");
            const textContent = card.innerText.toLowerCase();

            const matchesFilter = (activeCertFilter === "all" || yearGroup === activeCertFilter);
            const matchesQuery = query === "" || textContent.includes(query);

            if (matchesFilter && matchesQuery) {
                card.style.display = "flex";
            } else {
                card.style.display = "none";
            }
        });
    }

    certFilterBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            certFilterBtns.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            activeCertFilter = btn.getAttribute("data-cert-filter");
            filterCerts();
        });
    });

    if (certSearchInput) {
        certSearchInput.addEventListener("input", filterCerts);
    }
}

/* Modal Functions for Publications */
function openPaperModal(index) {
    const paper = publicationsData[index];
    if (!paper) return;

    const modal = document.getElementById("paper-modal");
    const modalHeader = document.getElementById("modal-header");
    const modalBody = document.getElementById("modal-body");

    modalHeader.innerHTML = `
        <div style="display: flex; gap: 0.6rem; align-items: center; margin-bottom: 0.6rem; flex-wrap: wrap;">
            <span class="pub-badge journal-badge">${paper.type}</span>
            <span style="font-family: 'Fira Code', monospace; font-size: 0.8rem; background: rgba(56, 189, 248, 0.15); color: #38bdf8; padding: 0.2rem 0.6rem; border-radius: 4px; font-weight: 700;"><i class="fa-regular fa-calendar-days"></i> ${paper.date}</span>
        </div>
        <h2 style="font-size: 1.3rem; line-height: 1.4; color: #f8fafc; margin-bottom: 0.5rem;">${paper.title}</h2>
    `;

    modalBody.innerHTML = `
        <div style="margin-bottom: 1.2rem; display: flex; flex-direction: column; gap: 0.5rem; font-size: 0.88rem;">
            <p style="font-family: 'Fira Code', monospace; color: #10b981;">
                <i class="fa-solid fa-user-pen"></i> <strong>Authors:</strong> ${paper.authors}
            </p>
            <p style="color: #94a3b8;">
                <i class="fa-solid fa-book-open"></i> <strong>Venue / Publisher:</strong> ${paper.venue}
            </p>
            <p style="font-family: 'Fira Code', monospace; color: #f59e0b;">
                <i class="fa-solid fa-fingerprint"></i> <strong>DOI:</strong> ${paper.doi}
            </p>
            <p style="font-family: 'Fira Code', monospace; margin-top: 0.2rem;">
                <i class="fa-solid fa-link" style="color: #38bdf8;"></i> <strong>DOI Link:</strong> 
                <a href="${paper.link}" target="_blank" rel="noopener noreferrer" style="color: #38bdf8; text-decoration: underline; word-break: break-all;">
                    ${paper.link} <i class="fa-solid fa-arrow-up-right-from-square" style="font-size: 0.75rem;"></i>
                </a>
            </p>
        </div>
        <div style="background: rgba(8, 13, 26, 0.85); border: 1px solid rgba(56, 189, 248, 0.2); padding: 1.2rem; border-radius: 8px; font-size: 0.92rem; color: #cbd5e1; line-height: 1.65; max-height: 320px; overflow-y: auto;">
            <strong style="color: #f8fafc; display: block; margin-bottom: 0.5rem; font-size: 0.95rem; border-bottom: 1px dashed rgba(255,255,255,0.1); padding-bottom: 0.4rem;">
                <i class="fa-solid fa-align-left" style="color: #10b981;"></i> Abstract:
            </strong>
            ${paper.abstract}
        </div>
    `;

    modal.classList.add("active");
}

/* Modal Functions for Certifications & Workshops Document Viewer */
let certificatesData = window.certificatesData || {
    "sdg_ai_2026": {
        title: "AI for Sustainable Development Goals (SDGs)",
        type: "1-Day Faculty Development Programme (FDP)",
        date: "22nd June 2026",
        academicYear: "2025–2026",
        institution: "Pragati Engineering College (Autonomous), Surampalem",
        department: "Department of Computer Science and Engineering",
        signatories: "Dr. Alugolu Avinash (FDP Coordinator), Dr. D.V. Manjula (HoD - CSE), Dr. G. Naresh (Principal), Sangeetha Subramaniam (MD of Pencilibiz)",
        file: "assets/certificates/sdg_ai_pragati_2026.pdf",
        fileType: "pdf"
    },
    "power_bi_2026": {
        title: "Hands-On Workshop on Data Visualization & Business Intelligence using Power BI",
        type: "Hands-On Workshop",
        date: "18th June 2026",
        academicYear: "2025–2026",
        institution: "MVGR College of Engineering (Autonomous), Vizianagaram",
        department: "Department of IE&CT",
        signatories: "Dr. Anjanadevi B (HOD - IE&CT), Dr. Y M C Sekhar (Principal)",
        file: "assets/certificates/power_bi_mvgr_2026.png",
        fileType: "image"
    },
    "ai_manufacturing_2025": {
        title: "Five-Day Online Faculty Development Program on The Role of Artificial Intelligence in Manufacturing Industries",
        type: "5-Day Online FDP",
        date: "27th to 31st October 2025",
        academicYear: "2025–2026",
        institution: "MVGR College of Engineering (Autonomous), Vizianagaram",
        department: "Department of Mechanical Engineering & Data Engineering",
        signatories: "Dr. Ravi Kumar Kottala & Dr. B. Srinivas (Coordinators), Dr. Y. M. C. Sekhar (Principal), Prof. P. S. Sitharama Raju (Director)",
        file: "assets/certificates/ai_manufacturing_mvgr_2025.pdf",
        fileType: "pdf"
    },
    "nvidia_dl_2025": {
        title: "Certificate of Competency: Fundamentals of Deep Learning",
        type: "NVIDIA International Certification",
        date: "September 24, 2025",
        academicYear: "2025–2026",
        institution: "NVIDIA Deep Learning Institute",
        certId: "qWrMF8czRSORNwqmNaGP6Q",
        signatories: "Greg Estes (Vice President, NVIDIA)",
        file: "assets/certificates/nvidia_deep_learning_2025.pdf",
        fileType: "pdf"
    },
    "quantum_ai_2025": {
        title: "AICTE ATAL Faculty Development Program on Quantum Computing with Artificial Intelligence: Convergence and Applications",
        type: "6-Day AICTE ATAL FDP",
        date: "25/08/2025 to 30/08/2025",
        academicYear: "2025–2026",
        institution: "Gayatri Vidya Parishad College for Degree and PG Courses",
        organization: "AICTE Training and Learning (ATAL) Academy, New Delhi",
        certId: "ATAL/2025/1755516688",
        signatories: "G R S Murthy (Coordinator), Dr. Sunil Luthra (Director & Bureau Head, AICTE)",
        file: "assets/certificates/quantum_ai_atal_2025.pdf",
        fileType: "pdf"
    },
    "nextgen_ai_2025": {
        title: "Next-Gen AI: Innovations in Machine Learning, Deep Learning, and Generative Models",
        type: "6-Day AICTE ATAL FDP",
        date: "13–18 January 2025",
        academicYear: "2024–2025",
        institution: "St. Joseph's College of Engineering & Technology, Palai",
        organization: "AICTE Training and Learning (ATAL) Academy, New Delhi",
        certId: "ATAL/2024/1734412849",
        signatories: "Renjith Thomas (Coordinator), Dr. Sunil Luthra (Director & Bureau Head, AICTE)",
        file: "assets/certificates/nextgen_ai_st_josephs_2025.pdf",
        fileType: "pdf"
    },
    "nptel_oop_2025": {
        title: "Fundamentals of Object Oriented Programming",
        type: "NPTEL-AICTE Faculty Development Programme (12-Week)",
        date: "January – April 2025 (12 Weeks)",
        academicYear: "2024–2025",
        institution: "IIT Roorkee / NPTEL (MoE, Govt. of India)",
        certId: "Roll No: NPTEL25CS34S560400069 | Score: 65%",
        signatories: "Prof. Andrew Thangaraj (NPTEL Coordinator, IIT Madras)",
        file: "assets/certificates/nptel_oop_2025.pdf",
        fileType: "pdf"
    },
    "sih_2024": {
        title: "Smart India Hackathon (SIH) 2024 - Software Edition",
        type: "National Mentorship Certificate",
        date: "11–12 December 2024",
        academicYear: "2024–2025",
        institution: "Ministry of Education Innovation Cell / AICTE",
        department: "Nodal Center: New Horizon College of Engineering, Bengaluru",
        signatories: "Sh. Sanjay Kumar (Secretary, MoE), Prof. T. G. Sitharam (Chairman, AICTE), Dr. Abhay Jere (Vice Chairman AICTE & CIO), Dr. Manjunatha (Principal, New Horizon)",
        file: "assets/certificates/sih_2024_mentor.pdf",
        fileType: "pdf"
    },
    "cyber_sec_2024": {
        title: "Emerging Techniques in Cyber Security for Building Resilient Network Infrastructure",
        type: "6-Day AICTE ATAL FDP",
        date: "09–14 December 2024",
        academicYear: "2024–2025",
        institution: "Indian Institute of Information Technology, Sri City (IIIT Sri City)",
        organization: "AICTE Training and Learning (ATAL) Academy, New Delhi",
        certId: "ATAL/2024/1733389918",
        signatories: "Odelu Vanga (Coordinator, IIIT Sri City), Dr. Sunil Luthra (Director & Bureau Head, AICTE)",
        file: "assets/certificates/cyber_security_iiit_sricity_2024.pdf",
        fileType: "pdf"
    },
    "sttp_cps_2024": {
        title: "Intelligent Cyber Physical Systems: Blockchain Recent Trends & Applications",
        type: "SERB Sponsored 1-Week STTP",
        date: "08–13 July 2024",
        academicYear: "2024–2025",
        institution: "MVGR College of Engineering (Autonomous), Department of Data Engineering",
        certId: "Secured 'A' Grade in Assessment",
        signatories: "Dr. P. Satheesh (HoD Data Engg), Dr. P. Srinivasa Rao (Convener, STTP)",
        file: "assets/certificates/sttp_blockchain_mvgr_2024.png",
        fileType: "image"
    },
    "macroeconomics_2024": {
        title: "ES105x: Macroeconomics: Theory and Policy",
        type: "edX Verified Certificate",
        date: "22nd April 2024",
        academicYear: "2023–2024",
        institution: "IIMBx, Indian Institute of Management Bangalore (edX)",
        certId: "271d709cd4054b3cab39332e7afa8a68",
        signatories: "Rupa Chanda (Professor, Indian Institute of Management Bangalore)",
        file: "assets/certificates/macroeconomics_iimbx_2024.pdf",
        fileType: "pdf"
    },
    "nba_fdp_2020": {
        title: "Faculty Program on NBA Accreditation",
        type: "Online Faculty Development Program",
        date: "5th October 2020",
        academicYear: "2020–2021",
        institution: "Bharati Vidyapeeth College Of Engineering, Navi Mumbai",
        certId: "T3IWHA-CE001417 | Score: 89%",
        signatories: "Prof. H. B. Sale (Coordinator), Dr. S. D. Jadhav (Principal)",
        file: "assets/certificates/nba_fdp_bvcoe_2020.jpg",
        fileType: "image"
    },
    "java_quiz_2020": {
        title: "Online Quiz Contest on JAVA Programming",
        type: "National Technical Quiz",
        date: "3rd June 2020",
        academicYear: "2020–2021",
        institution: "RGM College of Engineering and Technology (RGMCET), Nandyal",
        department: "Department of CSE under CSI and IE(I) Student's Chapter",
        certId: "Score: 100% Perfect Score",
        signatories: "Dr. K. Subba Reddy (Convener & HOD), Dr. T. Jayachandra Prasad (Principal)",
        file: "assets/certificates/java_quiz_rgmcet_2020.pdf",
        fileType: "pdf"
    },
    "naac_quiz_2020": {
        title: "National Level Quiz on NAAC Assessment & Accreditation",
        type: "National Technical Quiz",
        date: "26th May 2020",
        academicYear: "2019–2020",
        institution: "P.V.P.P. College of Engineering, Mumbai",
        certId: "OQBUQC-CE003361",
        signatories: "Prof. Srikant Bagewadi & Prof. Manjiri Pathak (Coordinators), Dr. Mahavir A. Devmane (Convener), Dr. Alam N. Shaikh (Principal)",
        file: "assets/certificates/naac_quiz_pvpp_2020.jpg",
        fileType: "image"
    },
    "future_tech_2020": {
        title: "Future Tech 2020 - Global Mega Trends, Technologies & Covid 19 Impacting Sectors",
        type: "National Digital Knowledge Series",
        date: "19th May 2020",
        academicYear: "2019–2020",
        institution: "ICT Academy (Skycampus)",
        certId: "C.No: S219920",
        signatories: "Mani James (Senior VP, Frost & Sullivan), G Saravanan (DGM, ICT Academy), M Sivakumar (CEO, ICT Academy)",
        file: "assets/certificates/future_tech_ict_2020.jpg",
        fileType: "image"
    },
    "industry4_2020": {
        title: "Webinar on INDUSTRY 4.0",
        type: "Technical Webinar",
        date: "19th May 2020",
        academicYear: "2019–2020",
        institution: "Sri Eshwar College of Engineering, Coimbatore",
        certId: "21BF5O-CE000533",
        signatories: "Director - IR, Director, Principal (Sri Eshwar College of Engineering)",
        file: "assets/certificates/industry4_eshwar_2020.pdf",
        fileType: "pdf"
    },
    "ensemble_ml_2020": {
        title: "Webinar on Ensemble Learning in Machine Learning",
        type: "Technical Webinar",
        date: "12th May 2020",
        academicYear: "2019–2020",
        institution: "CMR Engineering College, Hyderabad in association with WILEY",
        department: "Department of Computer Science and Engineering",
        signatories: "Dr. M. Kumara Swamy (Professor in CSE), Dr. Sheo Kumar (HOD - CSE), Dr. A. Srinivalusa Reddy (Principal)",
        file: "assets/certificates/ensemble_ml_cmr_2020.jpg",
        fileType: "image"
    },
    "covid_ml_2020": {
        title: "2 Days Instructor Led Live Online Workshop On ML & AI Using Covid-19 Virus Data Analysis",
        type: "2-Day National Workshop",
        date: "09th – 10th May 2020",
        academicYear: "2019–2020",
        institution: "Finland Labs & National Social Summit, IIT Roorkee",
        signatories: "Director, Revert Technology Pvt. Ltd. & IIT Roorkee Social Summit Team",
        file: "assets/certificates/covid_ml_finlandlabs_2020.jpg",
        fileType: "image"
    },
    "python_spoken_2020": {
        title: "Python 3.4.3 Training & Remote Examination",
        type: "IIT Bombay National Certification",
        date: "5th May 2020",
        academicYear: "2019–2020",
        institution: "Spoken Tutorial Project, IIT Bombay (NMEICT, MHRD, Govt. of India)",
        certId: "2438777NWS",
        signatories: "Prof. Kannan M Moudgalya (IIT Bombay), Vaishali Barkade & Anub Vamadevan Nair (Invigilators, JSPM RSCOE)",
        file: "assets/certificates/python_spoken_iitb_2020.jpg",
        fileType: "image"
    },
    "python_fdp_2020": {
        title: "Online Faculty Development Program on Python Programming",
        type: "6-Day National FDP",
        date: "28th April – 03rd May 2020",
        academicYear: "2019–2020",
        institution: "JSPM's Rajarshi Shahu College of Engineering, Pune (Affiliated to SPPU)",
        signatories: "Prof. V. M. Bardade (FDP Coordinator), Dr. Seema V. Kedar (HOD), Dr. R. K. Jain (Director, JSPM RSCOE)",
        file: "assets/certificates/python_fdp_jspm_2020.jpg",
        fileType: "image"
    }
};

function openCertModal(key) {
    const cert = certificatesData[key];
    if (!cert) return;

    const modal = document.getElementById("cert-modal");
    const modalHeader = document.getElementById("cert-modal-header");
    const modalBody = document.getElementById("cert-modal-body");

    modalHeader.innerHTML = `
        <div style="display: flex; gap: 0.6rem; align-items: center; margin-bottom: 0.6rem; flex-wrap: wrap;">
            <span class="pub-badge journal-badge">${cert.type}</span>
            <span style="font-family: 'Fira Code', monospace; font-size: 0.8rem; background: rgba(56, 189, 248, 0.15); color: #38bdf8; padding: 0.2rem 0.6rem; border-radius: 4px; font-weight: 700;">
                <i class="fa-regular fa-calendar-days"></i> ${cert.date}
            </span>
            <span style="font-family: 'Fira Code', monospace; font-size: 0.8rem; background: rgba(16, 185, 129, 0.15); color: #10b981; padding: 0.2rem 0.6rem; border-radius: 4px; font-weight: 700;">
                AY: ${cert.academicYear}
            </span>
        </div>
        <h2 style="font-size: 1.3rem; line-height: 1.4; color: #f8fafc; margin-bottom: 0.5rem;">${cert.title}</h2>
        <p style="color: #94a3b8; font-size: 0.9rem;">
            <i class="fa-solid fa-building-columns" style="color: #38bdf8;"></i> <strong>${cert.institution}</strong>
        </p>
    `;

    let viewerHtml = '';
    if (cert.file) {
        if (cert.fileType === "pdf") {
            viewerHtml = `
                <div style="margin-bottom: 1.2rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.6rem; flex-wrap: wrap; gap: 0.5rem;">
                        <span style="font-family: 'Fira Code', monospace; font-size: 0.85rem; color: #10b981;">
                            <i class="fa-solid fa-file-pdf"></i> Certificate Document Preview
                        </span>
                        <div style="display: flex; gap: 0.6rem;">
                            <a href="${cert.file}" target="_blank" class="btn-link" style="background: rgba(56, 189, 248, 0.15); color: #38bdf8; padding: 0.35rem 0.8rem; border-radius: 6px; font-size: 0.8rem; border: 1px solid rgba(56, 189, 248, 0.3);">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i> Open Fullscreen
                            </a>
                            <a href="${cert.file}" download class="btn-link" style="background: rgba(16, 185, 129, 0.15); color: #10b981; padding: 0.35rem 0.8rem; border-radius: 6px; font-size: 0.8rem; border: 1px solid rgba(16, 185, 129, 0.3);">
                                <i class="fa-solid fa-download"></i> Download PDF
                            </a>
                        </div>
                    </div>
                    <iframe src="${cert.file}#toolbar=0" style="width: 100%; height: 480px; border: 1px solid rgba(56, 189, 248, 0.25); border-radius: 8px; background: #080d1a;"></iframe>
                </div>
            `;
        } else if (cert.fileType === "image") {
            viewerHtml = `
                <div style="margin-bottom: 1.2rem; text-align: center;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.6rem; flex-wrap: wrap; gap: 0.5rem;">
                        <span style="font-family: 'Fira Code', monospace; font-size: 0.85rem; color: #10b981;">
                            <i class="fa-solid fa-file-image"></i> Certificate Image Preview
                        </span>
                        <div style="display: flex; gap: 0.6rem;">
                            <a href="${cert.file}" target="_blank" class="btn-link" style="background: rgba(56, 189, 248, 0.15); color: #38bdf8; padding: 0.35rem 0.8rem; border-radius: 6px; font-size: 0.8rem; border: 1px solid rgba(56, 189, 248, 0.3);">
                                <i class="fa-solid fa-arrow-up-right-from-square"></i> Open Fullscreen
                            </a>
                            <a href="${cert.file}" download class="btn-link" style="background: rgba(16, 185, 129, 0.15); color: #10b981; padding: 0.35rem 0.8rem; border-radius: 6px; font-size: 0.8rem; border: 1px solid rgba(16, 185, 129, 0.3);">
                                <i class="fa-solid fa-download"></i> Download Image
                            </a>
                        </div>
                    </div>
                    <div style="background: #080d1a; border: 1px solid rgba(56, 189, 248, 0.25); padding: 0.8rem; border-radius: 8px;">
                        <img src="${cert.file}" alt="${cert.title}" style="max-width: 100%; max-height: 480px; object-fit: contain; border-radius: 6px;">
                    </div>
                </div>
            `;
        }
    }

    let metaDetails = '';
    if (cert.signatories) {
        metaDetails += `<p style="color: #cbd5e1; margin-bottom: 0.4rem;"><i class="fa-solid fa-signature" style="color: #f59e0b;"></i> <strong>Signatories / Authorities:</strong> ${cert.signatories}</p>`;
    }
    if (cert.certId) {
        metaDetails += `<p style="font-family: 'Fira Code', monospace; color: #f59e0b; margin-bottom: 0.4rem;"><i class="fa-solid fa-fingerprint"></i> <strong>Certificate ID:</strong> ${cert.certId}</p>`;
    }
    if (cert.department) {
        metaDetails += `<p style="color: #94a3b8; margin-bottom: 0.4rem;"><i class="fa-solid fa-sitemap" style="color: #38bdf8;"></i> <strong>Department / Unit:</strong> ${cert.department}</p>`;
    }
    if (cert.desc) {
        metaDetails += `<p style="color: #cbd5e1; margin-bottom: 0.4rem;"><i class="fa-solid fa-align-left" style="color: #10b981;"></i> <strong>Overview:</strong> ${cert.desc}</p>`;
    }

    modalBody.innerHTML = `
        ${viewerHtml}
        <div style="background: rgba(8, 13, 26, 0.85); border: 1px solid rgba(56, 189, 248, 0.2); padding: 1.2rem; border-radius: 8px; font-size: 0.9rem; line-height: 1.6;">
            <strong style="color: #f8fafc; display: block; margin-bottom: 0.6rem; font-size: 0.95rem; border-bottom: 1px dashed rgba(255,255,255,0.1); padding-bottom: 0.4rem;">
                <i class="fa-solid fa-circle-check" style="color: #10b981;"></i> Certificate Metadata & Verification:
            </strong>
            ${metaDetails}
        </div>
    `;

    modal.classList.add("active");
}

function closeCertModal() {
    const modal = document.getElementById("cert-modal");
    if (modal) modal.classList.remove("active");
}

function closePaperModal() {
    const modal = document.getElementById("paper-modal");
    if (modal) modal.classList.remove("active");
}

// Close modal when clicking backdrop
window.addEventListener("click", (e) => {
    const paperModal = document.getElementById("paper-modal");
    const certModal = document.getElementById("cert-modal");
    if (e.target === paperModal) {
        closePaperModal();
    }
    if (e.target === certModal) {
        closeCertModal();
    }
});

/* 5. Stat Counter Animation */
function initStatCounters() {
    const statCards = document.querySelectorAll(".stat-number");
    let animated = false;

    window.addEventListener("scroll", () => {
        const aboutSection = document.getElementById("about");
        if (!aboutSection || animated) return;

        const sectionTop = aboutSection.getBoundingClientRect().top;
        if (sectionTop < window.innerHeight - 100) {
            animated = true;
            statCards.forEach(card => {
                const targetText = card.innerText;
                const targetNum = parseInt(card.getAttribute("data-target"), 10);
                if (isNaN(targetNum)) return;

                let current = 0;
                const increment = Math.ceil(targetNum / 30);
                const timer = setInterval(() => {
                    current += increment;
                    if (current >= targetNum) {
                        card.innerText = targetText;
                        clearInterval(timer);
                    } else {
                        card.innerText = current + "+";
                    }
                }, 40);
            });
        }
    });
}

/* 6. Form Submission Handler */
function handleFormSubmit(event) {
    event.preventDefault();
    const name = document.getElementById("form-name").value;
    const email = document.getElementById("form-email").value;
    const subject = document.getElementById("form-subject").value || "Portfolio Contact";
    const message = document.getElementById("form-message").value;

    // Show simulated success response
    alert(`Thank you, ${name}! Your message has been prepared.\n\nOpening your email client to send to manikantavella48@gmail.com...`);
    
    // Trigger mailto link for direct sending
    const mailtoUri = `mailto:manikantavella48@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent("Name: " + name + "\nEmail: " + email + "\n\nMessage:\n" + message)}`;
    window.location.href = mailtoUri;

    document.getElementById("contact-form").reset();
}

/* 7. Visitor Counter Simulation */
function initVisitorCounter() {
    const visitorElem = document.getElementById("visitor-count");
    if (!visitorElem) return;

    let count = localStorage.getItem("vm_visitor_count");
    if (!count) {
        count = 1028;
    } else {
        count = parseInt(count, 10) + 1;
    }
    localStorage.setItem("vm_visitor_count", count);
    visitorElem.innerText = count.toLocaleString();
}

/* 8. Scroll to Top */
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
}

/* Helper function */
function escapeHtml(str) {
    return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
}

function updateYear() {
    const yearElem = document.getElementById("current-year");
    if (yearElem) {
        yearElem.innerText = new Date().getFullYear();
    }
}

/* 9. Professional Memberships Filtering & Search */
function initMemFilters() {
    const memFilterBtns = document.querySelectorAll(".mem-filter-btn");
    const memSearchInput = document.getElementById("mem-search");
    const memCards = document.querySelectorAll("#memberships-grid .mem-card");

    if (!memFilterBtns.length || !memCards.length) return;

    let activeMemFilter = "all";

    function filterMemberships() {
        const query = memSearchInput ? memSearchInput.value.toLowerCase().trim() : "";

        memCards.forEach(card => {
            const rawCat = (card.getAttribute("data-category") || "").toLowerCase().trim();
            let catNorm = rawCat;
            if (rawCat.includes("international")) {
                catNorm = "international";
            } else if (rawCat.includes("national")) {
                catNorm = "national";
            }

            const filterNorm = activeMemFilter.toLowerCase().trim();
            const textContent = card.innerText.toLowerCase();

            const matchesFilter = (filterNorm === "all" || catNorm === filterNorm);
            const matchesQuery = query === "" || textContent.includes(query);

            if (matchesFilter && matchesQuery) {
                card.style.display = "flex";
            } else {
                card.style.display = "none";
            }
        });
    }

    memFilterBtns.forEach(btn => {
        btn.addEventListener("click", function (e) {
            e.preventDefault();
            memFilterBtns.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");
            activeMemFilter = btn.getAttribute("data-mem-filter") || "all";
            filterMemberships();
        });
    });

    if (memSearchInput) {
        memSearchInput.addEventListener("input", filterMemberships);
    }
}

/* 10. Disable Right Click & Inspect / View Source Keyboard Shortcuts */
(function initSecurityProtections() {
    // Disable Right-Click Context Menu
    document.addEventListener("contextmenu", function (e) {
        e.preventDefault();
        return false;
    });

    // Block Inspect Element, DevTools, View Source, and Save Page shortcuts
    document.addEventListener("keydown", function (e) {
        // F12 key
        if (e.keyCode === 123 || e.key === "F12") {
            e.preventDefault();
            return false;
        }

        // Ctrl+U / Cmd+Opt+U (View Source)
        // Ctrl+S / Cmd+S (Save Webpage)
        // Ctrl+Shift+I / Ctrl+Shift+J / Ctrl+Shift+C (Inspect/Console/Selector)
        if (e.ctrlKey || e.metaKey) {
            const k = (e.key || "").toLowerCase();
            if (k === "u" || k === "s") {
                e.preventDefault();
                return false;
            }
            if (e.shiftKey && (k === "i" || k === "j" || k === "c")) {
                e.preventDefault();
                return false;
            }
        }
    });
})();
