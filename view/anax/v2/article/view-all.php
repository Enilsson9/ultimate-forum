<?php

namespace Anax\View;


?><h1>All users</h1>

<table class="table">
    <tr>
        <th>Id</th>
        <th>Gravatar</th>
        <th>Full name</th>
        <th>Acronym</th>
        <th>Email</th>
    </tr>
    <?php foreach ($users as $user) : ?>
        <tr>
            <td> <a href="user/<?= $user->id ?>"> <?= $user->id ?></a></td>
            <td><img src="<?= $user->gravatar ?>" alt="Gravatar"></td>
            <td><?= $user->fullname ?></td>
            <td><?= $user->acronym ?></td>
            <td><?= $user->email ?></td>
        </tr>
    <?php endforeach; ?>
</table>
