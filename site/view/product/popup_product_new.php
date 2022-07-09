<div class="modal fade" id="newProductModal" tabindex="-1" role="dialog" aria-labelledby="newProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newProductModalLabel">Add new product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="?c=product&a=add" role="form">
                    <div class="form-group">
                        <label for="product-name" class="col-form-label">Product name</label>
                        <input required name="name" type="text" class="form-control" id="product-name">
                    </div>
                    <div class="form-group">
                        <label for="category-select">Category</label>
                        <select required name="category_id" class="form-control" id="category-select">
                            <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->CategoryID ?>"><?= $category->CategoryName ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="featuredImage">Product image</label>
                        <input name="image" type="file" class="form-control-file" id="featuredImage">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>