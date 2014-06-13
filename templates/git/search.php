<main>
    <div class="container">
        <div class="listing">
            <div class="nav-area hidden-mobile">
                <div class="wrapper">
                    <div class="row button-form">
                        <div class="span-12">
                        <div class="row">
                            <ul class="flat">
                                <li><a href="http://localhost/xinix-showcase/www/index.php/git" class="button active">Search</a></li>
                                <li><a href="<?php echo URL::site('git/null/create') ?>" class="button ">Create</a></li>
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
                            <?php 
                                foreach ($entries as $entry): 
                                $gits = explode("com/",$entry['git']);
                                $git = explode("/",$gits['1']);    
                            ?>
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