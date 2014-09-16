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
                                    <li><a href="<?php echo URL::site('git/null/create') ?>" class="button active">Create</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="list-form">
                <div class="form-input">
                    <form method="post">
                        <?php foreach(f('app')->controller->schema() as $name => $field): ?>
                        <?php if ($field['hidden']) continue ?>
                        <div class="row">
                            <?php echo $field->label() ?>
                            <?php //echo $field->format('input', @$entry[$name]) ?>
                            <div class="span-3">
                                <span class="prefix">https://github.com/</span>
                            </div>
                            <div class="span-9">
                                <input class="postfix-input" type="text" name="git" placeholder="username/repo">
                            </div>
                        </div>
                        <?php endforeach ?>
                        <div class="command-bar">
                            <input type="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
