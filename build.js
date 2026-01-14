const fs = require('fs');
const path = require('path');
const { execSync } = require('child_process');
const crypto = require('crypto');

// Ensure dist directory exists
const distDir = path.join(__dirname, 'dist');
if (!fs.existsSync(distDir)) {
	fs.mkdirSync(distDir, { recursive: true });
}

// Ensure dist/js directory exists
const distJsDir = path.join(distDir, 'js');
if (!fs.existsSync(distJsDir)) {
	fs.mkdirSync(distJsDir, { recursive: true });
}

console.log('Building assets...');

// Compile main stylesheet
console.log('Compiling main stylesheet...');
try {
	execSync('node-sass sass/style.scss dist/style.css --source-map true --output-style compressed', { stdio: 'inherit' });
} catch (error) {
	console.error('Error compiling main stylesheet:', error.message);
	process.exit(1);
}

// Compile editor stylesheet
console.log('Compiling editor stylesheet...');
const editorScssPath = path.join(__dirname, 'sass', 'editor-style.scss');
if (fs.existsSync(editorScssPath)) {
	try {
		execSync('node-sass sass/editor-style.scss dist/editor-style.css --source-map true --output-style compressed', { stdio: 'inherit' });
	} catch (error) {
		console.error('Error compiling editor stylesheet:', error.message);
		process.exit(1);
	}
} else {
	// Create a basic editor-style.css if it doesn't exist
	fs.writeFileSync(
		path.join(distDir, 'editor-style.css'),
		'/* Editor styles */\n'
	);
}

// Copy and hash JavaScript files
console.log('Processing JavaScript files...');
const jsDir = path.join(__dirname, 'js');
const manifest = {};

if (fs.existsSync(jsDir)) {
	const jsFiles = fs.readdirSync(jsDir).filter(file => file.endsWith('.js'));
	
	jsFiles.forEach(file => {
		const sourcePath = path.join(jsDir, file);
		const content = fs.readFileSync(sourcePath, 'utf8');
		const hash = crypto.createHash('md5').update(content).digest('hex').substring(0, 8);
		const nameWithoutExt = path.parse(file).name;
		const hashedFilename = `${nameWithoutExt}.${hash}.js`;
		const destPath = path.join(distJsDir, hashedFilename);
		
		fs.copyFileSync(sourcePath, destPath);
		
		// Store mapping: original path -> hashed filename
		manifest[`dist/js/${file}`] = `dist/js/${hashedFilename}`;
		console.log(`  ${file} -> ${hashedFilename}`);
	});
}

// Hash CSS files
console.log('Hashing CSS files...');
const cssFiles = ['dist/style.css', 'dist/editor-style.css'];

cssFiles.forEach(cssFile => {
	const fullPath = path.join(__dirname, cssFile);
	if (fs.existsSync(fullPath)) {
		const content = fs.readFileSync(fullPath, 'utf8');
		const hash = crypto.createHash('md5').update(content).digest('hex').substring(0, 8);
		const parsed = path.parse(cssFile);
		const hashedFilename = `${parsed.name}.${hash}${parsed.ext}`;
		const hashedPath = path.join(__dirname, parsed.dir, hashedFilename);
		
		fs.copyFileSync(fullPath, hashedPath);
		manifest[cssFile] = `${parsed.dir}/${hashedFilename}`;
		console.log(`  ${cssFile} -> ${parsed.dir}/${hashedFilename}`);
	}
});

// Write manifest.json
const manifestPath = path.join(distDir, 'manifest.json');
fs.writeFileSync(manifestPath, JSON.stringify(manifest, null, 2));
console.log(`\nManifest written to ${manifestPath}`);

console.log('\nBuild complete!');
