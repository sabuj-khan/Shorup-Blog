<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Create Category</h6>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Category Name *</label>
                                <input type="text" class="form-control" id="categoryName">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="SaveCategory()" id="save-btn" class="btn btn-sm  btn-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>

    $("#modal-close").on('click', function(){
            $('#create-modal').modal('hide')
        });


async function SaveCategory(){
    let categoryName = document.getElementById('categoryName').value;

    if(categoryName.length == 0){
        errorToast('Category name is required');
    }else{
        let response = await axios.post('category-create', {"name":categoryName});

        if(response.status == 201 && response.data['status'] == 'success'){
            $('#create-modal').modal('hide')
            successToast(response.data['message']);
            document.getElementById("save-form").reset();
            await getCategoryList();
            
        }else{
            errorToast(response.data['message']);
        }
    }
        
    }



</script>