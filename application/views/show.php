<html>
<head>
    <title>news</title>
</head>
<body>
    <h1>News</h1>
    <?php foreach($users as $users_item):?>
        <h2><?php echo $users_item['userid']?></h2>
        <div class="news_content">
            <?php echo $users_item['username']?>
            <br />
            <?php echo $news_item['password']?>
        </div>
    <?php endforeach;?>
</body>
</html>