# Development Guide - ND Theme

Complete setup and development guide for the ND WordPress theme.

## Table of Contents

1. [Prerequisites](#prerequisites)
2. [Initial Setup](#initial-setup)
3. [Database Configuration](#database-configuration)
4. [WordPress Installation](#wordpress-installation)
5. [Theme Setup](#theme-setup)
6. [Build Process](#build-process)
7. [Development Workflow](#development-workflow)
8. [Architecture Overview](#architecture-overview)
9. [Key Concepts](#key-concepts)
10. [Troubleshooting](#troubleshooting)

## Prerequisites

### Required Software

- **Node.js** (v14 or higher) and npm
- **PHP** (7.4 or higher)
- **MySQL/MariaDB** (or DBngin for macOS)
- **WordPress CLI** (`wp-cli`)
- **Laravel Valet** (for macOS local development) or similar local server

### Install Prerequisites

#### macOS with Homebrew

```bash
# Install Node.js
brew install node

# Install PHP
brew install php

# Install DBngin (MySQL/MariaDB)
brew install --cask dbngin

# Install WP-CLI
brew install wp-cli

# Install Valet
composer global require laravel/valet
valet install
```

## Initial Setup

### 1. Create Project Directory

```bash
mkdir your-project-name
cd your-project-name
```

### 2. Download WordPress

```bash
wp core download --skip-content
```

This downloads WordPress core files without default content.

### 3. Set Up Valet Link (macOS)

```bash
valet link your-project-name
```

Your site will be available at `http://your-project-name.test`

## Database Configuration

### 1. Start Database Server

**DBngin (macOS):**
- Open DBngin application
- Start MySQL server
- Note the port (usually 3307 for DBngin)

**Standard MySQL:**
```bash
# Start MySQL service
brew services start mysql
```

### 2. Create Database

```bash
# For DBngin (port 3307)
mysql -u root --socket=/tmp/mysql_3307.sock -e "CREATE DATABASE your_db_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"

# For standard MySQL
mysql -u root -e "CREATE DATABASE your_db_name CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
```

### 3. Configure WordPress

```bash
# Create wp-config.php
wp config create \
  --dbname=your_db_name \
  --dbuser=root \
  --dbpass= \
  --dbhost=127.0.0.1:3307

# For standard MySQL, use:
# --dbhost=localhost
```

**Note:** Update `dbhost` port if using DBngin (3307) or standard MySQL (3306).

## WordPress Installation

### 1. Install WordPress

```bash
wp core install \
  --url=your-project-name.test \
  --title="Your Site Title" \
  --admin_user=your_admin_username \
  --admin_password=your_secure_password \
  --admin_email=your@email.com \
  --skip-email
```

### 2. Verify Installation

Visit `http://your-project-name.test` in your browser. You should see WordPress installed.

## Theme Setup

### 1. Install Theme Dependencies

```bash
cd wp-content/themes/nd
npm install
```

### 2. Build Assets

```bash
# Build once
npm run build

# Watch for changes during development
npm run watch
```

### 3. Activate Theme

```bash
wp theme activate nd
```

Or activate via WordPress admin: Appearance → Themes → Activate ND

### 4. Verify Kitchen Sink Page

The theme automatically creates a "Kitchen Sink" page on activation. Visit:
`http://your-project-name.test/kitchen-sink`

## Build Process

### Available Scripts

```bash
# Build all assets (CSS, JS, manifest)
npm run build

# Watch for SCSS changes with BrowserSync (recommended for development)
npm run watch

# Watch SCSS only (no BrowserSync)
npm run watch:css

# BrowserSync only (no SCSS watching)
npm run watch:sync

# Compile CSS only
npm run compile:css

# Compile editor styles only
npm run compile:editor

# Lint SCSS
npm run lint:scss

# Lint JavaScript
npm run lint:js
```

### BrowserSync Configuration

BrowserSync is configured in `bs-config.js`:
- **Proxy:** `reinshine-alt.test` (your Valet site)
- **Port:** `3000` (access at `http://localhost:3000`)
- **Auto-reload:** Enabled for CSS and PHP files
- **Ghost mode:** Disabled (no syncing clicks/forms/scroll)

To change the proxy URL, edit `bs-config.js` and update the `proxy` value.

### Asset Pipeline

1. **Source Files:**
   - SCSS: `/sass/`
   - JavaScript: `/js/`

2. **Build Output:**
   - Compiled CSS: `/dist/style.css`
   - Editor CSS: `/dist/editor-style.css`
   - JavaScript: `/dist/js/`
   - Manifest: `/dist/manifest.json`

3. **Cache Busting:**
   - Assets are hashed during build
   - Manifest maps original paths to hashed filenames
   - `functions.php` uses manifest for dynamic enqueuing

## Development Workflow

### 1. Start Development Server

```bash
# Watch SCSS changes with BrowserSync
cd wp-content/themes/nd
npm run watch
```

This will:
- Watch SCSS files and auto-compile to `/dist`
- Start BrowserSync proxy on port 3000
- Auto-reload browser when CSS or PHP files change
- Access your site at: `http://localhost:3000`

**Note:** BrowserSync proxies your Valet site (`reinshine-alt.test`) to port 3000, so you can access it at `http://localhost:3000` with live reload enabled.

### 2. Make Changes

- Edit SCSS files in `/sass/`
- Changes auto-compile when using `npm run watch`
- Refresh browser to see changes

### 3. Test Changes

- Check Kitchen Sink page for visual QA
- Test in WordPress block editor
- Verify responsive behavior

### 4. Build for Production

```bash
npm run build
```

This creates optimized, hashed assets ready for deployment.

## Architecture Overview

### Theme Structure

```
nd/
├── dist/                    # Compiled assets (generated)
│   ├── style.css
│   ├── editor-style.css
│   ├── js/
│   └── manifest.json
├── inc/                     # PHP includes
│   ├── patterns/            # Block pattern definitions
│   └── kitchen-sink-content.php
├── js/                      # JavaScript source files
├── sass/                    # SCSS source files
│   ├── abstracts/           # Variables, mixins
│   ├── base/                # Base styles
│   ├── components/          # Component styles
│   ├── generic/             # Normalize, reset
│   ├── layouts/             # Layout styles
│   └── utilities/           # Utility classes
├── template-parts/          # Template part files
├── build.js                 # Build script
├── functions.php            # Theme functions
├── theme.json               # Theme configuration
└── style.css                # Theme header
```

### Container Structure

The theme uses consistent container widths:

- **Header:** `.site-header__container` - 1200px max-width
- **Main Content:** `.site-main__container` - 1200px max-width
- **Footer:** `.site-footer__container` - 1200px max-width

All containers:
- Use `max-width: 1200px` (matches `theme.json` contentSize)
- Are centered with `margin: 0 auto`
- Have `padding-left: 1rem` and `padding-right: 1rem`

## Key Concepts

### 1. Gutenberg-First Approach

- **Layout Blocks Only:** Group, Columns, Row, Stack
- **No Utility Classes:** All styling via theme.json and SCSS
- **No Layout Frameworks:** No Bootstrap, Tailwind, etc.
- **Block Patterns:** Reusable layouts using core blocks

### 2. Typography System

Defined in `theme.json`:
- Base: 1rem (16px)
- Small: 0.875rem
- Medium: 1.25rem
- Large: 1.5rem
- XL: 2rem
- XXL: 2.5rem

Editors cannot enter arbitrary font sizes.

### 3. Spacing System

8px-based scale (expressed in rem):
- XS: 0.5rem (8px)
- SM: 1rem (16px)
- MD: 1.5rem (24px)
- LG: 2rem (32px)
- XL: 3rem (48px)
- XXL: 4rem (64px)

Used for padding, margin, and block gap.

### 4. Container Widths

Defined in `theme.json`:
- `contentSize`: 1200px (default content width)
- `wideSize`: 1440px (wide alignment)

### 5. Sidebar Layout Options

The theme supports three layout options:

**Default: Full Width (No Sidebar)**
- Currently active
- Sidebar is hidden unless widgets are added
- Content uses full width

**To Enable Sidebar on Right:**
1. Open `sass/style.scss`
2. Comment out: `@import "layouts/no-sidebar";`
3. Uncomment: `@import "layouts/content-sidebar";`
4. Run `npm run build`

**To Enable Sidebar on Left:**
1. Open `sass/style.scss`
2. Comment out: `@import "layouts/no-sidebar";`
3. Uncomment: `@import "layouts/sidebar-content";`
4. Run `npm run build`

**Note:** Sidebar only displays when widgets are active in Appearance → Widgets

### 5. Block Patterns

Patterns use ONLY:
- Group block
- Columns block
- Headings
- Paragraphs
- Buttons

No custom classes or layout abstractions.

## Troubleshooting

### Assets Not Loading

1. **Check build completed:**
   ```bash
   npm run build
   ```

2. **Verify manifest exists:**
   ```bash
   ls wp-content/themes/nd/dist/manifest.json
   ```

3. **Check file permissions:**
   ```bash
   chmod -R 755 wp-content/themes/nd/dist
   ```

### Database Connection Issues

1. **Check MySQL is running:**
   ```bash
   # DBngin
   ps aux | grep mysql
   
   # Standard MySQL
   brew services list
   ```

2. **Verify port in wp-config.php:**
   - DBngin: `127.0.0.1:3307`
   - Standard: `localhost` or `127.0.0.1`

3. **Test connection:**
   ```bash
   mysql -u root --socket=/tmp/mysql_3307.sock -e "SELECT 1;"
   ```

### SCSS Not Compiling

1. **Check Node.js version:**
   ```bash
   node --version
   # Should be v14 or higher
   ```

2. **Reinstall dependencies:**
   ```bash
   rm -rf node_modules package-lock.json
   npm install
   ```

3. **Check for SCSS syntax errors:**
   ```bash
   npm run lint:scss
   ```

### Theme Not Appearing

1. **Verify theme directory name:**
   ```bash
   ls wp-content/themes/
   # Should see 'nd' directory
   ```

2. **Check style.css header:**
   ```bash
   head -n 15 wp-content/themes/nd/style.css
   # Should show "Theme Name: ND"
   ```

3. **Activate theme:**
   ```bash
   wp theme activate nd
   ```

### Full Width Content Issue

If content goes full width:

1. **Check template files have container:**
   - All templates should wrap content in `.site-main__container`

2. **Verify SCSS compiled:**
   ```bash
   npm run build
   ```

3. **Check browser cache:**
   - Hard refresh: Cmd+Shift+R (Mac) or Ctrl+Shift+R (Windows)

## Quick Reference

### Common Commands

```bash
# Start development
npm run watch

# Build for production
npm run build

# Create admin user
wp user create username email@example.com --role=administrator --user_pass=password

# Update Kitchen Sink page
wp post update 4 --post_content="$(php -r "require 'wp-content/themes/nd/inc/kitchen-sink-content.php'; echo nd_get_kitchen_sink_content();")"

# Clear WordPress cache
wp cache flush
```

### File Locations

- **Theme Config:** `wp-content/themes/nd/theme.json`
- **Functions:** `wp-content/themes/nd/functions.php`
- **SCSS Entry:** `wp-content/themes/nd/sass/style.scss`
- **Build Script:** `wp-content/themes/nd/build.js`
- **Patterns:** `wp-content/themes/nd/inc/patterns/`

## Next Steps

1. **Customize Colors:** Edit `theme.json` color palette
2. **Add Patterns:** Create new patterns in `/inc/patterns/`
3. **Style Components:** Add SCSS in `/sass/components/`
4. **Test Responsive:** Use browser dev tools
5. **Deploy:** Build assets and deploy theme files

## Support

For issues or questions:
1. Check this guide first
2. Review WordPress theme documentation
3. Check Gutenberg block documentation
4. Review theme.json schema

---

**Last Updated:** January 2026
**Theme Version:** 1.0.0
