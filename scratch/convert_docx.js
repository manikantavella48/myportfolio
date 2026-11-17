const fs = require('fs');
const path = require('path');
const htmlToDocx = require('html-to-docx');

async function convertToDocx() {
    const docPath = path.join(__dirname, '../PROJECT_DOCUMENTATION.doc');
    const htmlString = fs.readFileSync(docPath, 'utf8');

    console.log('Converting HTML/DOC format to native .docx file...');

    const docxBuffer = await htmlToDocx(htmlString, null, {
        table: { row: { cantSplit: true } },
        footer: true,
        pageNumber: true,
    });

    const outputDocxPath = path.join(__dirname, '../PROJECT_DOCUMENTATION.docx');
    fs.writeFileSync(outputDocxPath, docxBuffer);
    console.log('Successfully created native DOCX at:', outputDocxPath);

    const artifactDocxPath = 'C:/Users/manik/.gemini/antigravity/brain/1d7fb247-10a9-4e29-9397-501ae3438e2e/PROJECT_DOCUMENTATION.docx';
    fs.writeFileSync(artifactDocxPath, docxBuffer);
    console.log('Successfully created Artifact native DOCX at:', artifactDocxPath);
}

convertToDocx().catch(err => {
    console.error('Error generating DOCX:', err);
});
