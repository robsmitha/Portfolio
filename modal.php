<?php
if(isset($portfolioitem)){
    ?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalTitle"><?php echo $portfolioitem->getName() ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a target="_blank" href="<?php echo $portfolioitem->getProjectUrl(); ?>">
                    <img class="img-fluid mx-auto d-block" src="<?php echo $portfolioitem->getImageUrl(); ?>" alt="<?php echo $portfolioitem->getName(); ?>">
                </a>
                <small>
                    <?php echo $portfolioitem->getDescription(); ?>
                </small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                <a class="btn btn-primary" href="<?php echo $portfolioitem->getProjectUrl(); ?>" title="Visit <?php echo $portfolioitem->getProjectUrl(); ?>">
                    <?php echo $portfolioitem->getName(); ?>
                </a>
            </div>
        </div>
    </div>
</div>
<?php

}
?>