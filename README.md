Ubuntu community teams WordPress theme
======================================

A simple and beautiful theme inspired by the Ubuntu website and designed for Ubuntu community teams. Features responsive design, support for RTL languages, customization of colors and more.

[Screenshot of the theme](screenshot.png?raw=true)

Setting up
----------

1. Copy all the files in the repository in a directory called "ubuntu-community" under the wp-content/themes/ directory.
2. Enable the "Community theme for Ubuntu" theme from Appearance » Themes. If you are running multisite, you will need to network enable the theme first under Network Admin » Themes.

### Migrating

If you are migrating a site that already has content:
- Set up the widget areas again; WordPress handles widget area settings per-theme

If you are migrating your site from the [Ubuntu Loco Light theme](https://launchpad.net/ubuntu-community-webthemes/light-wordpress-theme) (later "light theme"):
- **Navigation menu**
  - Light theme: Created by adding two menu widgets in the "Menu" and "Submenu" widget areas
  - This theme: Created by linking a menu with the "Header menu" location (supports subitems directly)


After setting the theme up
--------------------------

When the theme is set up, you might want to do the following things:

**Create a menu and assign it to the "Header menu" theme location.**  [Appearance » Menus]  
It's highly recommended to add the front page as the first item for this menu since there is no link to the main page visible by default.

**Select a static page for the front page.**  [Settings » Reading]  
Note: When you set a static page as the front page, its title will be hidden by default. This is to ensure maximum flexibility to make the front page look as you like. If you want to use a regular title on the front page, simply add a "Heading 1" element with your page name to the beginning of the page.


Widget areas
------------

**Footnote widgets**
- Suitable for most widget types
- Creates equally sized columsn for all widgets
- Menus are laid out vertically

**Footer widgets**
- Suitable for menus and short text blocks
- Widgets are laid on top of each other
- Menus are laid out horizontally

**Notifications**
- Suitable for small excerpts of text
- Shown at the top of the main content area on every page on the website


Additional features
-------------------

### Autocolumns for content
To create columns in content, use the following markup:
```
[cols]
... Column content ...
///
... Column content ...
[/cols]
```
You can add up to four separators (///) within one [cols] declaration to create as many as five columns. If you wish to change the separator, edit the 'ubuntucommunity_columns_separator' option.

### Menu CSS classes
In the menu editing page, show CSS Classes from the screen options. After that, you can use the following CSS classes to change the appearance of menu item:  

Class    | Effect
-------- | -------------------
strong   | Makes the text bold

### Customizable colors and header logo
If you don't want to use the Ubuntu orange in your site, or want to change the logo in the header, use the WordPress Customizer under the Appearance menu.
