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

<button>Ask a question</button>
<h2>All questions</h2>


<pre>

<?php

    var_dump($chosenTag);


 ?>

</pre>
<?php foreach ($questions as $question) : ?>


        <div class="byline">
            <a href="<?= url("forum/questions/{$question->id}"); ?>">
                <h4><?= $question->question ?></h4>
            </a>
            Tags:
            <?php foreach ($tags as $tag) : ?>

                <?php if ($tag->id === $question->id  ) : ?>

                    <a href="<?= url("forum/tags/{$tag->tag}"); ?>">
                        <?= $tag->tag ?>
                    </a>
                    -
                <?php endif; ?>


            <?php endforeach; ?>

            <p>By
                <a href="<?= url("forum/users/{$question->acronym}"); ?>">
                    <?= $question->acronym ?>
                </a>
            </p>

            <time><?= $question->created ?></time>
        </div>


    <?php endforeach; ?>

<h2>Filter by tag</h2>

</article>
