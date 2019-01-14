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

<h1>All tags</h1>


<pre>
<?php
    //var_dump($tags)
 ?>
</pre>

    <ul>
        <?php foreach ($tags as $tag) : ?>
        <li>
            <h3> <a href="tag/<?= $tag->id ?>"><?= $tag->content ?></a></h4>
            <p><?= $tag->description ?></p>
        </li>
        <?php endforeach; ?>
    </ul>

</article>
