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


?>
<!-- flash -->
<div class="outer-wrap outer-wrap-flash">
    <div class="inner-wrap inner-wrap-flash">
        <div class="row">
            <div class="region-flash">
                <img class="" src="http://localhost:8080/ramverk1/me/kmom10/proj/htdocs/image/beard-banner.jpg?width=1100&height=150&crop-to-fit&area=0,0,30,0">
            </div>
        </div>
    </div>
</div>


<article <?= classList($classes) ?>>



<h1>Minoxidil Forum</h1>

<p>Welcome to the forum of the Minox beard spot. We recommend you to look after the questions before making one.</p>
<p>Thank you for joining and enjoy!</p>


<h2>Ask a question</h2>
<ul>
    <li>You can ask anything <a href="forum/ask/">here</a></li>
    <li>Remember to look all questions on our <a href="forum">forum</a> first</li>
</ul>

<h2>Most active users</h2>


<?php foreach ($users as $user) : ?>
<figure style="display: inline-block">
    <img src="<?= $user->gravatar ?>" width="50px" alt="gravatar">
    <figcaption><a href="forum/user/<?= $user->id ?>"><?= $user->acronym ?></a><figcaption>
</figure>
<?php endforeach; ?>



<h2>Latest questions</h2>
<ul>
    <?php foreach ($questions as $question) : ?>
    <li>
        <p> <a href="forum/questions/<?= $question->question_id ?>"><?= $question->question ?></a>
        by <a href="forum/user/<?= $question->user_id ?>"><?= $question->acronym ?></a>
        <time><?= $question->created ?> </time> </p>
    </li>
    <?php endforeach; ?>
</ul>


<h2>Most popular tags</h2>
<ul>
    <?php foreach ($tags as $tag) : ?>
    <li>
        <p> <a href="forum/tag/<?= $tag->id ?>"><?= $tag->tag ?></a></p>
        <p><?= $tag->description ?></p>
    </li>
    <?php endforeach; ?>
</ul>

</article>
