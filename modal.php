<?php require_once("inc/header_links.php") ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Vertical Center Modal</h3>
            <a href="#myModal" data-toggle="modal">Click to trigger modal</a>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Vertically Centered Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
                <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>
<?php require_once("inc/footer_links.php") ?>