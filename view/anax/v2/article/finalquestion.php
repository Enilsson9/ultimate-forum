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
        //var_dump($items)
     ?>
    </pre>

<!-- MAIN QUERY -->
<?php foreach ($items as $item) : ?>
    <?php if ($item->question_id == $id  ) : ?>
        <h1><?= $item->question_content ?></h1>
        <h4><?= $item->question_description ?></h4>

        <p>Asked by
            <a href="../users/<?= $item->user_question_id ?>"><?= $item->user_question_acronym ?></a>
            <span><?= $item->user_question_created ?></span>
            <img width="50px" src="<?= $item->user_question_gravatar?>" alt="Gravatar">
        </p>

        <?php break; ?>
    <?php endif; ?>
<?php endforeach; ?>


<!-- MAIN QUERY COMMENTS -->
<?php foreach ($items as $item) : ?>
    <?php if ($item->question_id == $id  ) : ?>
        <p><?= $item->comment_question ?> // <a href="../users/<?= $item->comment_question_user_id ?>"><?= $item->comment_question_user ?></a>
        - <?= $item->comment_question_created ?></p>
    <?php endif; ?>
<?php endforeach; ?>

<!-- MAIN ANSWER -->
<?php foreach ($items as $item) : ?>
    <?php if ($item->question_id == $id  ) : ?>
        <h4><?= $item->answer_content ?></h4>

        <p>Answered by
            <a href="../users/<?= $item->answer_user_id ?>"><?= $item->answer_user ?></a>
            <span><?= $item->answer_user_created ?></span>
            <img width="50px" src="<?= $item->answer_user_gravatar?>" alt="Gravatar">
        </p>

        <?php break; ?>
    <?php endif; ?>
<?php endforeach; ?>

<?php foreach ($items as $item) : ?>
<!-- MAIN ANSWER COMMENTS -->
    <?php if ($item->question_id == $id  ) : ?>
        <p><?= $item->comment_answer ?> // <a href="../users/<?= $item->comment_answer_user_id ?>"><?= $item->comment_answer_user ?></a>
        - <?= $item->comment_answer_created ?></p>
    <?php endif; ?>
<?php endforeach; ?>


</article>
