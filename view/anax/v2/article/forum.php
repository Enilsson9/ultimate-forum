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

<h1>Our ultimate forum</h1>

<h2>Ask a question?</h2>
<input type="text" name="" value="">
<h2>Filter by tag</h2>
<h2>All questions</h2>
</article>
