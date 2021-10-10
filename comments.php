<div class="container mb-5 mt-5" id="comment_woodpress">
    <div class="card">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center"> User comment </h3>
                <div class="row">
                    <div class="col-md-12">

                        <ol class="commentlist">
                            <?php
                            // wp_list_comments( ); 
                            wp_list_comments('type=comment&callback=woodpress_comment');
                        ?>
                        </ol>
                        <?php 
                    the_comments_pagination(array(
                        'screen_reader_text'=>__("pagination", "woodpress"),
                        'prev_text'=> '<'.__("Previous", "woodpress"),
                        'prev_text'=> '>'.__("Previous", "woodpress"),
                    ));
                    ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


