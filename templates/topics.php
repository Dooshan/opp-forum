<?php include "includes/header.php" ?>
<ul id="topics">
    <?php if ($topics) : ?>
        <?php foreach ($topics as $topic) : ?>
            <li class="topic">
                <div class="row">
                    <div class="col-md-2">
                        <img class="avatar pull-left" src="images/avatar/<?= $topic->avatar ?>" />
                    </div>
                    <div class="col-md-10">
                        <div class="topic-content pull-right">
                            <h3><a href="topic.php?id=<?=$topic->id?>"><?= $topic->title; ?></a></h3>
                            <div class="topic-info">
                                <a href="topics.php?category=<?= urlFormat($topic->category_id) ?>"><?= $topic->name ?></a> >>
                                <a href="topics.php?user=<?= urlFormat($topic->user_id) ?>"><?= $topic->username ?></a> >>
                                Posted on: <?php echo formatDate($topic->create_date); ?>
                                <span class="badge pull-right"><?= replyCount($topic->id) ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
</ul>
<?php else : ?>
    <p>No topic to display</p>
<?php endif; ?>

<h3>Forum Statistics</h3>
<ul>
    <li>Total Number of Users: <strong><?php echo $totalUsers; ?></strong></li>
    <li>Total Number of Topics: <strong><?php echo $totalTopics; ?></strong></li>
    <li>Total Number of Categories: <strong><?php echo $totalCategories; ?></strong></li>
</ul>

<?php include "includes/footer.php" ?>