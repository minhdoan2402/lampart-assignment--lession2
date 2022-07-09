<div class="modal fade" id="copyProductModal" tabindex="-1" role="dialog" aria-labelledby="copyProductModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="copyProductModalLabel">Bạn có muốn copy sản phẩm này không ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="?c=product&a=copy" method="POST">
                    <input type="hidden" name="id" id="product-copy-id">
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary mr-1" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Accept</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>