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

<h1>Our ultimate forum</h1>

<p>Ask a question <a href="forum/ask">here</a></p>
<p>Check all tags<a href="forum/tags">here</a></p>

<h2>All questions</h2>

<?php foreach ($questions as $question) : ?>


        <div class="byline">
            <a href="<?= url("forum/{$question->acronym}/{$question->id}"); ?>">
                <h4><?= $question->question ?></h4>
            </a>

            <p>By
                <a href="<?= url("forum/{$question->acronym}"); ?>">
                    <?= $question->acronym ?>
                </a>
            </p>

            <time><?= $question->created ?></time>
        </div>


    <?php endforeach; ?>

<h2>Filter by tag</h2>

</article>
