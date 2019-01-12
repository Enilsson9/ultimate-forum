<?php

namespace Anax\View;

/**
 * Render content within an article.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

// Prepare classes
$classes[] = "article";
if (isset($class)) {
    $classes[] = $class;
}


?><article <?= classList($classes) ?>>
<?= $content ?>



<h1>Minox beard spot</h1>
<h2>Latest questions</h2>
<h2>Most popular tags</h2>
<h2>Most active users</h2>

</article>
