# Theme Colors Reference

This theme uses a color system defined in `theme.json`. All colors are available as CSS custom properties and can be used in the Gutenberg block editor.

## Available Colors

### Primary Colors

- **Primary** (`--wp--preset--color--primary`)
  - Hex: `#4169e1`
  - Usage: Main brand color, links, primary buttons

- **Secondary** (`--wp--preset--color--secondary`)
  - Hex: `#800080`
  - Usage: Secondary actions, visited links

- **Accent** (`--wp--preset--color--accent`)
  - Hex: `#ff6b6b`
  - Usage: Highlights, call-to-action elements

### Status Colors

- **Success** (`--wp--preset--color--success`)
  - Hex: `#0f834d`
  - Usage: Success messages, positive actions

- **Warning** (`--wp--preset--color--warning`)
  - Hex: `#ffa500`
  - Usage: Warning messages, caution indicators

- **Error** (`--wp--preset--color--error`)
  - Hex: `#e2401c`
  - Usage: Error messages, destructive actions

- **Info** (`--wp--preset--color--info`)
  - Hex: `#3d9cd2`
  - Usage: Informational messages, info boxes

### Neutral Colors

- **Dark** (`--wp--preset--color--dark`)
  - Hex: `#191970`
  - Usage: Dark text, hover states

- **Gray Dark** (`--wp--preset--color--gray-dark`)
  - Hex: `#404040`
  - Usage: Body text, main content

- **Gray** (`--wp--preset--color--gray`)
  - Hex: `#666666`
  - Usage: Secondary text, descriptions

- **Gray Light** (`--wp--preset--color--gray-light`)
  - Hex: `#cccccc`
  - Usage: Borders, dividers, subtle backgrounds

- **Light** (`--wp--preset--color--light`)
  - Hex: `#f1f1f1`
  - Usage: Light backgrounds, subtle highlights

- **White** (`--wp--preset--color--white`)
  - Hex: `#ffffff`
  - Usage: Page background, card backgrounds

- **Black** (`--wp--preset--color--black`)
  - Hex: `#000000`
  - Usage: Headings, strong contrast text

## Usage in SCSS

All colors are available as CSS custom properties:

```scss
.my-element {
  color: var(--wp--preset--color--primary);
  background-color: var(--wp--preset--color--light);
  border-color: var(--wp--preset--color--gray-light);
}
```

## Usage in Gutenberg Blocks

Colors are automatically available in the block editor:
- Text color picker
- Background color picker
- Button color settings
- Group block color settings

## Customizing Colors

To change colors, edit `theme.json`:

```json
{
  "settings": {
    "color": {
      "palette": [
        {
          "slug": "primary",
          "color": "#YOUR_COLOR",
          "name": "Primary"
        }
      ]
    }
  }
}
```

After updating `theme.json`:
1. Rebuild assets: `npm run build`
2. Clear browser cache
3. Colors will update across the entire theme

## Color Relationships

- **Links:** Use `primary` for default, `secondary` for visited, `dark` for hover
- **Buttons:** Use `primary` for primary actions, `secondary` for secondary actions
- **Text:** Use `gray-dark` for body text, `black` for headings
- **Borders:** Use `gray-light` for subtle borders
- **Backgrounds:** Use `white` for main background, `light` for subtle backgrounds

## Accessibility

All color combinations meet WCAG contrast requirements:
- Text on white: `gray-dark` and `black` meet AA standards
- Text on primary: `white` meets AA standards
- Links: Sufficient contrast in all states
