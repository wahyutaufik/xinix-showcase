<link rel="stylesheet" type="text/css" href="<?php echo URL::base('/vendor/css/prettify.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo URL::base('/vendor/css/prettify.clean.css') ?>">

<main>
    <div class="container">
        <div class="listing">
            <div class="nav-area hidden-mobile">
                <div class="wrapper">
                    <div class="row button-form">
                        <div class="span-12">
                            <div class="row">
                                <ul class="flat">
                                    <li><a href="<?php echo URL::site('/git') ?>" class="button ">Search</a></li>
                                    <li><a href="<?php echo URL::site('git/null/create') ?>" class="button ">Create</a></li>
                                    <li><a href="<?php echo URL::site('/git/'.$entry['$id']) ?>" class="button active">Read</a></li>
                                    <li><a href="<?php echo URL::site('/git/'.$entry['$id'].'/update') ?>" class="button">Update</a></li>
                                    <li><a href="<?php echo URL::site('/git/'.$entry['$id'].'/delete') ?>" class="button ">Delete</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-form">
                <div class="">
                    <div class="row field field-git">
                        <h3>
                            <a href="<?php echo $entry['git']; ?>"><?php echo \Norm\Schema\String::create()->format('readOnly', $entry->get('repo')) ?></a>
                        </h3>

                        <p>
                            <?php
                                if (empty($entry['description'])) {
                                    echo \Norm\Schema\String::create()->format('readOnly', 'No description available');
                                } else{
                                    echo \Norm\Schema\String::create()->format('readOnly', $entry['description']);
                                }
                            ?>
                        </p>

                        <div class="span-12">
                            <label>Author</label>
                            <a target="_blank" rel="external" href="https://github.com/<?php echo $entry['author']; ?>"><?php echo \Norm\Schema\String::create()->format('readOnly', $entry['author']) ?></a>
                        </div>
                        <div class="span-12">
                            <label>Repository</label>
                            <?php echo \Norm\Schema\String::create()->format('readOnly', 'https://github.com/'.$entry['git'].'.git') ?>
                        </div class="span-12">
                            <label>Homepage</label>
                            <a target="_blank" rel="external" href="https://github.com/<?php echo $entry['git'] ?>"><?php echo \Norm\Schema\String::create()->format('readOnly', 'https://github.com/'.$entry['git']) ?></a>
                        </div>
                        <div class="span-12">
                            <label>Stars</label>
                            <?php
                            if (empty($entry['star'])) {
                                echo \Norm\Schema\String::create()->format('readOnly', 'Never starred');
                            } else{
                                echo \Norm\Schema\String::create()->format('readOnly', $entry['star']);
                            }
                            ?>
                        </div>
                        <div class="span-12">
                            <label>Forks</label>
                            <?php
                                if (empty($entry['fork'])) {
                                    echo \Norm\Schema\String::create()->format('readOnly', 'Never forked');
                                } else{
                                    echo \Norm\Schema\String::create()->format('readOnly', $entry['fork']);
                                }
                            ?>
                        </div>
                        <div class="span-12">
                            <label>README</label>
                            <hr>
                            <?php if (empty($entry['readme'])): ?>
                                <span><?php echo \Norm\Schema\String::create()->format('readOnly', 'No readme avaliable'); ?> </span>
                            <?php else: ?>
                                <pre class="readme" style="display:none"><?php echo \Norm\Schema\String::create()->format('plain', htmlentities(base64_decode($entry['readme']))); ?></pre>
                                <div id="readme"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript" src="<?php echo URL::base('/vendor/js/marked.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo URL::base('/vendor/prettify/prettify.js') ?>"></script>
<script type="text/javascript">
    $('a[rel="external"]').click(function() {
        window.open($(this).attr('href'));
        return false;
    });

    marked.setOptions({
        highlight: function (code, lang) {
            // Fix for HTML code block
            if (lang === 'html') {
                code = $('<div/>').text(code).html();
            }

            return prettyPrintOne(code, lang, false);
        },
        gfm: true,
        tables: true
    });

    var html = marked($('.readme').text());

    $('#readme').html(html);
    $('#readme > pre').addClass('prettyprint');

    prettyPrint();

    $('#readme table').addClass('table nowrap stripped').wrap('<div class="table-container"></div>');
</script>
