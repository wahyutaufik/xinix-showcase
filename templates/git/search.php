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
                <div class="table-container">
                    <table class="table nowrap stripped hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Stars</th>
                                <th>Forks</th>
                                <th>Author</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($entries as $entry): ?>
                            <?php 
                                $gits = explode("com/",$entry['git']);
                                $git = explode("/",$gits['1']);
                            ?>
                            <tr>
                                <td><a href="<?php echo $entry['git']; ?>"><?php echo $git['1'] ?></a></td>
                                <td>Dependency Injection Container for Bono PHP Framework</td>
                                <td>1</td>
                                <td>0</td>
                                <td><a href="https://github.com/<?php echo $git['0']; ?>"><?php echo $git['0'] ?></a></td>
                            </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</main>