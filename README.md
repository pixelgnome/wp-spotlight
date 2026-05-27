# Spotlight WordPress Theme

A modern portfolio and blog WordPress theme converted from the Spotlight Next.js template, featuring Tailwind CSS, dark mode support, and a clean, professional design.

## Features

- Modern, responsive design
- Dark mode toggle
- Custom post types for Projects, Speaking engagements, and Work history
- Tailwind CSS styling
- Mobile-friendly navigation
- Article/blog support
- Newsletter signup form
- Work history/resume section
- Photo gallery
- Social media integration

## Installation

1. Copy the `wp-theme-spotlight` folder to your WordPress themes directory: `/wp-content/themes/`

2. Install Node.js dependencies and build Tailwind CSS:
   ```bash
   cd wp-content/themes/wp-theme-spotlight
   npm install
   npm run build
   ```

3. Activate the theme from the WordPress admin panel: **Appearance > Themes**

## Development

To work on the theme with live CSS compilation:

```bash
npm run dev
```

This will watch for changes and automatically rebuild the Tailwind CSS.

## Configuration

### Menus

Set up your navigation menus:
1. Go to **Appearance > Menus**
2. Create a menu and assign it to the "Primary Menu" location
3. Optionally create a footer menu for "Footer Menu"

### Custom Logo

Upload your logo/avatar:
1. Go to **Appearance > Customize > Site Identity**
2. Upload your logo (recommended size: 64x64px)

### Social Media Links

Add your social media URLs:
1. Go to **Settings > General**
2. Scroll down to find social media fields
3. Add your profile URLs for X (Twitter), Instagram, GitHub, and LinkedIn

### Homepage Content

Edit homepage content:
1. Go to **Settings > General**
2. Look for "Hero Title" and "Hero Description" fields (or edit in Customizer if added)

### Photos Gallery

To customize the photo gallery on the homepage:
1. Use a plugin like "Advanced Custom Fields" or edit theme options
2. Or manually replace images in `/assets/images/photos/`

## Custom Post Types

The theme includes three custom post types:

### Projects
For showcasing your portfolio work:
1. Go to **Projects > Add New**
2. Add title, description, and featured image
3. Publish and it will appear in the Projects archive

### Speaking
For talks, conferences, and interviews:
1. Go to **Speaking > Add New**
2. Add details about your speaking engagement
3. Publish to display on the Speaking page

### Work History
For your resume/CV:
1. Go to **Work History > Add New**
2. Fill in:
   - Company name
   - Your role
   - Start and end dates
   - Company logo URL
3. Publish and it will appear in the Work section on the homepage

## Pages

Create these pages for full functionality:

- **About** - Your bio and background
- **Uses** - Tools and equipment you use
- **Articles** - Will automatically show blog posts
- **Projects** - Automatically generated from Projects CPT
- **Speaking** - Automatically generated from Speaking CPT

## Newsletter Integration

The newsletter form is ready for integration. To make it functional:

1. Install a newsletter plugin (e.g., Mailchimp for WordPress, Newsletter)
2. Update the form action in `template-parts/newsletter.php`
3. Or implement the `spotlight_newsletter_signup` action in functions.php

## Dark Mode

Dark mode is automatically detected based on user's system preferences and can be toggled using the button in the header. The preference is saved in localStorage.

## Customization

### Colors

Edit colors in `tailwind.config.js` to match your brand:
- Primary color: teal (change to your preference)
- Background colors: zinc palette

### Typography

The theme uses Inter font by default. To change:
1. Update the font in `tailwind.config.js`
2. Import the font in your stylesheet

### Layout

Main layout files:
- `header.php` - Site header and navigation
- `footer.php` - Site footer
- `index.php` - Homepage template
- `single.php` - Single post/article template
- `page.php` - Page template
- `archive.php` - Archives template

## File Structure

```
wp-theme-spotlight/
├── assets/
│   ├── css/
│   │   ├── dist/           # Compiled CSS (generated)
│   │   └── tailwind.css    # Source CSS
│   ├── js/
│   │   ├── main.js         # Main JavaScript
│   │   └── theme-toggle.js # Dark mode toggle
│   └── images/             # Theme images
├── inc/
│   ├── custom-fields.php   # Custom fields and meta boxes
│   └── custom-post-types.php # CPT definitions
├── template-parts/
│   ├── content-card.php    # Article card template
│   ├── newsletter.php      # Newsletter signup form
│   ├── photos.php          # Photo gallery
│   ├── resume.php          # Work history display
│   └── icon-*.php          # Social media icons
├── functions.php           # Theme functions
├── header.php              # Header template
├── footer.php              # Footer template
├── index.php               # Homepage
├── single.php              # Single post
├── page.php                # Page template
├── archive.php             # Archive template
├── style.css               # Theme stylesheet (required)
└── tailwind.config.js      # Tailwind configuration
```

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Credits

Based on the Spotlight template from Tailwind UI.

## License

This theme is licensed under the GPL v2 or later.

## Support

For issues and questions, please refer to the WordPress Codex or create an issue in the theme repository.
