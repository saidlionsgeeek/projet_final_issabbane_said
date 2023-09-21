<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#userrole{{$user->id}}">
    Asiign Role
</button>

<!-- Modal -->
<div class="modal fade" id="userrole{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="userrole{{$user->id}}Label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userrole{{$user->id}}Label">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body " >
                <form action="{{route('users.assignrole',$user->id)}}" method="POST">
                    @csrf
                    <div>
                        <div>
                            <label class="text-start"  for="name">Ajouter un rôle :</label>
                            <br>
                            <select class="form-control" name="role" id="role">
                                <option selected disabled>Choisis rôle</option>
                                @foreach ($roles as $role )
                                <option selected value="{{$role->name}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <label for="name">Ajouter un role</label>
                        <select name="" id="">
                            <option value="">dck,cdk,</option>
                        </select> --}}
                    </div>
                    <div class="modal-footer mt-5">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-secondary" onsubmit="return confirm('are you sure!');">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
