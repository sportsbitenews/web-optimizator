# What is WEBO Site SpeedUp? #

WEBO Site SpeedUp is a web application that automates all client-side improvements for website and significantly increases load speed of its pages. Time-proven open source solutions and engineer genius brought together all parts of this puzzle and now you can improve your website in a few simple steps.

## Optimization actions ##
  * Merging external and inline code
  * Minifying files
  * Gzipping files
  * Client-side caching
  * Server-side caching
  * Multiple hosts for static assets
  * CSS Sprites applying
  * Data:URI applying
  * Unobtrusive JavaScript loading
  * and much more...

## Minimum server-side performance impact ##
When cache files are created WEBO Site SpeedUp wastes about 1-5 ms to parse and refresh outputted HTML document (with default settings, correct one-string mode for HTML is a very expensive procedure and can take 50-100 ms additionally).

## Acceleration statistics ##

After series of tests on default CMS installations WEBO Site SpeedUp showed average page loading speed of 250% of normal (and up to 500% in several cases). To be accurate, **average acceleration is 2.5 times (+21 in YSlow grade, -34% in size, -43% in objects).**

Table below shows how greater website speed increases after WEBO Site SpeedUp installation. Note that all CMS are tested in one particular environment with ~100KB/s broadband and Firefox 3.5 browser. Websites are loaded several times to fill proxy cache and to get necessary statistics. Local cache is emptied before each load.



| **CMS** | **YSlow** | | **Load time (s)** | | **Size (KB)** | | **Objects** | |
|:--------|:----------|:|:------------------|:|:--------------|:|:------------|:|
|  |Before|After|Before|After|Before|After|Before|After|
|Bitrix 8.5.1|61|92|4.37|2.21|239|194|53|28|
|CMS Made Simple|74|96|0.483|0.375|49|35|15|5 |
|cogear 1.0|76|91|5.11|1.57|447|129|11|9 |
|DataLife Engine 8.0|65|91|4.48|1.29|147|120|43|16|
|Drupal 6.10|72|94|4.8|1.34|102|99|32|8 |
|Etomite 1.1|89|96|0.874|0.477|19|14|7 |6 |
|ExpressionEngine 1.6.8|96|99|0.584|0.257|10|4 |3 |2 |
|IPB 2.3.6|67|89|4.38|1.81|124|52|27|25|
|Joomla! 1.0.15|78|92|0.996|0.521|47|39|18|13|
|Joomla! 1.5.10|64|94|4.38|1.57|139|73|42|9 |
|Joostina 1.2|63|91|8.07|3.77|426|333|45|17|
|Livestreet 0.3.1|51|96|10.87|1.97|298|111|48|5 |
|MaxDev Pro 1.082|75|93|2.4|0.871|51|36|27|21|
|MaxSite 0.3.1|71|97|2.73|1.12|152|90|15|5 |
|MODx 0.9.6.3|69|97|2.73|0.842|109|51|18|4 |
|OpenSlaed 1.2|77|83|5.51|3.37|257|250|92|72|
|osCommerce 2.2|77|93|3.05|1.24|72|65|31|31|
|PHP-Nuke 8.0 <sup>*</sup>|72|91|2.785|1.272|181|91|19|19|
|phpBB 3.0.4|72|95|0.651|0.305|85|71|19|7 |
|SMF 1.1.8 <sup>**</sup>|61|91|2.68|1.72|183|132|63|25|
|Textpattern 4.0.8|92|97|1.26|0.823|8 |5 |4 |4 |
|UMI.CMS 2.7|58|93|4.52|2.89|269|177|59|10|
|vBulletin 3.8.3|70|92|3.33|1.81|124|67|20|14|
|Website Baker 2.6|77|95|1.51|0.47|17|12|10|8 |
|WordPress 2.7.1|72|95|4.58|2.08|133|125|31|6 |
|Xaraya 1.1.5|81|97|1.79|0.78|35|16|8 |4 |
|XOOPS 2.3.3|72|95|3.22|1.53|65|50|21|8 |

<sup>*</sup> for PHP-Nuke the second static host has been added
<sup>**</sup> for SMF 2 additional static hosts have been added