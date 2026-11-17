const fs = require('fs');
const path = require('path');

const mdPath = path.join(__dirname, '../PROJECT_DOCUMENTATION.md');
const mdContent = fs.readFileSync(mdPath, 'utf8');

console.log('Read Markdown file, length:', mdContent.length);

// Helper to convert Markdown tables, headers, code blocks, and diagrams into Word-compatible HTML format
function convertMarkdownToWordHtml(md) {
    let lines = md.split('\n');
    let html = '';
    let inTable = false;
    let tableRows = [];
    let inCode = false;
    let codeText = '';
    let inMermaid = false;
    let mermaidText = '';

    for (let i = 0; i < lines.length; i++) {
        let line = lines[i];

        // Code blocks / Mermaid blocks
        if (line.trim().startsWith('```mermaid')) {
            inMermaid = true;
            mermaidText = '';
            continue;
        }
        if (inMermaid) {
            if (line.trim() === '```') {
                inMermaid = false;
                html += renderMermaidDiagramAsHtml(mermaidText);
                mermaidText = '';
            } else {
                mermaidText += line + '\n';
            }
            continue;
        }

        if (line.trim().startsWith('```')) {
            if (inCode) {
                inCode = false;
                html += `<div style="background-color: #0f172a; color: #38bdf8; font-family: 'Consolas', 'Courier New', monospace; font-size: 9.5pt; padding: 10pt; border-radius: 4pt; border: 1pt solid #334155; margin: 10pt 0; white-space: pre-wrap;">${escapeHtml(codeText)}</div>`;
                codeText = '';
            } else {
                inCode = true;
                codeText = '';
            }
            continue;
        }
        if (inCode) {
            codeText += line + '\n';
            continue;
        }

        // Tables
        if (line.trim().startsWith('|')) {
            if (!inTable) {
                inTable = true;
                tableRows = [];
            }
            // Skip header separator lines like |---|---|
            if (line.includes('---')) continue;
            tableRows.push(line);
            continue;
        } else if (inTable) {
            inTable = false;
            html += renderTableHtml(tableRows);
            tableRows = [];
        }

        // Headings
        if (line.startsWith('# ')) {
            html += `<h1 style="color: #0f172a; font-family: 'Calibri', 'Arial', sans-serif; font-size: 24pt; font-weight: bold; border-bottom: 2pt solid #0284c7; padding-bottom: 4pt; margin-top: 24pt; margin-bottom: 12pt;">${formatText(line.substring(2))}</h1>`;
        } else if (line.startsWith('## ')) {
            html += `<h2 style="color: #0369a1; font-family: 'Calibri', 'Arial', sans-serif; font-size: 18pt; font-weight: bold; border-bottom: 1pt solid #bae6fd; padding-bottom: 3pt; margin-top: 18pt; margin-bottom: 9pt; page-break-after: avoid;">${formatText(line.substring(3))}</h2>`;
        } else if (line.startsWith('### ')) {
            html += `<h3 style="color: #0284c7; font-family: 'Calibri', 'Arial', sans-serif; font-size: 14pt; font-weight: bold; margin-top: 14pt; margin-bottom: 6pt; page-break-after: avoid;">${formatText(line.substring(4))}</h3>`;
        } else if (line.startsWith('#### ')) {
            html += `<h4 style="color: #0f172a; font-family: 'Calibri', 'Arial', sans-serif; font-size: 12pt; font-weight: bold; margin-top: 10pt; margin-bottom: 4pt; page-break-after: avoid;">${formatText(line.substring(5))}</h4>`;
        } else if (line.startsWith('- [x] ') || line.startsWith('- [ ] ')) {
            let checked = line.startsWith('- [x] ');
            let text = line.substring(6);
            let checkSymbol = checked ? '<span style="color: #16a34a; font-weight: bold; font-size: 12pt;">[✔]</span>' : '<span style="color: #64748b; font-size: 12pt;">[ ]</span>';
            html += `<p style="margin: 3pt 0 3pt 18pt; font-family: 'Calibri', 'Arial', sans-serif; font-size: 11pt; color: #334155;">${checkSymbol} ${formatText(text)}</p>`;
        } else if (line.startsWith('- ') || line.startsWith('* ')) {
            html += `<p style="margin: 3pt 0 3pt 18pt; font-family: 'Calibri', 'Arial', sans-serif; font-size: 11pt; color: #334155;">• ${formatText(line.substring(2))}</p>`;
        } else if (/^\d+\.\s/.test(line)) {
            let numMatch = line.match(/^(\d+\.)\s/);
            let text = line.replace(/^\d+\.\s/, '');
            html += `<p style="margin: 3pt 0 3pt 18pt; font-family: 'Calibri', 'Arial', sans-serif; font-size: 11pt; color: #334155;"><strong>${numMatch[1]}</strong> ${formatText(text)}</p>`;
        } else if (line.trim() === '---') {
            html += `<hr style="border: none; border-top: 1pt solid #cbd5e1; margin: 16pt 0;" />`;
        } else if (line.trim().length > 0) {
            html += `<p style="font-family: 'Calibri', 'Arial', sans-serif; font-size: 11pt; line-height: 1.5; color: #1e293b; margin: 6pt 0;">${formatText(line)}</p>`;
        }
    }

    if (inTable && tableRows.length > 0) {
        html += renderTableHtml(tableRows);
    }

    return html;
}

function escapeHtml(str) {
    return str.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
}

function formatText(str) {
    return str
        .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
        .replace(/\*(.*?)\*/g, '<em>$1</em>')
        .replace(/`([^`]+)`/g, '<code style="font-family: \'Consolas\', monospace; background-color: #f1f5f9; color: #0284c7; padding: 1pt 4pt; border-radius: 3pt; font-size: 10pt;">$1</code>')
        .replace(/\[([^\]]+)\]\(([^)]+)\)/g, '<a href="$2" style="color: #0284c7; text-decoration: underline;">$1</a>');
}

function renderTableHtml(rows) {
    if (rows.length === 0) return '';
    let html = `<table style="width: 100%; border-collapse: collapse; margin: 12pt 0; font-family: 'Calibri', 'Arial', sans-serif; font-size: 10pt;">`;
    
    rows.forEach((rowStr, index) => {
        let cells = rowStr.split('|').map(c => c.trim()).filter((c, idx, arr) => idx > 0 && idx < arr.length - 1);
        if (index === 0) {
            html += `<tr style="background-color: #0284c7; color: #ffffff; font-weight: bold; text-align: left;">`;
            cells.forEach(cell => {
                html += `<th style="padding: 8pt 10pt; border: 1pt solid #0284c7; font-size: 10.5pt;">${formatText(cell)}</th>`;
            });
            html += `</tr>`;
        } else {
            let bg = index % 2 === 0 ? '#f8fafc' : '#ffffff';
            html += `<tr style="background-color: ${bg}; border-bottom: 1pt solid #e2e8f0;">`;
            cells.forEach(cell => {
                html += `<td style="padding: 6pt 10pt; border: 1pt solid #cbd5e1; color: #334155;">${formatText(cell)}</td>`;
            });
            html += `</tr>`;
        }
    });

    html += `</table>`;
    return html;
}

// Convert Mermaid diagram text into high-quality visual diagram blocks for Word
function renderMermaidDiagramAsHtml(mermaid) {
    let title = "DIAGRAM / FLOWCHART";
    if (mermaid.includes('graph TD') || mermaid.includes('graph LR') || mermaid.includes('graph TB')) {
        title = "SYSTEM ARCHITECTURE & FLOW DIAGRAM";
    } else if (mermaid.includes('sequenceDiagram')) {
        title = "SEQUENCE & WORKFLOW DIAGRAM";
    } else if (mermaid.includes('erDiagram')) {
        title = "ENTITY-RELATIONSHIP (ER) DIAGRAM";
    }

    let rawLines = mermaid.split('\n').filter(l => l.trim().length > 0);
    let itemsHtml = '';

    rawLines.forEach((l, idx) => {
        let clean = l.trim();
        if (clean.startsWith('graph') || clean.startsWith('sequenceDiagram') || clean.startsWith('erDiagram') || clean.startsWith('autonumber') || clean.startsWith('subgraph') || clean.startsWith('end')) {
            return;
        }

        // Format diagram nodes / transitions
        let formattedLine = clean
            .replace(/-->/g, ' <span style="color: #0284c7; font-weight: bold;">➔</span> ')
            .replace(/-\/>/g, ' <span style="color: #0284c7; font-weight: bold;">➔</span> ')
            .replace(/-->>/g, ' <span style="color: #10b981; font-weight: bold;">🞂</span> ')
            .replace(/->>/g, ' <span style="color: #0284c7; font-weight: bold;">🞂</span> ')
            .replace(/\|([^\|]+)\|/g, ' <span style="background: #e0f2fe; color: #0369a1; padding: 2pt 6pt; border-radius: 3pt; font-size: 8.5pt; font-weight: bold;">[$1]</span> ')
            .replace(/\[([^\]]+)\]/g, ' <strong style="color: #0f172a; background: #f1f5f9; padding: 2pt 5pt; border: 1pt solid #cbd5e1; border-radius: 3pt;">$1</strong> ')
            .replace(/\(([^)]+)\)/g, ' <em style="color: #0369a1;">($1)</em> ')
            .replace(/\{([^}]+)\}/g, ' <strong style="color: #b45309; background: #fef3c7; padding: 2pt 5pt; border-radius: 3pt;">‹$1›</strong> ');

        itemsHtml += `<div style="padding: 4pt 8pt; margin: 3pt 0; background-color: #ffffff; border-left: 3pt solid #0284c7; font-family: 'Consolas', 'Calibri', monospace; font-size: 9.5pt; color: #1e293b;">${formattedLine}</div>`;
    });

    return `
    <div style="margin: 14pt 0; padding: 12pt; background-color: #f8fafc; border: 1.5pt solid #0284c7; border-radius: 6pt; box-shadow: 0 2pt 4pt rgba(0,0,0,0.05);">
        <div style="font-family: 'Calibri', sans-serif; font-size: 10pt; font-weight: bold; color: #0369a1; text-transform: uppercase; letter-spacing: 0.5pt; margin-bottom: 8pt; border-bottom: 1pt dashed #cbd5e1; padding-bottom: 4pt;">
            📌 ${title}
        </div>
        ${itemsHtml}
    </div>
    `;
}

const bodyHtml = convertMarkdownToWordHtml(mdContent);

// Full Word Document HTML wrapper with MSO XML namespaces so Microsoft Word natively loads it as a formatted document
const fullWordDocHtml = `
<html xmlns:o="urn:schemas-microsoft-microsoft-com:office:office"
      xmlns:w="urn:schemas-microsoft-microsoft-com:office:word"
      xmlns="http://www.w3.org/TR/REC-html40">
<head>
<meta charset="utf-8">
<title>Project Documentation - Academic Portfolio CMS</title>
<!--[if gte mso 9]>
<xml>
 <w:WordDocument>
  <w:View>Print</w:View>
  <w:Zoom>100</w:Zoom>
  <w:DoNotOptimizeForBrowser/>
 </w:WordDocument>
</xml>
<![endif]-->
<style>
@page WordSection1 {
    size: 8.5in 11.0in;
    margin: 1.0in 1.0in 1.0in 1.0in;
    mso-header-margin: 0.5in;
    mso-footer-margin: 0.5in;
    mso-paper-source: 0;
}
div.WordSection1 {
    page: WordSection1;
}
body {
    font-family: 'Calibri', 'Arial', sans-serif;
    font-size: 11pt;
    line-height: 1.5;
    color: #1e293b;
}
h1, h2, h3, h4 {
    font-family: 'Calibri', 'Arial', sans-serif;
}
table {
    mso-style-name: "Table Grid";
    mso-tstyle-rowband-size: 0;
    mso-tstyle-colband-size: 0;
}
</style>
</head>
<body lang="EN-US">
<div class="WordSection1">

<div style="text-align: center; margin-bottom: 30pt; padding-bottom: 15pt; border-bottom: 3pt double #0284c7;">
    <h1 style="color: #0f172a; font-size: 26pt; margin-bottom: 6pt; border: none;">Academic Portfolio & Super Admin CMS</h1>
    <p style="font-size: 14pt; color: #0284c7; font-weight: bold; margin-top: 0;">Comprehensive Technical Documentation & Beginner Development Guide</p>
    <p style="font-size: 10pt; color: #64748b;">Author: Vella Manikanta | Project: MyPortfolio System | Date: August 2026</p>
</div>

${bodyHtml}

<div style="margin-top: 40pt; text-align: center; font-size: 9pt; color: #94a3b8; border-top: 1pt solid #cbd5e1; padding-top: 10pt;">
    Academic Portfolio System Documentation • Generated for Vella Manikanta • All Rights Reserved
</div>

</div>
</body>
</html>
`;

// Save .doc file (Word HTML Format)
const docPath = path.join(__dirname, '../PROJECT_DOCUMENTATION.doc');
fs.writeFileSync(docPath, fullWordDocHtml, 'utf8');
console.log('Successfully generated Word Document at:', docPath);

// Save copy in artifacts directory
const artifactDocPath = 'C:/Users/manik/.gemini/antigravity/brain/1d7fb247-10a9-4e29-9397-501ae3438e2e/PROJECT_DOCUMENTATION.doc';
fs.writeFileSync(artifactDocPath, fullWordDocHtml, 'utf8');
console.log('Successfully generated Artifact Word Document at:', artifactDocPath);
