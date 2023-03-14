<div class="modal inmodal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">İmtina Et</span></button>
            </div>
            <div class="modal-body">
                <div class="form-data">
                    <form id="updateForm" onsubmit="event.preventDefault(); return updateForm('/{{$page["route"]}}/update')">
                        @csrf
                        <input type="text" hidden id="model_id" name="{{$page["route"]}}_id">
                        <div class="row">
                            <div class="col-md-12">
                                <label for="name">{{$page["title"]}} Adi</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button id="store_button" type="submit" class="btn btn-primary">
                                    Yadda Saxla
                                </button>
                                <button type="button" class="btn btn-light" data-dismiss="modal">İmtina Et</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
