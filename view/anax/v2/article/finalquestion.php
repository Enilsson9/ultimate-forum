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
        //var_dump($answers)
     ?>
    </pre>

<!-- MAIN QUERY -->
<?php foreach ($questions as $question) : ?>
    <?php if ($question->question_id == $id  ) : ?>
        <h1><?= $question->question ?></h1>
        <h4><?= $question->description ?></h4>

        <p>Asked by
            <a href="../users/<?= $question->user_id ?>">/<?= $question->acronym ?></a>
            <span><?= $question->created ?></span>
            <img width="50px" src="<?= $question->gravatar?>" alt="Gravatar">
        </p>

        <?php break; ?>
    <?php endif; ?>
<?php endforeach; ?>


<!-- MAIN QUERY COMMENTS -->
<?php foreach ($Qcomments as $comment) : ?>
    <?php if ($comment->question_id == $id  ) : ?>
        <p><?= $comment->comment ?> // <a href="../users/<?= $comment->id ?>"><?= $comment->acronym ?></a>
        - <?= $comment->created ?></p>
    <?php endif; ?>
<?php endforeach; ?>


<!-- MAIN ANSWER -->
<?php foreach ($answers as $answer) : ?>
    <?php if ($answer->question_id == $id  ) : ?>
        <h4><?= $answer->answer ?></h4>

        <p>Answered by
            <a href="../users/<?= $answer->user_id ?>"><?= $answer->acronym ?></a>
            <span><?= $answer->created ?></span>
            <img width="50px" src="<?= $answer->gravatar?>" alt="Gravatar">
        </p>

    <?php endif; ?>
<?php endforeach; ?>

<!-- MAIN QUERY COMMENTS -->
<?php foreach ($Acomments as $comment) : ?>
    <?php if ($comment->question_id == $id  ) : ?>
        <p><?= $comment->comment ?> // <a href="../users/<?= $comment->id ?>"><?= $comment->acronym ?></a>
        - <?= $comment->created ?></p>
    <?php endif; ?>
<?php endforeach; ?>


</article>
