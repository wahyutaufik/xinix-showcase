<main>
    <div class="container">
        <div class="listing">
            <div class="nav-area hidden-mobile">
                <div class="wrapper">
                    <div class="row button-form">
                        <div class="span-12">
                        <div class="row">
                            <ul class="flat">
                                <li><a href="<?php echo f('controller.url') ?>" class="button active">Search</a></li>
                                <li><a href="<?php echo f('controller.url').'/null/create' ?>" class="button ">Create</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-user">
            <div class="wrapper">
                <ul class="listview">
                    <li class="list-group-container">
                        <ul class="list-group">
                            <!-- <div id="prefetch">
                                <form action="" method="POST">
                                    <input class="typeahead" name="src" type="text" placeholder="Search">
                                </form>
                            </div> -->
                            <?php foreach ($entries as $entry):?>
                            <li class="plain">
                                <a href="<?php echo f('controller.url').'/'.$entry['$id'] ?>">
                                    <?php echo $entry['git']; ?>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    var currentUrl = window.currentUrl = '<?php echo \URL::current(); ?>';
</script>
<script type="text/javascript" src="<?php echo \URL::base('vendor/jquery/jquery.js') ?>"></script>
<script type="text/javascript" src="<?php echo \URL::base('vendor/js/bloodhound.js') ?>"></script>
<script type="text/javascript" src="<?php echo \URL::base('vendor/js/typeahead.bundle.js') ?>"></script>
<script type="text/javascript" src="<?php echo \URL::base('vendor/js/git.js') ?>"></script>
