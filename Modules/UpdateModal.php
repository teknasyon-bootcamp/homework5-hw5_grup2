<div class="modal fade" id="update_<?= $book->id ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="index.php?action=edit&book=<?= $book->id ?>" method="POST">
                <div class="modal-header">
                    <h3 class="modal-title">Update</h3>
                </div>
                <div class="modal-body">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="<?= $book->name ?>" name="name" />
                            <!-- A hidden field let us include data that cannot be seen or modified 
                            when the form is submitted. -->
                            <input type="hidden" class="form-control" value="<?php $book->id ?>" name="id" />
                        </div>
                        <div class="form-group">
                            <label>Author</label>
                            <input type="text" class="form-control" value="<?= $book->author ?>" name="author" />
                        </div>
                    </div>
                </div>
                <div style="clear:both;"></div>
                <div class="modal-footer">
                    <button class="btn btn-warning" name="guncelle"><span class="glyphicon glyphicon-update"></span> Update</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Exit</button>
                </div>
            </form>
        </div>
    </div>
</div>