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

    <pre>
    <?php
        //var_dump($questions)
     ?>
    </pre>

<?php foreach ($questions as $question) : ?>
    <?php if ($question->user_id == $id  ) : ?>
        <h1><?= $question->acronym ?></h1>
        <img src="<?= $question->gravatar ?>" alt="Gravatar">
        <?php break; ?>
    <?php endif; ?>
<?php endforeach; ?>



<h2>Questions:</h2>
    <?php foreach ($questions as $question) : ?>
        <?php if ($question->user_id == $id  ) : ?>
            <div class="byline">
                <a href="<?= url("forum/questions/{$question->question_id}"); ?>">
                    <h4><?= $question->question ?></h4>
                </a>
                <p>By
                    <a href="<?= url("forum/user/{$question->acronym}"); ?>">
                        <?= $question->acronym ?>
                    </a>
                </p>
                Created: <time><?= $question->created ?></time>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

<h2>Answers:</h2>

<?php foreach ($answers as $answer) : ?>
    <?php if ($answer->user_id_answer == $id  ) : ?>
        <div class="byline">
            On question: <a href="<?= url("forum/questions/{$answer->question_id}"); ?>">
                <?= $answer->question ?>
            </a>

            <p><strong>Answer:</strong> <?= $answer->answer ?></p>
            Created: <time><?= $answer->answer_created ?></time>
        </div>
    <?php endif; ?>
<?php endforeach; ?>


</article>
