
{{--        DELETE MODAL--}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{$page["title"]}} Silme Emeliyyati</h5>
                <button type="button" class="close" data-dismiss="modal"><span
                        aria-hidden="true">&times;</span><span class="sr-only">İmtina Et</span></button>
            </div>
            <div class="modal-body">
                <h4>Silmek Istediyinzden Eminsiniz mi?</h4>
                <input type="hidden" id="deleteing_id">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Imtina Et</button>
                <button type="button" class="btn btn-primary delete_{{$page["route"]}}">Beli Sil</button>
            </div>
        </div>
    </div>
</div>
{{--        END DELETE MODAL--}}
