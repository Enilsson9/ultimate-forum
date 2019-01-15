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

<h1>Our forum</h1>

<p>Ask a <a href="forum/ask/">question</a>|
Check all <a href="forum/tags">tags</a>|
Check all <a href="forum/users">users</a></p>

<h2>All questions</h2>

<?php foreach ($questions as $question) : ?>


        <div class="author-byline">
            <a href="<?= url("forum/questions/{$question->question_id}"); ?>">
                <h4><?= $question->question ?></h4>
            </a>
            <p>
                <span>By
                    <a href="<?= url("forum/user/{$question->user_id}"); ?>">
                        <?= $question->acronym ?>
                    </a>
                </span> -
                <time><?= $question->created ?></time>
            </p>
            <i>
                Tags:
                <?php foreach ($tags as $tag) : ?>

                    <?php if ($tag->id === $question->question_id  ) : ?>

                        <a href="<?= url("forum/tag/{$tag->tag_id}"); ?>">
                            <?= $tag->tag ?>
                        </a>
                        |
                    <?php endif; ?>


                <?php endforeach; ?>


            </i>





        </div>


    <?php endforeach; ?>

</article>
