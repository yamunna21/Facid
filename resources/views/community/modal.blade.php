<div class="modal fade" id="exampleModal{{ $community->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Record information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p class="badge badge-pill badge-dark">Name: {{ $community->name }}</p>
                <p>Matrics No: {{ $community->matricsno }}</p>
                <p>Role Type: {{ $community->role }}</p>
                <p><img src="data:image/jpg;base64,{{ chunk_split(base64_encode($community->image)) }}" width="150" class="table-user-thumb" ></p>
                <p>Status: {{ $community->status }}</p>
                <p>Gender: {{ $community->gender }}</p>
                <p>About: {{ $community->description }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>