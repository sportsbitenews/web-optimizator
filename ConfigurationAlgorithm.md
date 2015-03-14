# Configuration Algorithm #

## Automatic tuning — Environment test ##
  1. **Disable WEBO Site SpeedUp and all its options** (for correct options configuration w/o any losses in website functionality).
    * Enable "Add `<!--WSS-->` to body of optimized pages".
  1. **Client side caching** (Cache-Control and Expires headers setting to far future to cancel repeat requests to static assets from browsers).
    * Enable "Cache CSS".
    * Enable "Cache JavaScript".
    * Enable "Cache images".
    * Enable "Cache fonts".
    * Enable "Cache video".
    * Enable "Cache other files".
  1. **Server side caching** (server side expenses elimintation to create HTML pages).
    * Check current server side delay for home page (if curl library exists).
    * Enable Server Side Caching (if WEBO Site SpeedUp is installed natively and delay is more than 500 ms).
  1. **.htaccess test** (Apache modules usage for client- and server-side optimization).
    * Check for SymLinks possibility.
    * Load available Apache modules.
      * mod\_gzip
      * mod\_deflate (+ mod\_filter)
      * mod\_expires
      * mod\_headers
      * mod\_rewrite
      * mod\_mime
    * Enable available modules via .htaccess.
    * Check if website is accessible (if curl library exists).
    * If website is not accessible disable all Apache modules.

## Automatic tuning — CSS optimization ##
  1. **Files merging** (decrease of requests to CSS files).
    * Count number of tags (actually styles) `<link>` and `<style>` inside `<body>`.
    * If number of styles greater than 0, then enable "Combine CSS included in tags `<head>` and `<body>`"
      * Otherwise enable "Combine only CSS included in tag `<head>`"
    * Enable "Enable inline styles merging"
    * Enable "Enable external styles merging" (if curl library exists).
    * Compare styles for optimized and intiial website home page.
    * Disable "Enable inline styles merging" if styles are different
      * Compare styles once more, disable "Enable external styles merging" if they are different.
> > > Compare styles once more, disable "Combine only CSS included in tag `<head>`" if they are different.
  1. **Minify** (decrease CSS code size).
    * Enable "Minify CSS".
    * Compare styles, disable "Minify CSS" if styles are different.
  1. **Gzip** (decrease CSS code size).
    * Enable "Gzip CSS".
    * Compare styles, disable "Gzip CSS" if styles are different.

## Automatic tuning — JavaScript Optimization ##
  1. **Files merging** (decrease of requests to JavaScript files).
    * Enable "Combine only JavaScript included in tag `<head>`".
    * Load website home page once more and compare inline JavaScript code in head section with the previous one.
    * Enable "Enable inline JavaScript merging" if inline code is the same in both cases.
    * Enable "Enable external JavaScript merging" (if curl library exists).
    * Enable "Force moving combined script to `</head>`".
    * Count JavaScript errors on the optimized home page.
    * Disable "Enable inline JavaScript merging" if any errors exist.
      * Count errors once more. Disable "Force moving combined script to `</head>`" if there are any.
      * Count errors once more. Disable "Enable external JavaScript merging" and enable "Force moving combined script to `</head>`" if there are any.
      * Count errors once more. Consequently add to "Exclude file(s) from combining" option JavaScript files from initial web page.
      * Count errors once more. Disable "Combine only JavaScript included in tag `<head>`" if there are any.
  1. **Minify JavaScript files** (decrease of JavaScript code size).
    * Enable "Minify with JSMin".
    * Count JavaScript errors on the optimized home page.
    * Disable "Minify with JSMin" and enable "Minify with YUI Compressor" if there are any.
      * Count errors once more. Disable "Minify with YUI Compressor" and enable "Minify with Packer".
      * Count errors once more. Disable "Minify with Packer" if there are any.
  1. **Duplicates removal** (decrease of JavaScript code size).
    * Check for JavaScript libraries duplicates on initial page.
    * Enable "Remove duplicates" if there are any.
      * Count JavaScript errors on the optimized page.
      * Disable "Remove duplicates" if there are any.
  1. **Gzip** (decrease of JavaScript code size).
    * Enable "Gzip JavaScript".
    * Count JavaScript errors on the optimized page.
    * Disable "Gzip JavaScript" if there are any.

## Automatic tuning — HTML Optimization ##
  1. **Minify** (descrease of HTML code size).
    * Enable "Minify HTML".
    * Check for HTML changes (DOM tree size for head and length of inline JavaScript inside body) for the optimized and initial web pages.
    * Disable "Minify HTML" if there are any changes.
  1. **HTML comments removal** (decrease of HTML code size).
    * Enable "Remove HTML comments".
    * Check for HTML changes for the optimized and initial web pages.
    * Disable "Remove HTML comments" if there are any changes.
  1. **Gzip** (decrease of HTML code size).
    * Enable "Gzip HTML".
    * Enable "Gzip fonts".
    * Enable "Check for gzip possibility via cookies".
    * Enable "Use `deflate` instead of `gzip` for IE6/7".
    * Load the optimized page and try to read its contents.
    * Disable "Gzip HTML", "Gzip fonts", "Check for gzip possibility via cookies", and "Use `deflate` instead of `gzip` for IE6/7" if can't read contents.

## Automatic tuning — Performance ##
  1. **Validate changse in files** (decrease optimization expenses).
    * Enable "Ignore file modification time stamp (mtime)".
    * Enable "Do not use regular expressions".
    * Check for HTML changes for the optimized and initial web pages.
    * Disable "Do not use regular expressions" if there are any changes.

## Automatic tuning — data:URI ##
  1. **Background images** (decrease in HTTP requests number).
    * Enable "Apply data:URI".
    * Enable "Apply mhtml".
    * Enable "Separate images from CSS code".
    * Enable "Load images on DOMready event".
    * Compare styles for optimized and intiial website home page.
    * Disable "Apply data:URI", "Apply mhtml", "Separate images from CSS code", and "Load images on DOMready event" if styles are different.
    * Load the second CSS file (with background images) from the optimized web page and get its size.
    * Disable "Separate images from CSS code" and "Load images on DOMready event" if file size less than 102400 bytes.

## Automatic tuning — CDN ##
  1. **JavaScript files distribution** (increase in requests concurrency).
    * Get JavaScript host from initial website page with the website host.
    * Set "Host for JavaScript file(s)" and enable "Distribute JavaScript files" if calculated host differs from website host (and it is a subdomain).
  1. **CSS files distribution** (increase in requests concurrency).
    * Get CSS host from initial website page with the website host.
    * Set "Host for CSS file(s)" and enable "Distribute CSS files" if calculated host differs from website host (and it is a subdomain).
  1. **Images distribution** (increase in requests concurrency).
    * Get images host(s) from initial website page with the website host.
    * Set "Allowed hosts" and enable "Distribute images" if calculated host(s) differ(s) from website host (and it/they is/are subdomain(s)).

## Automatic tuning — HTML Sprites ##
  1. **HTML Sprites** (decrease of HTTP requests).
    * Get number of small images on the initial website page which size is less than 16x16.
    * Enable "Combine HTML images", "Combine images for the current page only", and set "Maximum width and height of HTML images" to 16 if there are more than 2 such images.

## Automatic tuning — Unobtrusive JavaScript ##
  1. **Nonblocking JavaScrupt** (acceleration of page rendering with JavaScript calls movement).
    * Enable "Move all JavaScript code to `</body>`".
    * Count JavaScript errors on the optimized home page.
    * Disable "Move all JavaScript code to `</body>`" if there are any.
  1. **Unobtrusive JavaScript** (acceleration of page rendering).
    * Get the number of known (supported) widgets on the initial website page.
    * Enable "Move JavaScript widgets calls before `</body>`" if there are any widgets.
    * Get the number of known (supported) ads on the initial website page.
    * Enable "Move advertisement calls before `</body>`" if there are any ads.
    * Get the number of frames which are not widgets or ads.
    * Enable "Defer iframes loading" if there are any frames.