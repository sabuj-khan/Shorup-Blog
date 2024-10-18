<div class="modal" id="delete-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h3 class=" mt-3 text-warning">Delete !</h3>
                <p class="mb-3">Once delete, you can't get it back.</p>
                <input class="d-none" id="deleteID"/> <br> 
                <input class="d-none" id="deleteFilePath"/>

            </div>
            <div class="modal-footer justify-content-end">
                <div>
                    <button type="button" id="delete-modal-close" class="btn shadow-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button onclick="PostDelete()" type="button" id="confirmDelete" class="btn shadow-sm btn-danger" >Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

    $("#delete-modal-close").on('click', function(){
        $('#delete-modal').modal('hide')
    });

    async function PostDelete(){
        let productId      = document.getElementById('deleteID').value;
        let productImgPath = document.getElementById('deleteFilePath').value;

        // document.getElementById("delete-modal-close").click();
        // $('#delete-modal').modal('hide')

        
        let response = await axios.post('/posts-delete', {"id":productId, "file_path":productImgPath});
        

        if(response.status == 200 && response.data['status'] == 'success'){
            successToast(response.data['message']);
            await getPostList();
            $('#delete-modal').modal('hide')
        }else{
            errorToast(response.data['message']);
        }
    }


</script>