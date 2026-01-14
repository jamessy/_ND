# ND

A lightweight, developer-oriented WordPress theme based on Underscores. Gutenberg first, SCSS driven, performant, and reusable across projects.

## Features

- **Gutenberg First**: Built for the block editor with core blocks and block patterns
- **SCSS Workflow**: Modern SCSS compilation with cache busting
- **Performance Focused**: Minimal JavaScript, no jQuery, clean HTML output
- **Developer Friendly**: Well-organized code structure, easy to extend
- **Typography System**: Consistent typography scale locked via theme.json
- **Spacing System**: 8px-based spacing system using rem units
- **Block Patterns**: Pre-built patterns for common layouts
- **Kitchen Sink Page**: Comprehensive reference page for all blocks and patterns

## Requirements

- WordPress 6.0 or higher
- PHP 7.4 or higher
- Node.js and npm (for building assets)

## Installation

1. Clone or download this theme into your WordPress `wp-content/themes/` directory
2. Install dependencies: `npm install`
3. Build assets: `npm run build`
4. Activate the theme in WordPress admin

## Development

### Building Assets

```bash
# Build once
npm run build

# Watch for changes
npm run watch

# Compile CSS only
npm run compile:css

# Compile editor styles only
npm run compile:editor
```

### Asset Pipeline

- Source SCSS files are in `/sass/`
- Compiled CSS is output to `/dist/`
- JavaScript files are copied and hashed in `/dist/js/`
- A `manifest.json` file maps original paths to hashed filenames for cache busting

### Cache Busting

The theme uses hashed filenames for cache busting. The build process:
1. Compiles SCSS to CSS
2. Copies and hashes JavaScript files
3. Creates hashed versions of CSS files
4. Generates a `manifest.json` mapping original paths to hashed paths

Assets are enqueued dynamically via `functions.php` using the manifest file.

## Theme Structure

```
nd/
├── dist/              # Compiled assets (generated)
├── inc/               # PHP includes
│   ├── patterns/      # Block pattern definitions
│   └── kitchen-sink-content.php
├── js/                # JavaScript source files
├── sass/              # SCSS source files
├── template-parts/    # Template part files
├── build.js           # Build script
├── functions.php      # Theme functions
├── theme.json         # Theme configuration
└── style.css          # Theme header
```

## Typography System

Font sizes are locked via `theme.json`:
- Small: 0.875rem
- Base: 1rem
- Medium: 1.25rem
- Large: 1.5rem
- XL: 2rem
- XXL: 2.5rem

Editors cannot enter arbitrary font sizes.

## Spacing System

8px-based spacing scale (expressed in rem):
- XS: 0.5rem (8px)
- SM: 1rem (16px)
- MD: 1.5rem (24px)
- LG: 2rem (32px)
- XL: 3rem (48px)
- XXL: 4rem (64px)

## Block Patterns

The theme includes four block patterns:
1. **Hero**: Hero section with heading, text, and CTA button
2. **Content + Image**: Two-column layout with content and image
3. **Call to Action**: Centered CTA section with buttons
4. **Multi Column Content**: Three-column content layout

## Kitchen Sink Page

On theme activation, a "Kitchen Sink" page is automatically created. This page displays:
- All styled core Gutenberg blocks
- All block patterns
- Typography scale examples
- Spacing scale examples

Use this page for visual QA, editor reference, and regression testing.

## Editor Experience

The theme includes editor styles that match the frontend:
- Real fonts
- Real colors
- Real spacing
- Restricted controls via theme.json

## Performance

- No jQuery (unless absolutely required)
- Minimal JavaScript (vanilla preferred)
- Clean, minimal HTML output
- Optimized asset loading

## License

GPL-2.0-or-later

## Credits

Based on [Underscores](https://underscores.me/) by Automattic.
