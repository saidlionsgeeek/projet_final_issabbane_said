<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upfdate{{$info->id}}">
    update
</button>

<!-- Modal -->
<div class="modal fade" id="upfdate{{$info->id}}" tabindex="-1" role="dialog" aria-labelledby="upfdate{{$info->id}}Label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="upfdate{{$info->id}}Label">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route("info.update",$info->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label class="text-start" for="city"> city : </label>
                        <input class="form-control" type="text" name="city" id="city" required value="{{old("city",$info->city)}}">
                    </div>
                    <div>
                        <label class="text-start" for="avenue"> avenue : </label>
                        <input class="form-control" type="text" name="avenue" id="avenue" required value="{{old("avenue",$info->avenue)}}">
                    </div>
                    <div>
                        <label class="text-start" for="phone"> phone : </label>
                        <input class="form-control" type="text" name="phone" id="phone" required value="{{old("phone",$info->phone)}}">
                    </div>
                    <div>
                        <label class="text-start" for="worktime"> worktime : </label>
                        <input class="form-control" type="text" name="worktime" id="worktime" required value="{{old("worktime",$info->worktime)}}">
                    </div>
                    <div>
                        <label class="text-start" for="email"> email : </label>
                        <input class="form-control" type="text" name="email" id="email" required value="{{old("email",$info->email)}}">
                    </div>
                    <div>
                        <label class="text-start" for="text"> text : </label>
                        <input class="form-control" type="text" name="text" id="text" required value="{{old("text",$info->text)}}">
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
