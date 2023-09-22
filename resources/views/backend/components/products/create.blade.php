<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createproduct">
    create product
</button>

<!-- Modal -->
<div class="modal fade" id="createproduct" tabindex="-1" role="dialog" aria-labelledby="createproductLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createproductLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route("product.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label  for="name">Name:</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label  for="description"> Description</label>
                        <input class="form-control" type="text" name="description" id="description" required>
                    </div>
                    <div class="form-group">
                        <label  for="image">Images:</label>
                        <input  class="form-control-file" type="file" name="image" id="image" required>
                    </div>
                    <div class="form-group">
                        <label  for="stock">Stock:</label>
                        <input class="form-control" type="number" name="stock" id="stock" required>
                    </div>
                    <div class="form-group">
                        <label  for="price">Price:</label>
                        <input class="form-control" type="number" name="price" id="price" required>
                    </div>
                    <div class="form-group mb-5">
                        <label  for="category_id">Category:</label><br>
                        <select class="form-control" name="category_id" id="">
                            <option disabled selected>category</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer ">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
