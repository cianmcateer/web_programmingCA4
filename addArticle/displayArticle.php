<?php 


include "includes/database.php";

    $query = "SELECT * FROM article";
    $statement = $db->prepare($query);
   try {
        $statement->execute();
    } catch (Exception $ex) {
        header("Location: ../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $articles = $statement->fetchAll();
    $statement->closeCursor();
 
    require_once "includes/header.php"; ?>
 

<div id="content" class="site-content container">
    <div class="container main-content-area">
        <div class="row pull-left">
            <div id="primary" class="content-area col-sm-12 col-md-8">
                <main id="main" class="site-main" role="main">
                   <?php foreach($articles as $article): ?>  
                    <article id="post-1241" class="post-1241 post type-post status-publish format-standard has-post-thumbnail sticky hentry category-uncategorized tag-sticky-2 tag-template">
                        <header class="entry-header page-header">
                          
                            <h1 class="entry-title"><?php echo $article['title']?></h1>
                           
                            <div class="entry-meta">
                                <span class="posted-on"><i class="fa fa-calendar"></i><?php echo $article['date'] ?></span><span class="byline"> <i class="fa fa-user"></i> <span class="author vcard"></span></span>
                                <span class="cat-links"><i class="fa fa-folder-open-o"></i>
                                    <?php echo $article['category'] ?></span>
                            </div>
                            <!-- .entry-meta -->
                        </header>
                        <!-- .entry-header -->

                        <div class="entry-content">
                            <a href="https://colorlib.com/dazzling/template-sticky/" title="Template: Sticky">
                            </a>
                            <div class="col-sm-6">
                                <p><?php echo $article['text'] ?></p>
                                
                            </div>
                            
                            
                        </div>
                           
                        
                        <!-- .entry-content -->

                        <hr class="section-divider">
                        
                    </article>
                    <?php endforeach; ?>
                    <a href="home.php">Add Another Article</a>
                    <!-- #post-## -->
                    <!-- #post-## -->
                    <!-- #post-## -->



                    <!-- .navigation -->


                </main>
                <!-- #main -->
            </div>
            <!-- #primary -->

            <div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
                <aside id="search-2" class="widget widget_search">
                    <form method="get" class="form-search" action="https://colorlib.com/dazzling/">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="screen-reader-text">Search for:</span>
                                <input type="text" class="form-control search-query" placeholder="Search..." value="" name="s">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default" name="submit" id="searchsubmit" value="Search"><span class="glyphicon glyphicon-search"></span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </aside>
                <div class="widget tabbed">
                    <div class="tabs-wrapper">
                        <ul class="nav nav-tabs">

                            <li><a href="#recent" data-toggle="tab">Recent</a>
                            </li>

                        </ul>

                        <div class="tab-content">


                            <ul id="recent" class="tab-pane">


                                <li>
                                    
                                </li>
                                <li>
                                   
                                </li>
                                <li>
                                    
                                </li>
                                <li>
                                    
                                </li>
                                <li>
                                    
                                </li>
                            </ul>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "includes/footer.php";
