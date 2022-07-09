<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="editProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalLabel">Edit product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="?c=product&a=edit" role="form">
                    <input required name="id" type="hidden" class="form-control" id="product-edit-id">

                    <div class="form-group">
                        <label for="product-name" class="col-form-label">Product name</label>
                        <input required name="name" type="text" class="form-control" id="product-edit-name">
                    </div>
                    <div class="form-group">
                        <label for="category-select">Category</label>
                        <select required name="category_id" class="form-control" id="product-category-name">
                            <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->CategoryID ?>"><?= $category->CategoryName ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="featuredImage">Product image</label>
                        <input name="image" type="file" class="form-control-file" id="featuredImage">
                    </div>

                    <div class="form-group" id="product-edit-image">
                        <img src="" alt="" style="width: 100px;">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>