<?php

$date = date('d-M-y h:i');

include "includes/database.php";

$id = $_GET['id']; 

    $query = "SELECT * FROM article where id=:id";
    $statement = $db->prepare($query);
    $statement->bindValue(":id",$id);
   try {
        $statement->execute();
    } catch (Exception $ex) {
        header("Location: ../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $articles = $statement->fetchAll();
    $statement->closeCursor();
    
    $query2 = "SELECT * FROM comments WHERE articleid=:id";
    $statement2 = $db->prepare($query2);
    $statement2->bindValue(":id",$id);
   try {
        $statement2->execute();
    } catch (Exception $ex) {
        header("Location: ../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $comments = $statement2->fetchAll();
    $statement2->closeCursor();
    
    $query3 = "SELECT * FROM users WHERE userid=1";
    $statement3 = $db->prepare($query3);
    //$statement3->bindValue(":id",$id);
   try {
        $statement3->execute();
    } catch (Exception $ex) {
        header("Location: ../view/error.php?msg=" . $ex->getMessage());
        exit();
    }
    $users = $statement3->fetchAll();
    $statement3->closeCursor();
 
    require_once "includes/header.php"; 

?>
<html>
    <head>
       <script src="https://code.jquery.com/jquery-3.2.0.min.js"></script>
<script src="js/addCommet.js" type="text/javascript"></script>
    </head>
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
                                    <?php echo $article['category']?></span>
                            </div>
                            <!-- .entry-meta -->
                        
                        <!-- .entry-header -->

                        <div class="entry-content">
                            <a href="https://colorlib.com/dazzling/template-sticky/" title="Template: Sticky">
                            </a>
                            <div class="col-sm-6">
                                <p><?php echo $article['text']?></p>
                            </div>
                            
                            
                        </div>
                        
                        <!-- .entry-content -->

                        <hr class="section-divider">
                      
<div class="nav-links">

        <div class="nav-previous"> <a href="http://localhost/webprogca4/displayArticle.php"><i class="fa fa-chevron-left"></i>Return</a>
        </div>
                        </header>
                    </article>
                    
                    <?php endforeach; ?>
                    
                    <h4>Write a Comment:</h4>
   
                    <?php foreach($users as $user):
                        echo $user['username']; 
                    ?>
                    <form id="commentForm">
                        <input type="hidden" name="userid" value="<?php echo $user['userid']?>">
                        <input type="hidden" name="username" value="<?php echo $user['username']?>">
                            <?php endforeach; ?>
                        <input type="hidden" name="articleid" value="<?php echo $article['id'];?>">
                        <input type="hidden" name="date" value="<?php echo htmlentities($date); ?>">
                     <textarea name="comment" id="comment" rows="3" cols="10"></textarea> 
                    
                    <input type="submit" id="sumbit" name="sumbit" value="Post"  class="btn btn-default read-more">
                    </form>
                    <hr class="section-divider">
                    <div id="newestComment"></div>
                   <hr class="section-divider">
                    <?php foreach($comments as $comment):
                        echo $comment['username']."<br>"; 
                        echo $comment['comment']; 
                        ?>
                    
                   <hr class="section-divider">
                  <?php endforeach;
                   ?>
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
               
                    </div>
                </div>
            </div>
        </div>

</html>

<?php
include "includes/footer.php";
