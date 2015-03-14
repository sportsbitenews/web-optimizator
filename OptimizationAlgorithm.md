# Optimization algorithm #

## Content parsing ##

### Initial HTML file parising ###

  * Head section with:
    * `<script>` tags .
    * `<style>` and `<link>` tags.
  * All scripts’ content
  * We parse defined head section (and scripts’ array) through 3 functions (for each main group) – page, css, javascript.

### Parsing scripts and styles into array ###

  * Define if file has src or href – so it’s an external one.
  * Inline code is put into content of item in scripts array.
  * Full content of files is mined only if “Don’t check files’ MTIME” option is disabled.
  * Cache file name is generated. If cached file exists we don’t do anything more – just remove current scripts’ and put 1 generated one into head.
    * If we have unobtrusive load of JavaScript – put JavaScript call before closing `</body>`.
    * If we merged external and inline scripts – put JavaScript call before `</head>`.
    * If we don’t merge all scripts – put JavaScript call after CSS file.
    * Put CSS file after `<head>` -- to load it as fast as possible.
  * If we don’t have cached file – and we have “Don’t check files MTIME” option enabled – get all scripts’ content.


## Content optimization ##

### JavaScript code ###

  * All merged content is passed through JSMin / Packer or YUI Compressor.
  * If compression / caching isn’t via .htaccess – form .php file with all gzip / caching headers.

### CSS code ###

  * CSS files are merged with all @import constructions (recursively).
  * CSS Tidy is applied (if CSS Sprites or data:URI are used).
  * Otherwise simple regular expression to minify CSS content.
  * If compression / caching isn’t via .htaccess – form .php file with all gzip / caching headers.

### CSS Sprites applying ###

  * CSS Tidy parses initial merged CSS file and forms hash of CSS rules.
  * CSS rules are parsed for background-properties (background, background-position, background-image).
  * CSS rules are parsed for width, height, padding. Also we try to detect correct CSS selector for pseudo-variants (i.e. :hover, :link, etc – all CSS3 selectors) and detect inherited properties.
  * If we have CSS image with multiple background-position – it’s excluded (seems to be initial CSS Sprite).
  * If we have background-repeat: repeat – it’s excluded.
  * If we have background-repeat: repeat-x and we don’t have height (or it’s in relative units) – mark it as repeat-xl (to merge 1 image with all repeat-x at bottom).
  * If we have background-repeat: repeat-x and we have height – mark is as repeat-x.
  * If we have background-repeat: repeat-y and we don’t have width (or it’s in relative units) – mark it as repeat-yl (to merge 1 image with all repeat-y at bottom).
  * If we have background-repeat: repeat-y and we have width – mark it as repeat-y.
  * If we have background-position: bottom and background-repeat: no-repeat – mark it as no-repeatb.
  * If we have background-position: right and background-repeat: no-repeat – mark it as no-repeatr.
  * If we have background-repeat: no-repeat and we don’t have width or height (or have them in relative units) and no right or bottom – mark it as no-repeati (to merge images as icons – by steps).
  * If we have background-repeat: no-repeat and we have width and height (and no right or bottom) – mark it no-repeat.
  * If we can’t detect proper case (i.e. background-position : none) – it’s excluded.
  * Get actual image size. Remember initial position (background-position), image sizes are increased by paddings. Container size (from CSS rule) is remembered as initial shift (total 3 pairs of values – position, image dimensions and possible shift).
  * Glue all images by their type. For repeat-x and repeat-y found small no-repeat images and put them in the beginning. At the end put 1 repeat-xl  or repeat-yl image. No-repeatb are merged and glued to the bottom, no-repeatr – to the right. All this except no-repeat and no-repeati.
  * For no-repeat image calculate position (by 2-dimensions matrix, simple algorithm).
  * After include into this sprite no-repeati images (by steps to the free positions).
  * Include into combined sprite no-repeatb (to the left bottom corner) and no-repeatr (to the right top corner).
  * CSS rules are renewed with calculated images’ positions and repeat. Multiple CSS rules for 1 background-image are merged into 1 (for data:URI optimization).
  * Images’ filenames are formed by md5-hash from all CSS rules that participate in Sprites’ creation. We check if image exists before creating new Sprite.
  * Call smush.it to optimize final CSS Sprites image.
  * If we don’t have CSS Spirtes image (GDlib error?) – return background property for CSS selector and don’t remove other background properties.
  * Apply data:URI (via CSS rules hash).