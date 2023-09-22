<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upfdate{{$product->id}}">
    update product
</button>

<!-- Modal -->
<div class="modal fade" id="upfdate{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="upfdate{{$product->id}}Label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upfdate{{$product->id}}Label">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route("product.update",$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="text-start" for="name"> Name : </label>
                        <input class="form-control" type="text" name="name" id="name" required value="{{old("name",$product->name)}}">
                    </div>
                    <div>
                        <label class="text-start" for="description"> description : </label>
                        <input class="form-control" type="text" name="description" id="description" required value="{{old("description",$product->description)}}">
                    </div>
                    <div>
                        <label class="text-start" for="image"> Image : </label>
                        <input class="form-control-file" type="file" name="image" id="image" >
                    </div>
                    <div>
                        <label class="text-start" for="stock"> stock : </label>
                        <input class="form-control" type="number" name="stock" id="stock" required value="{{old("stock",$product->stock)}}">
                    </div>
                    <div>
                        <label class="text-start" for="price"> price : </label>
                        <input class="form-control" type="number" name="price" id="price" required value="{{old("price",$product->price)}}">
                    </div>
                    <div class="form-group mb-5">
                        <label  for="category_id">Category:</label><br>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
