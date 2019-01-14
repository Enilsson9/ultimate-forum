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

<h1>Filtered by tag</h1>

<?php foreach ($questions as $question) : ?>
    <?php if ($question->id == $id  ) : ?>
        <h2>Tag "<?= $question->tag ?>"</h2>
        <?php break; ?>
    <?php endif; ?>
<?php endforeach; ?>

<pre>
<?php
    //var_dump($questions)
 ?>
</pre>


    <?php foreach ($questions as $question) : ?>
        <?php if ($question->id == $id  ) : ?>
            <div class="byline">
                <a href="<?= url("forum/questions/{$question->question_id}"); ?>">
                    <h4><?= $question->question ?></h4>
                </a>
                <p>By
                    <a href="<?= url("forum/user/{$question->acronym}"); ?>">
                        <?= $question->acronym ?>
                    </a>
                </p>
                <time><?= $question->created ?></time>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

</article>
